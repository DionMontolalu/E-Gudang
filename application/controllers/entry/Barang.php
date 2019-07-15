<?php
class Barang extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_barang');
	}

	function index() {
		$data = array(
			'title' => 'Entry-Barang',
			'head' => 'Data Barang',
			'isi' => 'entry/V_barang', 
			'data' => $this->M_barang->view_data(),
			'gudang_pil'=>$this->M_barang->gudang_daftar(),
			'gudang_selected' => $this->input->post('gud')?$this->input->post('gud'):'',
		);
		$this->load->view('layout/combination',$data);
	}

	function add() {
		if (isset($_POST['save'])) {
			$barang = $this->input->post('barang');
			$stok = $this->input->post('stok');
			$gdg = $this->input->post('gudang');
			$data = array(
				'nama_barang' => $barang,
				'stok' => $stok,
				'gudang_id' => $gdg, 
			);
			/*echo "<pre>";
			print_r($data);
			echo "</pre>";*/
			$this->M_barang->add($data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil ditambahkan</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function update() {
		if (isset($_POST['edit1'])) {
			$id = $this->input->post('id');
			$brg = $this->input->post('barang');
			$stok = $this->input->post('stok');
			$gdg = $this->input->post('gudang');
			$data = array(
				'nama_barang' => $brg,
				'stok' => $stok,
				'gudang_id' => $gdg
			);
			$this->M_barang->update($id, $data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil diubah</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else if (isset($_POST['edit2'])) {
			$id = $this->input->post('id');
			$brg = $this->input->post('barang');
			$stok = $this->input->post('stok');
			$data = array(
				'nama_barang' => $brg,
				'stok' => $stok 
			);
			$this->M_barang->update($id, $data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil diubah</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function delete() {
		if (isset($_POST['hapus'])) {
			$id= $this->input->post('id_bar');
			if($this->M_barang->delete($id)):
				$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger" style="text-align:center"><b><i class="fa fa-trash"></i> Data Barang berhasil dihapus</b></div>');
				redirect($_SERVER['HTTP_REFERER']);
			else:
				$this->session->set_flashdata('pesan',
				'<div class="alert alert-warning" style="text-align:center"><b>Gagal menghapus Barang</b></div>');
				redirect($_SERVER['HTTP_REFERER']);
			endif;
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

}