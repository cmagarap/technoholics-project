<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/17/2017
 * Time: 9:41 PM
 */

date_default_timezone_set("Asia/Manila");
class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
        if (!$this->session->has_userdata('isloggedin')) {
            $this->session->set_flashdata("error", "You must login first to continue.");
            redirect('login');
        }
    }

    public function index() {
        if($this->session->userdata("type") == 0 OR $this->session->userdata("type") == 1) {
            $this->db->select_sum('income');
            $income = $this->item_model->fetch("sales", "status = 1");
            $this->db->select_sum('product_quantity');
            $product = $this->item_model->fetch("product", "status = 1");
            $this->db->select('sales_date');
            $sales_date = $this->item_model->fetch("sales", "status = 1", "sales_date", "DESC", 1);
            $audit_trail = $this->item_model->fetch("audit_trail", "status = 1", "at_date", "DESC", 5);
            $customer_all = $this->item_model->fetch("customer", "status = 1");
            $customer_limit = $this->item_model->fetch("customer", "status = 1", "customer_id", "ASC", 5);
            $this->db->where("status = 1 AND process_status != 3");
            $no_of_orders = $this->db->count_all_results("orders");
            $orders_latest_date = $this->item_model->fetch("orders", "status = 1", "transaction_date", "DESC", 1);

            $data = array(
                'title' => "Admin Home",
                'heading' => "Dashboard",
                'revenue' => $income,
                'product_quantity' => $product,
                'sales_date' => $sales_date,
                'trail' => $audit_trail,
                'customer_all' => $customer_all,
                'customer_limit' => $customer_limit,
                'no_of_orders' => $no_of_orders,
                'orders_date' => $orders_latest_date
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/dashboard');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("home");
        }
    }

    public function getTrend() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            $overall = $this->db->query("SELECT SUM(orders.total_price) AS price, FROM_UNIXTIME(orders.transaction_date, '%Y %M') AS td FROM order_items JOIN product ON order_items.product_id = product.product_id JOIN orders ON order_items.order_id = orders.order_id WHERE orders.status = 1 GROUP BY td ORDER BY orders.order_id DESC LIMIT 12");

            print json_encode(array_reverse((array)$overall->result()));
        } else {
            redirect("home");
        }
    }
}