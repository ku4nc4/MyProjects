<?php
  /**
   *
   */
  class Insert_model extends CI_Model
  {
    public function insert($data)
    {
      $this->db->insert('product',$data);
    }
    public function getSupplier()
    {
      $query = $this->db->query('select * from supplier');
      return $query->result_array();
    }
    public function getCategory(){
      $query = $this->db->query('select * from category');
      return $query->result_array();
    }
  }


 ?>
