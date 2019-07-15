<?php 

class M_gudang extends CI_Model {
	
	function view_data() {
		$query = $this->db->get('gudang');
		return $query->result();
	}

	function add($data) {
		$this->db->insert('gudang',$data);
		return $this->db->insert_id();
	}

	function update($id,$data) {
    	$this->db->where('id_gudang',$id);
    	$this->db->update('gudang',$data);
  	}

  	function delete($id){
    	$this->db->where('id_gudang',$id);
    	return $this->db->delete('gudang');
 	 }

}