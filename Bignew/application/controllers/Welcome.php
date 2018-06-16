<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index($page = "home")
	{
		// includes
		$data['css'] = $this->load->view('includes/css',null,true);
		$data['js'] = $this->load->view('includes/js',null,true);

		// templates-navbar
		$navdata['navbarlogo'] = array(
			'src'   => 'img/logocollections/BIGlogo.png',
			'alt'   => 'Batavia Indo Global Logo',
			'class' => 'navbarlogo'
		);
		if($page == "home") $navdata['page'] = 0;
		else if($page == "capabilities") $navdata['page'] = 1;
		else if($page == "privatelabels") $navdata['page'] = 2;
		else if($page == "products") $navdata['page'] = 3;
		else if($page == "strategicpartners") $navdata['page'] = 4;
		else if($page == "contactus") $navdata['page'] = 5;
		
		$data['navbar'] = $this->load->view('template/navbar',$navdata,true);

		$data['dunnorow'] = $this->load->view('template/dunnorow',null,true);
		$data['taglinerow'] = $this->load->view('template/taglinerow',null,true);

		if($navdata['page'] == 0)$data['content'] = $this->load->view('homepages/ourcompany',null,true);
		else if($navdata['page'] == 1)$data['content'] = $this->load->view('homepages/capabilities',null,true);
		else if($navdata['page'] == 2)$data['content'] = $this->load->view('homepages/privatelabels',null,true);
		else if($navdata['page'] == 3)$data['content'] = $this->load->view('homepages/products',null,true);
		

		$this->load->view('skeleton',$data);
	}
}
