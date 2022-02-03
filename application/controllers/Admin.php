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


		// if ($this->session->has_userdata('admin_login') == FALSE)
		// 	redirect(site_url());
		// $this->amenities = array('Wifi', 'AC', 'TV kabel', 'Telepon', 'Shower Panas & Dingin', 'Smooking Area');
		$this->load->model('Madmin');
		// $this->page = $this->input->get('page');
	}

	public function index()
	{

		$data = array(
			'title' => 'Administrator Page',
			'kost' => $this->Madmin->showData(),
			'isi' => 'vAdmin'
		);
		$this->load->view('headerAdmin', $data);
		$this->load->view('vAdmin', $data, FALSE);
		$this->load->view('footerAdmin', $data);
	}

	public function addkost()
	{
		$this->data['title'] = "Tambah Data";
		$data['kost'] = $this->db->get('kost')->result_array();


		$this->load->view('add-kost', $this->data);

		$this->form_validation->set_rules('name', 'Nama', 'trim|required', array('required' => 'Nama Kost harus di isi!'));
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required', array('required' => 'Latitude harus di isi!'));
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required', array('required' => 'Longitude harus di isi!'));
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required', array('required' => 'Deskripsi harus di isi!'));
		$this->form_validation->set_rules('telp', 'Kontak', 'trim|required', array('required' => 'Kontak harus di isi!'));
		$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required', array('required' => 'Fasilitas harus di isi!'));
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required', array('required' => 'Harga harus di isi!'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array('required' => 'Alamat harus di isi!'));


		$nama = 'img_' . time();
		$config['upload_path']	 = './assets/img/profile/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']		 = '5000';
		$config['max_width']	 = '3000';
		$config['max_height']	 = '3000';
		$config['file_name']	 = $nama;

		$this->upload->initialize($config);

		if ($this->form_validation->run() == TRUE && $this->upload->do_upload('image')) {

			$image = $this->upload->data();
			$data = array(
				'name' => $this->input->post('name'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'address' => $this->input->post('alamat'),
				'description' => $this->input->post('description'),
				'fasilitas' => $this->input->post('fasilitas'),
				'telp' => $this->input->post('telp'),
				'harga' => $this->input->post('harga'),
				'image'	=> $image['file_name']
			);

			$this->Madmin->simpanData($data);
			$this->session->set_flashdata('message', 'Data berhasil disimpan');
			redirect(current_url());
		} else {
			$data['image'] = '';

			if (!$this->upload->do_upload('image')) {
				$data['image'] = $this->upload->display_errors();
			}
		}
	}



	public function datakost()
	{
		$data['title'] = 'Data Kost';
		$data['kost'] = $this->db->get('kost')->result_array();
		$this->load->view('headerAdmin', $data);
		$this->load->view('data-kost', $data);
		$this->load->view('footerAdmin', $data);
	}

	public function search()
	{
		// Ambil data NIS yang dikirim via ajax post
		$keyword = $this->input->post('keyword');
		$kost = $this->Madmin->search($keyword);

		$hasil = $this->load->view('data-kost', array('kost' => $kost), true);

		// Buat sebuah array
		$callback = array(
			'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
		);
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function hapuskost($ID)
	{
		$this->Madmin->hapus_kost($ID);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data kost berhasil dihapus!
      </div>');
		redirect('Admin/datakost');
	}

	public function editkost()
	{
		$this->form_validation->set_rules('name', 'nama', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['kost'] = $this->db->get('kost')->result_array();
			$this->load->view('data-kost', $data);
		} else {
			$data = [

				'name' => $this->input->post('name'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'address' => $this->input->post('alamat'),
				'description' => $this->input->post('description'),
				'fasilitas' => $this->input->post('fasilitas'),
				'telp' => $this->input->post('telp'),
				'harga' => $this->input->post('harga')
				// 'image'	=> $image['file_name']
			];

			$this->db->where('ID', $this->input->post('ID'));
			$this->db->update('kost', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil diupdate!
      </div>');
			redirect('Admin/datakost');
		}
	}

	// public function account()
	// {
	// 	$this->data = array(
	// 		'title' => "Pengaturan Akun",
	// 		'user' => $this->Madmin->getAccount()
	// 	);
	// 	$this->form_validation->set_rules('username', 'Username', 'trim|required');
	// 	$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
	// 	$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
	// 	$this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|min_length[6]|max_length[12]');
	// 	$this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');
	// 	if ($this->form_validation->run() == TRUE) {
	// 		$this->madmin->setAccount();

	// 		redirect(current_url());
	// 	}
	// 	$this->load->view('account', $this->data);
	// }

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


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */