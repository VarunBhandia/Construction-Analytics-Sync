<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Site extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('site_m', 'm');
	}

	function index(){
		$this->load->view('layout/header');
		$this->load->view('site/index');
		$this->load->view('layout/footer');
	}

	public function showAllSite(){
		$result = $this->m->showAllSite();
		echo json_encode($result);
	}

	public function addSite(){
		$result = $this->m->addSite();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editSite(){
		$result = $this->m->editSite();
		echo json_encode($result);
	}

	public function updateSite(){
		$result = $this->m->updateSite();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteSite(){
		$result = $this->m->deleteSite();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>