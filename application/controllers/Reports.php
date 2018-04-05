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
                $daily = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%b %d, %Y') as sales_d, SUM(income) as income, SUM(items_sold) AS items_sold FROM sales WHERE status = 1 AND FROM_UNIXTIME(sales_date, '%Y-%m-%d') BETWEEN '" . $this->input->post('from_date') . "' AND '" . $this->input->post('to_date') . "' GROUP BY sales_d ORDER BY sales_date DESC");

                $subtitle = "Here are the daily sales from <span style = 'background-color: #dc2f54; color: white; padding: 3px;'>" . date("F j, Y", strtotime($this->input->post('from_date'))) . " to " . date("F j, Y", strtotime($this->input->post('to_date'))) . ".</span><br><a href='" . base_url() . "reports/daily_sales'>See daily sales for this week.</a>";
            } else {
                $daily = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%b %d, %Y') as sales_d, SUM(income) as income, SUM(items_sold) AS items_sold FROM sales WHERE status = 1 AND FROM_UNIXTIME(sales_date, '%Y') = '" . date('Y') . "' AND FROM_UNIXTIME(sales_date, '%u') = '" . date('W') . "' GROUP BY sales_d ORDER BY sales_date DESC");

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
                $weekly = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%b %d, %Y') AS sales_date, SUM(income) AS income, SUM(items_sold) AS items_sold FROM sales WHERE status = 1 AND FROM_UNIXTIME(sales_date, '%Y') = " . $this->input->post('year') . " AND FROM_UNIXTIME(sales_date, '%b') = '" .  $this->input->post('month') . "' GROUP BY WEEK(FROM_UNIXTIME(sales_date)) ORDER BY sales_date ASC");

                $subtitle = "Here are the weekly sales for the month of <span style = 'background-color: #dc2f54; color: white; padding: 3px;'>" . date('F', strtotime($this->input->post('month'))) . ", " . $this->input->post('year') . ".</span><br><a href='" . base_url() . "reports/weekly_sales'>See the latest weekly sales for the month.</a>";
            } else {
                $weekly = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%b %d, %Y') AS sales_date, SUM(income) AS income, SUM(items_sold) AS items_sold FROM sales WHERE status = 1 AND FROM_UNIXTIME(sales_date, '%Y') = " . date('Y') . " AND FROM_UNIXTIME(sales_date, '%b') = '" . date('M') . "' GROUP BY WEEK(FROM_UNIXTIME(sales_date)) ORDER BY sales_date ASC");

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
                $monthly = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%M') AS sales_month, SUM(income) AS income, SUM(items_sold) as items_sold FROM sales WHERE status = 1 AND FROM_UNIXTIME(sales_date, '%Y') = '" . $this->input->post('year') . "' GROUP BY sales_month ORDER BY sales_date");

                $subtitle = "Here are the monthly sales in <span style = 'background-color: #dc2f54; color: white; padding: 3px;'>" . $this->input->post('year') . ".</span><br><a href='" . base_url() . "reports/monthly_sales'>See the latest monthly sales.</a>";
            } else {
                $monthly = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%M') AS sales_month, SUM(income) AS income, SUM(items_sold) as items_sold FROM sales WHERE status = 1 AND FROM_UNIXTIME(sales_date, '%Y') = '" . date('Y') . "' GROUP BY sales_month ORDER BY sales_date");

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
                $annual = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%Y') as sales_y, SUM(income) AS income, SUM(items_sold) AS items_sold FROM sales WHERE status = 1 GROUP BY sales_y ORDER BY sales_date DESC LIMIT " . $this->input->post('year'));

                $subtitle = "Here are the here are the annual sales for the last <span style = 'background-color: #dc2f54; color: white; padding: 3px;'>" . $this->input->post('year') . " years.</span><br><a href='" . base_url() . "reports/annual_sales'>See the latest annual sales.</a>";

                $no_fetched_msg = "<center><h3><br><br><br><hr><br>There are no annual sales recorded for the selected number of years.</h3><br></center><br><br></div>";
            } else {
                $annual = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%Y') as sales_y, SUM(income) AS income, SUM(items_sold) AS items_sold FROM sales WHERE status = 1 GROUP BY sales_y ORDER BY sales_date DESC");

                $subtitle = "Here are the latest sales per year.";
                $no_fetched_msg = "<center><h3><br><br><br><hr><br>There are no annual sales recorded.</h3><br></center><br><br></div>";
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
            $dropdown_brand = $this->item_model->getDistinct('product', 'status = 1', 'product_brand', 'product_name', 'ASC');
            $dropdown_date = $this->item_model->getDistinct('product', 'status = 1', "FROM_UNIXTIME(added_at, '%b %d, %Y') AS date_acq", 'added_at', 'DESC');
            $html_tags = array("<center><h3><hr><br>", "</h3><br></center><br><br>");

            if(isset($_POST['filter'])) {
                $sorted_by = $this->input->post('sort_inventory');
                if($this->input->post('filter_inventory') == "product_brand") {
                    $inventory = $this->db->query("SELECT product_id, product_name, product_brand, product_quantity, product_price, added_at FROM product WHERE status = 1 AND product_brand = '" . $this->input->post('select_f') . "' ORDER BY $sorted_by");
                    $if_none = "There's no inventory report available for " . ucwords($this->input->post('select_f')) . ".";
                } elseif ($this->input->post('filter_inventory') == "product_price" OR $this->input->post('filter_inventory') == "product_quantity") {
                    $value = explode("-", $this->input->post('select_f'));
                    $above_or_not = ($value[1] == 500000) ? "above" : $value[1];
                    $inventory = $this->db->query("SELECT product_id, product_name, product_brand, product_quantity, product_price, added_at FROM product WHERE status = 1 AND " . $this->input->post('filter_inventory') . " BETWEEN " . $value[0] . " AND " . $value[1] . " ORDER BY $sorted_by");
                    $if_none = ($this->input->post('filter_inventory') == "product_price") ? "There's no inventory report available for the product price range of " . $value[0] . " - " . $above_or_not . "." : "There's no inventory report available for the product stock range of " . $value[0] . " - " . $above_or_not . ".";
                } elseif ($this->input->post('filter_inventory') == "added_at") {
                    $inventory = $this->db->query("SELECT product_id, product_name, product_brand, product_quantity, product_price, added_at FROM product WHERE status = 1 AND FROM_UNIXTIME(added_at, '%b %d, %Y') = '" . $this->input->post('select_f') . "' ORDER BY $sorted_by");
                    $if_none = "There's no inventory report available for the date " . $this->input->post('select_f') . ".";
                } elseif ($this->input->post('filter_inventory') == "all") {
                    $inventory = $this->db->query("SELECT product_id, product_name, product_brand, product_quantity, product_price, added_at FROM product WHERE status = 1 ORDER BY $sorted_by");
                    $if_none = "There are no inventory records available.";
                }
            } else {
                $sorted_by = "product_name";
                $inventory = $this->db->query("SELECT product_id, product_name, product_brand, product_quantity, product_price, added_at FROM product WHERE status = 1 ORDER BY $sorted_by");
                $if_none = "There are no inventory records available.";
            }

            $data = array(
                'title' => 'Inventory Report',
                'heading' => 'Inventory',
                'inventory' => $inventory->result(),
                'dropdown_brand' => $dropdown_brand,
                'dropdown_date' => $dropdown_date,
                'sorted_by' => $sorted_by,
                'if_none' => $if_none,
                'html_tags' => $html_tags
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
            $this->db->select(array("customer_id", "username", "email", "lastname", "firstname", "image"));
            $customer = $this->item_model->fetch("customer", "status = 1", "username", "ASC");

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

    public function populate_sales() {
        $data = array(
            'sales_detail' => "No items were purchased this day.",
            'income' => 0.00,
            'sales_date' => strtotime("April 1, 2018"),
            'admin_id' => NULL,
            'order_id' => NULL
        );
        $this->item_model->insertData('sales', $data);
    }

}
