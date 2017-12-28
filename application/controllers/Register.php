<?php

date_default_timezone_set("Asia/Manila");
class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session', 'form_validation', 'email', 'recaptcha'));
        $this->load->helper('form');
        if ($this->session->has_userdata('isloggedin')) {
            redirect('home/');
        }
    }

    /*function index() {
        $data = array('title' => 'Registration',
            'script' => $this->recaptcha->getScriptTag(),
            'widget' => $this->recaptcha->getWidget(),
                //'mycaptcha' => $cap['image']
        );
        $this->load->view('registration/includes/header', $data);
        $this->load->view('registration/registration');
        $this->load->view('registration/includes/footer');
    }*/

    public function index() {
        $data = array(
            'title' => "TECHNOHOLICS | All the tech you need." # should be changed
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/register');
        $this->load->view('ordering/includes/footer');
    }

    public function register_submit() {
        $this->load->helper('string');
        $hash = random_string('alnum', 15);

        /*$data = array('title' => 'Registration',
            'script' => $this->recaptcha->getScriptTag(),
            'widget' => $this->recaptcha->getWidget(),
                //'mycaptcha' => $cap['image']
        );*/

        # $this->form_validation->set_rules('g-recaptcha-response', "Invalid Value Entered for Captcha! Please Try Again.", "required");
        $this->form_validation->set_rules('lastname', "last name", "required");
        $this->form_validation->set_rules('firstname', "first name", "required");
        $this->form_validation->set_rules('address', "home address", "required");
        $this->form_validation->set_rules('email', "email", "required|valid_email|is_unique[accounts.email]");
        $this->form_validation->set_rules('password', "password", "required|alpha_numeric");
        $this->form_validation->set_rules('confirm_password', "confirm password", "required|alpha_numeric|matches[password]");
        $this->form_validation->set_message('required', 'Please enter your {field}.');

        # Checking if rules are met.
        if ($this->form_validation->run()) {
            $data = array(
                'email' => trim($this->input->post('email')),
                'password' => sha1($this->input->post('password')), # to be changed
                'firstname' => trim(ucwords($this->input->post('firstname'))),
                'lastname' => trim(ucwords($this->input->post('lastname'))),
                'address' => trim(ucwords($this->input->post('address'))),
                'registered_at' => time(),
                'access_level' => 2,
                'verification_code' => $hash,
            );

            $this->email->from('seej.max@gmail.com', 'TECHNOHOLICS');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Email Verification');
            $this->email->message("hello");

            if (!$this->email->send()) {
                $this->email->print_debugger();
            } else {
                $this->item_model->insertData('accounts', $data);
                $new_account = $this->item_model->fetch("accounts", array("email" => $this->input->post('email')));
                $new_account = $new_account[0];
                $for_log = array(
                    "user_id" => $new_account->used_id,
                    "user_type" => $new_account->access_level,
                    "username" => $new_account->firstname . " " . $new_account->lastname ,
                    "date" => time(),
                    "action" => 'Signed up.',
                    'status' => '1'
                );
                $this->item_model->insertData('user_log', $for_log);
                redirect("login/");
            }
        } else {
            $this->index();
        }
    }

}
