<?php

  Class ProductModel extends CI_Model
  {
    private $table = "tbl_products";

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function get_products()
    {
      $query = $this->db->get($this->table);
      return $query->result_array();
    }

    public function get_product_id($p_id)
    {
      $query = $this->db->get_where('tbl_products', array('product_id' => $p_id));
      return $query->result_array();
    }
    public function update($data)
    {
      $this->db->where('product_id', $this->input->post('product_id'));
      return $this->db->update($this->table, $data);
    }

    public function delete()
    {
      // $this->db->where('product_id', $id);
      // $this->db->delete('tbl_products');
      $product_id=$this->input->post('product_id');
      $this->db->where('product_id', $product_id);
      $result=$this->db->delete('tbl_products');
      return $result;
    }



    public function count_product()
    {
      $query = $this->db->query('SELECT COUNT(user_id) as products FROM tbl_products WHERE user_id = user_id');
      return $query->row()->products;
    }









  }



















?>
