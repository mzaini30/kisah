<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Brunei');
	}

	public function index(){
		$this->masuk();
	}

	public function masuk(){
		if (!$_POST){
			$judul = 'Login';
			$isi = 'login/login';
			$this->load->view('template/default', compact('judul', 'isi'));
		} else {
			$data = (array) $this->input->post();
			$cek = $this->db->get_where('akun', $data)->num_rows();
			if ($cek > 0){
				$this->session->set_userdata([
					'status' => 'login',
					'username' => $data['username']
				]);
				$ambil_nama_panggilan = $this->db->get_where('akun', ['username' => $this->session->userdata('username')])->result()[0];
				$this->session->set_flashdata('pesan', 'Hai ' . $ambil_nama_panggilan->nama_panggilan . '!');
				redirect(base_url());
			} else {
				$this->session->set_flashdata('pesan', 'Username dan password salah. Cek lagi deh Kak.');
				redirect(base_url() . 'login');
			}
		}
	}

	public function daftar(){
		if (!$_POST){
			$judul = 'Aku Pengen Jadi Penulis';
			$isi = 'login/daftar';
			$this->load->view('template/default', compact('judul', 'isi'));
		} else {
			$data = (object) $this->input->post();
			$data->peran = 'penulis';
			$data->waktu_daftar = date('Y-m-d H:i:s');
			if (!preg_match('/^[a-z][a-z0-9_]+$/', $data->username)){
				$this->session->set_flashdata('pesan', 'Buat username yang bener dong -.-');	
				redirect(base_url() . 'daftar');
			}
			$cek_username = $this->db->get_where('akun', ['username' => $data->username])->num_rows();
			if ($cek_username > 0){
				$this->session->set_flashdata('pesan', 'Maaf, username udah ada yang "punya". Coba yang lain lagi ya. Kali aja jodoh. Ups.');	
				redirect(base_url() . 'daftar');
			}
			$this->db->insert('akun', $data);
			$this->session->set_userdata([
				'status' => 'login',
				'username' => $data->username
			]);
			$this->session->set_flashdata('pesan', 'Selamat datang penulis baru!');
			redirect(base_url());
		}
	}

	public function keluar(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
