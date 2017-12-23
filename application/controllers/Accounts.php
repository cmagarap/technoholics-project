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
        $this->load->library('session');
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function index() { # to be changed to page()
        if($this->session->userdata('type') == "General Manager") {
            $users = $this->item_model->fetch("accounts", array("status" => 1));
            $data = array(
                'title' => 'Accounts Management',
                'heading' => 'Accounts',
                'users' => $users
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/accounts/accounts");
            $this->load->view("paper/includes/footer");
        } elseif($this->session->userdata('type') == "Admin Assistant") {
            $users = $this->item_model->fetch("accounts", array("status" => 1, "access_level" => 2));
            $data = array(
                'title' => 'Accounts Management',
                'heading' => 'Accounts',
                'users' => $users
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/accounts/customers");
            $this->load->view("paper/includes/footer");
        }
    }

    public function view() {
        if($this->session->userdata('type') == "General Manager") {
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

        $this->item_model->updatedata("product",$data, array('product_id' => $this->uri->segment(3)));

        redirect("management/product");
    }

    public function delete() {
        $this->item_model->updatedata("product", array("status" => false), array('product_id' => $this->uri->segment(3)));
        redirect("inventory/page");
    }
}