<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/19/2017
 * Time: 1:15 PM
 */

date_default_timezone_set("Asia/Manila");
class Sales extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
        if (!$this->session->has_userdata('isloggedin')) {
            $this->session->set_flashdata("error", "You must login first to continue.");
            redirect('/login');
        }
    }

    public function index() {
        $this->page();
    }

    public function page() {
        $this->load->library('pagination');
        $perpage = 10;
        $config['base_url'] = base_url() . "sales/page";
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

        $date = $this->input->post('date') ? "Here are the list of sales for <span style = 'background-color: #dc2f54; color: white; padding: 3px;'>" . date("F j, Y", strtotime($this->input->post('date'))) . ".</span><br><a href = '". base_url() . "sales'>Click  here to view all recorded sales.</a>" : "Here are the overall sales of the business.";

        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $config['total_rows'] = $this->input->post('date') ? $this->item_model->getCount('sales', array('status' => 1, 'FROM_UNIXTIME(SALES_DATE,"%Y-%m-%d")' => $this->input->post('date'))) : $this->item_model->getCount('sales', 'status = 1');
            $this->pagination->initialize($config);
            $sales = $this->input->post('date')?$this->item_model->getItemsWithLimit('sales', $perpage, $this->uri->segment(3), 'sales_date', 'DESC', array( 'status' => 1, 'FROM_UNIXTIME(SALES_DATE,"%Y-%m-%d")' => $this->input->post('date'))):$this->item_model->getItemsWithLimit('sales', $perpage, $this->uri->segment(3), 'sales_date', 'DESC', array( 'status' => 1));
            $data = array(
                'title' => 'Sales Management',
                'heading' => 'Sales Management',
                'sales' => $sales,
                'date' => $date,
                'links' => $this->pagination->create_links()
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/sales/sales");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home/");
        }
    }

    public function delete() {
        $delete = $this->item_model->updatedata("sales", array("status" => 0), "sales_id = " . $this->uri->segment(3));
        if($delete) {
            $for_log = array(
                "admin_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Deleted Sales #' . $this->uri->segment(3)
            );
            $this->item_model->insertData("user_log", $for_log);
            redirect("sales/page");
        }
    }

    public function getSalesData() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            $data = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%c') as sales_month, SUM(income) as income FROM `sales` WHERE status = 1 AND FROM_UNIXTIME(sales_date, '%Y') = 2017 GROUP BY sales_month ORDER BY sales_date ASC");
            print json_encode($data->result());
        } else {
            redirect('home');
        }
    }

    public function getDailySales() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            $data = $this->db->query("SELECT FROM_UNIXTIME(sales_date, '%b-%d-%y') as sales_d, SUM(income) as income FROM sales WHERE status = 1 GROUP BY sales_d ORDER BY sales_id DESC LIMIT 5");
            print json_encode(array_reverse((array)$data->result()));
        } else {
            redirect('home');
        }
    }
}