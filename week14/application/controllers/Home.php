<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
    $this->session->unset_userdata('login');
    $data['js'] = $this->load->view('includes/js',null,true);
    $data['css'] = $this->load->view('includes/css',null,true);
		$this->load->view('login',$data);
	}

  public function logincheck()
  {
    $this->load->model('user_model');
    $email = $this->input->post('email');
    $pwd = $this->input->post('pwd');
    $data = array('email' => $email, 'pwd' => $pwd);
    $idadmin = $this->user_model->checklogin($data);
    if ($idadmin>0) {
      $this->session->set_userdata('login',$idadmin);
      redirect('home/dosenpage');
    } else {
      redirect('home');
    }

  }
  public function dosenpage()
  {
    $data['js'] = $this->load->view('includes/js',null,true);
    $data['css'] = $this->load->view('includes/css',null,true);
    $this->load->model('user_model');
    $this->load->model('dosen_model');
    $data['admin_name'] = $this->user_model->getfullname($this->session->userdata('login'));
    $data['dosendetailrow'] = $this->dosen_model->getall();
    if ($this->session->has_userdata('login')) {
      $this->load->view('dosen.php',$data);
    } else {
      redirect('home');
    }
  }
  public function logout()
  {
    $this->session->unset_userdata('login');
    redirect('home');
  }
  public function deleterowdosen()
  {
    $id_dosen = $this->input->post('dosenid');
    $this->load->model('dosen_model');
    $this->dosen_model->deleterow($id_dosen);
    redirect('home/dosenpage');
  }
  public function notfound404()
  {
    $this->load->model('user_model');
    $data['js'] = $this->load->view('includes/js',null,true);
    $data['css'] = $this->load->view('includes/css',null,true);
    $data['admin_name'] = $this->user_model->getfullname($this->session->userdata('login'));
    $this->load->view('404notfound',$data);
  }
}
