<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps', 'session'));
		$this->load->model('Madmin');
	}

	public function index()
	{

		$data = array(
			'title' => 'Dashboard',
			'kost' => $this->Madmin->showData(),
			'isi' => 'main-index'
		);
		$this->load->view('main-index', $data, FALSE);
	}
}
