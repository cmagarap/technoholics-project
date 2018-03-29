<?php

class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session', 'form_validation'));
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function sales_reports() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $this->load->view("paper/includes/header", array('title' => 'Sales Reports', 'heading' => 'Sales Reports'));
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/sales/reports");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home/");
        }
    }

    public function daily_sales() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            if($this->input->post('from_date') AND $this->input->post('to_date')) {
                $daily = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%b %d, %Y') as sales_d, SUM(sales.income) as income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 AND FROM_UNIXTIME(sales.sales_date, '%Y-%m-%d') BETWEEN '" . $this->input->post('from_date') . "' AND '" . $this->input->post('to_date') . "' GROUP BY sales_d ORDER BY sales.sales_date DESC");

                $subtitle = "Here are the daily sales from <b><u>" . date("F j, Y", strtotime($this->input->post('from_date'))) . " to " . date("F j, Y", strtotime($this->input->post('to_date'))) . "</u></b>. <br><a href='" . base_url() . "reports/daily_sales'>See daily sales for this week.</a>";
            } else {
                $daily = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%b %d, %Y') as sales_d, SUM(sales.income) as income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 AND FROM_UNIXTIME(sales.sales_date, '%Y') = 2018 AND FROM_UNIXTIME(sales.sales_date, '%u') = " . date('W') . " GROUP BY sales_d ORDER BY sales.sales_date DESC");

                $subtitle = "Here are the daily sales for this week.";
            }

            $dailytotal = 0;
            foreach($daily->result() as $day)
                $dailytotal += $day->income;

            $data = array(
                'title' => 'Daily Sales Report',
                'heading' => 'Sales Reports',
                'daily' => $daily->result(),
                'dailytotal' => $dailytotal,
                'sub' => $subtitle
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/sales/daily_sales");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home");
        }
    }

    public function weekly_sales() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            if($this->input->post('month') AND $this->input->post('year')) {
                $weekly = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%U') AS sales_week, FROM_UNIXTIME(sales.sales_date, '%b %d, %Y') AS sales_date, SUM(sales.income) AS income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 AND FROM_UNIXTIME(sales.sales_date, '%Y') = " . $this->input->post('year') . " AND FROM_UNIXTIME(sales.sales_date, '%b') = '" .  $this->input->post('month') . "' GROUP BY WEEK(FROM_UNIXTIME(sales.sales_date)) ORDER BY sales.sales_date DESC");

                $subtitle = "Here are the weekly sales for the month of <b><u>" . date('F', strtotime($this->input->post('month'))) . ", " . $this->input->post('year') . "</u></b>. <br><a href='" . base_url() . "reports/weekly_sales'>See the latest weekly sales for the month.</a>";
            } else {
                $weekly = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%U') AS sales_week, FROM_UNIXTIME(sales.sales_date, '%b %d, %Y') AS sales_date, SUM(sales.income) AS income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 AND FROM_UNIXTIME(sales.sales_date, '%Y') = " . date('Y') . " AND FROM_UNIXTIME(sales.sales_date, '%b') = '" . date('M') . "' GROUP BY WEEK(FROM_UNIXTIME(sales.sales_date)) ORDER BY sales.sales_date DESC");

                $subtitle = "Here are the latest weekly sales for this month.";
            }

            $this->db->distinct();
            $this->db->select("FROM_UNIXTIME(sales.sales_date, '%Y') AS sales_year");
            $year_for_dropdown = $this->item_model->fetch('sales', 'status = 1', 'sales_date', 'DESC');

            $weeklytotal = 0;
            foreach($weekly->result() as $week)
                $weeklytotal += $week->income;

            $data = array(
                'title' => 'Weekly Sales Report',
                'heading' => 'Sales Reports',
                'weekly' => $weekly->result(),
                'weeklytotal' => $weeklytotal,
                'sub' => $subtitle,
                'years' => $year_for_dropdown
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/sales/weekly_sales");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home");
        }
    }

    public function monthly_sales() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            if(isset($_POST['enter'])) {
                $monthly = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%M') AS sales_month, SUM(sales.income) AS income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 AND FROM_UNIXTIME(sales.sales_date, '%Y') = " . $this->input->post('year') . " GROUP BY sales_month ORDER BY sales.sales_date");

                $subtitle = "Here are the monthly sales in <b><u>" . $this->input->post('year') . "</u></b>. <br><a href='" . base_url() . "reports/monthly_sales'>See the latest monthly sales.</a>";
            } else {
                $monthly = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%M') AS sales_month, SUM(sales.income) AS income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 AND FROM_UNIXTIME(sales.sales_date, '%Y') = " . date('Y') . " GROUP BY sales_month ORDER BY sales.sales_date");

                $subtitle = "Here are the latest sales per month.";
            }

            $this->db->distinct();
            $this->db->select("FROM_UNIXTIME(sales.sales_date, '%Y') AS sales_year");
            $year_for_dropdown = $this->item_model->fetch('sales', 'status = 1', 'sales_date', 'DESC');

            $monthlytotal = 0;
            foreach($monthly->result() as $month)
                $monthlytotal += $month->income;

            $data = array(
                'title' => 'Monthly Sales Report',
                'heading' => 'Sales Reports',
                'monthly' => $monthly->result(),
                'monthlytotal' => $monthlytotal,
                'sub' => $subtitle,
                'years' => $year_for_dropdown
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/sales/monthly_sales");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home");
        }
    }

    public function annual_sales() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            if(isset($_POST['enter'])) {
                $annual = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%Y') as sales_y, SUM(sales.income) AS income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 GROUP BY sales_y ORDER BY sales.sales_date DESC LIMIT " . $this->input->post('year'));

                $subtitle = "Here are the here are the annual sales for the last <b><u>" . $this->input->post('year') . " years</u></b>. <br><a href='" . base_url() . "reports/annual_sales'>See the latest annual sales.</a>";
                $no_fetched_msg = (!$annual->result()) ? "<center><h3><br><br><br><hr><br>There are no annual sales recorded for the selected number of years.</h3><br></center><br><br></div>" : "";
            } else {
                $annual = $this->db->query("SELECT SUM(orders.order_quantity) AS order_quantity, FROM_UNIXTIME(sales.sales_date, '%Y') as sales_y, SUM(sales.income) AS income FROM sales JOIN orders ON sales.order_id = orders.order_id WHERE sales.status = 1 GROUP BY sales_y ORDER BY sales.sales_date DESC");

                $subtitle = "Here are the latest sales per year.";
                $no_fetched_msg = (!$annual->result()) ? "<center><h3><br><br><br><hr><br>There are no annual sales recorded.</h3><br></center><br><br></div>" : "";
            }

            $annualtotal = 0;
            foreach($annual->result() as $year)
                $annualtotal += $year->income;

            $data = array(
                'title' => 'Annual Sales Report',
                'heading' => 'Sales Reports',
                'annual' => $annual->result(),
                'annualtotal' => $annualtotal,
                'sub' => $subtitle,
                'no_fetched' => $no_fetched_msg
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/sales/yearly_sales");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home");
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
