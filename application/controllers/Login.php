<?php
date_default_timezone_set("Asia/Manila");
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('email', 'session', 'form_validation'));
        if ($this->session->has_userdata('isloggedin')) {
            redirect('home');
        }
    }

    public function index() {
        $data = array(
            'title' => "TECHNOHOLICS Login"
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/login');
        $this->load->view('ordering/includes/footer');
    }

    public function login_submit() {
        #$accountDetails = $this->item_model->fetch("accounts", array("username" => $this->input->post("username")));

        $this->form_validation->set_rules('user', 'username/email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_message('required', 'Please enter your {field}.');

        if ($this->form_validation->run()) {
            $sql = "SELECT * FROM accounts WHERE username = '" . $this->input->post('user') . "' OR email = '" . $this->input->post('user') . "'";
            $query = $this->db->query($sql);
            if ($query->row()) { # if the user exists
                foreach ($query->result() as $query) {
                    if ($query->status == 1) { # if the account is active
                        if ($query->password == sha1($this->input->post("password"))) { # if passwords match
                            if ($query->is_verified == 0) { # if not yet verified
                                $this->session->set_flashdata('error', 'Your account is not yet verified through your email.');
                                $this->index();
                            } elseif ($query->is_verified == 1) { # 1: verified
                                $user = ($query->username == NULL) ? $query->email : $query->username;
                                if ($query->access_level == 0) { # 0: head admin
                                    $for_session = array(
                                        'username' => $user,
                                        'type' => 0,
                                        'date' => time()
                                    );
                                    $this->session->uid = $query->user_id;
                                    $this->session->set_userdata($for_session, true);
                                    $this->session->set_userdata('isloggedin', true);
                                    $this->session->set_flashdata('myflashdata', true);
                                    $for_log = array(
                                        "user_id" => $this->session->uid,
                                        "user_type" => $this->session->userdata('type'),
                                        "username" => $this->session->userdata('username'),
                                        "date" => time(),
                                        "action" => 'Logged in.',
                                        'status' => '1'
                                    );

                                    $this->item_model->insertData('user_log', $for_log);
                                    redirect('dashboard');
                                } elseif ($query->access_level == 1) { # 1: sub-admin
                                    $for_session = array(
                                        'username' => $user,
                                        'type' => 1,
                                        'date' => time()
                                    );
                                    $this->session->uid = $query->user_id;
                                    $this->session->set_userdata($for_session, true);
                                    $this->session->set_userdata('isloggedin', true);
                                    $this->session->set_flashdata('myflashdata', true);
                                    $for_log = array(
                                        "user_id" => $this->session->uid,
                                        "user_type" => $this->session->userdata('type'),
                                        "username" => $this->session->userdata('username'),
                                        "date" => time(),
                                        "action" => 'Logged in.',
                                        'status' => '1'
                                    );
                                    $this->item_model->insertData('user_log', $for_log);
                                    redirect('dashboard');
                                } else if ($query->access_level == 2) { # 2: customer
                                    $for_session = array(
                                        'username' => $user,
                                        'type' => 2,
                                        'date' => time()
                                    );
                                    $this->session->uid = $query->user_id;
                                    $this->session->set_userdata($for_session, true);
                                    $this->session->set_userdata('isloggedin', true);
                                    $this->session->set_flashdata('myflashdata', true);
                                    $for_log = array(
                                        "user_id" => $this->session->uid,
                                        "user_type" => $this->session->userdata('type'),
                                        "username" => $this->session->userdata('username'),
                                        "date" => time(),
                                        "action" => 'Logged in.',
                                        'status' => '1'
                                    );
                                    $this->item_model->insertData('user_log', $for_log);
                                    redirect('home');
                                }
                            }
                        } else { # wrong password entered
                            $this->session->set_flashdata('error', 'You entered a wrong password.');
                            $this->index();
                        }
                    } elseif ($query->status == 0) { # if the account is inactive
                        $this->session->set_flashdata('error', 'Your account is inactive.');
                        $this->index();
                    }
                }
            } else { # if the user does not exist
                $this->session->set_flashdata('error', 'No such user exists.');
                $this->index();
            }
            #}
        } else { # if the validations were not met
            $this->index();
        }
    }

    public function forgot() {
        if (!$this->session->has_userdata('isloggedin')) {
            $data = array(
                'title' => "Request for password reset"
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
        $this->form_validation->set_rules('email', "email", "required|valid_email|is_unique[accounts.email]");
        $this->form_validation->set_message('required', 'Please enter your {field}.');

        if ($this->form_validation->run()) {
            $accountDetails = $this->item_model->fetch("accounts", array('email' => $this->input->post('email')));

            if ($accountDetails) {
                $accountDetails = $accountDetails[0];
                $this->email->from('seej.max@gmail.com', 'TECHNOHOLICS');
                $this->email->to($accountDetails->email);
                $this->email->subject('Password Reset Link');
                $this->email->message("kjnkkjnknknknknk");

                if (!$this->email->send()) {

                } else {
                    $this->session->set_flashdata('isreset', true);
                    redirect("login/");
                }
            }
        } else {
            $this->forgot();
        }
    }

    public function changepassword() {
        $code = $this->uri->segment(3);
        $data = array(
            'title' => 'Change Password',
            'code' => $code
        );
        $this->form_validation->set_rules('password', "Please Enter a Password.", "required|alpha_numeric");
        $this->form_validation->set_rules('cpassword', "Please Confirm your Password.", "required|alpha_numeric|matches[password]");
        $this->form_validation->set_message('required', '{field}');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("login/includes/header", $data);
            $this->load->view("login/changepass");
            $this->load->view("login/includes/footer");
        }
        // Success
        else {
            $data = array('password' => sha1($this->input->post('password')));
            $this->item_model->updatedata('accounts', $data, array('verification_code' => $code));
            $this->session->set_flashdata('changed', true);
            redirect("login/");
        }
    }
}
