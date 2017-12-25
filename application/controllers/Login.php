<?php
date_default_timezone_set("Asia/Manila");
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('email', 'session'));
        $this->load->library('form_validation');
        if ($this->session->has_userdata('isloggedin')) {
            redirect('home/');
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
        # $this->load->view("login/login_form");
    }

    public function forgotpassword() {
        $data = array('title' => 'Home');
        $this->load->view("login/includes/header", $data);
        $this->load->view("login/forgotpass");
        $this->load->view("login/includes/footer");
    }

    public function login_submit() {
        $accountDetails = $this->item_model->fetch("accounts", array("username" => $this->input->post("username")));
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', 'Please fill out the {field} field.');

        if($this->form_validation->run()) {
            if ($accountDetails) { # if the user exists
                $accountDetails = $accountDetails[0];
                if($accountDetails->password == sha1($this->input->post("password"))) { # if passwords match
                    if ($accountDetails->status == 1) { # if the account is active
                        if ($accountDetails->is_verified == 0) { # if not yet verified
                            $this->session->set_flashdata('error', 'Your account is not yet verified through your email.');
                            $this->index();
                        } elseif ($accountDetails->is_verified == 1) { # 1: verified
                            if ($accountDetails->access_level == 0) { # 0: head admin
                                $for_session = array(
                                    'username' => $accountDetails->username,
                                    'type' => 0,
                                    'date' => time()
                                );
                                $this->session->uid = $accountDetails->user_id;
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
                            } elseif ($accountDetails->access_level == 1) { # 1: sub-admin
                                $for_session = array(
                                    'username' => $accountDetails->username,
                                    'type' => 1,
                                    'date' => time()
                                );
                                $this->session->uid = $accountDetails->user_id;
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
                            } else if ($accountDetails->access_level == 2) { # 2: customer
                                $for_session = array(
                                    'username' => $accountDetails->username,
                                    'type' => 2,
                                    'date' => time()
                                );
                                $this->session->uid = $accountDetails->user_id;
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
                    } elseif($accountDetails->status == 0) { # if the account is inactive
                        $this->session->set_flashdata('error', 'Your account is inactive.');
                        $this->index();
                    }
                } else { # wrong password entered
                    $this->session->set_flashdata('error', 'You entered a wrong password.');
                    $this->index();
                }
            } else { # if the user does not exist
                $this->session->set_flashdata('error', 'No such user exists.');
                $this->index();
            }
        } else { # if the validations were not met
            $this->index();
        }
    }

    public function passwordreset() {
        $data = array(
            'email' => $this->input->post('email'),
        );
        $accountDetails = $this->item_model->fetch("accounts", $data);

        if ($accountDetails) {
            $accountDetails = $accountDetails[0];
            $this->email->from('veocalimlim@gmail.com', 'TECHNOHOLICS');
            $this->email->to($accountDetails->email);
            $this->email->subject('Password Reset Link');
            $this->email->message($this->load->view('forgot', $accountDetails, true));

            if (!$this->email->send()) {
                
            } else {
                $this->session->set_flashdata('isreset', true);
                redirect("login/");
            }
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
        //success
        else {
            $data = array('password' => sha1($this->input->post('password')));
            $this->item_model->updatedata('accounts', $data, array('verification_code' => $code));
            $this->session->set_flashdata('changed', true);
            redirect("login/");
        }
    }
}
