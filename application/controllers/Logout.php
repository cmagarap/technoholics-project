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
            "$user_id" => $this->session->uid,
            "user_type" => $this->session->userdata('type'),
            "username" => $this->session->userdata('username'),
            "date" => time(),
            "action" => 'Logged out.',
            'status' => '1'
        );
        # for customer
        if($this->session->userdata('product_rating')) {
            $product_rating = $this->session->userdata('product_rating');
            foreach($product_rating as $prod) {
                $this->db->select(array('product_name', 'product_id'));
                $product[] = $this->item_model->fetch('product', 'product_id = ' . $prod);
            }
            for ($i = 0; $i < sizeof($product); $i++) {
                $for_audit = array(
                    "customer_name" => $this->session->userdata("username"),
                    "item_name" => $product[$i][0]->product_name,
                    "at_detail" => "Product Rating",
                    "at_date" => time(),
                    "customer_id" => $this->session->uid,
                    "product_id" => $product[$i][0]->product_id,
                    "order_id" => NULL
                );
                $this->item_model->insertData('audit_trail', $for_audit);
            }
        }

        if($this->session->userdata('viewed_products')) {
            $viewed_product = $this->session->userdata('viewed_products');
            foreach($viewed_product as $prod) {
                $this->db->select(array('product_name', 'product_id'));
                $product[] = $this->item_model->fetch('product', 'product_id = ' . $prod);
            }
            for ($i = 0; $i < sizeof($product); $i++) {
                $for_audit = array(
                    "customer_name" => $this->session->userdata("username"),
                    "item_name" => $product[$i][0]->product_name,
                    "at_detail" => "Viewed",
                    "at_date" => time(),
                    "customer_id" => $this->session->uid,
                    "product_id" => $product[$i][0]->product_id,
                    "order_id" => NULL
                );
                $this->item_model->insertData('audit_trail', $for_audit);
            }
        }
        $this->item_model->insertData('user_log', $for_log);
        $this->session->sess_destroy();
        redirect('home');
    }
}