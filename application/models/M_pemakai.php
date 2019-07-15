<?php 

class M_pemakai extends CI_Model {
	
	function view_data() {
		$query = $this->db->get('pemakai');
		return $query->result();
	}

	function add($data) {
		$this->db->insert('pemakai',$data);
		return $this->db->insert_id();
	}

	function update($id,$data) {
    	$this->db->where('id_pemakai',$id);
    	$this->db->update('pemakai',$data);
  	}

  	function delete($id){
    	$this->db->where('id_pemakai',$id);
    	return $this->db->delete('pemakai');
 	 }

}