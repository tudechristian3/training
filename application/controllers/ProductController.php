<?php

  Class ProductController extends CI_Controller
  {
      public function __construct()
      {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('ProductModel');
      }

      public function product()
      {
        $data['users'] = $this->AdminModel->get_users();
        $data['products'] = $this->ProductModel->get_products();
        $this->load->view('create_product_view', $data);
      }

      public function all_products()
      {
        $data['users'] = $this->AdminModel->get_users();
        $data['products'] = $this->ProductModel->get_products();
        $this->load->view('list_products_view', $data);
      }


      public function all_data()
      {
        $data = $this->ProductModel->get_products();
        echo json_encode($data);
      }


      public function edit($p_id)
      {
        $data['edit_products'] = $this->ProductModel->get_product_id($p_id);
        $data['users'] = $this->AdminModel->get_users();
        $data['products'] = $this->ProductModel->get_products();
        $this->load->view('edit_product_view', $data);
      }

      public function add_product()
      {
        $product_name = $this->input->post('product_name');
        $product_description = $this->input->post('product_description');
        $product_quantity = $this->input->post('product_quantity');
        $product_price = $this->input->post('product_price');

        $image = $this->input->post('product_image');
        $path = "http://localhost/training/upload/". $image;

        $users = $this->AdminModel->get_users();

        foreach($users as $u):

          if($this->session->userdata('username') == $u['username']):

            $id = $u['user_id'];
          endif;
        endforeach;

        if(empty($product_name) || empty($product_description) || empty($product_quantity) || empty($product_price))
        {
                $this->session->set_flashdata('error', 'All fields are required');
                redirect(base_url('ProductController/product'));
        }
        else
        {
          $add = array(

            'user_id' => $id,
            'product_name' => $product_name,
            'product_description' => $product_description,
            'product_quantity' => $product_quantity,
            'product_price' => $product_price,
            'image' => $image,
            'path_image' => $path

          );


          $this->ProductModel->insert($add);
          $this->session->set_flashdata('message', 'Added Successfully');
          redirect(base_url('ProductController/product'));
        }


      }



      public function edit_product()
      {
        $product_name = $this->input->post('product_name');
        $product_description = $this->input->post('product_description');
        $product_quantity = $this->input->post('product_quantity');
        $product_price = $this->input->post('product_price');

        $users = $this->AdminModel->get_users();

        foreach($users as $u):

          if($this->session->userdata('username') == $u['username']):

            $id = $u['user_id'];
          endif;
        endforeach;

        if(empty($product_name) || empty($product_description) || empty($product_quantity) || empty($product_price))
        {
                $this->session->set_flashdata('error', 'All fields are required');
                redirect(base_url('ProductController/all_products'));
        }
        else
        {
          $add = array(

            'user_id' => $id,
            'product_name' => $product_name,
            'product_description' => $product_description,
            'product_quantity' => $product_quantity,
            'product_price' => $product_price

          );


          $this->ProductModel->update($add);
          echo json_encode($add);
          // $this->session->set_flashdata('message', 'Added Successfully');
          // redirect(base_url('ProductController/all_products'));
        }
      }

      public function delete()
      {

        $data = $this->ProductModel->delete();
        echo json_encode($data);
            // $id = $this->uri->segment(3);
            // $this->ProductModel->delete($id);
            // $this->session->set_flashdata('delete', 'Deleted');
            // redirect(base_url('ProductController/product'));
      }
  }



















?>
