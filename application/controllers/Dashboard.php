<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Dashboard Cabang - OPJT';
		$data['description'] = 'Dashboard Cabang';
		$data['content'] = 'pages/dashboard';

		$this->load->view('_layout/main', $data);
	}

}
