<?php
class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('form');
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function index() {

        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
          
          $daily = $this->item_model->fetch('sales', array( 'status' => 1, 'FROM_UNIXTIME(SALES_DATE,"%Y-%m-%d")' => date("Y-m-d")));
          $weekly = $this->item_model->fetch('sales', array( 'status' => 1, 'WEEK(FROM_UNIXTIME(SALES_DATE,"%Y-%m-%d"))' => date("W")));
          $monthly = $this->item_model->fetch('sales', array( 'status' => 1, 'FROM_UNIXTIME(SALES_DATE,"%Y-%m")' => date("Y-m")));
          $annually = $this->item_model->fetch('sales', array( 'status' => 1, 'FROM_UNIXTIME(SALES_DATE,"%Y")' => date("Y")));
          $dailytotal = $this->item_model->sum('sales', array( 'status' => 1, 'FROM_UNIXTIME(SALES_DATE,"%Y-%m-%d")' => date("Y-m-d")),'income');
          $weeklytotal = $this->item_model->sum('sales', array( 'status' => 1, 'WEEK(FROM_UNIXTIME(SALES_DATE,"%Y-%m-%d"))' => date("W")),'income');
          $monthlytotal = $this->item_model->sum('sales', array( 'status' => 1, 'FROM_UNIXTIME(SALES_DATE,"%Y-%m")' => date("Y-m")),'income');
          $annuallytotal = $this->item_model->sum('sales', array( 'status' => 1, 'FROM_UNIXTIME(SALES_DATE,"%Y")' => date("Y")),'income');
          
          $data = array(
                'title' => 'Business Reports',
                'heading' => 'Reports',
                'daily' => $daily,
                'weekly' => $weekly,
                'monthly' => $monthly,
                'annually' => $annually,
                'dailytotal' => $dailytotal,
                'weeklytotal' => $weeklytotal,
                'monthlytotal' => $monthlytotal,
                'annuallytotal' => $annuallytotal
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/Reports/Reports");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home/");
        }
    }
}
