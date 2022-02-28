<?php

class Fungsi
{
	protected $ci;

	function __construct()
	{
		$this->ci = &get_instance();
	}
	function who_userLogin()
	{
		$this->ci->load->model('Madmin');
		$id = $this->ci->session->userdata('id_user');
		$user_data = $this->ci->Madmin->get($id)->row();
		return $user_data;
	}
}
