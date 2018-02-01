<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/19/2017
 * Time: 1:11 PM
 */
date_default_timezone_set("Asia/Manila");
class Cms extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library('session');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

  public function index() {
        if($this->session->userdata("type") == 0 OR $this->session->userdata("type") == 1) {
            $data = array('title' => "Admin Home", "heading" => "Cms");
            # print_r($_SESSION);
            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/cms');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("home");
        }
    }

    public function database_backup() {
        $this->load->dbutil();
        $db_format = array('format' => 'zip','filename' => 'itemdb_backup.sql');
        $backup =& $this->dbutil->backup($db_format);
        $dbname = 'backup-on'.date('Y-m-d').'.zip';
        $save = 'export/db_backup'.$dbname;
        write_file($save,$backup);
        force_download($dbname, $backup);
    }
}

