<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
        $data['js'] = $this->load->view('Include/js.php',NULL,TRUE);
		$data['css'] = $this->load->view('Include/css.php',NULL,TRUE);
		$this->load->view('Pages/home.php',$data);
	}
}