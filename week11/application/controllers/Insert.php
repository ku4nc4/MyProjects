<?php
    /**
     *
     */
    class Insert extends CI_Controller
    {
      public function __construct()
      {
        parent::__construct();
        $this->load->model('insert_model');
      }

      public function index()
      {
        $this->load->view('pages/insertproduct');
      }
      public function insert_action()
      {
          $data = array(
          'product_name' => $this->input->post('pname'),
          'qty_per_unit' => $this->input->post('qtypu'),
          'price' => $this->input->post('pprice'),
          'stock' => '0',
          'id_supplier' => $this->input->post('psup'),
          'id_category' => $this->input->post('pcat')
        );
        $this->insert_model->insert($data);
        header('Location:'.base_url());
        die();
      }
    }


 ?>
