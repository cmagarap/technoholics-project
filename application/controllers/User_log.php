<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/19/2017
 * Time: 10:53 AM
 */

class User_log extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function page() { # to be changed to page()
        $this->load->library('pagination');
        $perpage = 20;
        $config['base_url'] = base_url()."user_log/page";
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

        if($this->session->userdata('type') == "General Manager") {
            $config['total_rows'] = $this->item_model->getCount('user_log');
            $this->pagination->initialize($config);
            $logs = $this->item_model->getItemsWithLimit('user_log', $perpage, $this->uri->segment(3), 'log_id', 'DESC', array("status" => 1));
            $data = array(
                'title' => 'User Log Management',
                'heading' => 'User Log Management',
                'logs' => $logs,
                'links' => $this->pagination->create_links()
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/user_log/user_log");
            $this->load->view("paper/includes/footer");
        }
    }
}