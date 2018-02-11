<?php

class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session'));
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function index() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            # These are the values when a user first visits the page. Should be changeable using dropdown or text input
            $daily = $this->db->query("SELECT *, FROM_UNIXTIME(sales_date, '%b %d, %Y') as sales_d, SUM(income) as income FROM `sales` WHERE status = 1 AND WEEK(FROM_UNIXTIME(SALES_DATE)) = " . date('W') . " GROUP BY sales_d ORDER BY sales_date DESC");
            echo date('W', strtotime("Jan 31, 2018"));
            # date("Y-m-d", strtotime("Feb 3, 2018"));
            $weekly = $this->db->query("SELECT *, FROM_UNIXTIME(sales_date, '%U') as sales_w, SUM(income) as income FROM `sales` WHERE status = 1 AND FROM_UNIXTIME(sales_date, '%Y') = 2018 GROUP BY WEEK(FROM_UNIXTIME(SALES_DATE))");
            $monthly = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%M') as sales_month, SUM(income) as income FROM `sales` WHERE status = 1 AND FROM_UNIXTIME(sales_date, '%Y') = 2017 GROUP BY sales_month ORDER BY sales_date ASC");
            $annual = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%Y') as sales_y, SUM(income) as income FROM `sales` WHERE status = 1 GROUP BY sales_y ORDER BY sales_y DESC");

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
                'title' => 'Business Reports',
                'heading' => 'Reports',
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
            $this->load->view("paper/reports/reports");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home/");
        }
    }

}
