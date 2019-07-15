<?php

class Admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
	}

	function index() {
		$data = array(
			'title' => 'Admin Data',
			'head' => 'Data Admin',
			'isi' => 'V_admin', 
			'data' => $this->M_admin->view_data()
		);
		$this->load->view('layout/combination',$data);
	}

	function add() {
		if (isset($_POST['save'])) {
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$level = $this->input->post('level');

			$data = array(
				'username' => $user,
				'password' => $pass,
				'level' => $level 
			);
			/*echo "<pre>";
			print_r($data);
			echo "</pre>";*/
			$this->M_admin->add($data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil ditambahkan</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function update() {
		if (isset($_POST['edit'])) {
			$id = $this->input->post('id_min');
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$level = $this->input->post('level');

			$data = array(
				'username' => $user,
				'password' => $pass,
				'level' => $level 
			);
			/*echo "<pre>";
			print_r($data);
			echo "</pre>";*/
			$this->M_admin->update($id, $data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil diubah</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function delete() {
		if (isset($_POST['hapus'])) {
			$id= $this->input->post('id_min');
			if($this->M_admin->delete($id)):
				$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger" style="text-align:center"><b><i class="fa fa-trash"></i> Data User berhasil dihapus</b></div>');
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