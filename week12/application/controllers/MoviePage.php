<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoviePage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('movies');
	}

	public function index()
	{
		$movies['data'] = $this->movies->ShowData();

		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);

		$data['table'] = $this->load->view('template/table_movie', $movies, TRUE);

		$this->load->view('page/movie',$data);

	}

	public function ShowDetail()
	{
		$movies['data'] = $this->movies->ShowData();
		$id = $this->input->get('id');
		$movies['detail_movie'] = $this->movies->ShowDetail($id);
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);
		$data['table'] = $this->load->view('template/table_movie', $movies, TRUE);

		$this->load->view('page/movie_details',$data);
	}

	public function AddMovie()
	{
		$movies['data'] = $this->movies->ShowData();
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);
		$data['table'] = $this->load->view('template/table_movie', $movies, TRUE);
		if (isset($_POST['txtTitleMovie'])) {
								$config['upload_path']          = 'assets/poster';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 3000;
                $config['max_height']           = 2000;

                $this->load->library('upload', $config);
								$movtit = $this->input->post('txtTitleMovie');
								$movyr = $this->input->post('txtYearMovie');
								$movdir = $this->input->post('txtDirectorMovie');

                if ($this->upload->do_upload('uploadPoster'))
                {
									$upload_data = $this->upload->data();
									$file_name = $upload_data['file_name'];
									$posting = array(
										'Title' => $movtit,
										'Year' => $movyr,
										'Director' => $movdir,
										'PosterLink' => 'assets/poster/'.$file_name
									);
									$this->movies->AddData($posting);
									redirect('moviepage/index');
                }

		} else {
			$this->load->view('page/movie_add',$data);
		}



	}

	public function EditMovie($id)
	{
		$data['detail_movie'] = $this->movies->ShowDetail($id);
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);
		if (isset($_POST['txtTitleMovie'])) {
								$config['upload_path']          = 'assets/poster';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 3000;
                $config['max_height']           = 2000;

                $this->load->library('upload', $config);
								$movtit = $this->input->post('txtTitleMovie');
								$movyr = $this->input->post('txtYearMovie');
								$movdir = $this->input->post('txtDirectorMovie');

                if ($this->upload->do_upload('uploadPoster'))
                {
									$upload_data = $this->upload->data();
									$file_name = $upload_data['file_name'];
									$posting = array(
										'Title' => $movtit,
										'Year' => $movyr,
										'Director' => $movdir,
										'PosterLink' => 'assets/poster/'.$file_name
									);
									$this->movies->UpdateData($posting);
									redirect('moviepage/index');
                } else {
									echo $this->upload->display_errors();
								}

		} else {
			$this->load->view('page/movie_edit',$data);
		}
	}

}
