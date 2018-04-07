<?php

class confirm extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
    }

    public function update() {
        $value = 1;
        $code = $this->uri->segment(3);
        $data = array(
            'is_verified' => $value,
        );
        $this->item_model->updatedata("customer", $data, array('verification_code' => $code));
        $this->session->set_userdata('statusMsg', "You have successfully verified your email!");
        redirect("login");
    }

}

?>
