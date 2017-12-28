<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/13/2017
 * Time: 9:00 PM
 */
# This is just a random controller used for debugging, etc.
class Random extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
    }

    public function index() {
        echo sha1('seej101')."<br>";
        echo sha1('customer')."<br>";
        echo sha1('vvilliam')."<br>";
        echo $this->uri->segment(1);
        # $this->session->sess_destroy();
        echo "sdgsd";
    }
}