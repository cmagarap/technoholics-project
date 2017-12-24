<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 12/19/2017
 * Time: 2:27 PM
 */
# This is just a random controller used for debugging, etc.
class Ordering extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/ads/front_slider');
        $this->load->view('ordering/ads/advantages');
        $this->load->view('ordering/ads/featured_products');
        $this->load->view('ordering/includes/footer');
    }

    public function category() {
        $this->load->view('ordering/includes/header');
        $this->load->view('ordering/includes/navbar');
        $this->load->view('ordering/category');
        $this->load->view('ordering/includes/footer');
    }
}
 ?>