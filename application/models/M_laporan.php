<?php
class M_laporan extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function view() { //View Laporan Transaksi Masuk
		$this->db->select('*');
		$this->db->from('transaksi_in');
		$this->db->join('barang', 'barang.id_barang = transaksi_in.id_barang');
		$this->db->join('gudang', 'gudang.id_gudang = transaksi_in.gudang_id');
		$query = $this->db->get();
		return $query->result();
	}

	function cetak($gdg, $brg, $awal, $akhir) { // cetak data
		$this->db->select('*');
		$this->db->where('T.gudang_id', $gdg);
		$this->db->where('T.id_barang', $brg);
		$this->db->where('T.tgl >=', $awal);
		$this->db->where('T.tgl <=', $akhir);
		$this->db->from('transaksi_in AS T');
		$this->db->join('barang AS B', 'B.id_barang = T.id_barang');
		$this->db->join('gudang AS G', 'G.id_gudang = T.gudang_id');
		$query = $this->db->get();
		return $query->result();
	}

	function daftar_pemakai() {
		$this->db->order_by('nama_pemakai','ASC');
		$gudang = $this->db->get('pemakai');
		return $gudang->result_array();
	}

	function daftar_barang($brgId) {
		$barang="<option value='0'>--pilih barang--</pilih>";
		$this->db->order_by('id_barang','ASC');
		$gud = $this->db->get_where('transaksi_out',array('id_barang'=>$brgId));
		$this->db->join('barang', 'barang.id_barang = transaksi_out.id_barang');
		$gud = $this->db->get();
		foreach ($gud->result_array() as $data ){
			$barang.= "<option value='$data[id_barang]'>$data[nama_barang]</option>";
		}
		return $barang;		  		
  	}

}