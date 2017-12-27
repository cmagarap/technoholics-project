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
        $this->load->library('session');
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function index() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $my_account = $this->item_model->fetch("accounts", array("user_id" => $this->session->uid));
            $data = array(
                'title' => 'My Account',
                'heading' => 'My Account',
                'user' => $my_account
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/accounts/my_account");
            $this->load->view("paper/includes/footer");
        } else {
            echo 'byye';
        }
    }
}