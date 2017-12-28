<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/27/2017
 * Time: 10:52 AM
 */

class My_account extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('form');
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function edit_myprofile() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $my_account = $this->item_model->fetch("accounts", array("user_id" => $this->session->uid));
            $data = array(
                'title' => 'Manage My Account',
                'heading' => 'My Account',
                'user' => $my_account
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/accounts/my_account");
            $this->load->view("paper/includes/footer");
        } else {
            $this->load->view("paper/accounts/my_account"); # AAYUSIN KO PA ITO - seej
        }
    }

    public function edit_myprofile_exec() {
        $this->form_validation->set_rules('lastname', "last name", "required");
        $this->form_validation->set_rules('firstname', "first name", "required");
        $this->form_validation->set_rules('email', "email", "required|valid_email|is_unique[accounts.email]");
        $this->form_validation->set_message('required', 'Please enter your {field}.');
        $username = ($this->input->post('username') == NULL) ? NULL : $this->input->post('username'); # because having a username is optional

        # Checking if rules are met.
        if ($this->form_validation->run()) {
            $data = array(
                'email' => trim($this->input->post('email')),
                'firstname' => trim(ucwords($this->input->post('firstname'))),
                'lastname' => trim(ucwords($this->input->post('lastname'))),
                'username' => trim($username)
            );
            $for_log = array(
                "user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Edited his/her profile' . $this->uri->segment(3),
                'status' => '1'
            );
            $this->item_model->updatedata("accounts", $data, array('user_id' => $this->uri->segment(3)));
            $this->item_model->insertData('user_log', $for_log);
            redirect("my_account/");
        } else {
            $this->edit_myprofile();
        }
    }
}