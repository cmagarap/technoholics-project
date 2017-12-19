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
        $users = $this->item_model->fetch("accounts", array("status" => 1));
        $data = array(
            'title' => 'Accounts Management',
            'heading' => 'Accounts',
            'users' => $users
        );
        $this->load->view("paper/includes/header", $data);
        $this->load->view("paper/accounts/accounts");
        $this->load->view("paper/includes/footer");
    }
}