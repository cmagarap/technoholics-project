<?php

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('recaptcha');
    }

    function index() {
        $data = array('title' => 'Registration',
            'script' => $this->recaptcha->getScriptTag(),
            'widget' => $this->recaptcha->getWidget(),
                //'mycaptcha' => $cap['image']
        );
        $this->load->view('registration/includes/header', $data);
        $this->load->view('registration/registration');
        $this->load->view('registration/includes/footer');
    }

    public function register_submit() {
        $data = array('title' => 'Registration',
            'script' => $this->recaptcha->getScriptTag(),
            'widget' => $this->recaptcha->getWidget(),
                //'mycaptcha' => $cap['image']
        );

        $this->load->helper('string');
        $code = random_string('alnum', 15);

        $config['encrypt_name'] = TRUE;
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);

        # $this->form_validation->set_rules('g-recaptcha-response', "Invalid Value Entered for Captcha! Please Try Again.", "required");
        $this->form_validation->set_rules('firstname', "Please enter your firstname.", "required|alpha_numeric");
        $this->form_validation->set_rules('lastname', "Please enter your surname.", "required|alpha_numeric");
        $this->form_validation->set_rules('username', "Please enter a username.", "required|alpha|is_unique[accounts.username]");
        $this->form_validation->set_rules('password', "Please enter a password.", "required|alpha_numeric");
        $this->form_validation->set_rules('password_confirmation', "Please confirm your password.", "required|alpha_numeric|matches[password]");
        $this->form_validation->set_rules('email', "Please enter an email address.", 'required|valid_email|is_unique[accounts.email]');
        if (!$this->upload->do_upload()) {
            // $error = array('error' => $this->upload->display_errors());
           # $this->form_validation->set_rules('userfile', $this->upload->display_errors(), 'required');
        }
        $this->form_validation->set_message('required', '{field}');
        // Checking if rules are met.
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration/includes/header', $data);
            $this->load->view('registration/registration');
            $this->load->view('registration/includes/footer');
        }
        // success
        else {
            if ($this->upload->do_upload('userfile') == FALSE) {
                $image = "default-user.png";
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = './uploads/' . $image;
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 75;
                $config2['height'] = 50;
                $this->load->library('image_lib');
                $this->image_lib->resize();
            } else {
                $image = $this->upload->data('file_name');
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = './uploads/' . $image;
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 75;
                $config2['height'] = 50;
                $this->load->library('image_lib');
                $this->image_lib->resize();
            }
            $this->image_lib->initialize($config2);

            $data = array(
                'username' => trim($this->input->post('username')),
                'password' => sha1($this->input->post('password')), # to be changed
                'firstname' => trim(ucwords($this->input->post('firstname'))),
                'lastname' => trim(ucwords($this->input->post('lastname'))),
                'email' => trim($this->input->post('email')),
                'registered_at' => time(),
                # 'access_level' => $this->input->post('access_level'),
                'verification_code' => $code,
                'image' => $image
            );

            $this->email->from('veocalimlim@gmail.com', 'TECHNOHOLICS');
            $this->email->to($this->input->post('email'));

            $this->email->subject('Email Verification');

            $this->email->message($this->load->view('welcome_message', $data, true));

            if (!$this->email->send()) {
                $this->email->print_debugger();
            } else {
                $this->item_model->insertData('accounts', $data);
                redirect("login/");
            }
        }
    }

}
