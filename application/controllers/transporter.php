<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Transporter extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('transporter_m', 'm');
	}

	function index(){
		$this->load->view('layout/header');
		$this->load->view('transporter_master/index');
		$this->load->view('layout/footer');
	}

	public function showAllTransporter(){
		$result = $this->m->showAllTransporter();
		echo json_encode($result);
	}

	public function addTransporter(){
		$result = $this->m->addTransporter();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editTransporter(){
		$result = $this->m->editTransporter();
		echo json_encode($result);
	}

	public function updateTransporter(){
		$result = $this->m->updateTransporter();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteTransporter(){
		$result = $this->m->deleteTransporter();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>