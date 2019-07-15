<?php 

class Rpemakaian extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_laporan');
	}

	function index() {
		$data = array(
			'title' => 'Report-Pemakaian',
			'head' => 'Laporan Transaksi Pemakaian',
			'isi' => 'laporan/V_rpemakaian',
			'pemakai'=>$this->M_laporan->daftar_pemakai(),
		);
		$this->load->view('layout/combination', $data);
	}

	function ambil_data() {
		$brg = $this->input->post('modul');
		$id = $this->input->post('id');
		if($brg == "barang"){
			echo $this->M_laporan->daftar_barang($id);
		}
	}

}