<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 2/18/2018
 * Time: 10:52 AM
 */

class Feedback extends CI_Controller {
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
        $this->session->set_userdata('feedback_date',$this->input->post('date'));
        $this->page();
    }

    public function page() {
        $this->load->library('pagination');
        $perpage = 10;
        $config['base_url'] = base_url() . "feedback/page";
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

        if ($this->session->userdata('feedback_date') || $this->session->userdata('feedback_date_filter')){
            $date = "Here are the customer feedback for <span style = 'background-color: #F3BB45; color: white; padding: 3px;'>" . date("F j, Y", strtotime( $display = $this->session->userdata('feedback_date') ? $this->session->userdata('feedback_date') : $this->session->userdata('feedback_date_filter'))) . ".</span><br><a href = '". base_url() . "feedback'>Click  here to view all feedback.</a>";
        }   
        else
        {
            $date = "Here are the overall feedback of the customers.";
        }

        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            if(isset($_POST['filter'])) {
                if($this->input->post('filter_star') != 0) {
                    $config['total_rows'] = ($this->session->userdata('feedback_date_filter')) ? $this->item_model->getCount('feedback', "status = 1 AND rating = '" . $this->input->post('filter_star') . "'AND FROM_UNIXTIME(added_at,'%Y-%m-%d') = '". $this->session->userdata('feedback_date_filter'). "'") : $this->item_model->getCount('feedback', "status = 1 AND rating = '" . $this->input->post('filter_star') . "'");
                    $this->pagination->initialize($config);

                    $feedback = ($this->session->userdata('feedback_date_filter')) ? $this->item_model->getItemsWithLimit('feedback', $perpage, $this->uri->segment(3), 'added_at', 'DESC', array('status' => 1, 'rating' => $this->input->post('filter_star'), 'FROM_UNIXTIME(added_at,"%Y-%m-%d")' => $this->session->userdata('feedback_date_filter'))) : $this->item_model->getItemsWithLimit('feedback', $perpage, $this->uri->segment(3), 'added_at', 'DESC', array('status' => 1, 'rating' => $this->input->post('filter_star')));

                    $f_star = $this->input->post('filter_star');
                } else {
                    goto filter_all;
                }
            }else {
                filter_all:
                $config['total_rows'] = ($this->session->userdata('feedback_date')) ? $this->item_model->getCount('feedback', array('status' => 1, 'FROM_UNIXTIME(added_at,"%Y-%m-%d")' => $this->session->userdata('feedback_date'))) : $this->item_model->getCount('feedback', 'status = 1');
                $this->pagination->initialize($config);

                $feedback = ($this->session->userdata('feedback_date')) ? ($this->item_model->getItemsWithLimit('feedback', $perpage, $this->uri->segment(3), 'added_at', 'DESC', array('status' => 1, 'FROM_UNIXTIME(added_at,"%Y-%m-%d")' => $this->session->userdata('feedback_date')))) : ($this->item_model->getItemsWithLimit('feedback', $perpage, $this->uri->segment(3), 'added_at', 'DESC', array('status' => 1)));

                $f_star = 'all';
            }

            $count_per_day = $this->db->query("SELECT COUNT(feedback) as feedback_count FROM feedback WHERE status = 1 GROUP BY FROM_UNIXTIME(added_at, '%Y-%M-%d')");
            $total = 0;
            foreach($count_per_day->result() as $count)
                $total += $count->feedback_count;
            $avg = (sizeof($count_per_day->result()) == 0) ? 0 : $total / sizeof($count_per_day->result());
            $deleted = $this->item_model->getCount('feedback', 'status = 0');
            $total_f = $this->item_model->getCount('feedback', 'status = 1');

            $star1Percent = $star2Percent = $star3Percent = $star4Percent = $star5Percent = 0;

            $star1 = $this->db->query("SELECT COUNT(rating) as count_rating FROM feedback where status = 1 AND rating = 1.0 GROUP BY rating");
            foreach($star1->result() as $s1)
                $star1Percent = ($s1->count_rating / $total_f) * 100;

            $star2 = $this->db->query("SELECT COUNT(rating) as count_rating FROM feedback where status = 1 AND rating = 2.0 GROUP BY rating");
            foreach($star2->result() as $s2)
                $star2Percent = ($s2->count_rating / $total_f) * 100;

            $star3 = $this->db->query("SELECT COUNT(rating) as count_rating FROM feedback where status = 1 AND rating = 3.0 GROUP BY rating");
            foreach($star3->result() as $s3)
                $star3Percent = ($s3->count_rating / $total_f) * 100;

            $star4 = $this->db->query("SELECT COUNT(rating) as count_rating FROM feedback where status = 1 AND rating = 4.0 GROUP BY rating");
            foreach($star4->result() as $s4)
                $star4Percent = ($s4->count_rating / $total_f) * 100;

            $star5 = $this->db->query("SELECT COUNT(rating) as count_rating FROM feedback where status = 1 AND rating = 5.0 GROUP BY rating");
            foreach($star5->result() as $s5)
                $star5Percent = ($s5->count_rating / $total_f) * 100;

            $frequently_rated = $this->db->query("SELECT product.product_name, COUNT(feedback.feedback) as feedback_count FROM feedback JOIN product ON feedback.product_id = product.product_id WHERE product.status = 1 AND FROM_UNIXTIME(feedback.added_at, '%Y-%m') = '" . date('Y-m') . "' AND feedback.status = 1 GROUP BY product.product_name ORDER BY feedback_count DESC LIMIT 10");

            $data = array(
                'title' => 'Feedback',
                'heading' => 'Feedback',
                'feedback' => $feedback,
                'date' => $date,
                'average' => $avg,
                'deleted' => $deleted,
                'total_f' => $total_f,
                'star1' => $star1Percent,
                'star2' => $star2Percent,
                'star3' => $star3Percent,
                'star4' => $star4Percent,
                'star5' => $star5Percent,
                'f_star' => $f_star,
                'f_rated' => $frequently_rated->result(),
                'links' => $this->pagination->create_links()
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/feedback/feedback");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home/");
        }
    }

    public function delete() {
        $delete = $this->item_model->updatedata("feedback", array("status" => 0), "feedback_id = " . $this->uri->segment(3));
        if($delete) {
            $for_log = array(
                "admin_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Cancelled order #' . $this->uri->segment(3)
            );
            $this->item_model->insertData("user_log", $for_log);
            # $this->item_model->updatedata("audit_trail", array("status" => 0), "order_id = " . $this->uri->segment(3));
            redirect("feedback");
        }
    }
}