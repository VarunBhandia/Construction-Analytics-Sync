<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Category extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('category_m', 'm');
	}

	function index(){
		$this->load->view('layout/header');
		$this->load->view('category/index');
		$this->load->view('layout/footer');
	}

	public function showAllCategory(){
		$result = $this->m->showAllCategory();
		echo json_encode($result);
	}

	public function addCategory(){
		$result = $this->m->addCategory();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editCategory(){
		$result = $this->m->editCategory();
		echo json_encode($result);
	}

	public function updateCategory(){
		$result = $this->m->updateCategory();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteCategory(){
		$result = $this->m->deleteCategory();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>