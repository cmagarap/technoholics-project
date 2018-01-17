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
                    'title' => "TECHNOHOLICS | All the tech you need.",
                    'page' => "Home" // active column identifier
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
                'title' => "TECHNOHOLICS | All the tech you need.",
                'page' => "Home"
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
        $page = $this->uri->segment(2);
        $cat = $this->uri->segment(3);
        $brand = $this->uri->segment(4);

        $this->load->library('pagination');
        $perpage = 12;
        $config['per_page'] = $perpage;
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = ' </ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url'] = '';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        if ($brand == "apple" || $brand == "samsung" || $brand == "ASUS" || $brand == "Lenovo" || $brand == "Sony" || $brand == "HP" || $brand == "Dell" || $brand == "Acer") {
            $config['base_url'] = base_url() . "home/category/" . $cat . "/" . $brand;
            $config['total_rows'] = $this->item_model->getCount('product', array("product_quantity >" => 0, "product_category" => $cat, "product_brand" => $brand));
            $this->pagination->initialize($config);
            $product = $this->item_model->getItemsWithLimit('product', $perpage, $this->uri->segment(5), 'product_name', 'ASC', array("product_quantity >" => 0, "product_category" => $cat, "product_brand" => $brand));
            $data = array(
                'title' => 'Category',
                'products' => $product,
                'page' => $page,
                'category' => $cat, // category identifier
                'brand' => $brand,
                'links' => $this->pagination->create_links()
            );

            $this->load->view('ordering/includes/header', $data);
            $this->load->view('ordering/includes/navbar');
            $this->load->view('ordering/category');
            $this->load->view('ordering/includes/footer');
        } else {
            $config['base_url'] = base_url() . "home/category/" . $cat;
            $config['total_rows'] = $this->item_model->getCount('product', array("product_quantity >" => 0, "product_category" => $cat));
            $this->pagination->initialize($config);
            $product = $this->item_model->getItemsWithLimit('product', $perpage, $this->uri->segment(4), 'product_name', 'ASC', array("product_quantity >" => 0, "product_category" => $cat));
            $data = array(
                'title' => 'Category',
                'products' => $product,
                'page' => $page,
                'category' => $cat, // category identifier
                'brand' => $brand,
                'links' => $this->pagination->create_links()
            );

            $this->load->view('ordering/includes/header', $data);
            $this->load->view('ordering/includes/navbar');
            $this->load->view('ordering/category');
            $this->load->view('ordering/includes/footer');
        }
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
            'title' => "My Shopping Cart",
            'cartItems' => $this->basket->contents(),
            'CT' => $this->basket->total(),
            'CTI' => $this->basket->total_items(),
            'page' => "Home"
        );

        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/basket');
        $this->load->view('ordering/includes/footer');
    }

    public function detail() {
        $product = $this->item_model->fetch('product', array('product_id' => $this->uri->segment(5)));
        $page = $this->uri->segment(2);
        $cat = $this->uri->segment(3);
        $brand = $this->uri->segment(4);
        $id = $this->uri->segment(5);

        $data = array(
            'title' => 'Home',
            'product' => $product,
            'page' => $page,
            'category' => $cat, //category identifier
            'brand' => $brand,
            'id' => $id
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/detail');
        $this->load->view('ordering/includes/footer');
    }

    public function CheckOut() {

        if ($this->basket->total_items() <= 0) {
            $this->load->view('home/');
        }

        $cust = $this->item_model->fetch('accounts', array('user_id' => $this->session->uid))[0];

        $data = array(
            'title' => "Checkout",
            'custRow' => $cust,
            'cartItems' => $this->basket->contents(),
            'CTI' => $this->basket->total_items(),
            'total' => $this->basket->total()
        );

        $this->load->view('shop/checkout', $data);
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/checkout1');
        $this->load->view('ordering/includes/footer');
    }

    public function checkout1() {
        $data = array(
            'title' => "Checkout",
            'page' => "Home"
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/checkout1');
        $this->load->view('ordering/includes/footer');
    }

    public function checkout2() {
        $data = array(
            'title' => "Checkout",
            'page' => "Home"
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/checkout2');
        $this->load->view('ordering/includes/footer');
    }

    public function checkout3() {
        $data = array(
            'title' => "Checkout",
            'page' => "Home",
            'fname' => $this->input->post('firstname'),
            'lname' => $this->input->post('lastname'),
            'address' => $this->input->post('address'),
            'province' => $this->input->post('province'),
            'city' => $this->input->post('city'),
            'barangay' => $this->input->post('barangay'),
            'zip' => $this->input->post('zip'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email')
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/checkout3');
        $this->load->view('ordering/includes/footer');
    }

    public function checkout4() {

        $data = array(
            'title' => "My Shopping Cart",
            'cartItems' => $this->basket->contents(),
            'CT' => $this->basket->total(),
            'CTI' => $this->basket->total_items(),
            'payment' => $this->input->post('payment'),
            'fname' => $this->input->post('firstname'),
            'lname' => $this->input->post('lastname'),
            'address' => $this->input->post('address'),
            'province' => $this->input->post('province'),
            'city' => $this->input->post('city'),
            'barangay' => $this->input->post('barangay'),
            'zip' => $this->input->post('zip'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'page' => "Home"
        );

        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/checkout4');
        $this->load->view('ordering/includes/footer');
    }

    public function customer_orders() {
        $data = array(
            'page' => "Home"
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/menu_account');
        $this->load->view('ordering/customer_orders');
        $this->load->view('ordering/includes/footer');
    }

    public function customer_order_view() {
        $data = array(
            'page' => "Home"
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/menu_account');
        $this->load->view('ordering/customer_order_view');
        $this->load->view('ordering/includes/footer');
    }

    public function wishlist() {
        $data = array(
            'page' => "Home"
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/menu_account');
        $this->load->view('ordering/wishlist');
        $this->load->view('ordering/includes/footer');
    }

    public function account() {
        $data = array(
            'page' => "Home"
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/menu_account');
        $this->load->view('ordering/account');
        $this->load->view('ordering/includes/footer');
    }

    public function contact() {
        $data = array(
            'page' => "Home"
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/contact');
        $this->load->view('ordering/includes/footer');
    }

    public function faq() {
        $data = array(
            'page' => "Home"
        );
        $this->load->view('ordering/includes/header', $data);
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/faq');
        $this->load->view('ordering/includes/footer');
    }

    public function add() {

        $data = array(
            'id' => $_POST["product_id"],
            'name' => $_POST["product_name"],
            'img' => $_POST["product_img"],
            'price' => $_POST["product_price"],
            'qty' => $_POST["min_quantity"],
            'maxqty' => $_POST["max_quantity"]
        );

        $this->basket->insert($data); //return rowid
    }

    function update() {

        $data = array(
            'rowid' => $_POST["product_id"],
            'qty' => $_POST["product_quantity"]
        );

        $this->basket->update($data);
        // $item = $this->basket->get_item($_POST["product_id"]);
        // $value = number_format($item['subtotal'], 2);
        // echo json_encode(array(
        //     'key' => $_POST["product_id"],
        //     'value' => $value
        // ));
    }

    function remove() {
        $this->basket->remove($_POST["row_id"]);
    }

    public function placeorder() {
        date_default_timezone_set("Asia/Manila");
        // if logged in
        if ($this->session->has_userdata('isloggedin')) {
            $userinformation = $this->item_model->fetch('customer', array('customer_id' => $this->session->uid))[0];

            $data = array(
                'customer_id' => $this->session->uid,
                'total_price' => $this->basket->total(),
                'order_quantity' => $this->basket->total_items(),
                'transaction_date' => time(),
                'delivery_date' => time() + 259200,
                'shipping_address' => $userinformation->complete_address,
                'payment_method' => $this->input->post('payment')
            );
        }
        // if not
        else {
            $bytes_code = openssl_random_pseudo_bytes(30, $crypto_strong);
            $hash_code = bin2hex($bytes_code);
            $user_and_pass = substr($this->input->post('firstname'), 0, 1) . substr($this->input->post('lastname'), 0, 1) . time();

            //must put username and password
            $account = array(
                'email' => $this->input->post('email'),
                'username' => $user_and_pass,
                'password' => $this->item_model->setPassword($user_and_pass, $hash_code),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'complete_address' => $this->input->post('address'),
                'province' => $this->input->post('province'),
                'city_municipality' => $this->input->post('city'),
                'barangay' => $this->input->post('barangay'),
                'zip_code' => $this->input->post('zip'),
                'contact_no' => $this->input->post('contact'),
                'image' => "default-user.png",
                'status' => "1",
                'verification_code' => $hash_code
            );
            //returns the id of last query
            $customer_id = $this->item_model->insert_id('customer', $account);

            $data = array(
                'customer_id' => $customer_id,
                'total_price' => $this->basket->total(),
                'order_quantity' => $this->basket->total_items(),
                'transaction_date' => time(),
                'delivery_date' => time() + 259200,
                'shipping_address' => $this->input->post('address'),
                'payment_method' => $this->input->post('payment')
            );
        }

        $order_id = $this->item_model->insert_id('orders', $data);
        // get cart items
        $basketItems = $this->basket->contents();
        // loop
        foreach ($basketItems as $item) {
            $data = array(
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'quantity' => $item['qty']
            );

            $this->item_model->insertData('order_items', $data);
            $stock = $item['maxqty'] - $item['qty'];
            $data1 = array(
                'product_quantity' => $stock
            );
            $this->item_model->updatedata("product", $data1, array('product_id' => $item['id']));
        }

        $this->basket->destroy();
    }

}

?>
