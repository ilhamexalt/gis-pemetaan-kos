<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public $amenities;
	public $page;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library(array('googlemaps', 'upload', 'session', 'form_validation', 'pagination', 'table'));
		$this->load->helper(array('menus', 'form', 'text', 'url'));

		//Login
		if ($this->session->userdata('username') == "") {
			redirect('Auth');
		}
		$this->load->model('Madmin');
	}

	public function index()
	{
		$data = array(
			'title' => 'Home Admin',
			'kost' => $this->Madmin->showData(),
			'isi' => 'vAdmin'
		);
		$this->load->view('header', $data);
		$this->load->view('vAdmin', $data, FALSE);
		$this->load->view('footer', $data);
	}

	public function datakost()
	{
		$data['title'] = 'Data Kost';
		$data['kost'] =  $this->Madmin->join('kost', 'users', 'kost.id_user=users.id_user')->result_array();
		//$data['kost'] = $this->db->get('kost')->result_array();
		$this->load->view('header', $data);
		$this->load->view('data-kost', $data);
		$this->load->view('footer', $data);
	}

	public function datauser()
	{
		$data['title'] = 'Data User';
		$data['users'] = $this->db->get('users')->result_array();
		$this->load->view('header', $data);
		$this->load->view('data-user', $data);
		$this->load->view('footer', $data);
	}

	public function hapuskost($ID)
	{
		$this->Madmin->hapus_kost($ID);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	    Data kost berhasil dihapus!
	  </div>');
		redirect('Admin/datakost');
	}

	public function editusers($id)
	{

		$data = [
			'fullname' => $this->input->post('fullname'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'isActive' => $this->input->post('isActive'),

		];


		$this->db->where('id_user', $id);
		$this->db->update('users', $data);
		redirect('Admin/datauser');
	}

	public function leaflet()
	{
		$this->data = array(
			'title' => 'leaflet',
			'kost' => $this->Madmin->showData(),
		);
		$this->load->view('vLeaflet', $this->data);
	}

	/**
	 * Cek kebenaran password
	 *
	 * @return Boolean
	 **/
	public function validate_password()
	{
		$user = $this->madmin->getAccount();

		if (password_verify($this->input->post('old_pass'), $user->password)) {
			return true;
		} else {
			$this->form_validation->set_message('validate_password', 'Password lama anda tidak cocok!');
			return false;
		}
	}
}
