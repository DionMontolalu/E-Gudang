<?php

class M_barang extends CI_Model {
	
	function view_data() {
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('gudang', 'gudang.id_gudang = barang.gudang_id');
		$query = $this->db->get();
		return $query->result();
	}

	function gudang_daftar() {
    $this->db->order_by('nama_gudang','asc');
    $result = $this->db->get('gudang');

    $dd[''] = 'Pilih Gudang';
    if($result->num_rows()>0){
      foreach ($result->result() as $row) {
        $dd[$row->id_gudang] = $row->nama_gudang;
      }
    }
    return $dd;
  }

	function add($data) {
		$this->db->insert('barang',$data);
		return $this->db->insert_id();
	}

	function update($id,$data) {
    	$this->db->where('id_barang',$id);
    	$this->db->update('barang',$data);
  	}

  	function delete($id){
    	$this->db->where('id_barang',$id);
    	return $this->db->delete('barang');
  	}

}