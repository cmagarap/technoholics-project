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
        if ($this->session->has_userdata('isloggedin')) {
            $for_log = array(
                "user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Logged out.',
                'status' => '1'
            );
            $this->item_model->insertData('user_log', $for_log);
            $this->session->sess_destroy();
            redirect('home');
        } else {
            redirect('home');
        }
    }
}