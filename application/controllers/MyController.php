<?php

class MyController extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            "title" => "Homepage",
            "content" => "This is homepage"
        );
        $this->load->view("mycontroller/includes/header", $data);
        $this->load->view("mycontroller/homepage");
        $this->load->view("mycontroller/includes/footer");
    }

    public function value2() {
        $data = array(
            "title" => "Value 2",
            "content" => "This is value 2"
        );
        $this->load->view("mycontroller/includes/header", $data);
        $this->load->view("mycontroller/homepage");
        $this->load->view("mycontroller/includes/footer");
    }

    public function form() {
        $data = array(
            "title" => "My Form",
        );
        $this->load->view("mycontroller/includes/header", $data);
        $this->load->view("mycontroller/form");
        $this->load->view("mycontroller/includes/footer");
    }

    public function formsubmit() {
        //condition to check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //to get the vaue of form
            $value = $this->input->post('val');

            //passing of POST data in a view
            $data = array(
                'title' => "My Form",
                'textinput' => $value
            );
            $this->load->view('mycontroller/fibonacci', $data);
        } else {
            $this->form(); // to call 'form' function
        }
    }

}
