<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/13/2017
 * Time: 7:30 PM
 */

class Technoholics404 extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->output->set_status_header('404');
        $data['content'] = 'error_404';
        $this->load->view('technoholics404', $data);
    }
}