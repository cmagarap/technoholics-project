<?php
class Forecasting extends CI_Controller {
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
        if (!$this->session->userdata('month_session') AND !$this->session->userdata('year_session')) {
            $this->db->distinct();
            $this->db->select("FROM_UNIXTIME(sales.sales_date, '%Y') AS sales_year");
            $year_for_dropdown = $this->item_model->fetch('sales', 'status = 1', 'sales_date', 'DESC');
            $this->db->select(array("date_forecasted", "forecasted_income"));
            $forecast = $this->item_model->fetch('forecast', "FROM_UNIXTIME(date_forecasted, '%Y') = 2018", 'date_forecasted', 'ASC');
        } else {
            $month = $this->session->userdata('month_session');
            $year = $this->session->userdata('year_session');
            $this->db->distinct();
            $this->db->select("FROM_UNIXTIME(sales.sales_date, '%Y') AS sales_year");
            $year_for_dropdown = $this->item_model->fetch('sales', 'status = 1', 'sales_date', 'DESC');
            $this->db->select(array("date_forecasted", "forecasted_income"));
            $forecast = $this->item_model->fetch('forecast', "FROM_UNIXTIME(date_forecasted, '%Y') = $year AND FROM_UNIXTIME(date_forecasted, '%m') BETWEEN 01 AND $month", 'date_forecasted', 'ASC');
        }

        $data = array(
            'title' => 'Sales Forecasting',
            'heading' => 'Forecasting',
            'years' => $year_for_dropdown,
            'forecast' => $forecast
        );

        $this->load->view("paper/includes/header", $data);
        $this->load->view("paper/includes/navbar");
        $this->load->view("paper/sales_forecasting/forecasting");
        $this->load->view("paper/includes/footer");
    }

    public function forecast_exec() {
        error_reporting(0); // for trying to get a non-propert etc, remove if you want to check for errors!
        $this->form_validation->set_rules('year', "Please select a year.", "required");
        $this->form_validation->set_rules('month', "Please select a month.", "required");
        $this->form_validation->set_message('required', '{field}');

        if ($this->form_validation->run()) {
            // month and user that the admin wants to predict
            
            $this->session->set_userdata('month_session', $this->input->post('month'));
            $this->session->set_userdata('year_session', $this->input->post('year'));
            
            $month_to_predict = strtotime($this->input->post('year') . "-" . $this->input->post('month'));
            $format = date('m-Y', $month_to_predict);

            $first_month_date = date('m-Y', strtotime('-1 months', strtotime($this->input->post('year') . "-" . $this->input->post('month'))));
            $second_month_date = date('m-Y', strtotime('-2 months', strtotime($this->input->post('year') . "-" . $this->input->post('month'))));
            $third_month_date = date('m-Y', strtotime('-3 months', strtotime($this->input->post('year') . "-" . $this->input->post('month'))));

        // for the first past month
            $this->db->select("SUM(income) as income");
            $sales_first_month = $this->item_model->fetch('sales', "FROM_UNIXTIME(sales_date,'%m-%Y') = '$first_month_date' AND status = 1")[0];
            $this->db->select("forecasted_income");
            $forecasted_first_month = $this->item_model->fetch('forecast', "FROM_UNIXTIME(date_forecasted, '%m-%Y') = '$first_month_date'")[0];
            $first_month = $sales_first_month->income ? $sales_first_month->income : $forecasted_first_month->forecasted_income;

        // for the second past month
            $this->db->select("SUM(income) as income");
            $sales_second_month = $this->item_model->fetch('sales', "FROM_UNIXTIME(sales_date,'%m-%Y') = '$second_month_date' AND status = 1")[0];
            $this->db->select("forecasted_income");
            $forecasted_second_month = $this->item_model->fetch('forecast', "FROM_UNIXTIME(date_forecasted,'%m-%Y') = '$second_month_date'")[0];
            $second_month = $sales_second_month->income? $sales_second_month->income : $forecasted_second_month->forecasted_income;

        // for the third past month
            $this->db->select("SUM(income) as income");
            $sales_third_month = $this->item_model->fetch('sales', "FROM_UNIXTIME(sales_date,'%m-%Y') = '$third_month_date' AND status = 1")[0];
            $this->db->select("forecasted_income");
            $forecasted_third_month = $this->item_model->fetch('forecast', "FROM_UNIXTIME(date_forecasted, '%m-%Y') = '$third_month_date'")[0];
            $third_month = $sales_third_month->income ? $sales_third_month->income : $forecasted_third_month->forecasted_income;

            if($first_month && $second_month && $third_month) {
                // Moving average formula

                $summation = $first_month + $second_month + $third_month;

                $forecasted_income = ($summation) / 3;

                $for_log = array(
                    "admin_id" => $this->session->uid,
                    "user_type" => $this->session->userdata('type'),
                    "username" => $this->session->userdata('username'),
                    "date" => time(),
                    "action" => 'Forecasted sales income for ' . date("M y", $month_to_predict),
                    'status' => '1'
                );

                $condition = $this->item_model->fetch('forecast', "FROM_UNIXTIME(date_forecasted,'%m-%Y') = '$format'");

                if ($condition) {
                    $data = array(
                        "forecasted_income" => $forecasted_income,
                        "date_forecasted" => $month_to_predict,
                        "updated_at" => time(),
                    );
                    $action = $this->item_model->updatedata('forecast', $data, "FROM_UNIXTIME(date_forecasted,'%m-%Y') = '$format'");
                }

                else {
                    $data = array(
                        "forecasted_income" => $forecasted_income,
                        "date_forecasted" =>  $month_to_predict,
                        "added_at" => time(),
                    );
                    $action = $this->item_model->insertData('forecast', $data);
                }

                $this->item_model->insertData('user_log', $for_log);
                $statusMsg = $action ? 'The date has been successfully forcasted.' : 'Some problem occured, please try again.';
                $this->session->set_flashdata('statusMsg', $statusMsg);
                redirect("forecasting");
            } else {
                $this->session->set_flashdata('error', 'Insufficient historical data.');
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function sales() {
        $newdate = date('m-Y', strtotime('-1 months', strtotime("2018-05"))); 
        echo $newdate;
    }

    public function getForecasts_dashboard() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            $this->db->select(array('FROM_UNIXTIME(date_forecasted, "%M") as df', 'forecasted_income'));
            $forecast = $this->item_model->fetch('forecast',"FROM_UNIXTIME(date_forecasted,'%Y') = 2018",'date_forecasted','ASC');
            print json_encode($forecast);
        } else {
            redirect('home');
        }
    }

    public function getForecasts_spec() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');

            if (!$this->session->userdata('month_session') AND !$this->session->userdata('year_session')) {
                $this->db->select(array('FROM_UNIXTIME(date_forecasted, "%M") as df', 'forecasted_income'));
                $forecast = $this->item_model->fetch('forecast',"FROM_UNIXTIME(date_forecasted,'%Y') = 2018",'date_forecasted','ASC');
            } else {
                $month = $this->session->userdata('month_session');
                $year = $this->session->userdata('year_session');
                $this->db->select(array('FROM_UNIXTIME(date_forecasted, "%M") as df', 'forecasted_income'));
                $forecast = $this->item_model->fetch('forecast', "FROM_UNIXTIME(date_forecasted, '%Y') = $year AND FROM_UNIXTIME(date_forecasted, '%m') BETWEEN 01 AND $month", 'date_forecasted', 'ASC');
            }

            print json_encode($forecast);
        } else {
            redirect('home');
        }
    }
}