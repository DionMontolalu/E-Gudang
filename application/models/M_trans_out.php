<?php
class M_trans_out extends CI_Model {
	
	function daftar_pemakai() {
    	$this->db->order_by('nama_pemakai','ASC');
    	$result = $this->db->get('pemakai');

    	$dd[''] = '--pilih pemakai--';
    	if($result->num_rows()>0){
      		foreach ($result->result() as $row) {
        		$dd[$row->id_pemakai] = $row->nama_pemakai;
      		}
    	}
    	return $dd;
  	}

	function daftar_barang() {
    	$this->db->order_by('nama_barang','ASC');
    	$result = $this->db->get('barang');

    	$bb[''] = '--pilih barang--';
    	if($result->num_rows()>0){
      		foreach ($result->result() as $row) {
        		$bb[$row->id_barang] = $row->nama_barang;
      		}
    	}
    	return $bb;
  	}  	

	function view_data() {
		$this->db->select('*');
		$this->db->from('transaksi_out');
		$this->db->join('barang', 'barang.id_barang = transaksi_out.id_barang');
		$this->db->join('pemakai', 'pemakai.id_pemakai = transaksi_out.id_pemakai');
		$query = $this->db->get();
		return $query->result();
	}

	function add_transaksi($data) {
		$this->db->insert('transaksi_out', $data);
		return $this->db->insert_id(); 
	}

	function cek_stok($id){
		$this->db->select('*');
		$this->db->where('id_barang', $id);
		$this->db->from('barang');
		$query = $this->db->get();
		return $query->row();
	}

	function cetak_data($id) {
		$this->db->select('*');
		$this->db->from('transaksi_out');
		$this->db->where('id_out', $id);
		$this->db->join('pemakai', 'pemakai.id_pemakai = transaksi_out.id_pemakai');
		$this->db->join('barang', 'barang.id_barang = transaksi_out.id_barang');
		$query = $this->db->get();
	  return $query->result();
	}

	function hapus($barang_id,$barang, $out_id){
    	//start the transaction
    	$this->db->trans_begin();
      		$this->db->where('id_barang', $barang_id);
      		$this->db->update('barang', $barang);

     		$this->db->where('id_out', $out_id);
      		$this->db->delete('transaksi_out');
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