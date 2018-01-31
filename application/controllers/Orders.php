<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 12/19/2017
 * Time: 2:27 PM
 */

date_default_timezone_set("Asia/Manila");
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
        $this->load->library('pagination');
        $perpage = 10;
        $config['base_url'] = base_url() . "orders/page";
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

        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $config['total_rows'] = $this->item_model->getCount('orders', "status = 1");
            $this->pagination->initialize($config);
            $orders = $this->item_model->getItemsWithLimit('orders', $perpage, $this->uri->segment(3), 'transaction_date', 'DESC', "status = 1");
            $data = array(
                'title' => 'Orders Management',
                'heading' => 'Orders Management',
                'orders' => $orders,
                'links' => $this->pagination->create_links()
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/orders/orders");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home/");
        }
    }

    public function view() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $order_items = $this->item_model->fetch('order_items', array('order_id' => $this->uri->segment(3)));
            if($order_items) {
                $data = array(
                    'title' => "Orders: View Order",
                    'heading' => "Orders Management",
                    'order_items' => $order_items
                );
                $this->load->view('paper/includes/header', $data);
                $this->load->view("paper/includes/navbar");
                $this->load->view('paper/orders/view');
                $this->load->view('paper/includes/footer');
            } else {
                redirect('orders');
            }
            #$order = $this->item_model->fetch('orders', array('order_id' => $this->uri->segment(3)));
        } else {
            redirect('home');
        }
    }

    public function track() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $order_items = $this->item_model->fetch('order_items', array('order_id' => $this->uri->segment(3)));
            if($order_items) {
                $data = array(
                    'title' => "Orders: Track Order",
                    'heading' => "Orders Management",
                    'order_items' => $order_items
                );
                $this->load->view('paper/includes/header', $data);
                $this->load->view("paper/includes/navbar");
                $this->load->view('paper/orders/track');
                $this->load->view('paper/includes/footer');
            } else {
                redirect('orders');
            }
        } else {
            redirect('home');
        }
    }

    public function track_exec() {
        $data = array(
            "shipper_id" => $this->input->post("shipper"),
            # "delivery_date" =>
            "process_status" => $this->input->post("progress"),
            "admin_id" => $this->session->uid
        );
        $track = $this->item_model->updatedata("orders", $data, "order_id = " . $this->uri->segment(3));

        if($track) {
            $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
            $for_log = array(
                "$user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Edited order #' . $this->uri->segment(3)
            );
            $this->item_model->insertData("user_log", $for_log);
        }

        $order = $this->item_model->fetch("orders", "order_id = " . $this->uri->segment(3))[0];

        if($order->process_status == 3) {
            $order_items = $this->item_model->fetch("order_items", "order_id = " . $this->uri->segment(3));
            $items_quantity = array();
            $stat_bought = array();

            foreach ($order_items as $order_item) {
                array_push($items_quantity, $order_item->quantity);
                $this->db->select("product_id");
                $this->db->select("times_bought");
                # get the times_bought from product table:
                array_push($stat_bought, $this->item_model->fetch("product", array("product_id" => $order_item->product_id))[0]);
            }

            echo "<pre>";
            print_r($order_items);
            echo "<br>";
            print_r($stat_bought);
            echo "<br>";
            print_r($items_quantity);
            echo "</pre>";
            # update the no. of times bought:
            foreach ($stat_bought as $stat_bought) {
                for ($i = 0; $i < sizeof($stat_bought); $i++) {
                    $this->item_model->updatedata("product", array("times_bought" => $stat_bought->times_bought + $items_quantity[$i]), array("product_id" => $stat_bought->product_id));
                }
            }

            # insert to sales table:
            /*$for_sales = array(
                "sales_detail" => "In this order, $order->order_quantity items were bought and " . number_format($order->total_price, 2) . " is earned.",
                "income" => $order->total_price,
                "sales_date" => time(),
                "admin_id" => $this->session->uid,
                "order_id" => $order->order_id
            );
            $this->item_model->insertData("sales", $for_sales);

            $for_log = array(
                "admin_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Edited order #' . $this->uri->segment(3) . "'s status to 'delivered'."
            );
            $this->item_model->insertData("user_log", $for_log);*/
        }
        //redirect("orders/");
    }

    public function cancel() {
        $cancel = $this->item_model->updatedata("orders", array("status" => 0), "order_id = " . $this->uri->segment(3));
        if($cancel) {
            $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
            $for_log = array(
                "$user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Cancelled order #' . $this->uri->segment(3)
            );
            $this->item_model->insertData("user_log", $for_log);
            redirect("orders/page");
        }
    }
}
 ?>