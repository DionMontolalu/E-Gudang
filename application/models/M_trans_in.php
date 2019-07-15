<?php

class M_trans_in extends CI_Model {
	
	function view_data() {
		$this->db->select('*');
		$this->db->from('transaksi_in');
		$this->db->join('barang', 'barang.id_barang = transaksi_in.id_barang');
		$query = $this->db->get();
		return $query->result();
	}

	function add_transaksi($data) {
		$this->db->insert('transaksi_in', $data);
		return $this->db->insert_id(); 
	}

	function daftar_gudang() {
    	$this->db->order_by('nama_gudang','ASC');
		$gudang = $this->db->get('gudang');
		return $gudang->result_array();
  	}

  	function daftar_barang($gudId) {
		$barang="<option value='0'>--pilih barang--</pilih>";
		$this->db->order_by('nama_barang','ASC');
		$gud= $this->db->get_where('barang',array('gudang_id'=>$gudId));

		foreach ($gud->result_array() as $data ){
			$barang.= "<option value='$data[id_barang]'>$data[nama_barang]</option>";
		}
		return $barang;		  		
  	}

  	function cetak_data($id) {
  		$this->db->select('*');
  		$this->db->from('transaksi_in');
  		$this->db->where('id_in', $id);
  		$this->db->join('gudang', 'gudang.id_gudang = transaksi_in.gudang_id');
  		$this->db->join('barang', 'barang.id_barang = transaksi_in.id_barang');
  		$query = $this->db->get();
		return $query->result();
  	}

  	function hapus($barang_id,$barang, $in_id){
    	//start the transaction
    	$this->db->trans_begin();
      		$this->db->where('id_barang', $barang_id);
      		$this->db->update('barang', $barang);

     		$this->db->where('id_in', $in_id);
      		$this->db->delete('transaksi_in');
      	//make transaction complete
    	$this->db->trans_complete();
      
      	if ($this->db->trans_status() === FALSE) {
        	//if something went wrong, rollback everything
        	$this->db->trans_rollback();
        	return FALSE;
      	}else {
        	//if everything went right, commit the data to the database
        	$this->db->trans_commit();
        	return TRUE;
      	}
  	}

}