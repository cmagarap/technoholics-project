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
        #$data = array('title' => 'Home');
        $this->load->view("login/login_form");
        #$this->load->view("login/loginform");
        #$this->load->view("login/includes/footer");
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
                                $this->session->uid = $accountDetails->user_id;
                                $this->session->set_userdata('isloggedin', true);
                                $this->session->set_userdata(array('type' => "General Manager"), true);
                                $this->session->set_flashdata('myflashdata', true);
                                $userinformation = $this->item_model->fetch('accounts', array('user_id' => $this->session->uid))[0];
                                $for_log = array(
                                    "user_id" => $userinformation->user_id,
                                    "user_type" => $userinformation->access_level,
                                    "username" => $userinformation->username,
                                    "date" => time(),
                                    "action" => $userinformation->username . ' just logged in.',
                                    'status' => '1'
                                );

                                $this->item_model->insertData('user_log', $for_log);
                                redirect('dashboard');
                            } elseif ($accountDetails->access_level == 1) { # 1: sub-admin
                                $this->session->uid = $accountDetails->user_id;
                                $this->session->set_userdata('isloggedin', true);
                                $this->session->set_userdata(array('type' => "Admin Assistant"), true);
                                $this->session->set_flashdata('myflashdata', true);
                                $userinformation = $this->item_model->fetch('accounts', array('user_id' => $this->session->uid))[0];
                                $for_log = array(
                                    "user_id" => $userinformation->user_id,
                                    "user_type" => $userinformation->access_level,
                                    "username" => $userinformation->username,
                                    "date" => time(),
                                    "action" => $userinformation->username . ' just logged in.',
                                    'status' => '1'
                                );

                                $this->item_model->insertData('user_log', $for_log);
                                redirect('dashboard');
                            } else if ($accountDetails->access_level == 2) { # 2: customer
                                $this->session->uid = $accountDetails->user_id;
                                $this->session->set_userdata('isloggedin', true);
                                $this->session->set_flashdata('myflashdata', true);
                                $userinformation = $this->item_model->fetch('accounts', array('user_id' => $this->session->uid))[0];
                                $for_log = array(
                                    "user_id" => $userinformation->user_id,
                                    "user_type" => $userinformation->access_level,
                                    "username" => $userinformation->username,
                                    "date" => time(),
                                    "action" => $userinformation->username . ' just logged in.',
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
