<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/26/2017
 * Time: 11:01 AM
 */
date_default_timezone_set("Asia/Manila");
class Logout extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
    }
    public function index() {
        $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
        $for_log = array(
            "$user_id" => $this->db->escape_str($this->session->uid),
            "user_type" => $this->db->escape_str($this->session->userdata('type')),
            "username" => $this->db->escape_str($this->session->userdata('username')),
            "date" => $this->db->escape_str(time()),
            "action" => $this->db->escape_str('Logged out.'),
            'status' => $this->db->escape_str('1')
        );
        $this->item_model->insertData('user_log', $for_log);
        $this->session->sess_destroy();
        redirect('home');
    }
}