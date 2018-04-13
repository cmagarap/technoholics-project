<?php

date_default_timezone_set("Asia/Manila");

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('email', 'session', 'form_validation', 'basket', 'apriori'));
        if ($this->session->has_userdata('isloggedin')) {
            redirect('home');
        }
    }

    public function index() {
        $this->session->sess_destroy();
        $image = $this->item_model->fetch('content')[0];

        $data = array(
            'title' => "TECHNOHOLICS Login",
            'CTI' => $this->basket->total_items(),
            'page' => "Home",
            'image' => $image
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/login');
        $this->load->view('ordering/includes/footer');
    }

    public function login_submit() {

        $this->form_validation->set_rules('user', 'username/email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_message('required', 'Please enter your {field}.');

        if ($this->form_validation->run()) {
            $admin = $this->item_model->fetch("admin", "username = '" . html_escape($this->input->post('user')) . "' OR email = '" . $this->input->post('user') . "'");
            $customer = $this->item_model->fetch("customer", "username = '" . html_escape($this->input->post('user')) . "' OR email = '" . $this->input->post('user') . "'");
            if ($customer) { # if customer
                $customer = $customer[0];
                if ($customer->status == 1) { # if the account is active
                    $salt = $this->item_model->getSalt("customer", "verification_code", "customer_id", $customer->customer_id);
                    if (password_verify($salt . $this->input->post("password"), $customer->password)) { # if passwords match
                        $user = ($customer->username == NULL) ? $customer->email : $customer->username;
                        if ($customer->is_verified == 0) { # if not yet verified
                            $this->session->set_flashdata('error', 'Your account is not yet verified through your email.');
                            $this->index();
                        } elseif ($customer->is_verified == 1) { # 1: verified
                            $for_session = array(
                                'username' => $user,
                                'type' => 2,
                                'date' => time(),
                                'product_rating' => array(),
                                'viewed_products' => array()
                            );
                            $this->session->uid = $customer->customer_id;
                            $this->session->set_userdata($for_session, true);
                            $this->session->set_userdata('isloggedin', true);
                            session_regenerate_id(true);
                            $this->session->set_flashdata('myflashdata', true);

                            # APRIORI ============================================================>

                            $this->apriori->setMaxScan(20);
                            $this->apriori->setMinSup(2);
                            $this->apriori->setMinConf(100);
                            $this->apriori->setDelimiter(', ');

                            $view = $this->item_model->getDistinct("audit_trail", "customer_id = " . $this->session->uid . " AND status = 1  AND at_detail = 'Viewed'", "at_date", "at_date", "ASC");

                            $search = $this->item_model->getDistinct("audit_trail", "customer_id = " . $this->session->uid . " AND status = 1  AND at_detail = 'Search'", "at_date", "at_date", "ASC");

                            function sortBySupport($a, $b) {
                                return $b[0] - $a[0];
                            }

                            if ($view) { # get product views
                                # store the fetched values into an array:
                                foreach ($view as $v)
                                    $v_array[] = $v->at_date;

                                # get the orders of customer based on v_array[]:
                                for ($i = 0; $i < sizeof($v_array); $i++) {
                                    $this->db->select("item_name");
                                    $tilted_transactions[] = $this->item_model->fetch("audit_trail", "customer_id = " . $this->session->uid . " AND at_detail = 'Viewed' AND at_date = $v_array[$i]");
                                }

                                $customer_transactions = array();
                                $i = 0;
                                foreach ($tilted_transactions as $tilted_transaction) {
                                    if (sizeof($tilted_transactions[$i]) > 1) {
                                        for ($j = 0; $j < sizeof($tilted_transactions[$i]); $j++) {
                                            $customer_transactions[$i][$j] = (string) $tilted_transaction[$j]->item_name;
                                        }
                                        $i++;
                                        continue;
                                    } else
                                        $customer_transactions[] = (array) $tilted_transaction[0]->item_name;
                                    $i++;
                                }

                                # convert into string using implode:
                                for ($i = 0; $i < sizeof($customer_transactions); $i++) {
                                    for ($j = 0; $j < sizeof($customer_transactions[$i]); $j++) {
                                        $customer_transactions_str[$i] = implode(", ", $customer_transactions[$i]);
                                    }
                                }
                                $this->apriori->process($customer_transactions_str);
                                $freq = $this->apriori->getFreqItemsets();
                                $basis = 'Viewed Products';

                                usort($freq, 'sortBySupport');

                                $pushable = array(); # becomes 2d array
                                $support = 0;
                                for ($i = 0; $i < sizeof($freq); $i++) {
                                    if ($freq[$i][0] > $support) { # highest support
                                        $support = $freq[$i][0];
                                        $index = $i;
                                        array_push($pushable, $freq[$index]);
                                    } elseif($freq[$i][0] == $support) { # same support value
                                        array_push($pushable, $freq[$i]);
                                    }
                                }

                                # break down the 2d array into 1d array
                                $products_array = array();
                                for ($i = 0; $i < sizeof($pushable); $i++) {
                                    for ($j = 0; $j < sizeof($pushable[$i]); $j++) {
                                        if ($j == 0)
                                            continue;
                                        else
                                            array_push($products_array, $pushable[$i][$j]);
                                    }
                                }
                                $products_unique = array_unique($products_array);

                                # to convert the array into string:
                                $products_str = implode(", ", array_slice($products_unique, 0));

                                $product_insert = ($products_str) ? $products_str : NULL;
                                $this->item_model->updatedata("customer", array("product_preference" => $product_insert, "preference_basis" => $basis), "customer_id = " . $this->session->uid);

                                if(!$freq) { # get product search
                                    goto search;
                                }
                            } elseif ($search) {
                                search:
                                # store the fetched values into an array:
                                foreach ($search as $s)
                                    $s_array[] = $s->at_date;

                                # get the orders of customer based on s_array[]:
                                for ($i = 0; $i < sizeof($s_array); $i++) {
                                    $this->db->select("item_name");
                                    $tilted_transactions[] = $this->item_model->fetch("audit_trail", "customer_id = " . $this->session->uid . " AND at_detail = 'Search' AND at_date = $s_array[$i]");
                                }

                                $customer_transactions = array();
                                $i = 0;
                                foreach ($tilted_transactions as $tilted_transaction) {
                                    if (sizeof($tilted_transactions[$i]) > 1) {
                                        for ($j = 0; $j < sizeof($tilted_transactions[$i]); $j++) {
                                            $customer_transactions[$i][$j] = (string) $tilted_transaction[$j]->item_name;
                                        }
                                        $i++;
                                        continue;
                                    } else
                                        $customer_transactions[] = (array) $tilted_transaction[0]->item_name;
                                    $i++;
                                }

                                # convert into string using implode:
                                for ($i = 0; $i < sizeof($customer_transactions); $i++) {
                                    for ($j = 0; $j < sizeof($customer_transactions[$i]); $j++) {
                                        $customer_transactions_str[$i] = implode(", ", $customer_transactions[$i]);
                                    }
                                }
                                $this->apriori->process($customer_transactions_str);
                                $freq_search = $this->apriori->getFreqItemsets();
                                $basis_search = 'Searched products';

                                usort($freq, 'sortBySupport');

                                $pushable = array(); # becomes 2d array
                                $support = 0;
                                for ($i = 0; $i < sizeof($freq_search); $i++) {
                                    if ($freq_search[$i][0] > $support) { # highest support
                                        $support = $freq_search[$i][0];
                                        $index = $i;
                                        array_push($pushable, $freq_search[$index]);
                                    } elseif($freq_search[$i][0] == $support) { # same support value
                                        array_push($pushable, $freq_search[$i]);
                                    }
                                }

                                # break down the 2d array into 1d array
                                $products_array = array();
                                for ($i = 0; $i < sizeof($pushable); $i++) {
                                    for ($j = 0; $j < sizeof($pushable[$i]); $j++) {
                                        if ($j == 0)
                                            continue;
                                        else
                                            array_push($products_array, $pushable[$i][$j]);
                                    }
                                }
                                $products_unique = array_unique($products_array);

                                # to convert the array into string:
                                $products_str = implode(", ", array_slice($products_unique, 0));

                                $product_insert = ($products_str) ? $products_str : NULL;
                                $this->item_model->updatedata("customer", array("product_preference" => $product_insert, "preference_basis" => $basis_search), "customer_id = " . $this->session->uid);
                            }

                            #$freq = $this->apriori->getFreqItemsets();



                            # ====================================================================>

//                            $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
//                            $for_log = array(
//                                "$user_id" => $this->session->uid,
//                                "user_type" => $this->session->userdata('type'),
//                                "username" => $this->session->userdata('username'),
//                                "date" => time(),
//                                "action" => 'Logged in.',
//                                'status' => '1'
//                            );
//                            $this->item_model->insertData('user_log', $for_log);
                            redirect('home');
                        }
                    } else { # wrong password entered
                        $this->session->set_flashdata('error', 'You entered an invalid username or password.');
                        $this->index();
                    }
                } elseif ($customer->status == 0) { # if the account is inactive
                    $this->session->set_flashdata('error', 'You entered an invalid username or password.');
                    $this->index();
                }
            } elseif ($admin) { # if admin
                $admin = $admin[0];
                if ($admin->status == 1) { # if the account is active
                    $salt = $this->item_model->getSalt("admin", "verification_code", "admin_id", $admin->admin_id);
                    if (password_verify($salt . $this->input->post("password"), $admin->password)) { # if passwords match
                        $user_type = ($admin->access_level == 1) ? 1 : 0;
                        $user = ($admin->username == NULL) ? $admin->email : $admin->username;
                        $for_session = array(
                            'username' => $user,
                            'type' => $user_type,
                            'date' => time()
                        );
                        $this->session->uid = $admin->admin_id;
                        $this->session->set_userdata($for_session, true);
                        $this->session->set_userdata('isloggedin', true);
                        $this->session->set_flashdata('myflashdata', true);
//                        $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
//                        $for_log = array(
//                            "$user_id" => $this->session->uid,
//                            "user_type" => $this->session->userdata('type'),
//                            "username" => $this->session->userdata('username'),
//                            "date" => time(),
//                            "action" => 'Logged in.',
//                            'status' => '1'
//                        );
//                        $this->item_model->insertData('user_log', $for_log);
                        redirect('dashboard');
                    } else { # wrong password entered
                        $this->session->set_flashdata('error', 'You entered an invalid username or password.');
                        $this->index();
                    }
                } elseif ($admin->status == 0) { # if the account is inactive
                    $this->session->set_flashdata('error', 'You entered an invalid username or password.');
                    $this->index();
                }
            } else { # if the user does not exist
                $this->session->set_flashdata('error', 'You entered an invalid username or password.');
                $this->index();
            }
        } else { # if the validations were not met
            $this->index();
        }
    }

    public function forgot() {
        if (!$this->session->has_userdata('isloggedin')) {
            $data = array(
                'title' => "Request for password reset",
                'page' => "Home",
                'CTI' => $this->basket->total_items()
            );
            $this->load->view('ordering/includes/header', $data);
            $this->load->view('ordering/includes/navbar');
            $this->load->view('ordering/forgot_password');
            $this->load->view('ordering/includes/footer');
        } else {
            redirect('home');
        }
    }

    public function password_reset() {
        $this->form_validation->set_rules('email', "Please enter your email.", "required|valid_email");
        $this->form_validation->set_message('required', '{field}');

        if ($this->form_validation->run()) {
            $accountDetails = $this->item_model->fetch("customer", array('email' => $this->input->post('email')));

            if ($accountDetails) {
                $accountDetails = $accountDetails[0];
                $this->email->from('veocalimlim@gmail.com', 'TECHNOHOLICS');
                $this->email->to($accountDetails->email);
                $this->email->subject('Password Reset Link');
                $this->email->message($this->load->view('email/reset_password', $accountDetails, true));

                if (!$this->email->send()) {
                    $this->email->print_debugger();
                } else {
                    $this->session->set_userdata('statusMsg', 'Reset password link has been sent to <b>'. trim($this->input->post('email', TRUE)).'</b>.');
                    redirect("login");
                }
            }
        } else {
            $this->forgot();
        }
    }

    public function change_password() {
        $code = $this->uri->segment(3);
        $validation = $this->item_model->fetch('customer', "verification_code = '" . $code . "'");

        if ($code && $validation) {
            $data = array(
                'title' => 'Change Password',
                'page' => "Home",
                'CTI' => $this->basket->total_items(),
                'code' => $code
            );
            $this->form_validation->set_rules('password', "Please Enter a Password.", "required|alpha_numeric");
            $this->form_validation->set_rules('cpassword', "Please Confirm your Password.", "required|alpha_numeric|matches[password]");
            $this->form_validation->set_message('required', '{field}');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('ordering/includes/header', $data);
                $this->load->view('ordering/includes/navbar');
                $this->load->view("ordering/change_pass");
                $this->load->view("ordering/includes/footer");
            }
            // Success
            else {
                $data = array('password' => $this->item_model->setPassword($this->input->post('password', TRUE), $code));
                $this->item_model->updatedata('customer', $data, array('verification_code' => $code));
                $this->session->set_userdata('statusMsg', 'Your password has been changed.');
                redirect("login/");
            } 
        } else {
            redirect('home');
        }
    }

}
