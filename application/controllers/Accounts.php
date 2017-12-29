<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/19/2017
 * Time: 1:13 PM
 */

class Accounts extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation', 'session', 'email'));

        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function index() { # to be changed to page()
        if ($this->session->userdata('type') == 0) {
            $users = $this->item_model->fetch("accounts", array("status" => 1));
            $data = array(
                'title' => 'Accounts Management',
                'heading' => 'Accounts',
                'users' => $users
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/accounts/accounts");
            $this->load->view("paper/includes/footer");
        } elseif ($this->session->userdata('type') == 1) {
            $users = $this->item_model->fetch("accounts", array("status" => 1, "access_level" => 2));
            $data = array(
                'title' => 'Accounts Management',
                'heading' => 'Accounts',
                'users' => $users
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/accounts/customers");
            $this->load->view("paper/includes/footer");
        } else {
            redirect('home');
        }
    }

    public function view() {
        if ($this->session->userdata('type') == 0) {
            $account = $this->item_model->fetch('accounts', array('user_id' => $this->uri->segment(3)));

            $data = array(
                'title' => "View User Info",
                'heading' => "Accounts",
                'account' => $account
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view('paper/accounts/view');
            $this->load->view('paper/includes/footer');
        }
    }

    public function add_account() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Accounts: Add Account',
                'heading' => 'Accounts'
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view('paper/accounts/add_accounts');
            $this->load->view('paper/includes/footer');
        } else {
            redirect('home');
        }
    }

    public function add_account_exec() {
        $this->form_validation->set_rules('first_name', "first name", "required");
        $this->form_validation->set_rules('last_name', "last name", "required");
        $this->form_validation->set_rules('username', "username", "is_unique[accounts.username]");
        $this->form_validation->set_rules('password', "password", "required");
        $this->form_validation->set_rules('confirm_password', "password confirm", "required|matches[password]");
        $this->form_validation->set_rules('email', "email address", 'required|valid_email|is_unique[accounts.email]');
        $this->form_validation->set_message('required', 'Please enter your {field}.');

        if ($this->form_validation->run()) {
            $config['encrypt_name'] = TRUE;
            $config['upload_path'] = './uploads_users/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            $this->load->helper('string');
            $username = ($this->input->post('username') == "") ? NULL : trim($this->input->post('username'));
            $user_type = ($this->input->post('user_type') == "Admin Assistant") ? 1 : 0;
            $is_verified = ($user_type == 1) ? 1 : 0;
            $hash = random_string('alnum', 15);

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
                'username' => $username,
                'password' => sha1($this->input->post('password')), # to be changed
                'firstname' => trim(ucwords($this->input->post('first_name'))),
                'lastname' => trim(ucwords($this->input->post('last_name'))),
                'email' => trim($this->input->post('email')),
                'registered_at' => time(),
                'access_level' => $user_type,
                'verification_code' => $hash,
                'image' => $image,
                'is_verified' => $is_verified
            );
            $for_log = array(
                "user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Added account: ' . trim($this->input->post('last_name')) . ", " . trim($this->input->post('first_name')),
                'status' => '1'
            );
            /*$this->email->from('veocalimlim@gmail.com', 'TECHNOHOLICS');
            $this->email->to($this->input->post('email'));

            $this->email->subject('Email Verification');

            $this->email->message($this->load->view('welcome_message', $data, true));

            if (!$this->email->send()) {
                $this->email->print_debugger();
            }*/
            $this->item_model->insertData('accounts', $data);
            $this->item_model->insertData('user_log', $for_log);
            redirect("accounts/");
        } else {
            $this->add_account();
        }
    }

    public function edit() {
        $product = $this->item_model->fetch('product', array('product_id' => $this->uri->segment(3)));
        $data = array(
            'title' => "Edit Product",
            'heading' => "Inventory",
            'products' => $product
        );

        $this->load->view('paper/includes/header', $data);
        $this->load->view('paper/inventory/edit');
        $this->load->view('paper/includes/footer');
    }

    public function updateproduct() {
        $data = array(
            'product_name' => $this->input->post('product_name'),
            'product_desc' => $this->input->post('product_desc'),
            'product_price' => $this->input->post('product_price'),
            'updated_at' => time()
        );

        $this->item_model->updatedata("product", $data, array('product_id' => $this->uri->segment(3)));

        redirect("management/product");
    }

    public function delete() {
        $this->item_model->updatedata("product", array("status" => false), array('product_id' => $this->uri->segment(3)));
        redirect("inventory/page");
    }

}
