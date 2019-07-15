<?php

class Pemakaian extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('M_trans_out');
	}

	function index() {
		$data = array(
			'title' => 'Transaksi-Pemakaian',
			'head' => 'Data Transaksi-Pemakaian',
			'isi' => 'transaksi/V_pemakaian', 
			'data' => $this->M_trans_out->view_data(),
			'pemakaian'=> $this->M_trans_out->daftar_pemakai(),
			'pemakai_selected' => $this->input->post('p1')?$this->input->post('p1'):'',
			'barangs' => $this->M_trans_out->daftar_barang(),
			'barang_selected' => $this->input->post('b1')?$this->input->post('b1'):'',
		);
		$this->load->view('layout/combination',$data);
	}

	function add() {
		if (isset($_POST['save'])) {
			$pki = $this->input->post('pemakai');
			$tgl = $this->input->post('tgl');
			$brg = $this->input->post('barangs');
			$item = $this->input->post('item');
			$pengirim = $this->input->post('pengirim');
			$ktr = $this->input->post('keterangan');
			$pembawa = $this->input->post('pembawa');
			$penerima = $this->input->post('penerima');
				$tgl_ubah = date('Y-m-d', strtotime($tgl));
			$st = $this->M_trans_out->cek_stok($brg);

			if ($item > $st->stok) {
				$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" role="alert"><center><i class="fa fa-close"></i> <b>Stok barang tidak mencukupi untuk jumlah item yang ingin dipakai</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$data = array(
					'tgl' => $tgl_ubah,
					'id_barang' => $brg,
					'id_pemakai' => $pki,
					'item' => $item,
					'pengirim' => $pengirim,
					'pembawa' => $pembawa,
					'penerima' => $penerima,
					'keterangan' => $ktr
				);
				/*echo "<pre>";
				print_r($data);
				echo "</pre>";*/
				$this->M_trans_out->add_transaksi($data);
				$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert"><center><i class="fa fa-check"></i> <b>Data berhasil ditambahkan</b></center></div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}	
	}

	function update() {

	}

	function delete() {
		if(isset($_POST['hapus'])) {
			$id = $this->input->post('out_id'); //id_transaksi keluar
			$id_brg = $this->input->post('barang_id'); //id_barang
			$stok = $this->input->post('stok');
			$item = $this->input->post('item');
			$hasil = $stok + $item;
			$barang = array( 
				'stok' => $hasil, );
			$this->M_trans_out->hapus($id_brg,$barang, $id);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" style="text-align:center"><b><i class="fa fa-trash"></i> Data Transaksi-Keluar berhasil dihapus</b></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" style="text-align:center"><b><i class="fa fa-close"></i> Data tidak berhasil dihapus</b></div>');
				redirect($_SERVER['HTTP_REFERER']);
		}
	}

	function cetak() {
		$id = $this->uri->segment(4);
		$data = array(
			'data' => $this->M_trans_out->cetak_data($id),
		);
		$this->load->view('transaksi/V_cetak_pakai', $data);
	}

}