<?php 

class Beranda extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}

	function index() {
		$data = array(
			'title' => 'Beranda',
			'head' => 'Beranda',
			'isi' => 'V_beranda' 
		);
		$this->load->view('layout/combination',$data);
	}

}