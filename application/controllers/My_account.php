<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/27/2017
 * Time: 10:52 AM
 */

date_default_timezone_set("Asia/Manila");
class My_account extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('form');
        if (!$this->session->has_userdata('isloggedin')) {
            $this->session->set_flashdata("error", "You must login first to continue.");
            redirect('/login');
        }
    }

    public function index() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $my_account = $this->item_model->fetch("admin", array("admin_id" => $this->session->uid));
            $user_log = $this->item_model->fetch("user_log", array("admin_id" => $this->session->uid), "log_id", "DESC", 4);
            $data = array(
                'title' => 'Manage My Account',
                'heading' => 'My Account',
                'user' => $my_account,
                'logs' => $user_log
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/accounts/edit_myaccount");
            $this->load->view("paper/includes/footer");
        } else {
            $this->load->view("paper/accounts/my_account"); # AAYUSIN KO PA ITO - seej
        }
    }

    public function edit_myprofile_exec() {
        $this->form_validation->set_rules('lastname', "last name", "required");
        $this->form_validation->set_rules('firstname', "first name", "required");
        $this->form_validation->set_rules('email', "email", "required|valid_email|is_unique[admin.email]");
        $this->form_validation->set_message('required', 'Please enter your {field}.');
        $username = ($this->input->post('username') == NULL) ? NULL : $this->input->post('username'); # because having a username is optional

        # Checking if rules are met.
        if ($this->form_validation->run()) {
            $data = array(
                'email' => $this->db->escape_str(trim($this->input->post('email'))),
                'firstname' => $this->db->escape_str(trim(ucwords($this->input->post('firstname')))),
                'lastname' => $this->db->escape_str(trim(ucwords($this->input->post('lastname')))),
                'username' => $this->db->escape_str(trim($username))
            );
            $update = $this->item_model->updatedata("admin", $data, array('admin_id' => $this->session->uid));
            if ($update) {
                $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
                $for_log = array(
                    "$user_id" => $this->db->escape_str($this->session->uid),
                    "user_type" => $this->db->escape_str($this->session->userdata('type')),
                    "username" => $this->db->escape_str($this->session->userdata('username')),
                    "date" => $this->db->escape_str(time()),
                    "action" => $this->db->escape_str('Edited his/her profile'),
                    'status' => $this->db->escape_str('1')
                );
                $this->item_model->insertData('user_log', $for_log);
            }
            redirect("my_account/");
        } else {
            $this->index();
        }
    }

    public function change_password() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $my_account = $this->item_model->fetch("admin", array("admin_id" => $this->session->uid));
            $data = array(
                'title' => 'Change password',
                'heading' => 'My Account',
                'user' => $my_account
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/accounts/change_password");
            $this->load->view("paper/includes/footer");
        } else {
            $this->load->view("paper/accounts/my_account"); # AAYUSIN KO PA ITO - seej
        }
    }

    public function change_password_exec() {
        $this->form_validation->set_rules('old_password', "old password", "required");
        $this->form_validation->set_rules('new_password', "new password", "required");
        $this->form_validation->set_rules('confirm_password', "password confirm", "required|matches[new_password]");
        $this->form_validation->set_message('required', 'Please enter your {field}.');
        $my_account = $this->item_model->fetch("admin", array("admin_id" => $this->session->uid));
        $my_account = $my_account[0];

        if ($this->form_validation->run()) {
            $salt = $this->item_model->getSalt("admin", "verification_code", "admin_id", $my_account->admin_id);
            if(password_verify($salt.$this->input->post('old_password'), $my_account->password)) {
                $bytes = openssl_random_pseudo_bytes(30, $crypto_strong);
                $hash = bin2hex($bytes);
                $data = array(
                    'password' => html_escape($this->item_model->setPassword($this->input->post('new_password'), $hash)),
                    'verification_code' => $hash
                );
                $update = $this->item_model->updatedata("admin", $data, array("admin_id" => $this->session->uid));
                if ($update) {
                    $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
                    $for_log = array(
                        "$user_id" => $this->db->escape_str($this->session->uid),
                        "user_type" => $this->db->escape_str($this->session->userdata('type')),
                        "username" => $this->db->escape_str($this->session->userdata('username')),
                        "date" => $this->db->escape_str(time()),
                        "action" => $this->db->escape_str('Changed his/her password'),
                        'status' => $this->db->escape_str('1')
                    );
                    $this->item_model->insertData('user_log', $for_log);
                }
                redirect('my_account');
            } else {
                $this->session->set_flashdata('error', 'The old password you entered was wrong.');
                $this->change_password();
            }
        } else {
            $this->change_password();
        }
    }
}