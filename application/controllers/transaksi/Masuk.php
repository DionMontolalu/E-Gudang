<?php

class Masuk extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_trans_in');
	}

	function index() {
		$data = array(
			'title' => 'Transaksi-Masuk',
			'head' => 'Data Transaksi-Masuk',
			'isi' => 'transaksi/V_masuk', 
			'data' => $this->M_trans_in->view_data(),
			'gudang'=>$this->M_trans_in->daftar_gudang(),
		);
		$this->load->view('layout/combination',$data);
	}

	function ambil_data() {
		$brg = $this->input->post('modul');
		$id = $this->input->post('id');
		if($brg == "barang"){
			echo $this->M_trans_in->daftar_barang($id);
		}
	}

	function add() {
		if (isset($_POST['save'])) {
			$gdg = $this->input->post('gudang');
			$tgl = $this->input->post('tgl');
			$brg = $this->input->post('barang');
			$item = $this->input->post('item');
			$harga = $this->input->post('harga');
			$ktr = $this->input->post('keterangan');
			$hormat = $this->input->post('hormat');
				$tgl_ubah = date('Y-m-d', strtotime($tgl));
				$jumlah = $item * $harga;
			$data = array(
				'tgl' => $tgl_ubah,
				'gudang_id' => $gdg,
				'id_barang' => $brg,
				'item' => $item,
				'harga' => $harga,
				'jumlah_harga' => $jumlah,
				'hormat' => $hormat,
				'keterangan' => $ktr 
			);
			/*echo "<pre>";
			print_r($data);
			echo "</pre>";*/
			$this->M_trans_in->add_transaksi($data);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil ditambahkan</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function update() {

	}

	function delete() {
		if(isset($_POST['hps'])) {
			$id = $this->input->post('masuk_id'); //id_transaksi masuk
			$id_brg = $this->input->post('barang_id'); //id_barang
			$stok = $this->input->post('stok');
			$item = $this->input->post('item');

			if ($item > $stok) {
				$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" style="text-align:center"><b><i class="fa fa-close"></i> Maaf Stok barang tidak mencukupi</b></div>');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$hasil = $stok + $item;
				$barang = array( 
					'stok' => $hasil, );
			/*$this->M_trans_in->hapus($id_brg,$barang, $id);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" style="text-align:center"><b><i class="fa fa-trash"></i> Data Transaksi-Masuk berhasil dihapus</b></div>');
				redirect($_SERVER['HTTP_REFERER']);*/
			}
		}else{
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" style="text-align:center"><b><i class="fa fa-close"></i> Data tidak berhasil dihapus</b></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function cetak() {
		$id = $this->uri->segment(4);
		$data = array(
			'data' => $this->M_trans_in->cetak_data($id),
		);
		$this->load->view('transaksi/V_cetak_masuk',$data);
	}

}