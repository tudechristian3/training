<?php

  Class AdminModel extends CI_Model
  {
    private $table = "tbl_users";

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

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);

        if(array_key_exists("where", $params)){
            foreach($params['where'] as $key => $val){
                $this->db->where($key, $val);
            }
        }

        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){
                if(!empty($params['user_id'])){
                    $this->db->where('user_id', $params['user_id']);
                }
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('user_id', 'desc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }

                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        // Return fetched data
        return $result;
    }

  }




























?>
