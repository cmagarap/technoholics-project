<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/19/2017
 * Time: 10:53 AM
 */

class User_log extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function index() { # to be changed to page()
        $data = array(
            'title' => 'User Log Management',
            'heading' => 'User Log'
        );
        $this->load->view("paper/includes/header", $data);
        $this->load->view("paper/includes/footer");
    }
}