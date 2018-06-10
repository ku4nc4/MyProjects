<?php
  class Dosen_model extends CI_Model
  {
    public function getall()
    {
      $query = $this->db->get('dosen');
      return $query->result_array();
    }
    public function deleterow($id_dosen)
    {
      $this->db->where('id_dosen',$id_dosen);
      $this->db->delete('dosen');
    }
  }
 ?>
