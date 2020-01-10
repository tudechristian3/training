<?php

  Class UserController extends CI_Controller
  {
      public function __construct()
      {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('ProductModel');
      }


      public function index()
      {
        $this->load->view('user_login_view');
      }

      public function register()
      {
        $this->load->view('user_register_view');
      }

      public function home()
      {
        $data['users'] = $this->UserModel->get_users();
        $data['products'] = $this->ProductModel->get_products();
        $this->load->view('user_home_view', $data);
      }

      public function profile($u_id)
      {
        $data['users'] = $this->UserModel->get_user_id($u_id);
        $data['products'] = $this->ProductModel->get_products();
        $this->load->view('user_profile_view', $data);
      }

      public function edit_profile($u_id)
      {
        $data['users'] = $this->UserModel->get_user_id($u_id);
        $data['products'] = $this->ProductModel->get_products();
        $this->load->view('user_edit_profile_view', $data);
      }

      public function create_product()
      {
        $data['users'] = $this->UserModel->get_users();
        $this->load->view('user_create_product_view', $data);
      }



      public function login()
      {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $result = $this->UserModel->auth($username,$password);
            if($result){
                $validate = array(
                        'username' =>$username,
                        'password' =>$password
                    );
                $this->session->set_userdata($validate);
                    if($result[0]['status']=='User'){
                        redirect(base_url('UserController/home'));
                    }
                    else
                    {
                      redirect(base_url('UserController/index'));
                    }
            }
            else{
                $this->session->set_flashdata('error', 'Invalid Credentials');
                redirect(base_url('UserController/index'));
            }
      }



      public function register_account()
      {
        $txtname = $this->input->post('txtname');
        $txtaddress = $this->input->post('txtaddress');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if(empty($txtname) || empty($txtaddress) || empty($username) || empty($password))
        {
                $this->session->set_flashdata('error', 'All fields are required');
                redirect(base_url('UserController/index'));
        }

        else
        {
          $add = array(

            'name' => $txtname,
            'address' => $txtaddress,
            'username' => $username,
            'password' => $password,
            'status' => "User"

          );

          $this->UserModel->insert($add);
          redirect(base_url('UserController/index'));
        }
      }


      public function edit_account()
      {
        $txtname = $this->input->post('txtname');
        $txtaddress = $this->input->post('txtaddress');

        if(empty($txtname) || empty($txtaddress))
        {
            $this->session->set_flashdata('error', 'All fields are required');
            redirect(base_url('UserController/index'));
        }
        else
        {
          $add = array(

            'name' => $txtname,
            'address' => $txtaddress
          );

          $this->UserModel->update($add);
          redirect(base_url('UserController/home'));
        }
      }
      public function logout()
      {
           $this->session->unset_userdata('username');
			     redirect(base_url('UserController/index'));
      }
  }



















?>
