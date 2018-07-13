<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('Blog_m', 'm');
	}

	function index(){
		$data['blogs'] = $this->m->getBlog();
		$this->load->view('Layout/Header');
		$this->load->view('Blog/Index', $data);
		$this->load->view('Layout/Footer');
	}

	public function add(){
		$this->load->view('Layout/Header');
		$this->load->view('Blog/Add');
		$this->load->view('Layout/Footer');
	}

	public function submit(){
		$result = $this->m->submit();
		if($result){
			$this->session->set_flashdata('success_msg', 'Record added successfully');
		}else{
			$this->session->set_flashdata('error_msg', 'Faill to add record');
		}
		redirect(base_url('Blog/index'));
	}

	public function edit($id){
		$data['blog'] = $this->m->getBlogById($id);
		$this->load->view('Layout/Header');
		$this->load->view('Blog/Edit', $data);
		$this->load->view('Layout/Footer');
	}

	public function update(){
		$result = $this->m->update();
		if($result){
			$this->session->set_flashdata('success_msg', 'Record updated successfully');
		}else{
			$this->session->set_flashdata('error_msg', 'Faill to update record');
		}
		redirect(base_url('Blog/index'));
	}

	public function delete($id){
		$result = $this->m->delete($id);
		if($result){
			$this->session->set_flashdata('success_msg', 'Record deleted successfully');
		}else{
			$this->session->set_flashdata('error_msg', 'Faill to delete record');
		}
		redirect(base_url('Blog/index'));
	}

}
