<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/19/2017
 * Time: 1:13 PM
 */

date_default_timezone_set("Asia/Manila");

class Accounts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->helper('form');
        $this->load->library(array('form_validation', 'session', 'email', 'apriori'));

        if (!$this->session->has_userdata('isloggedin')) {
            $this->session->set_flashdata("error", "You must login first to continue.");
            redirect('/login');
        }
    }

    public function index() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) { # The GM can manage all users
            redirect('accounts/customer');
        } else {
            redirect('home');
        }
    }

    public function admin() { # Accessible by the GM only.
        if ($this->session->userdata('type') == 0) {
            $this->load->library('pagination');
            $perpage = 20;
            $config['base_url'] = base_url() . "accounts/admin";
            $config['per_page'] = $perpage;
            $config['full_tag_open'] = '<nav><ul class="pagination">';
            $config['full_tag_close'] = ' </ul></nav>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['first_url'] = '';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['total_rows'] = $this->item_model->getCount('admin', "access_level != 0 AND status = 1");
            $this->pagination->initialize($config);
            $accounts = $this->item_model->getItemsWithLimit('admin', $perpage, $this->uri->segment(3), 'admin_id', 'ASC', "access_level != 0 AND status = 1");

            $data = array(
                'title' => 'Accounts Management',
                'heading' => 'Accounts',
                'users' => $accounts, # $query->result()
                'links' => $this->pagination->create_links()
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/accounts/accounts");
            $this->load->view("paper/includes/footer");
        } else {
            redirect('home');
        }
    }

    public function customer() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $this->load->library('pagination');
            $perpage = 20;
            $config['base_url'] = base_url() . "accounts/customer";
            $config['per_page'] = $perpage;
            $config['full_tag_open'] = '<nav><ul class="pagination">';
            $config['full_tag_close'] = ' </ul></nav>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['first_url'] = '';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['total_rows'] = $this->item_model->getCount('customer', "status = 1");
            $this->pagination->initialize($config);
            $accounts = $this->item_model->getItemsWithLimit('customer', $perpage, $this->uri->segment(3), 'customer_id', 'ASC', "status = 1");

            $data = array(
                'title' => 'Accounts Management',
                'heading' => 'Accounts',
                'users' => $accounts, # $query->result()
                'links' => $this->pagination->create_links()
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/accounts/customers");
            $this->load->view("paper/includes/footer");
        } else {
            redirect('home');
        }
    }

    public function view() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            if ($this->uri->segment(3) == "admin") {
                $account = $this->item_model->fetch('admin', array('admin_id' => $this->uri->segment(4)));
                $user_log = $this->item_model->fetch('user_log', array('admin_id' => $this->uri->segment(4)), "log_id", "DESC", 8);
                $log_date = $this->item_model->fetch("user_log", "admin_id = " . $this->uri->segment(4), "date", "DESC")[0];

                $cover = $this->item_model->fetch("home")[0];
                if($account OR $user_log) {
                    $data = array(
                        'title' => "Accounts: View User Info",
                        'heading' => "Accounts",
                        'account' => $account,
                        'logs' => $user_log,
                        'cover' => $cover,
                        'log_date' => $log_date
                    );
                    $this->load->view('paper/includes/header', $data);
                    $this->load->view("paper/includes/navbar");
                    $this->load->view('paper/accounts/view');
                    $this->load->view('paper/includes/footer');
                } else {
                    redirect("accounts/admin");
                }
            } elseif ($this->uri->segment(3) == "customer") {
                $account = $this->item_model->fetch('customer', 'customer_id = ' . $this->uri->segment(4));
                $user_log = $this->item_model->fetch('audit_trail', 'customer_id = ' . $this->uri->segment(4), "at_id", "DESC", 8);
                $this->db->select("at_date");
                $at_date = $this->item_model->fetch("audit_trail", "customer_id = " . $this->uri->segment(4), "at_id", "DESC")[0];

                $cover = $this->item_model->fetch("home")[0];

                # <======================= FOR APRIORI:
                $this->apriori->setMaxScan(20);
                $this->apriori->setMinSup(2);
                $this->apriori->setMinConf(50);
                $this->apriori->setDelimiter(', ');

                $order_id = $this->item_model->getDistinct("audit_trail", "customer_id = " . $this->uri->segment(4) . " AND status = 1", "order_id", "ASC");

                if ($order_id) {
                    # store the fetched values into an array:
                    foreach ($order_id as $order_id)
                        $order_id_array[] = $order_id->order_id;

                    # get the orders of customer based on order_id_array[]:
                    for ($i = 0; $i < sizeof($order_id_array); $i++) {
                        $this->db->select("item_name");
                        $tilted_transactions[] = $this->item_model->fetch("audit_trail", "customer_id = " . $this->uri->segment(4) . " AND order_id = " . $order_id_array[$i] . " AND at_detail = 'Purchase'");
                    }
                    $customer_transactions = array();

                    $i = 0;
                    foreach ($tilted_transactions as $tilted_transaction) {
                        if (sizeof($tilted_transactions[$i]) > 1) {
                            for ($j = 0; $j < sizeof($tilted_transactions[$i]); $j++) {
                                $customer_transactions[$i][$j] = (string)$tilted_transaction[$j]->item_name;
                            }
                            $i++;
                            continue;
                        } else
                            $customer_transactions[] = (array)$tilted_transaction[0]->item_name;
                        $i++;
                    }

                    # convert into string using implode:
                    for ($i = 0; $i < sizeof($customer_transactions); $i++) {
                        for ($j = 0; $j < sizeof($customer_transactions[$i]); $j++) {
                            $customer_transactions_str[$i] = implode(", ", $customer_transactions[$i]);
                        }
                    }
                    $process = $this->apriori->process($customer_transactions_str);
                    $message = ($process) ? NULL : "<h4>There are no frequent itemsets for this user.</h4>";
                } else {
                    $message = "There are no transactions recorded for this user.";
                }

                $freq = $this->apriori->getFreqItemsets();
                $preferred = "";
                for($i = 0; $i < count($freq); $i++) {
                    for($j = 0; $j < count($freq[$i]); $j++) {
                        /*if($j >= count($freq)) break;
                        else {
                            if ($freq[$i][0] > $freq[$j][0]) {
                                echo "AS | ";
                                $preferred .= $freq[$i][$j] . " | ";
                                #break;
                            } elseif($freq[$i][0] == $freq[$j][0]) {
                                if($freq[$i][$j] == 0)
                                    echo "0";
                                echo "EQUAL";
                                $preferred .= $freq[$i][$j]. " | ";
                            } else
                                echo $freq[$i][$j] . " | ";
                        }*/
                        $preferred = max($freq);

                    }
                    echo "<br>";
                }

                echo "<pre>";
                print_r($preferred);
                echo "</pre>";
                echo "<pre>";
                print_r($freq);
                echo "</pre>";
                # END OF CODE FOR APRIORI ======>


                if($account OR $user_log) {
                    $data = array(
                        'title' => "Accounts: View User Info",
                        'heading' => "Accounts",
                        'account' => $account,
                        'logs' => $user_log,
                        'at_date' => $at_date,
                        'message' => $message,
                        'cover' => $cover
                    );
                    $this->load->view('paper/includes/header', $data);
                    $this->load->view("paper/includes/navbar");
                    $this->load->view('paper/accounts/view');
                    $this->load->view('paper/includes/footer');
                } else {
                    redirect("accounts/customer");
                }
            } else {
                redirect('accounts');
            }

        } else {
            redirect("home");
        }
    }

    public function add_account() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Accounts: Add Account',
                'heading' => 'Accounts'
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/accounts/add_accounts');
            $this->load->view('paper/includes/footer');
        } else {
            redirect('home');
        }
    }

    public function add_account_exec() {
        $this->form_validation->set_rules('first_name', "first name", "required");
        $this->form_validation->set_rules('last_name', "last name", "required");
        $this->form_validation->set_rules('username', "username", "is_unique[admin.username]");
        $this->form_validation->set_rules('password', "password", "required");
        $this->form_validation->set_rules('confirm_password', "password confirm", "required|matches[password]");
        $this->form_validation->set_rules('email', "email address", "required|valid_email|is_unique[admin.email]");
        $this->form_validation->set_message('required', 'Please enter your {field}.');

        if ($this->form_validation->run()) {
            $config['encrypt_name'] = TRUE;
            $config['upload_path'] = './uploads_users/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            $this->load->helper('string');
            $username = ($this->input->post('username') != "") ? trim($this->input->post('username')) : NULL;
            $contact_no = ($this->input->post('contact_no') != "") ? trim($this->input->post('contact_no')) : NULL;
            $bytes = openssl_random_pseudo_bytes(30, $crypto_strong);
            $hash = bin2hex($bytes);

            if ($this->upload->do_upload('user_image') == FALSE) {
                $image = "default-user.png";
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = './uploads_users/' . $image;
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 75;
                $config2['height'] = 50;
                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();
                $this->image_lib->initialize($config2);
            } else {
                $image = $this->upload->data('file_name');
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = './uploads_users/' . $image;
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 75;
                $config2['height'] = 50;
                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();
                $this->image_lib->initialize($config2);
            }

            $data = array(
                'email' => html_escape(trim($this->input->post('email'))),
                'password' => html_escape($this->item_model->setPassword($this->input->post('password'), $hash)),
                'firstname' => html_escape(trim(ucwords($this->input->post('first_name')))),
                'lastname' => html_escape(trim(ucwords($this->input->post('last_name')))),
                'username' => html_escape($username),
                'contact_no' => html_escape($contact_no),
                'access_level' => html_escape("1"),
                'image' => html_escape($image),
                'status' => html_escape("1"),
                'registered_at' => html_escape(time()),
                'verification_code' => html_escape($hash)
            );
            $insert = $this->item_model->insertData('admin', $data);

            if($insert) {
                $for_log = array(
                    "admin_id" => $this->session->ui,
                    "user_type" => $this->session->userdata('type'),
                    "username" => $this->session->userdata('username'),
                    "date" => time(),
                    "action" => 'Added account: ' . trim($this->input->post('last_name')) . ", " . trim($this->input->post('first_name')),
                    'status' => '1'
                );
                $this->item_model->insertData('user_log', $for_log);
            }
            /* $this->email->from('veocalimlim@gmail.com', 'TECHNOHOLICS');
              $this->email->to($this->input->post('email'));

              $this->email->subject('Email Verification');

              $this->email->message($this->load->view('welcome_message', $data, true));

              if (!$this->email->send()) {
              $this->email->print_debugger();
              } */
            $statusMsg = $insert ? 'Account for <b>' . trim(ucwords($this->input->post('first_name'))) . " " . trim(ucwords($this->input->post('last_name'))) . '</b>' . ' has been added successfully.' : 'Some problem occured, please try again.';
            $this->session->set_flashdata('statusMsg', $statusMsg);
            redirect("accounts/");
        } else {
            $this->add_account();
        }
    }

    public function edit() {
        if ($this->uri->segment(3) == "admin") {
            $admin = $this->item_model->fetch('admin', array('admin_id' => $this->uri->segment(4)));

            if($admin) {
                $data = array(
                    'title' => "Accounts: Edit Admin",
                    'heading' => "Accounts",
                    'accounts' => $admin
                );

                $this->load->view('paper/includes/header', $data);
                $this->load->view("paper/includes/navbar");
                $this->load->view('paper/accounts/edit');
                $this->load->view('paper/includes/footer');
            } else {
                redirect("accounts/admin");
            }
        } elseif ($this->uri->segment(3) == "customer") {
            $customer = $this->item_model->fetch('customer', array('customer_id' => $this->uri->segment(4)));
            if($customer) {
                $data = array(
                    'title' => "Accounts: Edit Admin",
                    'heading' => "Accounts",
                    'accounts' => $customer
                );

                $this->load->view('paper/includes/header', $data);
                $this->load->view("paper/includes/navbar");
                $this->load->view('paper/accounts/edit');
                $this->load->view('paper/includes/footer');
            } else {
                redirect("accounts/customer");
            }
        } else {
            redirect('accounts');
        }
    }

    public function edit_exec() {
        if ($this->uri->segment(3) == "admin") {
            $this->form_validation->set_rules('first_name', "first name", "required");
            $this->form_validation->set_rules('last_name', "last name", "required");
            $this->form_validation->set_rules('username', "username", "is_unique[admin.username]");
            $this->form_validation->set_rules('email', "email address", 'required|valid_email|is_unique[admin.email]');
            # $this->form_validation->set_rules('contact_no', "contact number", "required");
            $this->form_validation->set_rules('status', "system status", "required|numeric");
            $this->form_validation->set_message('required', 'Please enter the {field}.');
            $username = ($this->input->post('username') == "") ? NULL : trim($this->input->post('username'));
            $contact_no = ($this->input->post('contact_no') == "") ? NULL : trim($this->input->post('contact_no'));

            if ($this->form_validation->run()) {
                $data = array(
                    'username' => html_escape($username),
                    'firstname' => html_escape(trim(ucwords($this->input->post('first_name')))),
                    'lastname' => html_escape(trim(ucwords($this->input->post('last_name')))),
                    'email' => html_escape(trim($this->input->post('email'))),
                    'contact_no' => html_escape($contact_no),
                    'status' => html_escape($this->input->post('status'))
                );
                $update = $this->item_model->updatedata("admin", $data, array('admin_id' => $this->uri->segment(4)));
                if ($update) {
                    $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
                    $for_log = array(
                        "$user_id" => html_escape($this->session->uid),
                        "user_type" => html_escape($this->session->userdata('type')),
                        "username" => html_escape($this->session->userdata('username')),
                        "date" => html_escape(time()),
                        "action" => html_escape('Edited Admin Account #' . $this->uri->segment(4)),
                        'status' => html_escape('1')
                    );
                    $this->item_model->insertData('user_log', $for_log);
                    # echo "<script>demo.showNotification('top','center')</script>";
                }
                redirect("accounts");
            } else {
                $this->edit();
            }
        } elseif ($this->uri->segment(3) == "customer") {
            $this->form_validation->set_rules('first_name', "first name", "required");
            $this->form_validation->set_rules('last_name', "last name", "required");
            $this->form_validation->set_rules('username', "username", "is_unique[customer.username]");
            $this->form_validation->set_rules('email', "email address", 'required|valid_email|is_unique[customer.email]');
            # $this->form_validation->set_rules('contact_no', "contact number", "required");
            $this->form_validation->set_rules('status', "system status", "required|numeric");
            $this->form_validation->set_message('required', 'Please enter the {field}.');
            $username = ($this->input->post('username') == "") ? NULL : trim($this->input->post('username'));
            $contact_no = ($this->input->post('contact_no') == "") ? NULL : trim($this->input->post('contact_no'));

            if ($this->form_validation->run()) {
                $data = array(
                    'username' => html_escape($username),
                    'firstname' => html_escape(trim(ucwords($this->input->post('first_name')))),
                    'lastname' => html_escape(trim(ucwords($this->input->post('last_name')))),
                    'email' => html_escape(trim($this->input->post('email'))),
                    'contact_no' => html_escape($contact_no),
                    'status' => html_escape($this->input->post('status'))
                );
                $update = $this->item_model->updatedata("customer", $data, array('customer_id' => $this->uri->segment(4)));
                if ($update) {
                    $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
                    $for_log = array(
                        "$user_id" => html_escape($this->session->uid),
                        "user_type" => html_escape($this->session->userdata('type')),
                        "username" => html_escape($this->session->userdata('username')),
                        "date" => html_escape(time()),
                        "action" => html_escape('Edited Customer Account #' . $this->uri->segment(4)),
                        'status' => html_escape('1')
                    );
                    $this->item_model->insertData('user_log', $for_log);
                }
                redirect("accounts/customer");
            } else {
                $this->edit();
            }
        }
    }

    public function delete() {
        if ($this->uri->segment(3) == "admin") {
            $update = $this->item_model->updatedata("admin", array("status" => false), array('admin_id' => $this->uri->segment(4)));
            if ($update) {
                $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
                $for_log = array(
                    "$user_id" => html_escape($this->session->uid),
                    "user_type" => html_escape($this->session->userdata('type')),
                    "username" => html_escape($this->session->userdata('username')),
                    "date" => html_escape(time()),
                    "action" => html_escape('Deleted account #' . $this->uri->segment(4)),
                    'status' => html_escape('1')
                );
                $this->item_model->insertData('user_log', $for_log);
            }
            redirect("accounts/admin");
        } elseif ($this->uri->segment(3) == "customer") {
            $update = $this->item_model->updatedata("customer", array("status" => false), array('customer_id' => $this->uri->segment(4)));

            if ($update) {
                $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
                $for_log = array(
                    "$user_id" => html_escape($this->session->uid),
                    "user_type" => html_escape($this->session->userdata('type')),
                    "username" => html_escape($this->session->userdata('username')),
                    "date" => html_escape(time()),
                    "action" => html_escape('Deleted account #' . $this->uri->segment(4)),
                    'status' => html_escape('1')
                );
                $this->item_model->insertData('user_log', $for_log);
            }
            redirect("accounts/customer");
        }
    }

    public function recover_account() {
        if ($this->uri->segment(3) == "admin") {
            if ($this->session->userdata('type') == 0) {
                $this->load->library('pagination');
                $perpage = 20;
                $config['base_url'] = base_url() . "accounts/recover_account/admin";
                $config['per_page'] = $perpage;
                $config['full_tag_open'] = '<nav><ul class="pagination">';
                $config['full_tag_close'] = ' </ul></nav>';
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['first_url'] = '';
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['total_rows'] = $this->item_model->getCount('admin', "access_level != 0 AND status = 0");
                $this->pagination->initialize($config);
                $accounts = $this->item_model->getItemsWithLimit('admin', $perpage, $this->uri->segment(3), 'admin_id', 'ASC', "access_level != 0 AND status = 0");
                $data = array(
                    'title' => 'Accounts: Reactivate Admin Accounts',
                    'heading' => 'Accounts',
                    'users' => $accounts,
                    'links' => $this->pagination->create_links()
                );

                $this->load->view("paper/includes/header", $data);
                $this->load->view("paper/includes/navbar");
                $this->load->view("paper/accounts/recover_admin");
                $this->load->view("paper/includes/footer");
            } else {
                redirect('home');
            }
        } elseif ($this->uri->segment(3) == "customer") { # Both GM and assistant admin can access this
            if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
                $this->load->library('pagination');
                $perpage = 20;
                $config['base_url'] = base_url() . "accounts/recover_account/customer";
                $config['per_page'] = $perpage;
                $config['full_tag_open'] = '<nav><ul class="pagination">';
                $config['full_tag_close'] = ' </ul></nav>';
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['first_url'] = '';
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['total_rows'] = $this->item_model->getCount('customer', "status = 0");
                $this->pagination->initialize($config);
                $accounts = $this->item_model->getItemsWithLimit('customer', $perpage, $this->uri->segment(3), 'customer_id', 'ASC', "status = 0");
                $data = array(
                    'title' => 'Accounts: Reactivate Customer Accounts',
                    'heading' => 'Accounts',
                    'users' => $accounts,
                    'links' => $this->pagination->create_links()
                );

                $this->load->view("paper/includes/header", $data);
                $this->load->view("paper/includes/navbar");
                $this->load->view("paper/accounts/recover_customer");
                $this->load->view("paper/includes/footer");
            } else {
                redirect('home');
            }
        } else {
            redirect('accounts');
        }
    }

    public function recover_account_exec() {
        if ($this->uri->segment(3) == "admin") {
            $update = $this->item_model->updatedata("admin", array("status" => 1), array('admin_id' => $this->uri->segment(4)));
            if ($update) {
                $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
                $for_log = array(
                    "$user_id" => html_escape($this->session->uid),
                    "user_type" => ($this->session->userdata('type')),
                    "username" => html_escape($this->session->userdata('username')),
                    "date" => html_escape(time()),
                    "action" => html_escape('Reactivated account #' . $this->uri->segment(4)),
                    'status' => html_escape('1')
                );
                $this->item_model->insertData('user_log', $for_log);
            }
            redirect("accounts/recover_account/admin");
        } elseif ($this->uri->segment(3) == "customer") {
            $update = $this->item_model->updatedata("customer", array("status" => 1), array('customer_id' => $this->uri->segment(4)));
            if ($update) {
                $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
                $for_log = array(
                    "$user_id" => html_escape($this->session->uid),
                    "user_type" => html_escape($this->session->userdata('type')),
                    "username" => html_escape($this->session->userdata('username')),
                    "date" => html_escape(time()),
                    "action" => html_escape('Reactivated account #' . $this->uri->segment(4)),
                    'status' => html_escape('1')
                );
                $this->item_model->insertData('user_log', $for_log);
            }
            redirect("accounts/recover_account/customer");
        }
    }

    public function getMaleAge() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            $data = $this->db->query("SELECT COUNT(*) AS no_of_customer, a_range FROM customer WHERE gender = 'Male' AND status = 1 GROUP BY a_range");
            print json_encode($data->result());
        } else {
            redirect("home");
        }
    }

    public function getFemaleAge() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            $data = $this->db->query("SELECT COUNT(*) AS no_of_customer, a_range FROM customer WHERE gender = 'Female' AND status = 1 GROUP BY a_range");
            print json_encode($data->result());
        } else {
            redirect("home");
        }
    }

    public function auto() {
        $output = '';
        $query = $this->item_model->search('product','status = 1 AND product_name', $_POST["query"]);
        $output = '<ul class="card list-unstyled">';
        if($query) {
            foreach($query as $query){
                $output .= '<li id="link" class="text-left" style="cursor:pointer;">'.$query->product_name.'</li>';
            }
        }
        else {
            $output .= '<li class="text-left" >Item Not Found</li>';
        }
        $output .= '</ul>';
        echo $output;
    }

    public function getCustomerBrands() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            #$data = $this->db->query("SELECT COUNT(*) AS no_of_customer, a_range FROM customer WHERE gender = 'Female' AND status = 1 GROUP BY a_range");

            $this->db->select(array("order_id", "order_quantity"));
            $orders = $this->item_model->fetch("orders", "customer_id = 1");

            foreach($orders as $order) {
                $order_items[] = $this->item_model->fetch("order_items", "orderitems_id = " . $order->order_id);
            }

            #$this->db->select("order_id");
//            $orders = $this->item_model->fetch("audit_trail", "customer_id = 1");
//            foreach($orders as $order) {
//                #$this->db->select(array("product_name", "product_brand"));
//                $products = $this->db->query("SELECT DISTINCT product_brand, SUM(product_quantity) FROM `product` WHERE product_id = " . $order->product_id . " GROUP BY product_brand");
//                foreach ($products->result() as $product) {
//                    $products2[] = $product;
//                }
//            }

            echo "<pre>";
            print_r($order_items);
            echo "</pre>";
//
//            foreach($products as $prod) {
//                echo $prod->product_name;
//            }
            //print json_encode($data->result());
        } else {
            redirect("home");
        }
    }
}
