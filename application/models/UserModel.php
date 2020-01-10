<?php

  Class UserModel extends CI_Model
  {
    private $table = "tbl_users";

    public function insert($data)
    {
      $this->db->insert($this->table, $data);
    }

    public function insert_account()
    {
      $this->db->insert($this->table);
    }

    public function get_users()
    {
      $query = $this->db->get($this->table);
      return $query->result_array();
    }


    public function auth($username, $password)
    {
      $this->db->where('username', $username);
      $this->db->where('password', $password);
      $query = $this->db->get($this->table);
      return $query->result_array();
    }

    public function get_user_id($u_id)
    {
      $query = $this->db->get_where('tbl_users', array('user_id' => $u_id));
      return $query->result_array();
    }

    public function update($data)
    {
      $this->db->where('user_id', $this->input->post('user_id'));
      return $this->db->update($this->table, $data);
    }

    public function update_status($data, $id)
    {
      $this->db->where('user_id', $id);
      return $this->db->update($this->table, $data);
    }
  }




























?>
