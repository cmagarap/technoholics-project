<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/19/2017
 * Time: 1:15 PM
 */

class Sales extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
        if (!$this->session->has_userdata('isloggedin')) {
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

        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $config['total_rows'] = $this->item_model->getCount('sales', "status = 1");
            $this->pagination->initialize($config);
            $sales = $this->item_model->getItemsWithLimit('sales', $perpage, $this->uri->segment(3), 'sales_date', 'DESC', "status = 1");
            $data = array(
                'title' => 'Sales Management',
                'heading' => 'Sales Management',
                'sales' => $sales,
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
            $user_id = ($this->session->userdata("type") == 2) ? "customer_id" : "admin_id";
            $for_log = array(
                "$user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Deleted Sales #' . $this->uri->segment(3)
            );
            $this->item_model->insertData("user_log", $for_log);
            redirect("sales/page");
        }
    }
}