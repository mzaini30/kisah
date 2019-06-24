<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembaca extends CI_Controller {
	public function index(){
		$this->beranda();
	}

	public function beranda(){
		$judul = 'Beranda';
		$isi = 'pembaca/beranda';
		$this->load->view('template/default', compact('judul', 'isi'));
	}

	public function blank(){
		$judul = 'Nggak Ketemu';
		$isi = 'pembaca/blank';
		$this->load->view('template/default', compact('judul', 'isi'));
	}

	public function kisah($username){
		$cek_username = $this->db->get_where('akun', compact('username'))->num_rows();
		if (!$cek_username > 0){
			$this->blank();
		} else {
			$ambil_data = $this->db->get_where('akun', compact('username'))->result()[0];
			$judul = 'Kisah oleh ' . $ambil_data->nama_panggilan;
			$isi = 'pembaca/kisah';
			$this->load->view('template/default', compact('judul', 'isi'));	
		}
	}
}
