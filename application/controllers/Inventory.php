<?php
    class Inventory extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('item_model');
            $this->load->library(array('session', 'form_validation'));
            $this->load->helper('form');
            if (!$this->session->has_userdata('isloggedin')) {
                redirect('/login');
            }
        }

        public function page() {
            $this->load->library('pagination');
            $perpage = 20;
            $config['base_url'] = base_url()."inventory/page";
            $config['per_page'] = $perpage;
            $config['full_tag_open'] = '<nav><ul class="pagination">';
            $config['full_tag_close']= ' </ul></nav>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['first_url']='';
            $config['last_link']='Last';
            $config['last_tag_open']='<li>';
            $config['last_tag_close']='</li>';
            $config['next_link']='&raquo;';
            $config['next_tag_open']='<li>';
            $config['next_tag_close']='</li>';
            $config['prev_link'] ='&laquo;';
            $config['prev_tag_open']='<li>';
            $config['prev_tag_close']='</li>';
            $config['cur_tag_open']='<li class="active"><a href="#">';
            $config['cur_tag_close']='</a></li>';
            $config['num_tag_open']='<li>';
            $config['num_tag_close']='</li>';

            if($this->session->userdata('type') == "General Manager" OR $this->session->userdata('type') == "Admin Assistant") {
                $config['total_rows'] = $this->item_model->getCount('product');
                $this->pagination->initialize($config);
                $products = $this->item_model->getItemsWithLimit('product', $perpage, $this->uri->segment(3), 'product_name', 'ASC', array("status" => 1));
                $data = array(
                    'title' => 'Inventory Management',
                    'heading' => 'Inventory',
                    'products' => $products,
                    'links' => $this->pagination->create_links()
                );

                $this->load->view("paper/includes/header", $data);
                $this->load->view("paper/inventory/inventory");
                $this->load->view("paper/includes/footer");
            }
        }

        public function product() {
            $allvalues = $this->item_model->fetch('product', array("status" => true));

            $data = array(
                'title' => "Product Management",
                'products' => $allvalues
            );

            $this->load->view('management/includes/header', $data);
            $this->load->view('management/product_manage');
            $this->load->view('management/includes/footer');
        }

        public function edit() {
            $product = $this->item_model->fetch('product', array('product_id' => $this->uri->segment(3)));
            $data = array(
                'title' => "Edit Product",
                'heading' => "Inventory",
                'products' => $product
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view('paper/inventory/edit');
            $this->load->view('paper/includes/footer');
        }

        public function view() {
            $product = $this->item_model->fetch('product', array('product_id' => $this->uri->segment(3)));

            $data = array(
                'title' => "View Product",
                'heading' => "Inventory",
                'products' => $product
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view('paper/inventory/view');
            $this->load->view('paper/includes/footer');
        }

        public function updateproduct() {
            $data = array(
                'product_name' => $this->input->post('product_name'),
                'product_desc' => $this->input->post('product_desc'),
                'product_price' => $this->input->post('product_price'),
                'updated_at' => time()
            );

            $this->item_model->updatedata("product",$data, array('product_id' => $this->uri->segment(3)));

            redirect("management/product");
        }

        public function delete_product() {
            $this->item_model->updatedata("product", array("status" => false), array('product_id' => $this->uri->segment(3)));
            redirect("inventory/page");
        }

        public function addproduct() {
            $data = array('title' => 'Add Products');

            $config['encrypt_name'] = TRUE;
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = "gif|jpg|png";
            $config['max_size'] = 0;
            $this->load->library('upload', $config);

            //Setting up rules
            //Format : Post/Get Variable Name , "Reference Name" , Rules
            $this->form_validation->set_rules('productname', "Please put a product name.", "required");
            $this->form_validation->set_rules('productprice', "Please put a product price.", "required|numeric");
            $this->form_validation->set_rules('productquantity', "Please put a product quantity.", "required|numeric");
            $this->form_validation->set_rules('productdesc', "Please put a product description.", "required");
            if (!$this->upload->do_upload('userfile')) {
                //$error = array('error' => $this->upload->display_errors());
                $this->form_validation->set_rules('userfile', $this->upload->display_errors(), 'required');
            }
            $this->form_validation->set_message('required', '{field}');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('management/includes/header', $data);
                $this->load->view('management/addproduct');
                $this->load->view('management/includes/footer');
            } else {

                $image = $this->upload->data('file_name');
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = './uploads/' . $image;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 600;
                $config2['height'] = 450;

                $this->load->library('image_lib');
                $this->image_lib->resize();
                $this->image_lib->initialize($config2);

                $data = array(
                    'product_name' => $this->input->post('productname'),
                    'product_price' => $this->input->post('productprice'),
                    'product_quantity' => $this->input->post('productquantity'),
                    'product_category' => $this->input->post('productcategory'),
                    'product_image' => $image,
                    'added_at' => time(),
                    'product_desc' => $this->input->post('productdesc'),
                    'status' => '1'
                );
                $this->item_model->insertData('product', $data);
                redirect("management/addproduct");
            }
        }
    }
?>