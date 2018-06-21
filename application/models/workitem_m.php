<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workitem_m extends CI_Model{
	public function showAllWorkItem(){
		$this->db->order_by('wiid', 'desc');
		$query = $this->db->get('workitems');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addWorkItem(){
		$field = array(
			'winame'=>$this->input->post('winame'),
			'widesc'=>$this->input->post('widesc'),
			'wigst'=>$this->input->post('wigst'),
			'wibase'=>$this->input->post('wibase'),
			'wicategory'=>$this->input->post('wicategory'),
			'witype'=>$this->input->post('witype'),
			);
		$this->db->insert('workitems', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editWorkItem(){
		$wiid = $this->input->get('wiid');
		$this->db->where('wiid', $wiid);
		$query = $this->db->get('workitems');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateWorkItem(){
		$wiid = $this->input->post('wiid');
		$field = array(
			'winame'=>$this->input->post('winame'),
			'widesc'=>$this->input->post('widesc'),
			'wigst'=>$this->input->post('wibase'),
			'wibase'=>$this->input->post('wibase'),
			'wicategory'=>$this->input->post('wicategory'),
			'witype'=>$this->input->post('witype'),
			);
		$this->db->where('wiid', $wiid);
		$this->db->update('workitems', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteWorkItem(){
		$wiid = $this->input->get('wiid');
		$this->db->where('wiid', $wiid);
		$this->db->delete('workitems');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}