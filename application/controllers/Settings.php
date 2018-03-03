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
        $this->load->helper(array('file', 'download', 'form', 'url'));
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
        if ($this->session->userdata("type") == 0) {
            $this->load->dbutil();
            $db_format = array('format' => 'zip', 'filename' => 'itemdb_backup.sql', 'add_insert' => TRUE, 'foreign_key_checks' => FALSE);
            $backup =& $this->dbutil->backup($db_format);
            $dbname = 'backup-on' . date('Y-m-d') . '.zip';
            $save = 'export/db_backup' . $dbname;
            write_file($save, $backup);
            force_download($dbname, $backup);
        } else {
            redirect('home');
        }
    }

    public function edit_images() {
        if ($this->session->userdata("type") == 0 OR $this->session->userdata("type") == 1) {
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
        } else {
            redirect('home');
        }
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
        } else {
            redirect('home');
        }
    }

    public function add_category_exec() {
        $this->form_validation->set_rules('category_name', "category", "required|is_unique[category.category]");
        $this->form_validation->set_message('required', 'Please put the {field}.');

        if ($this->form_validation->run()) {
            $data = array(
                'category' => trim($this->input->post('category_name', TRUE))
            );
            $insert = $this->item_model->insertData('category', $data);
            redirect("settings");
        } else {
            $this->add_category();
        }
    }

    public function edit_category() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $category = $this->item_model->fetch("category", array('category_id' => $this->uri->segment(3)), "category", "ASC");
            $data = array(
                'title' => 'Settings: Edit Category',
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
        $this->db->select('category');
        $category = $this->item_model->fetch('category', 'category_id = ' . $this->uri->segment(3))[0];
        if($category->category != $this->input->post('category_name', TRUE)) {
            $this->form_validation->set_rules('category_name', "category", "required|is_unique[category.category]");
        } else {
            $this->form_validation->set_rules('category_name', "category", "required");
        }
        $this->form_validation->set_message('required', 'Please put the {field}.');

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
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $this->item_model->updatedata("category", array("status" => 0), 'category_id = ' . $this->uri->segment(3));
            redirect("settings");
        } else {
            redirect('home');
        }
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
        } else {
            redirect('home');
        }
    }

    public function add_brand_exec() {
        $this->form_validation->set_rules('brand_name', "brand name", "required|is_unique[brand.brand_name]");
        $this->form_validation->set_message('required', 'Please put the {field}.');

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
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $brand = $this->item_model->fetch("brand", array('brand_id' => $this->uri->segment(3)), "brand_name", "ASC");
            $data = array(
                'title' => 'Settings: Edit Brand',
                'heading' => 'Brand',
                'brand_name' => $brand
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/edit_brand');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("home");
        }
    }

    public function edit_brand_exec() {
        $this->db->select('brand_name');
        $brand = $this->item_model->fetch('brand', 'brand_id = ' . $this->uri->segment(3))[0];
        if($brand->brand_name != $this->input->post('brand_name', TRUE)) {
            $this->form_validation->set_rules('brand_name', "brand", "required|is_unique[brand.brand_name]");
        } else {
            $this->form_validation->set_rules('brand_name', "brand", "required");
        }
        $this->form_validation->set_message('required', 'Please put the {field}.');

        if ($this->form_validation->run()) {
            $data = array(
                'brand_name' => trim($this->input->post('brand_name', TRUE))
            );
            $this->item_model->updatedata("brand", $data, array('brand_id' => $this->uri->segment(3)));
            redirect("settings");
        } else {
            $this->edit_brand();
        }
    }

    public function delete_brand() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $this->item_model->updatedata("brand", array("status" => 0), 'brand_id = ' . $this->uri->segment(3));
            redirect("settings");
        } else {
            redirect('home');
        }
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
        } else {
            redirect('home');
        }
    }

    public function add_supplier_exec() {
        $this->form_validation->set_rules('supplier_name', "supplier", "required|is_unique[supplier.company_name]");
        $this->form_validation->set_rules('contact_number', "contact number", "required|numeric");
        $this->form_validation->set_rules('address', "address", "required");
        $this->form_validation->set_message('required', 'Please put the {field}.');

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
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $supplier = $this->item_model->fetch("supplier", array('supplier_id' => $this->uri->segment(3)), "company_name", "ASC");
            $data = array(
                'title' => 'Settings: Edit Supplier',
                'heading' => 'Supplier',
                'company_name' => $supplier
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/edit_supplier');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("home");
        }
    }

    public function edit_supplier_exec() {
        $this->db->select('company_name');
        $supplier = $this->item_model->fetch('supplier', 'supplier_id = ' . $this->uri->segment(3))[0];
        if($supplier->company_name != $this->input->post('supplier_name', TRUE)) {
            $this->form_validation->set_rules('supplier_name', "supplier", "required|is_unique[supplier.company_name]");
        } else {
            $this->form_validation->set_rules('supplier_name', "supplier", "required");
        }

        $this->form_validation->set_rules('contact_number', "contact number", "required|numeric");
        $this->form_validation->set_rules('address', "address", "required");
        $this->form_validation->set_message('required', 'Please put the {field}.');

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
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $this->item_model->updatedata("supplier", array("status" => 0), 'supplier_id = ' . $this->uri->segment(3));
            redirect("settings");
        } else {
            redirect('home');
        }
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
        } else {
            redirect('home');
        }
    }

    public function add_shipper_exec() {
        $this->form_validation->set_rules('shipper_name', "shipper", "required|is_unique[shipper.shipper_name]");
        $this->form_validation->set_rules('contact_number', "contact number", "required");
        $this->form_validation->set_rules('shipping_price', "shipping price", "required");
        $this->form_validation->set_message('required', 'Please put the {field}.');

        if ($this->form_validation->run()) {
            $data = array(
                'shipper_name' => trim($this->input->post('shipper_name', TRUE)),
                'contact_no' => $this->input->post('contact_number', TRUE),
                'shipper_price' => $this->input->post('shipping_price', TRUE)
            );
            $insert = $this->item_model->insertData('shipper', $data);
            redirect("settings");
        } else {
            $this->add_shipper();
        }
    }

    public function edit_shipper() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $shipper = $this->item_model->fetch("shipper", 'shipper_id = ' . $this->uri->segment(3), "shipper_name", "ASC");
            $data = array(
                'title' => 'Settings: Edit Category',
                'heading' => 'Shipper',
                'shipper_name' => $shipper
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/settings/edit_shipper');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("home");
        }
    }

    public function edit_shipper_exec() {
        $this->db->select('shipper_name');
        $shipper = $this->item_model->fetch('shipper', 'shipper_id = ' . $this->uri->segment(3))[0];
        if($shipper->shipper_name != $this->input->post('shipper_name', TRUE)) {
            $this->form_validation->set_rules('shipper_name', "shipper name", "required|is_unique[shipper.shipper_name]");
        } else {
            $this->form_validation->set_rules('shipper_name', "shipper name", "required");
        }

        $this->form_validation->set_rules('contact_number', "contact number", "required|numeric");
        $this->form_validation->set_rules('shipping_price', "shipping price", "required|numeric");
        $this->form_validation->set_message('required', 'Please put the {field}.');

        if ($this->form_validation->run()) {
            $data = array(
                'shipper_name' => trim($this->input->post('shipper_name', TRUE)),
                'contact_no' => $this->input->post('contact_number', TRUE),
                'shipper_price' => $this->input->post('shipping_price', TRUE)
            );
            $this->item_model->updatedata("shipper", $data, 'shipper_id = ' . $this->uri->segment(3));
            redirect("settings");
        } else {
            $this->edit_shipper();
        }
    }

    public function delete_shipper() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $this->item_model->updatedata("shipper", array("status" => 0), 'shipper_id = ' . $this->uri->segment(3));
            redirect("settings");
        } else {
            redirect('home');
        }
    }

    public function add_color_admin() {
        # $content = $this->item_model->fetch("content", "content_id = 1");
        $data = array(
            'color_1' => $this->input->post("admin_colorpicker")
        );
        $this->item_model->updatedata("content", $data, 'content_id = 1');
        redirect("settings");
    }

    public function add_color_customer() {
        # $content = $this->item_model->fetch("content", "content_id = 1");
        $data = array(
            'customer_color1' => $this->input->post("customer_colorpicker")
        );
        $this->item_model->updatedata("content", $data, 'content_id = 1');
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

        $this->item_model->updatedata("content", $data, "content_id = 1");
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
