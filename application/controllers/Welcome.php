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
			'kec' => $this->Madmin->showKecamatan(),
			'isi' => 'main-index'
		);
		$this->load->view('main-index', $data, FALSE);
	}

	public function filterHarga(){
		// $from_harga = 460000;
		// $to_harga = 500000;
		// // $query = $this->Madmin->getRangeHarga($from_harga, $to_harga);

		//Get the value from the form.
		// $range = $this->input->post('rangeHarga');
		
		if($this->input->post('rangeHarga') == "hargaLow"){
			$from_harga = 400000;
			$to_harga = 500000;
		} elseif ($this->input->post('rangeHarga') == "hargaMid"){
			$from_harga = 500001;
			$to_harga = 700000;
		} else {
			$from_harga = 700001;
			$to_harga = 1200000;
		}

		$data = array(
			'title' => 'Dashboard',
			'kost' => $this->Madmin->getRangeHarga($from_harga, $to_harga),
			'kec' => $this->Madmin->showKecamatan(),
			'isi' => 'main-index'
		);
		$this->load->view('main-index', $data, FALSE);
		// console.log($range);
	}

	public function filterKecamatan(){
		$kecamatan = $this->input->post("kecamatan");

		$data = array(
			'title' => 'Dashboard',
			'kost' => $this->Madmin->getKecamatan($kecamatan),
			'kec' => $this->Madmin->showKecamatan(),
			'isi' => 'main-index'
		);
		$this->load->view('main-index', $data, FALSE);
		// console.log($range);
	}

	public function filterName(){
		$name = $this->input->post("name");

		$data = array(
			'title' => 'Dashboard',
			'kost' => $this->Madmin->getName($name),
			'kec' => $this->Madmin->showKecamatan(),
			'isi' => 'main-index'
		);
		$this->load->view('main-index', $data, FALSE);
		// console.log($range);
	}
}
