<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Madmin');
        $this->load->helper('fungsi_helper');
        $this->load->library('form_validation');
        $this->load->library(array('googlemaps', 'upload', 'session', 'form_validation', 'pagination', 'table'));
        $this->load->helper(array('menus', 'form', 'text', 'url'));
    }

    public function index()
    {
        // $this->goToDefaultPage();
        check_alreadyLogin();
        $data['title'] = 'Halaman Login ';
        $this->load->view('vFormLogin', $data);
    }

    public function showDaftar()
    {
        $this->data['title'] = "Daftar User";
        $this->load->view('daftar-user', $this->data);
    }

    public function daftaruser()
    {
        $data = [
            'fullname' => $this->input->post('fullname'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'level' => "2",
            'status' => "Pemilik",
            'isActive' => 0, //0 for false, 1 for true
        ];
        $this->db->insert('users', $data);
        echo "<script>
		alert('Gagal Login: Akun belum diaktivasi!');
		history.go(-1);
		</script>";
        redirect('Auth');
    }

    public function cek_login()
    {
        $data = array(
            'username' => $this->input->post('username', TRUE),
            'password' => $this->input->post('password', TRUE)
        );
        $this->load->model('madmin');
        $result = $this->madmin->login($data);

        if ($result->num_rows() == 1) {
            foreach ($result->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Login';
                $sess_data['id_user'] = $sess->id_user;
                $sess_data['fullname'] = $sess->fullname;
                $sess_data['username'] = $sess->username;
                $sess_data['level'] = $sess->level;
                $sess_data['status'] = $sess->status;
                $sess_data['isActive'] = $sess->isActive;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('level') == '1') {
                $data = array(
                    'title' => 'Halaman Admin',
                    'kost' => $this->Madmin->showData(),
                    'isi' => 'vAdmin'
                );
                echo "<script>
                alert('Selamat, Login Admin Berhasil');
                </script>";
                $this->load->view('header', $data);
                $this->load->view('vAdmin', $data, FALSE);
                $this->load->view('footer', $data);
            } elseif (
                $this->session->userdata('level') == '2' &&
                $this->session->userdata('isActive') == 1
            ) {
                $data = array(
                    'title' => 'Halaman Pemilik',
                    'kost' => $this->Madmin->showData(),
                    'isi' => 'vAdmin'
                );
                echo "<script>
                alert('Selamat, Login sebagai Pemilik Berhasil');
                </script>";
                $this->load->view('header', $data);
                $this->load->view('vAdmin', $data, FALSE);
                $this->load->view('footer', $data);
            } else {
                echo "<script>
                alert('Gagal Login: Akun belum diaktivasi!');
                history.go(-1);
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
        $this->session->set_flashdata('message', 'Data berhasil disimpan');
        redirect('Auth');
    }

    // public function goToDefaultPage()
    // {
    //     if ($this->session->userdata('username') == "ayupurnamasr") {
    //         redirect('Auth');
    //     }
    // }
}
