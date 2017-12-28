<html>
<?php
    class Cart extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('item_model');
            $this->load->library('basket');
            $this->load->library('session');
            //don't mind this

            $this->cart_contents = !empty($this->session->cart_contents)?$this->session->cart_contents:NULL;
            if ($this->cart_contents === NULL){
                // set some base values
        
            $cart_contents = array(
                    'cart_total' => 0,
                    'total_items' => 0
            );
    
            $this->session->set_userdata($cart_contents);
            }
            }
        

        public function index() {
            $allvalues = $this->item_model->fetch('product', array("status" => true));

            $data = array(
                'title' => "Technoholics",
                'product' => $allvalues
            );


            $this->load->view('shop/cart',$data);
            // include database configuration file

        }

        public function ViewCart() {

        //$this->basket = new Cart;
        $cart = new basket;

        $data = array(
            'title' => "Check out",
            'cartItems' => $cart->contents(),
            'CT' => $cart->total(),
            'CTI' => $cart->total_items()
        );

        $this->load->view('shop/viewcart',$data);

        }
        
        public function CheckOut() {

        //$this->basket = new Cart;

            if($this->basket->total_items() <= 0){
            $this->load->view('shop/cart');
            }
            
            //$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);
            $query = $this->item_model->fetch('customers', array("id" => $_SESSION['sessCustomerID']));


            $data = array(
                'title' => "Check out",
                'custRow' => $query->fetch_assoc(),
                'cartItems' => $this->basket->contents(),
                'CTI' => $this->basket->total_items()
            );

            
            $this->load->view('shop/checkout',$data);
        }

        public function PlaceOrder() {
            
                   // $this->basket = new Cart;
            
                    $data = array(
                        'customer_id' => $_SESSION['sessCustomerID'],
                        'total_price' => $this->basket->total(),
                        'created' => date("Y-m-d H:i:s"),
                        'modified' => date("Y-m-d H:i:s")
                    );
                    
                    $this->item_model->insertData('orders', $data);
    
                    if($data){
                        $orderID =  $this->item_model->insert_id;
                        $sql = '';
                        // get cart items
                        $this->basketItems = $this->basket->contents();
                        foreach($this->basketItems as $item){
                            $data = array(
                                'order_id' => $orderID,
                                'product_id' => $item['id'],
                                'quantity' => $item['qty']
                            );
                            
                            $this->item_model->insertData('order_items', $data);
                        }
                        // insert order items into database
                        $insertOrderItems =  $this->item_model->multi_query($sql);
                        if($insertOrderItems){
                            $this->basket->destroy();
                            header("Location: orderSuccess.php?id=$orderID");
                        }else{
                            //header("Location: checkout.php");
                            $this->load->view('shop/cart',$data);
                        }

                    }

                }

        public function add() {
            $cart = new basket;

            $data = array(
                'id' => $_POST["product_id"],
                'name' => $_POST["product_name"],
                'price' => $_POST["product_price"],
                'qty' => $_POST["min_quantity"]
                //"maxqty" => $_POST["max_quantity"],
            );

           $cart->insert($data); //return rowid
        }
                    
        public function test() {
            $cart = new basket;

           print_r($cart->contents());
        }
        
        function update() {
            
            $data = array(
                'rowid' => $_POST["product_id"],
                'qty' => $_POST["quantity"]
            );

            $this->cart->update($data);
            $this->load->view('shop/cart',$data);
        }

        function remove() {

            $deleteItem = $this->basket->remove($_POST["product_id"]);
            $this->load->view('shop/cart');

        }

    }
    ?>
</html>
