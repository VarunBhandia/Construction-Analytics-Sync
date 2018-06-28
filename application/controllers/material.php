<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Material extends CI_Controller{
    
	function __construct(){
		parent:: __construct();
		$this->load->model('material_m', 'm');
	}

	function index(){
		$this->load->model('Model');
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
        $data['row'] = $this->Model->select(array(),'materials',array(),'');
        $data['mcategorys'] = $this->Model->select(array(),'category',array(),'');
		$this->load->view('material_master/index',$data);

	}

	public function showAllMaterial(){
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

	public function editMaterial(){
		$result = $this->m->editMaterial();
		echo json_encode($result);
	}

	public function updateMaterial(){
		$result = $this->m->updateMaterial();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteMaterial(){
		$result = $this->m->deleteMaterial();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>