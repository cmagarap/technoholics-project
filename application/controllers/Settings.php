<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/19/2017
 * Time: 1:11 PM
 */

date_default_timezone_set("Asia/Manila");

class Settings extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->helper(array('file', 'download', 'form'));
        $this->load->library(array('session', 'form_validation', 'zip'));
        if (!$this->session->has_userdata('isloggedin')) {
            $this->session->set_flashdata("error", "You must login first to continue.");
            redirect('/login');
        }
    }

    public function index() {
        if ($this->session->userdata("type") == 0 OR $this->session->userdata("type") == 1) {
            $category = $this->item_model->fetch("category", array("status" => 1), "category", "ASC");
            $brand = $this->item_model->fetch("brand", array("status" => 1), "brand_name", "ASC");
            $supplier = $this->item_model->fetch("supplier", array("status" => 1), "company_name", "ASC");
            $shipper = $this->item_model->fetch("shipper", array("status" => 1), "shipper_name", "ASC");
            $content = $this->item_model->fetch("content", array("content_id" => 1))[0];

            $data = array(
                'title' => 'Settings',
                'heading' => 'Settings',
                'category' => $category,
                'brand' => $brand,
                'supplier' => $supplier,
                'shipper' => $shipper,
                'content' => $content
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/settings');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("home");
        }
    }

    public function database_backup() {
        $this->load->dbutil();
        $db_format = array('format' => 'zip', 'filename' => 'itemdb_backup.sql');
        $backup = & $this->dbutil->backup($db_format);
        $dbname = 'backup-on' . date('Y-m-d') . '.zip';
        $save = 'export/db_backup' . $dbname;
        write_file($save, $backup);
        force_download($dbname, $backup);
    }

    public function edit_images() {
        //if ($this->form_validation->run()) {
        $this->form_validation->set_rules('filediv', "Please put an image here.", "required");
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
            'image_1' => $dataInfo[0],
            'image_2' => $dataInfo[1],
            'image_3' => $dataInfo[2]
        );

        $this->item_model->updatedata("content", $data);
        redirect("settings");

        //}
    }

    public function add_category() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Settings: Add Category',
                'heading' => 'Category'
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/add_category');
            $this->load->view('paper/includes/footer');
        }
    }

    public function add_category_exec() {
        $this->form_validation->set_rules('category_name', "Please put the category name.", "required");

        if ($this->form_validation->run()) {
            $data = array(
                'category' => html_escape(trim($this->input->post('category_name')))
            );
            $insert = $this->item_model->insertData('category', $data);
            redirect("settings");
        } else {
            $this->add_category();
        }
    }

    public function edit_category() {
        $category = $this->item_model->fetch("category", array('category_id' => $this->uri->segment(3)), "category", "ASC");
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Cms: Edit Category',
                'heading' => 'Category',
                'category' => $category
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/edit_category');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("settings");
        }
    }

    public function edit_category_exec() {
        $this->form_validation->set_rules('category_name', "Please put the category name.", "required");


        if ($this->form_validation->run()) {
            $data = array(
                'category' => html_escape(trim($this->input->post('category_name')))
            );
            $this->item_model->updatedata("category", $data, array('category_id' => $this->uri->segment(3)));
            redirect("settings");
        } else {
            $this->edit_category();
        }
    }

    public function delete_category() {
        $this->item_model->updatedata("category", array("status" => false), array('category_id' => $this->uri->segment(3)));

        redirect("settings");
    }

    public function add_brand() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Settings: Add Brand',
                'heading' => 'Brand'
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/add_brand');
            $this->load->view('paper/includes/footer');
        }
    }

    public function add_brand_exec() {
        $this->form_validation->set_rules('brand_name', "Please put the brand name.", "required");

        if ($this->form_validation->run()) {
            $data = array(
                'brand_name' => html_escape(trim($this->input->post('brand_name')))
            );
            $insert = $this->item_model->insertData('brand', $data);
            redirect("settings");
        } else {
            $this->add_brand();
        }
    }

    public function edit_brand() {
        $brand = $this->item_model->fetch("brand", array('brand_id' => $this->uri->segment(3)), "brand_name", "ASC");
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Cms: Edit Category',
                'heading' => 'Brand',
                'brand_name' => $brand
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/edit_brand');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("settings");
        }
    }

    public function edit_brand_exec() {
        $this->form_validation->set_rules('brand_name', "Please put the brand name.", "required");


        if ($this->form_validation->run()) {
            $data = array(
                'brand_name' => html_escape(trim($this->input->post('brand_name')))
            );
            $this->item_model->updatedata("brand", $data, array('brand_id' => $this->uri->segment(3)));
            redirect("settings");
        } else {
            $this->edit_category();
        }
    }

    public function delete_brand() {
        $this->item_model->updatedata("brand", array("status" => false), array('brand_id' => $this->uri->segment(3)));

        redirect("settings");
    }

    public function add_supplier() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Settings: Add Supplier',
                'heading' => 'Supplier'
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/add_supplier');
            $this->load->view('paper/includes/footer');
        }
    }

    public function add_supplier_exec() {
        $this->form_validation->set_rules('supplier_name', "Please put the supplier name.", "required");

        $this->form_validation->set_rules('contact_number', "Please put the contact_number.", "required|numeric");

        $this->form_validation->set_rules('address', "Please put the address.", "required");

        if ($this->form_validation->run()) {
            $data = array(
                'company_name' => html_escape(trim($this->input->post('supplier_name'))),
                'contact_no' => html_escape($this->input->post('contact_number')),
                'address' => html_escape(trim($this->input->post('address')))
            );
            $insert = $this->item_model->insertData('supplier', $data);
            redirect("settings");
        } else {
            $this->add_supplier();
        }
    }

    public function edit_supplier() {
        $supplier = $this->item_model->fetch("supplier", array('supplier_id' => $this->uri->segment(3)), "company_name", "ASC");
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Cms: Edit Category',
                'heading' => 'Brand',
                'company_name' => $supplier
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/edit_supplier');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("settings");
        }
    }

    public function edit_supplier_exec() {
        $this->form_validation->set_rules('supplier_name', "Please put the supplier name.", "required");

        $this->form_validation->set_rules('contact_number', "Please put the contact_number.", "required|numeric");

        $this->form_validation->set_rules('address', "Please put the address.", "required");


        if ($this->form_validation->run()) {
            $data = array(
                'company_name' => html_escape(trim($this->input->post('supplier_name'))),
                'contact_no' => html_escape($this->input->post('contact_number')),
                'address' => html_escape(trim($this->input->post('address')))
            );
            $this->item_model->updatedata("supplier", $data, array('supplier_id' => $this->uri->segment(3)));
            redirect("settings");
        } else {
            $this->edit_supplier();
        }
    }

    public function delete_supplier() {
        $this->item_model->updatedata("supplier", array("status" => false), array('supplier_id' => $this->uri->segment(3)));

        redirect("settings");
    }

    public function add_shipper() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Settings: Add Shipper',
                'heading' => 'Shipper'
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/add_shipper');
            $this->load->view('paper/includes/footer');
        }
    }

    public function add_shipper_exec() {
        $this->form_validation->set_rules('shipper_name', "Please put the brand name.", "required");

        if ($this->form_validation->run()) {
            $data = array(
                'shipper_name' => html_escape(trim($this->input->post('shipper_name'))),
                'contact_no' => html_escape($this->input->post('contact_number'))
            );
            $insert = $this->item_model->insertData('shipper', $data);
            redirect("settings");
        } else {
            $this->add_brand();
        }
    }

    public function edit_shipper() {
        $shipper = $this->item_model->fetch("shipper", array('shipper_id' => $this->uri->segment(3)), "shipper_name", "ASC");
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Cms: Edit Category',
                'heading' => 'Shipper',
                'shipper_name' => $shipper
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/edit_shipper');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("settings");
        }
    }

    public function edit_shipper_exec() {
        $this->form_validation->set_rules('shipper_name', "Please put the supplier name.", "required");

        $this->form_validation->set_rules('contact_number', "Please put the contact_number.", "required|numeric");



        if ($this->form_validation->run()) {
            $data = array(
                'shipper_name' => html_escape(trim($this->input->post('shipper_name'))),
                'contact_no' => html_escape($this->input->post('contact_number'))
            );
            $this->item_model->updatedata("shipper", $data, array('shipper_id' => $this->uri->segment(3)));
            redirect("settings");
        } else {
            $this->edit_shipper();
        }
    }

    public function delete_shipper() {
        $this->item_model->updatedata("shipper", array("status" => false), array('shipper_id' => $this->uri->segment(3)));

        redirect("settings");
    }

    public function add_color_admin() {
        $content = $this->item_model->fetch("content", array("content_id" => 1));
        $data = array(
            'color_1' => $this->input->post("colorpicker")
        );
        $this->item_model->updatedata("content", $data, array('content_id' => 1));
        redirect("settings");
    }

    public function add_color_customer() {
        $content = $this->item_model->fetch("content", array("content_id" => 1));
        $data = array(
            'customer_color1' => $this->input->post("colorpicker")
        );
        $this->item_model->updatedata("content", $data, array('content_id' => 1));
        redirect("settings");
    }

    public function edit_logo() {
        //if ($this->form_validation->run()) {
        $this->form_validation->set_rules('filediv', "Please put an image here.", "required");
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
            'company_logo' => $dataInfo[0]
        );

        $this->item_model->updatedata("content", $data);
        redirect("settings");

        //}
    }

    public function edit_logo_icon() {
        //if ($this->form_validation->run()) {
        $this->form_validation->set_rules('filediv', "Please put an image here.", "required");
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
            'logo_icon' => $dataInfo[0]
        );

        $this->item_model->updatedata("content", $data);
        redirect("settings");
    }
}
