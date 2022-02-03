<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Madmin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('upload', 'session'));
	}


	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
      ";
		return $this->db->query($query)->result_array();
	}

	public function simpanData($data)
	{
		$this->db->insert('kost', $data);
	}


	public function showData()
	{
		$this->db->select('*');
		$this->db->from('kost');
		return $this->db->get()->result();
	}

	public function hapus_kost($ID)
	{
		$this->db->where('ID', $ID);
		$this->db->delete('kost');
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table, ['ID' => $id])->row();
	}

	public function editkost()
	{
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
		return $this->db->update($this->table, $data, array('ID' => $this->input->post('ID')));
	}

	public function search($keyword)
	{
		$this->db->like('name', $keyword);
		$result = $this->db->get('kost')->result(); // Tampilkan data kost berdasarkan keyword

		return $result;
	}

	public function rules()
	{
		return [
			[
				'field' => 'Name',  //samakan dengan atribute name pada tags input
				'label' => 'Nama',  // label yang kan ditampilkan pada pesan error
				'rules' => 'trim|required' //rules validasi
			],
			[
				'field' => 'Alamat',
				'label' => 'Alamat',
				'rules' => 'trim|required'
			],
			[
				'field' => 'Latitude',
				'label' => 'Latitude',
				'rules' => 'trim|required'
			],
			[
				'field' => 'Longitude',
				'label' => 'Longitude',
				'rules' => 'trim|required'
			],
			[
				'field' => 'Description',
				'label' => 'Deskripsi',
				'rules' => 'trim|required|min_length[9]|max_length[100]'
			]
		];
	}

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $post['username']);
		$this->db->where('password', $post['password']);
		$query = $this->db->get();
		return $query;
	}
	public function get($id = null)
	{
		$this->db->from('users');
		if ($id != null) {
			$this->db->where('ID', $id);
		}
		$query = $this->db->get();
		return $query;
	}
}


	// public function setAccount()
	// {
	// 	$user = $this->getAccount();

	// 	$object = array(
	// 		'fullname' => $this->input->post('name'),
	// 		'username' => $this->input->post('identity'),
	// 		'email' => $this->input->post('email')
	// 	);

	// 	if ($this->input->post('new_pass') != '')
	// 		$object['password'] = password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT);

	// 	$this->db->update('users', $object, array('ID' => $user->ID));

	// 	$this->session->set_flashdata('message', "Perubahan berhasil disimpan.");
	// }

	// public function getAccount()
	// {
	// 	return $this->db->get_where('users', array('ID' => $this->session->userdata('user')->ID))->row();
	// }


/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */