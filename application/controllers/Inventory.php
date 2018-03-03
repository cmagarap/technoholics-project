<?php

class Inventory extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('form');
        if (!$this->session->has_userdata('isloggedin')) {
            $this->session->set_flashdata("error", "You must login first to continue.");
            redirect('/login');
        }
    }

    public function index() {
        redirect('inventory/page');
    }

    public function page() {
        $this->load->library('pagination');
        $perpage = 20;
        $config['base_url'] = base_url() . "inventory/page";
        $config['per_page'] = $perpage;
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = ' </ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url'] = '';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $config['total_rows'] = $this->item_model->getCount('product', array("status" => 1));
            $this->pagination->initialize($config);
            $products = $this->item_model->getItemsWithLimit('product', $perpage, $this->uri->segment(3), 'product_name', 'ASC', array("status" => 1));

            $data = array(
                'title' => 'Product Inventory',
                'heading' => 'Inventory',
                'products' => $products,
                'links' => $this->pagination->create_links()
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/inventory/inventory");
            $this->load->view("paper/includes/footer");
        } else {
            redirect("home/");
        }
    }

    public function view() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $product = $this->item_model->fetch('product', 'product_id = ' . $this->uri->segment(3) . ' AND status = 1');
            if($product) {
                $order_items = $this->item_model->fetch('order_items', array('product_id' => $this->uri->segment(3)));
                if ($order_items) {
                    foreach ($order_items as $order_item) {
                        $this->db->select(array("customer_id", "transaction_date"));
                        $orders = $this->item_model->fetch("orders", array("order_id" => $order_item->order_id));
                        foreach ($orders as $order) {
                            $customer[] = $this->item_model->fetch("customer", array("customer_id" => $order->customer_id), NULL, NULL, 5);
                        }
                    }
                } else {
                    $customer = NULL;
                }

                $data = array(
                    'title' => "Inventory: View Product",
                    'heading' => "Inventory",
                    'products' => $product,
                    'buyers' => $customer
                );
                $this->load->view('paper/includes/header', $data);
                $this->load->view("paper/includes/navbar");
                $this->load->view('paper/inventory/view');
                $this->load->view('paper/includes/footer');
            } else {
                redirect('inventory');
            }
        } else {
            redirect('home');
        }
    }

    public function add_product() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $supplier = $this->item_model->fetch("supplier", NULL, "company_name", "ASC");
            $category = $this->item_model->fetch("category", NULL, "category", "ASC");
            $brand = $this->item_model->fetch("brand", NULL, "brand_name", "ASC");
            $data = array(
                'title' => 'Inventory: Add Product',
                'heading' => 'Inventory',
                'supplier' => $supplier,
                'category' => $category,
                'brand' => $brand
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view('paper/inventory/add_product');
            $this->load->view('paper/includes/footer');
        } else {
            redirect('home');
        }
    }

    public function add_product_exec() {
        $this->form_validation->set_rules('product_name', "Please put the product name.", "required");
        $this->form_validation->set_rules('product_price', "Please put the product price.", "required|numeric");
        $this->form_validation->set_rules('product_quantity', "Please put the product quantity.", "required|numeric");
        $this->form_validation->set_rules('product_desc', "Please put a description for the product.", "required");
        $this->form_validation->set_message('required', '{field}');

        if ($this->form_validation->run()) {
            $config['encrypt_name'] = TRUE;
            $config['upload_path'] = './uploads_products/';
            $config['allowed_types'] = "gif|jpg|png|jpeg";
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
                $config2['source_image'] = './uploads_products/' . $dataInfo[$i];
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 75;
                $config2['height'] = 50;
                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();
                $this->image_lib->initialize($config2);
            }
            $brand_fetch = $this->item_model->fetch("brand", array("brand_id" => $this->input->post('product_brand')))[0];
            $category_fetch = $this->item_model->fetch("category", array("category_id" => $this->input->post('product_category')))[0];
            $data = array(
                'product_name' => trim($this->input->post('product_name', TRUE)),
                'product_brand' => $brand_fetch->brand_name,
                'product_category' => $category_fetch->category,
                'product_price' => $this->input->post('product_price', TRUE),
                'product_quantity' => $this->input->post('product_quantity', TRUE),
                'is_featured' => $this->input->post('is_featured', TRUE),
                'product_image1' => ($dataInfo[0]) ? $dataInfo[0] : "default-product.jpg",
                'product_image2' => ($dataInfo[1]) ? $dataInfo[1] : NULL,
                'product_image3' => ($dataInfo[2]) ? $dataInfo[2] : NULL,
                'product_image4' => ($dataInfo[3]) ? $dataInfo[3] : NULL,
                'added_at' => time(),
                'product_desc' => html_escape(trim($this->input->post('product_desc'))),
                'supplier_id' => $this->input->post("product_supplier"),
                'admin_id' => $this->session->uid,
                'category_id' => $this->input->post('product_category'),
                'brand_id' => $this->input->post('product_brand'),
            );

            $for_log = array(
                "admin_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Added product: ' . trim($this->input->post('product_name')),
                'status' => '1'
            );

            $insert = $this->item_model->insertData('product', $data);
            $this->item_model->insertData('user_log', $for_log);
            $statusMsg = $insert ? '<b>' . trim($this->input->post('product_name')) . '</b>' . ' has been added successfully.' : 'Some problem occured, please try again.';
            $this->session->set_flashdata('statusMsg', $statusMsg);
            redirect("inventory/page");
        } else {
            $this->add_product();
        }
    }

    public function edit_product() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $supplier = $this->item_model->fetch("supplier", "status = 1", "company_name", "ASC");
            $category = $this->item_model->fetch("category", "status = 1", "category", "ASC");
            $brand = $this->item_model->fetch("brand", "status = 1", "brand_name", "ASC");
            $product = $this->item_model->fetch('product', 'product_id = ' . $this->uri->segment(3) . ' AND status = 1');

            if($product) {
                $data = array(
                    'title' => "Inventory: Edit Product",
                    'heading' => "Inventory",
                    'products' => $product,
                    'supplier' => $supplier,
                    'category' => $category,
                    'brand' => $brand
                );
                $this->load->view('paper/includes/header', $data);
                $this->load->view("paper/includes/navbar");
                $this->load->view('paper/inventory/edit');
                $this->load->view('paper/includes/footer');
            } else {
                redirect("inventory");
            }
        } else {
            redirect("home/");
        }
    }

    public function edit_product_exec() {
        $this->form_validation->set_rules('product_name', "Please put the product name.", "required");
        $this->form_validation->set_rules('product_price', "Please put the product price.", "required|numeric");
        $this->form_validation->set_rules('product_quantity', "Please put the product quantity.", "required|numeric");
        $this->form_validation->set_rules('product_desc', "Please put a description for the product.", "required");
        $this->form_validation->set_message('required', '{field}');

        if ($this->form_validation->run()) {
            $config['encrypt_name'] = TRUE;
            $config['upload_path'] = './uploads_products/';
            $config['allowed_types'] = "gif|jpg|png|jpeg";
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
                $config2['source_image'] = './uploads_products/' . $dataInfo[$i];
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 75;
                $config2['height'] = 50;
                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();
                $this->image_lib->initialize($config2);
            }
            $brand_fetch = $this->item_model->fetch("brand", "brand_id = " . $this->input->post('product_brand'))[0];
            $category_fetch = $this->item_model->fetch("category", "category_id = " . $this->input->post('product_category'))[0];
            $this->db->select("product_image1");
            $image1_fetch = $this->item_model->fetch("product", "product_id = " . $this->input->post("product_id"))[0];
            $data = array(
                'product_name' => trim($this->input->post('product_name', TRUE)),
                'product_brand' => $brand_fetch->brand_name,
                'product_category' => $category_fetch->category,
                'product_price' => $this->input->post('product_price', TRUE),
                'product_quantity' => $this->input->post('product_quantity', TRUE),
                'is_featured' => $this->input->post('is_featured', TRUE),
                'product_image1' => ($dataInfo[0]) ? $dataInfo[0] : $image1_fetch->product_image1,
                'product_image2' => ($dataInfo[1]) ? $dataInfo[1] : NULL,
                'product_image3' => ($dataInfo[2]) ? $dataInfo[2] : NULL,
                'product_image4' => ($dataInfo[3]) ? $dataInfo[3] : NULL,
                'updated_at' => time(),
                'product_desc' => $this->input->post('product_desc'),
                'supplier_id' => $this->input->post("product_supplier"),
                'admin_id' => $this->session->uid,
                'category_id' => $this->input->post('product_category'),
                'brand_id' => $this->input->post('product_brand'),
            );

            $for_log = array(
                "admin_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Edited product #' . $this->uri->segment(3),
                'status' => '1'
            );

            $update = $this->item_model->updatedata("product", $data, array('product_id' => $this->uri->segment(3)));
            $this->item_model->insertData('user_log', $for_log);
            $statusMsg = $update ? '<b>' . trim($this->input->post('product_name')) . '</b>' . ' has been updated successfully.' : 'Some problem occured, please try again.';
            $this->session->set_flashdata('statusMsg', $statusMsg);

            redirect("inventory/page");
        } else {
            $this->edit_product();
        }
    }

    public function delete_product() {
        $this->db->select("product_name");
        $product_name = $this->item_model->fetch("product", "product_id = " . $this->uri->segment(3))[0];
        $update = $this->item_model->updatedata("product", array("status" => false), array('product_id' => $this->uri->segment(3)));
        $statusMsg = $update ? '<b>' . $product_name->product_name . '</b>' . ' has been deleted.' : 'Some problem occured, please try again.';
        $this->session->set_flashdata('statusMsg', $statusMsg);

        $for_log = array(
            "admin_id" => $this->session->uid,
            "user_type" => $this->session->userdata('type'),
            "username" => $this->session->userdata('username'),
            "date" => time(),
            "action" => 'Deleted product #' . $this->uri->segment(3),
            'status' => '1'
        );
        $this->item_model->insertData('user_log', $for_log);
        redirect("inventory/page");
    }

    public function recover_product() {
        $this->load->library('pagination');
        $perpage = 20;
        $config['base_url'] = base_url() . "inventory/recover_product";
        $config['per_page'] = $perpage;
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = ' </ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_url'] = '';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            $config['total_rows'] = $this->item_model->getCount('product', array("status" => 0));
            $this->pagination->initialize($config);
            $products = $this->item_model->getItemsWithLimit('product', $perpage, $this->uri->segment(3), 'product_name', 'ASC', array("status" => 0));
            $data = array(
                'title' => 'Inventory: Recover Items',
                'heading' => 'Inventory',
                'products' => $products,
                'links' => $this->pagination->create_links()
            );

            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/includes/navbar");
            $this->load->view("paper/inventory/recover");
            $this->load->view("paper/includes/footer");
        }
    }

    public function recover_product_exec() {
        $this->db->select("product_name");
        $product_name = $this->item_model->fetch("product", "product_id = " . $this->uri->segment(3))[0];
        $update = $this->item_model->updatedata("product", array("status" => 1), array('product_id' => $this->uri->segment(3)));
        $statusMsg = $update ? '<b>' . $product_name->product_name . '</b>' . ' has been recovered.' : 'Some problem occured, please try again.';
        $this->session->set_flashdata('statusMsg', $statusMsg);

        $for_log = array(
            "admin_id" => $this->session->uid,
            "user_type" => $this->session->userdata('type'),
            "username" => $this->session->userdata('username'),
            "date" => time(),
            "action" => 'Restored product #' . $this->uri->segment(3),
            'status' => '1'
        );
        $this->item_model->insertData('user_log', $for_log);
        redirect("inventory/recover_product");
    }

    public function getProductData() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            $data = $this->db->query("SELECT SUM(product_quantity) AS quan, product_brand FROM product WHERE status = 1 GROUP BY product_brand");
            print json_encode($data->result());
        } else {
            redirect("home");
        }
    }

    public function getProductViews() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            $this->db->select("product_id");
            $this->db->select("product_name");
            $this->db->select("no_of_views");
            $data = $this->item_model->fetch("product", "status = 1", "no_of_views", "DESC", 5);
            print json_encode($data);
        } else {
            redirect("home");
        }
    }

    public function getTimesBought() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            $this->db->select("product_id");
            $this->db->select("product_name");
            $this->db->select("times_bought");
            $data = $this->item_model->fetch("product", "status = 1", "times_bought", "DESC", 5);
            # SELECT product_id, product_name, times_bought WHERE status = 1 ORDER BY times_bought DESC LIMIT 5
            print json_encode($data);
        } else {
            redirect("home");
        }
    }

    public function getSearches() {
        if($this->session->userdata("type") == 1 OR $this->session->userdata("type") == 0) {
            header('Content-Type: application/json');
            $this->db->select("product_id");
            $this->db->select("product_name");
            $this->db->select("times_searched");
            $data = $this->item_model->fetch("product", "status = 1", "times_searched", "DESC", 5);
            print json_encode($data);
        } else {
            redirect("home");
        }
    }

    public function auto() {
        $output = '';
        $query = $this->item_model->search('product','status = 1 AND product_name', $_POST["query"]);
        $output = '<ul class="box list-unstyled" style="width:295px;">';
        if($query)
        {
            foreach($query as $query){
                $output .= '<li id="link" class="text-left" style="cursor:pointer;">'.$query->product_name.'</li>';
            }
        }
        else
        {
            $output .= '<li class="text-left" >Item Not Found</li>';
        }
        $output .= '</ul>';
        echo $output;
    }

}
