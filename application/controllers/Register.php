<?php

date_default_timezone_set("Asia/Manila");
class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session', 'form_validation', 'email', 'recaptcha','basket'));
        $this->load->helper('form');
        if ($this->session->has_userdata('isloggedin')) {
            redirect('home/');
        }
    }

    public function index() {
        $data = array(
            'title' => "TECHNOHOLICS | All the tech you need.",# should be changed
            'script' => $this->recaptcha->getScriptTag(),
            'widget' => $this->recaptcha->getWidget(),
            'CTI' => $this->basket->total_items(),
            'page' => "Home"

        );
        
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/register');
        $this->load->view('ordering/includes/footer');
    }

    function validate_captcha() {
        $captcha = $this->input->post('g-recaptcha-response');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdcMDkUAAAAAMgx-hy_v5pq3iNh5gOeCveRjWpc=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function register_submit() {
        $this->load->helper('string');
        # $hash = random_string('alnum', 15);
        $bytes_code = openssl_random_pseudo_bytes(30, $crypto_strong);
        $hash_code = bin2hex($bytes_code);

        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_rules('lastname', "Please put your lastname name.", "required|alpha");
        $this->form_validation->set_rules('firstname', "Please put your first name.", "required|alpha");
        $this->form_validation->set_rules('address', "Please put your complete address.", "required");
        $this->form_validation->set_rules('contact', "Please put your contact number.", "required|numeric");
        $this->form_validation->set_rules('zip', "Please put your zip number.", "required|numeric");        
        $this->form_validation->set_rules('email', "Please put a valid email address.", "required|valid_email|is_unique[customer.email]");
        $this->form_validation->set_rules('password', "Please put a passowrd.", "required|alpha_numeric");
        $this->form_validation->set_rules('confirm_password', "Please confirm your password.", "required|alpha_numeric|matches[password]");
        $this->form_validation->set_rules('gender', "Please select a gender.", "required|alpha");
        $this->form_validation->set_rules('day', "Please put a day.", "required|numeric");
        $this->form_validation->set_rules('month', "Please put a month.", "required|numeric");
        $this->form_validation->set_rules('year', "Please put a year.", "required|numeric");
        $this->form_validation->set_rules('city', "Please put the name of your City / Municipality.", "required");
        $this->form_validation->set_rules('barangay', "Please put the name of your Barangay.", "required");
        $this->form_validation->set_rules('province', "Please put the name of your Province.", "required");
        $this->form_validation->set_message('required', '{field}');

        # Checking if rules are met.
        if ($this->form_validation->run()) {

            $bday = new DateTime($this->input->post('year', TRUE).'-'.$this->input->post('month', TRUE).'-'.$this->input->post('day', TRUE).'');
            $today = new DateTime(Date('Y-m-d'));
            $diff = $today->diff($bday);
            $age = sprintf('%d', $diff->y, $diff->m, $diff->d);

            if($age < 13){
                $this->session->set_userdata('statusMsg', 'We only accept customers who are 13 and above.');
                redirect('home');
            }

            elseif($age >= 13 && $age <= 20){
                $a_range = "13-20";
            } 

            elseif($age >= 21 && $age <= 30){
                $a_range = "21-30";
            }

            elseif($age >= 31 && $age <= 40){
                $a_range = "31-40";
            }

            elseif($age >= 41 && $age <= 50){
                $a_range = "41-50";
            }

            elseif($age >= 51 && $age <= 60){
                $a_range = "51-60";
            }

            else{
                $a_range = "61-above";
            }

            $username = trim(ucwords($this->input->post('firstname', TRUE)))."".trim(ucwords($this->input->post('lastname', TRUE)));

            $data = array(
                'email' => trim($this->input->post('email', TRUE)),
                'password' => $this->item_model->setPassword($this->input->post('password', TRUE), $hash_code),
                'firstname' => trim(ucwords($this->input->post('firstname', TRUE))),
                'lastname' => trim(ucwords($this->input->post('lastname', TRUE))),
                'username' => $username,
                'complete_address' => trim(ucwords($this->input->post('address', TRUE))),
                'province' => trim(ucwords($this->input->post('province', TRUE))),
                'city_municipality' => trim(ucwords($this->input->post('city', TRUE))),
                'barangay' => trim(ucwords($this->input->post('barangay', TRUE))),
                'zip_code' => trim(ucwords($this->input->post('zip', TRUE))),
                'contact_no' => trim(ucwords($this->input->post('contact', TRUE))),
                'barangay' => trim(ucwords($this->input->post('barangay', TRUE))),
                'province' => trim(ucwords($this->input->post('province', TRUE))),
                'image' => "default-user.png",
                'registered_at' => time(),
                'birthdate' => strtotime($this->input->post('year', TRUE).'-'.$this->input->post('month', TRUE).'-'.$this->input->post('day', TRUE).''),
                'gender' => trim(ucwords($this->input->post('gender', TRUE))),
                'age' => $age,
                'a_range' => $a_range,
                'verification_code' => $hash_code,
            );

            $this->email->from('technoholicsethereal@gmail.com', 'TECHNOHOLICS');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Email Verification');
            $this->email->message($this->load->view('email/email_verification', $data, true));

            if (!$this->email->send()) {
                $this->email->print_debugger();
            } else {
                $this->item_model->insertData('customer', $data);
                $new_account = $this->item_model->fetch("customer", array("email" => $this->input->post('email')));
                $new_account = $new_account[0];
                $for_log = array(
                    "customer_id" => $new_account->customer_id,
                    "user_type" => 1,
                    "username" => $new_account->firstname . "" . $new_account->lastname ,
                    "date" => time(),
                    "action" => 'Signed up.',
                    'status' => '1'
                );
                $this->item_model->insertData('user_log', $for_log);
                $this->session->set_userdata('statusMsg', 'Thank you for registering with TECHNOHOLICS! An email verification has been sent at <b>'. trim($this->input->post('email', TRUE)).'</b>.');
                redirect("login/");
            }
        } else {
            $this->index();
        }
    }

}
