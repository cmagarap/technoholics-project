<?php

class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session','pdf'));
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function sales() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            # These are the values when a user first visits the page. Should be changeable using dropdown or text inputo
            $daily = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%b %d, %Y') as sales_d, SUM(sales.income) as income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 AND FROM_UNIXTIME(sales.sales_date, '%Y') = 2018 AND FROM_UNIXTIME(sales.sales_date, '%u') = " . date('W') . " GROUP BY sales_d ORDER BY sales.sales_date DESC");

            $weekly = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%U') AS sales_d, FROM_UNIXTIME(sales.sales_date, '%b %d, %Y') AS sales_d, SUM(sales.income) AS income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 AND FROM_UNIXTIME(sales.sales_date, '%Y') = 2018 GROUP BY WEEK(FROM_UNIXTIME(sales.sales_date)) ORDER BY sales.sales_date DESC");

            $monthly = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%M') as sales_month, SUM(sales.income) AS income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 AND FROM_UNIXTIME(sales.sales_date, '%Y') = 2017 GROUP BY sales_month ORDER BY sales.sales_date");

            $annual = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%Y') as sales_y, SUM(sales.income) AS income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 GROUP BY sales_y ORDER BY sales.sales_date DESC");

            $dailytotal = 0;
            foreach($daily->result() as $day)
                $dailytotal += $day->income;

            $weeklytotal = 0;
            foreach($weekly->result() as $week)
                $weeklytotal += $week->income;

            $monthlytotal = 0;
            foreach($monthly->result() as $month)
                $monthlytotal += $month->income;

            $annualtotal = 0;
            foreach($annual->result() as $ann)
                $annualtotal += $ann->income;

            $data = array(
                'title' => 'Sales Report',
                'heading' => 'Sales Management',
                'daily' => $daily->result(),
                'weekly' => $weekly->result(),
                'monthly' => $monthly->result(),
                'annual' => $annual->result(),
                'dailytotal' => $dailytotal,
                'weeklytotal' => $weeklytotal,
                'monthlytotal' => $monthlytotal,
                'annualtotal' => $annualtotal
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/sales/reports");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home/");
        }
    }

    public function inventory() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $this->db->select(array("product_id", "product_name", "product_quantity", "product_price"));
            $inventory = $this->item_model->fetch("product", "status = 1");
            #
            $data = array(
                'title' => 'Inventory Report',
                'heading' => 'Inventory',
                'inventory' => $inventory,
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/inventory/report");
            $this->load->view("paper/includes/footer");
        } else {
            redirect('home');
        }
    }

    public function active_customers() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $this->db->select(array("customer_id", "username", "lastname", "firstname", "image"));
            $customer = $this->item_model->fetch("customer", "status = 1");

            $data = array(
                'title' => 'Weekly Active Customers',
                'heading' => 'User Log',
                'customer' => $customer,
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/user_log/active_users");
            $this->load->view("paper/includes/footer");
        } else {
            redirect('home');
        }
    }

    public function product_preference() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $this->db->select(array("customer_id", "username", "lastname", "firstname", "image", "product_preference"));
            $customer = $this->item_model->fetch("customer", "status = 1");

            $data = array(
                'title' => 'Customer Product Preferences',
                'heading' => 'Accounts',
                'customer' => $customer
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/accounts/product_preference");
            $this->load->view("paper/includes/footer");
        } else {
            redirect('home');
        }
    }

}
