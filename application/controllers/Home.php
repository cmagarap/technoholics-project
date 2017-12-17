<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->model('shopping_cart_model');
        $this->load->library(array('email', 'session'));
        $this->load->library('form_validation');
        $this->load->library("cart");
    }

    public function index() {
        $this->load->library('pagination');

        $page = $this->uri->segment(3);
        $perpage = 20;

        $config['base_url'] = base_url() . "home/index";
        $config['total_rows'] = $this->item_model->getCount("product");
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

        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();

        //$data['product'] = $this->item_model->getItems($page, $config['per_page']);

        $data = array('title' => 'Home');
        $data['product'] = $this->item_model->fetch('product', array('product_category' => "featured"));
        $this->load->view("shop/includes/header", $data);
        $this->load->view("shop/shopping_menu");
        $this->load->view("shop/includes/footer");
    }

    public function details() {
        $data = array('title' => 'Product Details');
        $data['product'] = $this->item_model->fetch('product', array('product_id' => $this->uri->segment(3)));
        $this->load->view("shop/includes/header", $data);
        $this->load->view("shop/details");
        $this->load->view("shop/includes/footer");

        if ($this->session->has_userdata('isloggedin')) {
            date_default_timezone_set("Asia/Manila");
            $userinformation = $this->item_model->fetch('accounts', array('user_id' => $this->session->uid))[0];
            $product = $this->item_model->fetch('product', array('product_id' => $this->uri->segment(3)))[0];
            $data1 = array(
                "Customer_ID" => $userinformation->user_id,
                "User_Type" => $userinformation->access_level,
                "Username" => $userinformation->username,
                "Date" => time(),
                "Action" => $userinformation->username . ' viewed the product ' . $product->product_name
            );
            $this->item_model->insertData('user_log', $data1);
        }
    }

    public function categories() {
        $data = array('title' => 'Home');
        $data['product'] = $this->item_model->fetch('product', array('product_category' => $this->uri->segment(3)));
        $this->load->view("shop/includes/header", $data);
        $this->load->view("shop/shop");
        $this->load->view("shop/includes/footer");
    }

    public function search() {
        $data = array('title' => 'Home');
        $data['product'] = $this->item_model->search("product", 'product_name', $this->input->post('search'));
        $this->load->view("shop/includes/header", $data);
        $this->load->view("shop/shop");
        $this->load->view("shop/includes/footer");
    }

    function add() {

        $this->load->library("cart");
        $data = array(
            "id" => $_POST["product_id"],
            "name" => $_POST["product_name"],
            "qty" => $_POST["min_quantity"],
            "maxqty" => $_POST["max_quantity"],
            "price" => $_POST["product_price"]
        );
        $this->cart->insert($data); //return rowid
        echo $this->view();
    }

    function load() {
        echo $this->view();
        $this->load->view("shop/cart");
    }

    function remove() {
        $this->load->library("cart");
        $row_id = $_POST["row_id"];
        $data = array(
            'rowid' => $row_id,
            'qty' => 0
        );
        $this->cart->update($data);
        echo $this->view();
    }

    function clear() {
        $this->load->library("cart");
        $this->cart->destroy();
        echo $this->view();
    }

//whole table of items added to cart
    function view() {
        $this->load->library("cart");
        $output = '';
        $output .= '
  <div class="table-responsive">
   <div align="right">
    <button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
   </div>
   <br />
   <table class="table table-bordered">
    <tr>
     <th width="40%">Name</th>
     <th width="15%">Quantity</th>
     <th width="15%">Price</th>
     <th width="15%">Action</th>
    </tr>
  ';
        //items added to cart
        $count = 0;
        foreach ($this->cart->contents() as $items) {
            $count++;
            // $maxqty = $this->item_model->fetch('product', array("product_id" => $items["id"]));
            $output .= '
    <tr> 
    <td>' . $items["name"] . '</td>
    <td> <input type="number" name="qty" id="product_qty" class="form-control input-lg" value="1" max="' . $items["maxqty"] . '" min="1"></td>
    <td>' . $items["price"] . '</td>
    <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="' . $items["rowid"] . '">Remove</button></td>
    </tr>
   ';
            //total price
        }
        $output .= '
   <tr>
    <td colspan="3" align="right">Total</td>
    <td>' . $this->cart->total() . '</td>
   </tr>
  </table>
  
  </div>
  ';
        if ($count == 0) {
            $output = '<h3 align="center">Cart is Empty</h3>';
        }
        return $output;
    }

    public function logout() {
        $this->session->sess_destroy();
        date_default_timezone_set("Asia/Manila");
        $userinformation = $this->item_model->fetch('accounts', array('user_id' => $this->session->uid));
        $userinformation = $userinformation[0];
        $data1 = array(
            "user_id" => $userinformation->user_id,
            "user_type" => $userinformation->access_level,
            "username" => $userinformation->username,
            "date" => time(),
            "action" => $userinformation->username . ' just logged out.',
            'status' => '1'
        );

        //print_r($data1);
        $this->item_model->insertData('user_log', $data1);
        redirect('login');
    }
}

?>
