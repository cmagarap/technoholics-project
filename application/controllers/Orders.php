<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 12/19/2017
 * Time: 2:27 PM
 */
class Orders extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session'));
    }

    public function index() {
        $this->page();
    }

    public function page() {
        $data = array(
            'title' => 'Orders Management',
            'heading' => 'Orders Management',
            #'products' => $products,
            #'links' => $this->pagination->create_links()
        );
        $this->load->view("paper/includes/header", $data);
        $this->load->view("paper/orders/orders");
        $this->load->view("paper/includes/footer");
    }
}
 ?>