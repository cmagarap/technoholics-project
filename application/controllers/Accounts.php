<?php
/**
 * Created by PhpStorm.
 * User: Seeeeej
 * Date: 12/19/2017
 * Time: 1:13 PM
 */

date_default_timezone_set("Asia/Manila");
class Accounts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation', 'session', 'email'));

        if (!$this->session->has_userdata('isloggedin')) {
            redirect('/login');
        }
    }

    public function index() {
        redirect('accounts/page');
    }

    public function page() {
        $this->load->library('pagination');
        $perpage = 20;
        $config['base_url'] = base_url() . "accounts/page";
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

        if ($this->session->userdata('type') == 0) {
            $config['total_rows'] = $this->item_model->getCount('admin', "access_level != 0 AND status = 1");
            $this->pagination->initialize($config);
            $accounts = $this->item_model->getItemsWithLimit('admin', $perpage, $this->uri->segment(3), 'admin_id', 'ASC', "access_level != 0 AND status = 1");

            $data = array(
                'title' => 'Accounts Management',
                'heading' => 'Accounts',
                'users' => $accounts, # $query->result()
                'links' => $this->pagination->create_links()
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/accounts/accounts");
            $this->load->view("paper/includes/footer");
        } else {
            redirect('home');
        }
    }

    public function customer() {
        $this->load->library('pagination');
        $perpage = 20;
        $config['base_url'] = base_url() . "accounts/customer";
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
            $config['total_rows'] = $this->item_model->getCount('customer', "status = 1");
            $this->pagination->initialize($config);
            $accounts = $this->item_model->getItemsWithLimit('customer', $perpage, $this->uri->segment(3), 'customer_id', 'ASC', "status = 1");

            $data = array(
                'title' => 'Accounts Management',
                'heading' => 'Accounts',
                'users' => $accounts, # $query->result()
                'links' => $this->pagination->create_links()
            );
            $this->load->view("paper/includes/header", $data);
            $this->load->view("paper/accounts/customers");
            $this->load->view("paper/includes/footer");
        } else {
            redirect('home');
        }
    }

    public function view() {
        if ($this->session->userdata('type') == 0 OR $this->session->userdata('type') == 1) {
            if($this->uri->segment(3) == "admin") {
                $account = $this->item_model->fetch('admin', array('admin_id' => $this->uri->segment(4)));
                $user_log = $this->item_model->fetch('user_log', array('user_id' => $this->uri->segment(4)), "log_id", "DESC", 8);
                $data = array(
                    'title' => "Accounts: View User Info",
                    'heading' => "Accounts",
                    'account' => $account,
                    'logs' => $user_log
                );
            }
            elseif($this->uri->segment(3) == "customer")
                $account = $this->item_model->fetch('customer', array('customer_id' => $this->uri->segment(4)));



            $this->load->view('paper/includes/header', $data);
            $this->load->view('paper/accounts/view');
            $this->load->view('paper/includes/footer');
        } else {
            redirect("home");
        }
    }

    public function add_account() {
        if (($this->session->userdata('type') == 0) OR ( $this->session->userdata('type') == 1)) {
            $data = array(
                'title' => 'Accounts: Add Account',
                'heading' => 'Accounts'
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view('paper/accounts/add_accounts');
            $this->load->view('paper/includes/footer');
        } else {
            redirect('home');
        }
    }

    public function add_account_exec() {
        $this->form_validation->set_rules('first_name', "first name", "required");
        $this->form_validation->set_rules('last_name', "last name", "required");
        $this->form_validation->set_rules('username', "username", "is_unique[accounts.username]");
        $this->form_validation->set_rules('password', "password", "required");
        $this->form_validation->set_rules('confirm_password', "password confirm", "required|matches[password]");
        $this->form_validation->set_rules('email', "email address", 'required|valid_email|is_unique[accounts.email]');
        $this->form_validation->set_message('required', 'Please enter your {field}.');

        if ($this->form_validation->run()) {
            $config['encrypt_name'] = TRUE;
            $config['upload_path'] = './uploads_users/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);
            $this->load->helper('string');
            $username = ($this->input->post('username') == "") ? NULL : trim($this->input->post('username'));
            $user_type = ($this->input->post('user_type') == "Admin Assistant") ? 1 : 0;
            $is_verified = ($user_type == 1) ? 1 : 0;
            $hash = random_string('alnum', 15);

            if ($this->upload->do_upload('user_image') == FALSE) {
                $image = "default-user.png";
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = './uploads_users/' . $image;
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 75;
                $config2['height'] = 50;
                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();
                $this->image_lib->initialize($config2);
            } else {
                $image = $this->upload->data('file_name');
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = './uploads_users/' . $image;
                $config2['create_thumb'] = TRUE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 75;
                $config2['height'] = 50;
                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();
                $this->image_lib->initialize($config2);
            }

            $data = array(
                'username' => $username,
                'password' => sha1($this->input->post('password')), # to be changed
                'firstname' => trim(ucwords($this->input->post('first_name'))),
                'lastname' => trim(ucwords($this->input->post('last_name'))),
                'email' => trim($this->input->post('email')),
                'registered_at' => time(),
                'access_level' => $user_type,
                'verification_code' => $hash,
                'image' => $image,
                'is_verified' => $is_verified
            );
            $for_log = array(
                "user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Added account: ' . trim($this->input->post('last_name')) . ", " . trim($this->input->post('first_name')),
                'status' => '1'
            );
            /* $this->email->from('veocalimlim@gmail.com', 'TECHNOHOLICS');
              $this->email->to($this->input->post('email'));

              $this->email->subject('Email Verification');

              $this->email->message($this->load->view('welcome_message', $data, true));

              if (!$this->email->send()) {
              $this->email->print_debugger();
              } */
            $this->item_model->insertData('accounts', $data);
            $this->item_model->insertData('user_log', $for_log);
            redirect("accounts/");
        } else {
            $this->add_account();
        }
    }

    public function edit() {
        if ($this->uri->segment(3) == "admin") {
            $admin = $this->item_model->fetch('admin', array('admin_id' => $this->uri->segment(4)));
            $data = array(
                'title' => "Accounts: Edit Admin",
                'heading' => "Accounts",
                'accounts' => $admin
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view('paper/accounts/edit');
            $this->load->view('paper/includes/footer');
        } elseif ($this->uri->segment(3) == "customer") {
            $customer = $this->item_model->fetch('customer', array('customer_id' => $this->uri->segment(4)));
            $data = array(
                'title' => "Accounts: Edit Customer",
                'heading' => "Accounts",
                'accounts' => $customer
            );

            $this->load->view('paper/includes/header', $data);
            $this->load->view('paper/accounts/edit');
            $this->load->view('paper/includes/footer');
        }
    }

    public function edit_exec() {
        if ($this->uri->segment(3) == "admin") {
            $this->form_validation->set_rules('first_name', "first name", "required");
            $this->form_validation->set_rules('last_name', "last name", "required");
            $this->form_validation->set_rules('username', "username", "is_unique[admin.username]");
            $this->form_validation->set_rules('email', "email address", 'required|valid_email|is_unique[admin.email]');
            # $this->form_validation->set_rules('contact_no', "contact number", "required");
            $this->form_validation->set_rules('status', "system status", "required|numeric");
            $this->form_validation->set_message('required', 'Please enter the {field}.');
            $username = ($this->input->post('username') == "") ? NULL : trim($this->input->post('username'));
            $contact_no = ($this->input->post('contact_no') == "") ? NULL : trim($this->input->post('contact_no'));

            if ($this->form_validation->run()) {
                $data = array(
                    'username' => $username,
                    'firstname' => trim(ucwords($this->input->post('first_name'))),
                    'lastname' => trim(ucwords($this->input->post('last_name'))),
                    'email' => trim($this->input->post('email')),
                    'contact_no' => $contact_no,
                    'status' => $this->input->post('status')
                );
                $for_log = array(
                    "user_id" => $this->session->uid,
                    "user_type" => $this->session->userdata('type'),
                    "username" => $this->session->userdata('username'),
                    "date" => time(),
                    "action" => 'Edited Admin Account #' . $this->uri->segment(4),
                    'status' => '1'
                );
                $this->item_model->insertData('user_log', $for_log);
                $this->item_model->updatedata("admin", $data, array('admin_id' => $this->uri->segment(4)));
                redirect("accounts");
            } else {
                $this->edit();
            }
        } elseif ($this->uri->segment(3) == "customer") {
            $this->form_validation->set_rules('first_name', "first name", "required");
            $this->form_validation->set_rules('last_name', "last name", "required");
            $this->form_validation->set_rules('username', "username", "is_unique[customer.username]");
            $this->form_validation->set_rules('email', "email address", 'required|valid_email|is_unique[customer.email]');
            # $this->form_validation->set_rules('contact_no', "contact number", "required");
            $this->form_validation->set_rules('status', "system status", "required|numeric");
            $this->form_validation->set_message('required', 'Please enter the {field}.');
            $username = ($this->input->post('username') == "") ? NULL : trim($this->input->post('username'));
            $contact_no = ($this->input->post('contact_no') == "") ? NULL : trim($this->input->post('contact_no'));

            if ($this->form_validation->run()) {
                $data = array(
                    'username' => $username,
                    'firstname' => trim(ucwords($this->input->post('first_name'))),
                    'lastname' => trim(ucwords($this->input->post('last_name'))),
                    'email' => trim($this->input->post('email')),
                    'contact_no' => $contact_no,
                    'status' => $this->input->post('status')
                );
                $for_log = array(
                    "user_id" => $this->session->uid,
                    "user_type" => $this->session->userdata('type'),
                    "username" => $this->session->userdata('username'),
                    "date" => time(),
                    "action" => 'Edited Customer Account #' . $this->uri->segment(4),
                    'status' => '1'
                );
                $this->item_model->insertData('user_log', $for_log);
                $this->item_model->updatedata("customer", $data, array('customer_id' => $this->uri->segment(4)));
                redirect("accounts/customer");
            } else {
                $this->edit();
            }
        }
    }

    public function delete() {
        if ($this->uri->segment(3) == "admin") {
            $this->item_model->updatedata("admin", array("status" => false), array('admin_id' => $this->uri->segment(4)));
            $for_log = array(
                "user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Deleted account #' . $this->uri->segment(4),
                'status' => '1'
            );
            $this->item_model->insertData('user_log', $for_log);
            redirect("accounts/page");
        } elseif ($this->uri->segment(3) == "customer") {
            $this->item_model->updatedata("customer", array("status" => false), array('customer_id' => $this->uri->segment(4)));
            $for_log = array(
                "user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Deleted account #' . $this->uri->segment(4),
                'status' => '1'
            );
            $this->item_model->insertData('user_log', $for_log);
            redirect("accounts/page");
        }
    }

    public function recover_account() {
        if ($this->uri->segment(3) == "admin") {
            $this->load->library('pagination');
            $perpage = 20;
            $config['base_url'] = base_url() . "accounts/recover_account/admin";
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

            if ($this->session->userdata('type') == 0) {
                $config['total_rows'] = $this->item_model->getCount('admin', "access_level != 0 AND status = 0");
                $this->pagination->initialize($config);
                $accounts = $this->item_model->getItemsWithLimit('admin', $perpage, $this->uri->segment(3), 'admin_id', 'ASC', "access_level != 0 AND status = 0");
                $data = array(
                    'title' => 'Accounts: Reactivate Admin Accounts',
                    'heading' => 'Accounts',
                    'users' => $accounts,
                    'links' => $this->pagination->create_links()
                );

                $this->load->view("paper/includes/header", $data);
                $this->load->view("paper/accounts/recover");
                $this->load->view("paper/includes/footer");
            } else {
                redirect('home');
            }
        }
    }

    public function recover_account_exec() {
        if ($this->uri->segment(3) == "admin") {
            $this->item_model->updatedata("admin", array("status" => 1), array('admin_id' => $this->uri->segment(4)));
            $for_log = array(
                "user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Reactivated account #' . $this->uri->segment(4),
                'status' => '1'
            );
            $this->item_model->insertData('user_log', $for_log);
            redirect("accounts/recover_account/admin");
        } elseif ($this->uri->segment(3) == "customer") {
            $this->item_model->updatedata("customer", array("status" => 1), array('customer_id' => $this->uri->segment(4)));
            $for_log = array(
                "user_id" => $this->session->uid,
                "user_type" => $this->session->userdata('type'),
                "username" => $this->session->userdata('username'),
                "date" => time(),
                "action" => 'Reactivated account #' . $this->uri->segment(4),
                'status' => '1'
            );
            $this->item_model->insertData('user_log', $for_log);
            redirect("accounts/recover_account/customer");
        }
    }

}
