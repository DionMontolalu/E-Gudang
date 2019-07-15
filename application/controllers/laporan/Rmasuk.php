<?php

class Rmasuk extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_laporan');
		$this->load->model('M_trans_in');
	}

	function index() {
		if (isset($_POST['view'])) {
			$gdg_id = $this->input->post('gudang_id');
			$brg_id = $this->input->post('barang_id');
			$awal = $this->input->post('tgl_awal');
			$akhir = $this->input->post('tgl_akhir');

			$tgwal = date('Y-m-d', strtotime($awal));
			$tgkhr = date('Y-m-d', strtotime($akhir));
			$data = array(
				'title' => 'Report-Masuk',
				'head' => 'Laporan Transaksi Masuk',
				'isi' => 'laporan/V_rmasuk',
				'gudang'=>$this->M_trans_in->daftar_gudang(),
				'data' =>$this->M_laporan->cetak($gdg_id, $brg_id, $tgwal, $tgkhr)
			);
			$this->load->view('layout/combination', $data);

		}else if (isset($_POST['print'])) {
			$gdg_id = $this->input->post('gudang_id');
			$brg_id = $this->input->post('barang_id');
			$awal = $this->input->post('tgl_awal');
			$akhir = $this->input->post('tgl_akhir');

			$tgwal = date('Y-m-d', strtotime($awal));
			$tgkhr = date('Y-m-d', strtotime($akhir));
			$data = array(
				'title' => 'Report-Masuk',
				'head' => 'Laporan Transaksi Masuk',
				'data' =>$this->M_laporan->cetak($gdg_id, $brg_id, $tgwal, $tgkhr)
			);
			$this->load->view('laporan/V_in_cetak', $data);
		}else if (isset($_POST['all'])) {
			$data = array(
				'title' => 'Report-Masuk',
				'head' => 'Laporan Transaksi Masuk',
				'data' =>$this->M_laporan->view()
			);
			$this->load->view('laporan/V_in_cetak', $data);
		}else{
			$data = array(
				'title' => 'Report-Masuk',
				'head' => 'Laporan Transaksi Masuk',
				'isi' => 'laporan/V_rmasuk',
				'gudang'=>$this->M_trans_in->daftar_gudang(),
				'data' =>$this->M_laporan->view()
			);
			$this->load->view('layout/combination', $data);
		}
	}

}