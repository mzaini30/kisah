<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penulis extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$username = $this->session->userdata('username');
		$cek_peran = $this->db->get_where('akun', compact('username'))->result()[0];
		if ($cek_peran->peran != 'penulis'){
			redirect(base_url());
		}
	}

	public function index(){
		echo 'Hello World';
	}

	public function buat_kisah(){
		if (!$_POST){
			$judul = 'Buat Kisah';
			$isi = 'penulis/buat_kisah';
			$this->load->view('template/default', compact('judul', 'isi'));
		} else {
			$data = (object) $this->input->post();
			$data->username = $this->session->userdata('username');
			$data->waktu_dibuat = date('Y-m-d H:i:s');
			$data->gambar_kisah = '';
			$this->upload->initialize(array(
				'upload_path' => './aset/gambar',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'encrypt_name' => TRUE
			));
			if ($this->upload->do_upload('gambar_kisah')){
				$data->gambar_kisah = $this->upload->data()['file_name'];
			}
			$this->db->insert('kisah', $data);
			redirect(base_url() . 'kisah/' . $this->session->userdata('username'));
		}
	}
}
