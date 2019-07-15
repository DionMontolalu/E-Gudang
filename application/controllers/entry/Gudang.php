<?php

class Gudang extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_gudang');
	}

	function index() {
		$data = array(
			'title' => 'Admin-Gudang',
			'head' => 'Data Gudang',
			'isi' => 'entry/V_gudang', 
			'data' => $this->M_gudang->view_data()
		);
		$this->load->view('layout/combination',$data);
	}

	function add() {
		if (isset($_POST['save'])) {
			$gud = $this->input->post('gudang');
			$data = array(
				'nama_gudang' => $gud, 
			);
			$this->M_gudang->add($data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil ditambahkan</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function update() {
		if (isset($_POST['edit'])) {
			$id = $this->input->post('id_gud');
			$gud = $this->input->post('gudang');
			$data = array(
				'nama_gudang' => $gud, 
			);
			$this->M_gudang->update($id, $data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil diubah</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function delete() {
		if (isset($_POST['hapus'])) {
			$id= $this->input->post('gud_id');
			if($this->M_gudang->delete($id)):
				$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger" style="text-align:center"><b><i class="fa fa-trash"></i> Data Gudang berhasil dihapus</b></div>');
				redirect($_SERVER['HTTP_REFERER']);
			else:
				$this->session->set_flashdata('pesan',
				'<div class="alert alert-warning" style="text-align:center"><b>Gagal menghapus user</b></div>');
				redirect($_SERVER['HTTP_REFERER']);
			endif;
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}