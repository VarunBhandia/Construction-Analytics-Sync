<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Vendor extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('vendor_m', 'm');
	}

	function index(){
		$this->load->view('layout/header');
		$this->load->view('vendor_master/index');
		$this->load->view('layout/footer');
	}

	public function showAllVendor(){
		$result = $this->m->showAllVendor();
		echo json_encode($result);
	}

	public function addVendor(){
		$result = $this->m->addVendor();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editVendor(){
		$result = $this->m->editVendor();
		echo json_encode($result);
	}

	public function updateVendor(){
		$result = $this->m->updateVendor();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteVendor(){
		$result = $this->m->deleteVendor();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>