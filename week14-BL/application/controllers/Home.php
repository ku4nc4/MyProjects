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
		$data['js'] = $this->load->view('include/script',null,true);
    $data['css'] = $this->load->view('include/style',null,true);
    $data['title'] = "Home Page";
    $data['navbar'] = $this->load->view('template/navbar_book',null,true);
    $data['footer'] = $this->load->view('template/footer_book',null,true);
    $this->load->model('buku_model');
    $data['bukus'] = $this->buku_model->getBukus();
    $this->load->view('index',$data);

    if ($this->session->userdata('logged_in')!=1) {
        $this->load->view('modallogin');
    }
	}
  public function login()
  {
    $pass = $this->input->post('pass');
    $this->load->model('user_model');

    if ($this->user_model->checkLogin($pass)) {
        $this->session->set_userdata('logged_in',1);
        redirect('home');
    } else {
        redirect('home');
    }
  }

  public function logout()
  {
    $this->session->set_userdata('logged_in',0);
    redirect('home');
  }
  public function view($id)
  {
    $data['js'] = $this->load->view('include/script',null,true);
    $data['css'] = $this->load->view('include/style',null,true);
    $data['title'] = "View Buku Page";
    $data['navbar'] = $this->load->view('template/navbar_book',null,true);
    $data['footer'] = $this->load->view('template/footer_book',null,true);
    $this->load->model('buku_model');
    $data['bukudata'] = $this->buku_model->getBukuByID($id);
    $this->load->view('viewbook',$data);
    if ($this->session->userdata('logged_in')!=1) {
        $this->load->view('modallogin');
    }
  }
  public function edit($id)
  {
    $data['js'] = $this->load->view('include/script',null,true);
    $data['css'] = $this->load->view('include/style',null,true);
    $data['title'] = "Edit Buku Page";
    $data['navbar'] = $this->load->view('template/navbar_book',null,true);
    $data['footer'] = $this->load->view('template/footer_book',null,true);
    $this->load->model('buku_model');
    $data['bukudata'] = $this->buku_model->getBukuByID($id);
    $this->load->view('editbuku',$data);

    if ($this->session->userdata('logged_in')!=1) {
        $this->load->view('modallogin');
    }
  }
  public function editprocess($id)
  {
    $config['upload_path']          = 'assets/poster';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 2000;
    $config['max_width']            = 5000;
    $config['max_height']           = 6000;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('userfile'))
    {
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        $bookid = $id;
        $title = $this->input->post('title');
        $year = $this->input->post('year');
        $author = $this->input->post('author');
        $publisher = $this->input->post('publisher');
        $this->load->model('buku_model');
        $this->buku_model->updateBuku($bookid,$title,$year,$author,$publisher,"assets/poster/".$file_name);
        redirect('home/index');
    }
    else
    {
        echo $this->upload->display_errors();
        redirect('home/index');
    }
  }
  public function delete($id)
  {
    $this->load->model('buku_model');
    $this->buku_model->deleteBukuByID($id);
    redirect('home/index');
  }
  public function add()
  {
    $data['js'] = $this->load->view('include/script',null,true);
    $data['css'] = $this->load->view('include/style',null,true);
    $data['title'] = "Add Buku Page";
    $data['navbar'] = $this->load->view('template/navbar_book',null,true);
    $data['footer'] = $this->load->view('template/footer_book',null,true);
    $this->load->model('buku_model');
    $data['bukus'] = $this->buku_model->getBukus();
    $this->load->view('addbuku',$data);

    if ($this->session->userdata('logged_in')!=1) {
        $this->load->view('modallogin');
    }
  }
  public function addprocess()
  {
    $config['upload_path']          = 'assets/poster';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 2000;
    $config['max_width']            = 5000;
    $config['max_height']           = 6000;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('userfile'))
    {
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        $title = $this->input->post('title');
        $year = $this->input->post('year');
        $author = $this->input->post('author');
        $publisher = $this->input->post('publisher');
        $this->load->model('buku_model');
        $this->buku_model->insertBuku($title,$year,$author,$publisher,"assets/poster/".$file_name);
        redirect('home/index');
    }
    else
    {
        echo $this->upload->display_errors();
        redirect('home/index');
    }
  }
}
