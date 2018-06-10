<?php

	defined('BASEPATH') OR exit('No direct script access allowed !');

	class Movies extends CI_Model{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function ShowData()
		{

			$query = $this->db->query("SELECT * FROM tblmovie");

			return $query->result_array();
		}

		public function ShowDetail($id)
		{
			$this->db->trans_begin();

			$this->db->select('*');
			$this->db->from('tblmovie');
			$this->db->where('MovieID',$id);
			$query = $this->db->get();
			return $query->result_array();

			$this->db->trans_complete();

			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return false;
			}else
			{
				//Lost something?...
			}
		}

		public function AddData($data)
		{
			$this->db->insert('tblmovie',$data);
		}

		public function UpdateData($data)
		{
			$this->db->replace('tblmovie',$data);
		}

	}

?>
