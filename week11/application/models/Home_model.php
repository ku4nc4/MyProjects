<?php
  /**
   *
   */
  class Home_model extends CI_Model
  {
    function get_product(){
      $query = $this->db->query('select * from product');

      return $query->result_array();
    }
    function form_insert($data)
    {
      $this->db->insert('product',$data);
    }
  }


 ?>
