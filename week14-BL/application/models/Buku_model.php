<?php
/**
*
*/
class Buku_model extends CI_Model
{
  public function getBukus()
  {
    $res = $this->db->get('tblbuku');
    return $res->result_array();
  }

  public function getBukuByID($id)
  {
    $res = $this->db->get_where('tblbuku',array('BookID' => $id));
    return $res->result_array();
  }

  public function updateBuku($id,$title,$year,$author,$publisher,$posterlink)
  {
    $data = array(
      'Title' => $title,
      'Year'  => $year,
      'Author'  => $author,
      'Publisher'  => $publisher,
      'PosterLink'  => $posterlink,
    );
    $this->db->set($data);
    $this->db->where('BookID', $id);
    $this->db->update('tblbuku');
  }
  public function insertBuku($title,$year,$author,$publisher,$posterlink)
  {
    $data = array(
      'Title' => $title,
      'Year'  => $year,
      'Author'  => $author,
      'Publisher'  => $publisher,
      'PosterLink'  => $posterlink,
    );
    $this->db->insert('tblbuku',$data);
  }
public function deleteBukuByID($id)
{
  $this->db->delete('tblbuku', array('BookID' => $id));
}

}

?>
