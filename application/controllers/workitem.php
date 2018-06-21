<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Workitem extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('workitem_m', 'm');
	}

	function index(){
		$this->load->view('layout/header');
		$this->load->view('witem_master/index');
		$this->load->view('layout/footer');
	}

	public function showAllWorkItem(){
		$result = $this->m->showAllWorkItem();
		echo json_encode($result);
	}

	public function addWorkItem(){
		$result = $this->m->addWorkItem();
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