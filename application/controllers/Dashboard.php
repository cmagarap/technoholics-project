<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/17/2017
 * Time: 9:41 PM
 */

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function index() {
        $data = array('title' => "Admin Home", "heading" => "Dashboard");
        # print_r($_SESSION);
        $this->load->view('paper/includes/header', $data);
        $this->load->view('paper/dashboard');
        $this->load->view('paper/includes/footer');
    }

    public function seej() {
        $data = array('title' => "Admin Home", "heading" => "Dashboard");
        # print_r($_SESSION);
        $this->load->view('paper/includes/header', $data);
        $this->load->view('paper/dashboard');
        $this->load->view('paper/includes/footer');
    }
}