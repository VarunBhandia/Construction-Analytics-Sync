<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcont_m extends CI_Model{
	public function showAllSubcont(){
		$this->db->order_by('subid', 'desc');
		$query = $this->db->get('subcontdetails');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addSubcont(){
		$field = array(
			'subname'=>$this->input->post('subname'),
			'submobile'=>$this->input->post('submobile'),
			'subaltmobile'=>$this->input->post('subaltmobile'),
			'subemail'=>$this->input->post('subemail'),
			'subgst'=>$this->input->post('subgst'),
			'subaddress'=>$this->input->post('subaddress'),
			);
		$this->db->insert('subcontdetails', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editSubcont(){
		$subid = $this->input->get('subid');
		$this->db->where('subid', $subid);
		$query = $this->db->get('subcontdetails');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateSubcont(){
		$subid = $this->input->post('subid');
		$field = array(
			'subname'=>$this->input->post('subname'),
			'submobile'=>$this->input->post('submobile'),
			'subaltmobile'=>$this->input->post('subaltmobile'),
			'subemail'=>$this->input->post('subemail'),
			'subgst'=>$this->input->post('subgst'),
			'subaddress'=>$this->input->post('subaddress'),
			);
		$this->db->where('subid', $subid);
		$this->db->update('subcontdetails', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteSubcont(){
		$subid = $this->input->get('subid');
		$this->db->where('subid', $subid);
		$this->db->delete('subcontdetails');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}