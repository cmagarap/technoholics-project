<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 12/19/2017
 * Time: 2:27 PM
 */

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

    public function track() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $order_items = $this->item_model->fetch('order_items', array('order_id' => $this->uri->segment(3)));
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
            redirect('home');
        }
    }

    public function track_exec() {
        #$this->form_validation->set_rules('shipper', "Please put the  company.", "required");
        #$this->form_validation->set_rules('product_name', "Please put the product name.", "required");
        # $this->form_validation->set_rules('product_price', "Please put the product price.", "required|numeric");
        #$this->form_validation->set_message('required', '{field}');

        $data = array(
            "shipper_id" => $this->input->post("shipper"),
            # "delivery_date" =>
            "process_status" => $this->input->post("progress")
        );
        $this->item_model->updatedata("orders", $data, "order_id = " . $this->uri->segment(3));
        $order = $this->item_model->fetch("orders", "order_id = " . $this->uri->segment(3));
        $order = $order[0];
        if($order->process_status == 3) {
            $for_sales = array(
                "sales_detail" => "sales detail...",
                "income" => $order->total_price,
                "sales_date" => time(),
                "admin_id" => $this->session->uid
            );
            $this->item_model->insertData("sales", $for_sales);
            $this->item_model->updatedata("orders", array("status" => 0), "order_id = " . $this->uri->segment(3));
        }
        redirect("orders/");
    }
}
 ?>