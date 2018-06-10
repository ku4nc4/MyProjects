<?php
    /**
     *
     */
    class User_model extends CI_Model
    {

      public function checkLogin($pwd)
      {
        $this->db->select('*');
        $this->db->from('tbladmin');
        $this->db->where('password',md5($pwd));
        $res = $this->db->get();
        if ($res->num_rows() == 1) {
          return true;
        }
      }
    }


 ?>
