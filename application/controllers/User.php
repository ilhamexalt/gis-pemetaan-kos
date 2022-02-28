<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Madmin');
		$this->load->helper('fungsi_helper');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->goToDefaultPage();
		check_alreadyLogin();
		$data['title'] = 'Halaman Login ';
		$this->load->view('vFormLogin', $data);
	}

	public function signout()
	{
		$this->session->set_flashdata('message', 'Anda berhasil keluar.');
		$this->session->sess_destroy();

		redirect(base_url());
	}


	public function proses_login()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('Madmin');
			$query = $this->Madmin->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'ID' => $row->ID,
				);
				$this->session->set_userdata($params);
				echo "<script>
                alert('Login berhasil');
                window.location='" . site_url('Admin') . "';
                </script>";
			} else {
				echo "<script>
                alert('Login gagal');
                window.location='" . site_url('User') . "';
                </script>";
			}
		}
	}


	public function logout()
	{
		$params = array('id_user');
		$this->session->unset_userdata($params);
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Anda telah keluar! 
      </div>'); //membuat session
		redirect('User');
	}

	public function goToDefaultPage()
	{
		if ($this->session->userdata('username') == "ayupurnamasr") {
			redirect('User');
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */