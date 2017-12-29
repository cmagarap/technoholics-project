<?php

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('email', 'session', 'form_validation', 'basket'));
    }

    public function index() {
        if ($this->session->has_userdata('isloggedin')) {
            if ($this->session->userdata("type") == 2) { # if customer
                $data = array(
                    'title' => "TECHNOHOLICS | All the tech you need."
                );  
                $this->load->view('ordering/includes/header', $data);
                $this->load->view('ordering/includes/navbar');
                $this->load->view('ordering/ads/front_slider');
                $this->load->view('ordering/ads/featured_products');
                $this->load->view('ordering/includes/footer');
            } elseif ($this->session->userdata("type") == 0 OR $this->session->userdata("type") == 1) {
                redirect("dashboard");
            }
        } else { # if not logged in
            $data = array(
                'title' => "TECHNOHOLICS | All the tech you need."
            );
            $this->load->view('ordering/includes/header', $data);
            $this->load->view('ordering/includes/navbar');
            $this->load->view('ordering/ads/front_slider');
            $this->load->view('ordering/ads/featured_products');
            $this->load->view('ordering/includes/footer');
        }
    }

    // Kailangan ko pa ito
    // public function details() {
    //     $product = $this->item_model->fetch('product', array('product_id' => $this->uri->segment(3)));
    //     $data = array(
    //         'title' => 'Product Details',
    //         'product' => $product 
    //     );
    //     $this->load->view("shop/includes/header", $data);
    //     $this->load->view("shop/details");
    //     $this->load->view("shop/includes/footer");

    //     if ($this->session->has_userdata('isloggedin')) {
    //         date_default_timezone_set("Asia/Manila");
    //         $userinformation = $this->item_model->fetch('accounts', array('user_id' => $this->session->uid))[0];
    //         $product = $this->item_model->fetch('product', array('product_id' => $this->uri->segment(3)))[0];
    //         $data1 = array(
    //             "Customer_ID" => $userinformation->user_id,
    //             "User_Type" => $userinformation->access_level,
    //             "Username" => $userinformation->username,
    //             "Date" => time(),
    //             "Action" => $userinformation->username . ' viewed the product ' . $product->product_name
    //         );
    //         $this->item_model->insertData('user_log', $data1);
    //     }

    // public function categories() {
    // $product = $this->item_model->fetch('product', array('product_category' => $this->uri->segment(3)));
    //     $data = array(
    //     'title' => 'Home',
    //     'product' => $product
    // );
    //     $this->load->view('ordering/includes/header', $data);
    //     $this->load->view('ordering/includes/navbar');
    //     $this->load->view('ordering/category');
    //     $this->load->view('ordering/includes/footer');
    // }

    public function category() {
        $product = $this->item_model->fetch('product', array("status" => true));
        $data = array(
        'title' => 'Home',
        'products' => $product
    );

        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/category');
        $this->load->view('ordering/includes/footer');
    }

    public function register() {
        $data = array(
            'title' => "TECHNOHOLICS | All the tech you need." # should be changed
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/register');
        $this->load->view('ordering/includes/footer');
    }

    public function basket() {
        $data = array(
            'title' => "My Shopping Cart" # should be changed
        );

        $basket = new basket;
        
        $data = array(
            'title' => "Check out",
            'cartItems' => $basket->contents(),
            'CT' => $basket->total(),
            'CTI' => $basket->total_items()
        );

        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/basket');
        $this->load->view('ordering/includes/footer');
    }

    public function detail() {
        $product = $this->item_model->fetch('product', array('product_id' => $this->uri->segment(3)));
        $data = array(
            'title' => 'Product Details',
            'product' => $product 
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/detail');
        $this->load->view('ordering/includes/footer');
    }

    public function checkout1() {
        $data = array(
            'title' => "Checkout"
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/checkout1');
        $this->load->view('ordering/includes/footer');
    }

    public function checkout2() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/checkout2');
        $this->load->view('ordering/includes/footer');
    }

    public function checkout3() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/checkout3');
        $this->load->view('ordering/includes/footer');
    }

    public function checkout4() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/checkout4');
        $this->load->view('ordering/includes/footer');
    }

    public function customer_orders() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/menu_account');
        $this->load->view('ordering/customer_orders');
        $this->load->view('ordering/includes/footer');
    }

    public function customer_order_view() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/menu_account');
        $this->load->view('ordering/customer_order_view');
        $this->load->view('ordering/includes/footer');
    }

    public function wishlist() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/menu_account');
        $this->load->view('ordering/wishlist');
        $this->load->view('ordering/includes/footer');
    }

    public function account() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/menu_account');
        $this->load->view('ordering/account');
        $this->load->view('ordering/includes/footer');
    }

    public function contact() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/contact');
        $this->load->view('ordering/includes/footer');
    }

    public function faq() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/faq');
        $this->load->view('ordering/includes/footer');
    }




}

?>
