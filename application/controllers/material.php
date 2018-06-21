<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Material extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('material_m', 'm');
	}

	function index(){
		$this->load->view('layout/header');
		$this->load->view('material_master/index');
		$this->load->view('layout/footer');
	}

	public function showAllMaterial{
		$result = $this->m->showAllMaterial();
		echo json_encode($result);
	}

	public function addMaterial(){
		$result = $this->m->addMaterial();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editWorkItem(){
		$result = $this->m->editWorkItem();
		echo json_encode($result);
	}

	public function updateWorkItem(){
		$result = $this->m->updateWorkItem();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteWorkItem(){
		$result = $this->m->deleteWorkItem();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>