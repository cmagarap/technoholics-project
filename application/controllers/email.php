<?php

class Email extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('string');
    }

    function index() {
        $data = array('title' => "Email Message");
        $this->load->view('item/includes/header', $data);
        $this->load->view('summernote');
        $this->load->view('item/includes/footer');
    }

    function sendmail() {
        //This should be same as the smtp_user in the email config
        $this->email->from('veocalimlim@gmail.com', "Veyo");

        //Email recipient
        $this->email->to($this->input->post('receipient'));

        //Email Subject
        $this->email->subject($this->input->post('subject'));


        $data = array(
            'body' => $this->input->post('message'),
        );

        //Email Message Body
        $this->email->message($this->load->view('email/container', $data, true));

        // Sending of emails        
        if (!$this->email->send()) {
            //echo $this->email->print_debugger();
            echo json_encode(array('success' => 0));
        } else {
            echo json_encode(array('success' => 1));
        }
    }

}
