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
            $data = array(
                'title' => 'Cms',
                'heading' => 'Cms'
            );
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


    public function edit_images() {
         //if ($this->form_validation->run()) {
                $config['encrypt_name'] = TRUE;
                $config['upload_path'] = './assets/ordering/img/';
                $config['allowed_types'] = "gif|jpg|png";
                $config['max_size'] = 0;
                $this->load->library('upload', $config);
                $dataInfo = array();
                $files = $_FILES;
                $cpt = count($_FILES['user_file']['name']);
                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['user_file']['name'] = $files['user_file']['name'][$i];
                    $_FILES['user_file']['type'] = $files['user_file']['type'][$i];
                    $_FILES['user_file']['tmp_name'] = $files['user_file']['tmp_name'][$i];
                    $_FILES['user_file']['error'] = $files['user_file']['error'][$i];
                    $_FILES['user_file']['size'] = $files['user_file']['size'][$i];

                    $this->upload->do_upload('user_file');
                    $dataInfo[] = $this->upload->data('file_name');
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './assets/ordering/img/' . $dataInfo[$i];
                    $config2['create_thumb'] = TRUE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['width'] = 75;
                    $config2['height'] = 50;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->resize();
                    $this->image_lib->initialize($config2);
                }
                 $data = array(
                       
                        'image_1' => ($dataInfo[0]) ? $dataInfo[0] : NULL,
                        'image_2' => ($dataInfo[1]) ? $dataInfo[1] : NULL,
                        'image_3' => ($dataInfo[2]) ? $dataInfo[2] : NULL
                        
                    );

                  $this->item_model->updatedata("home", $data);
                   redirect("cms");

            //}
    }
}

