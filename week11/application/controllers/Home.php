<?php
defined("BASEPATH") or exit('noo');
  class Home extends CI_Controller
  {
    public function __construct()
      {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('insert_model');
      }

    public function index()
    {
      $data['product'] = $this->home_model->get_product();
      $data['js'] = $this->load->view('includes/js',null,true);
      $data['css'] = $this->load->view('includes/css',null,true);
      $data['header'] = $this->load->view('templates/header',null,true);
      $data['footer'] = $this->load->view('templates/footer',null,true);
      $this->load->view('pages/homeview',$data);
    }
    public function insert()
    {
      $data['product'] = $this->home_model->get_product();
      $data['supplier'] = $this->insert_model->getSupplier();
      $data['category'] = $this->insert_model->getCategory();
      $data['js'] = $this->load->view('includes/js',null,true);
      $data['css'] = $this->load->view('includes/css',null,true);
      $data['header'] = $this->load->view('templates/header',null,true);
      $data['footer'] = $this->load->view('templates/footer',null,true);
      $this->load->view('pages/insertproduct',$data);
    }
  }

 ?>
