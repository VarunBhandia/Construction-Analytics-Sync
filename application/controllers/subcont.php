<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Subcont extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('subcont_m', 'm');
	}

	function index(){
		$this->load->view('layout/header');
		$this->load->view('subcont/index');
		$this->load->view('layout/footer');
	}

	public function showAllSubcont(){
		$result = $this->m->showAllSubcont();
		echo json_encode($result);
	}

	public function addSubcont(){
		$result = $this->m->addSubcont();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editSubcont(){
		$result = $this->m->editSubcont();
		echo json_encode($result);
	}

	public function updateSubcont(){
		$result = $this->m->updateSubcont();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteSubcont(){
		$result = $this->m->deleteSubcont();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>