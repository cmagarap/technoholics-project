<html>
<?php
    class Cart extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('item_model');
            $this->load->library('basket');
            $this->load->library('session');
            //don't mind this

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
    
            $data = array(
                'title' => "Check out",
                'cartItems' =>  $this->basket->contents(),
                'CT' =>  $this->basket->total(),
                'CTI' =>  $this->basket->total_items()
            );
    
            $this->load->view('shop/viewcart',$data);
    
            }

            public function CheckOut() {

            if( $this->basket->total_items() <= 0){
            $this->load->view('shop/cart');
            }

            //$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);
            $cust = $this->item_model->fetch('accounts', array('user_id' => $this->session->uid))[0];

            $data = array(
                'title' => "Check out",
                'custRow' => $cust,
                'cartItems' =>  $this->basket->contents(),
                'CTI' =>  $this->basket->total_items(),
                'total' =>  $this->basket->total()
            );

            $this->load->view('shop/checkout',$data);
        }

            

            public function PlaceOrder() {
            
             
    
                    $data = array(
                        'customer_id' => $this->session->uid,
                        'total_price' =>  $this->basket->total(),
                        'created' => time()
                    );

                        echo "TEST";

                        $orderID = $this->item_model->insert_id('orders', $data);//must put a unique numbers 
                        // get cart items
                        $basketItems =  $this->basket->contents();
                        // loop
                        foreach($basketItems as $item){
                            $data = array(
                                'order_id' => $orderID,
                                'product_id' => $item['id'],
                                'quantity' => $item['qty']
                            );
                            print_r($data);
                            $this->item_model->insertData('order_items', $data);
                            // need to insert every item to database but won't work?
                        }
                        // insert order items into database
                            // $this->basket->destroy();
                            //header("Location: checkout.php");
                }

        public function add() {

            $data = array(
                'id' => $_POST["product_id"],
                'name' => $_POST["product_name"],
                'img' => $_POST["product_img"],
                'price' => $_POST["product_price"],
                'qty' => $_POST["min_quantity"]
                //"maxqty" => $_POST["max_quantity"],
            );

             $this->basket->insert($data); //return rowid
        }
        
        function update() {

            $data = array(
                'rowid' => $_POST["product_id"],
                'qty' => $_POST["product_quantity"]
            );

             $this->basket->update($data);
           }

        function remove() {

             $this->basket->remove($_POST["row_id"]);
        }

    }
    ?>
</html>
