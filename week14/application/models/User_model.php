<?php
  class User_model extends CI_Model
  {
    public function checklogin($data)
    {
        $this->db->like('email_admin',$data['email']);
        $this->db->like('password',md5($data['pwd']));
        $this->db->from('admin');
        $query = $this->db->get();
        $result = $query->result_array();
        var_dump($result);
        if ($this->db->count_all_results() == 1) {
          return $result[0]['id_admin'];
        } else {
          return 0;
        }
    }

    public function getfullname($id_admin)
    {
      $this->db->select('*');
      $this->db->where('id_admin', $id_admin);
      $this->db->from('admin');
      $results = $this->db->get()->result_array();
      foreach ($results as $result) {
        $fname = $result['fname_admin'];
        $lname = $result['lname_admin'];
      }
      return $fname." ".$lname;
    }
  }
 ?>
