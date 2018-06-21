<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Apphend_c extends CI_Controller{
	function __construct(){
		parent:: __construct();
        $this->load->model('apphend_m', 'm');
	}

	function index(){
		$this->load->view('apphend_form');
	}
    
    public function addData(){
        $result = $this->m->addData();

    }
}
?>