<?php

  Class AdminController extends CI_Controller
  {
      public function __construct()
      {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('UserModel');
        $this->load->model('ProductModel');

        $this->load->library('pagination');
        $this->perPage = 5;
      }

      public function index()
      {
        $this->load->view('admin_login_view');
      }


      public function home()
      {
        $data['users'] = $this->AdminModel->get_users();
        $data['products'] = $this->ProductModel->count_product();
        $this->load->view('admin_home_view', $data);
      }

      // public function users_json()//datatables example
      // {
      //   $data['users'] = $this->AdminModel->get_users();
      //   echo json_encode($data);
      // }

      public function users()
      {
        $data = $conditions = array();
        $uriSegment = 3;

        // Get record count
        $conditions['returnType'] = 'count';
        $totalRec = $this->AdminModel->getRows($conditions);

        // Pagination configuration
        $config['base_url']    = base_url().'AdminController/users/';
        $config['uri_segment'] = $uriSegment;
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;

        // Initialize pagination library
        $this->pagination->initialize($config);

        // Define offset
        $page = $this->uri->segment($uriSegment);
        $offset = !$page?0:$page;

        // Get records
        $conditions = array(
            'start' => $offset,
            'limit' => $this->perPage
        );
        $data['users'] = $this->AdminModel->getRows($conditions);
        //$data['users'] = $this->AdminModel->get_users();
        $this->load->view('list_users_view', $data);
      }

      public function all_users()
      {
        $data = $this->AdminModel->get_users();
        echo json_encode($data);
      }

      public function deactivate_users()
      {
        $data['users'] = $this->AdminModel->get_users();
        $this->load->view('list_deactivate_account_view', $data);
      }


      public function login()
      {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $result = $this->AdminModel->auth($username,$password);
            //$id = $result[0]['user_id'];
            if($result){
                $validate = array(
                        'username' =>$username,
                        'password' =>$password
                    );
                $this->session->set_userdata($validate);
                    if($result[0]['status']=='Admin'){
                        redirect(base_url('AdminController/home'));
                    }
            }
            else{
                $this->session->set_flashdata('error', 'Invalid Credentials');
                redirect(base_url('AdminController/index'));
            }
      }

      public function deactivate_account()
      {
        $id = $this->uri->segment(3);
        $add = array(

          'status' => "Deactivate"
        );
        $this->UserModel->update_status($add, $id);
        redirect(base_url('AdminController/users'));
      }

      public function activate_account()
      {
        $id = $this->uri->segment(3);
        $add = array(

          'status' => "User"
        );
        $this->UserModel->update_status($add, $id);
        redirect(base_url('AdminController/users'));
      }

      public function logout()
      {
           $this->session->unset_userdata('username');
			     redirect(base_url('AdminController/index'));
      }
  }



















?>
