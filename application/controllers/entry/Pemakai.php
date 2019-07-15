<?php

class Pemakai extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_pemakai');
	}

	function index() {
		$data = array(
			'title' => 'Admin-Pemakai',
			'head' => 'Data Pemakai',
			'isi' => 'entry/V_pemakai', 
			'data' => $this->M_pemakai->view_data()
		);
		$this->load->view('layout/combination',$data);
	}

	function add() {
		if (isset($_POST['save'])) {
			$pakai = $this->input->post('pemakai');
			$data = array(
				'nama_pemakai' => $pakai, 
			);
			$this->M_pemakai->add($data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil ditambahkan</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function update() {
		if (isset($_POST['edit'])) {
			$id = $this->input->post('id_pakai');
			$pakai = $this->input->post('pemakai');
			$data = array(
				'nama_pemakai' => $pakai, 
			);
			$this->M_pemakai->update($id, $data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil diubah</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function delete() {
		if (isset($_POST['hapus'])) {
			$id= $this->input->post('pakai_id');
			if($this->M_pemakai->delete($id)):
				$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger" style="text-align:center"><b><i class="fa fa-trash"></i> Data Pemakai berhasil dihapus</b></div>');
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