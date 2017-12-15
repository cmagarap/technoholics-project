<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/15/2017
 * Time: 10:15 AM
 */

class Inventory extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }
    public function index() {
        $products = $this->item_model->getProducts('product', 'product_name', 'ASC');
        $data = array(
            "title" => "Inventory Management",
            "heading" => "Inventory Management",
            "products" => $products
        );
        $this->load->view("paper/includes/header", $data);
        $this->load->view("paper/inventory");
        $this->load->view("paper/includes/footer");
    }
}