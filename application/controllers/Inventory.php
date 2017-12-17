<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/15/2017
 * Time: 10:15 AM
 */

class Inventory extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }
    public function page() {
        $this->load->library('pagination');
        $perpage = 20;
        $config['base_url'] = base_url()."inventory/page";
        $config['per_page'] = $perpage;
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close']= ' </ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url']='';
        $config['last_link']='Last';
        $config['last_tag_open']='<li>';
        $config['last_tag_close']='</li>';
        $config['next_link']='&raquo;';
        $config['next_tag_open']='<li>';
        $config['next_tag_close']='</li>';
        $config['prev_link'] ='&laquo;';
        $config['prev_tag_open']='<li>';
        $config['prev_tag_close']='</li>';
        $config['cur_tag_open']='<li class="active"><a href="#">';
        $config['cur_tag_close']='</a></li>';
        $config['num_tag_open']='<li>';
        $config['num_tag_close']='</li>';

        if($this->session->userdata('type') == "General Manager" OR $this->session->userdata('type') == "Admin Assistant") {
            $config['total_rows'] = $this->item_model->getCount('product');
            $this->pagination->initialize($config);
            $products = $this->item_model->getItemsWithLimit($perpage, $this->uri->segment(3), 'product_name', 'ASC', array("status" => 1));
            $data = array(
                'title' => 'Inventory Management',
                'heading' => 'Inventory',
                'products' => $products,
                'links' => $this->pagination->create_links()
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/inventory/inventory");
            $this->load->view("paper/includes/footer");
        }
    }
}