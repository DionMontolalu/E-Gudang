<?php
class M_admin extends CI_Model {

	function view_data() {
		$query = $this->db->get('admin');
		return $query->result();
	}

	function add($data) {
		$this->db->insert('admin',$data);
		return $this->db->insert_id();
	}

	function update($id,$data) {
    	$this->db->where('id_admin',$id);
    	$this->db->update('admin',$data);
  	}

  	function delete($id){
    	$this->db->where('id_admin',$id);
    	return $this->db->delete('admin');
  }

}