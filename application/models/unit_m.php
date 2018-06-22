<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model{
	public function showAllUnit(){
		$this->db->order_by('muid', 'desc');
		$query = $this->db->get('munits');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addUnit(){
		$field = array(
			'muname'=>$this->input->post('muname'),
			);
		$this->db->insert('munits', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editUnit(){
		$muid = $this->input->get('muid');
		$this->db->where('muid', $muid);
		$query = $this->db->get('munits');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateUnit(){
		$muid = $this->input->post('muid');
		$field = array(
			'muname'=>$this->input->post('muname'),
			);
		$this->db->where('muid', $muid);
		$this->db->update('munits', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteUnit(){
		$muid = $this->input->get('muid');
		$this->db->where('muid', $muid);
		$this->db->delete('munits');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}