<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model{
	public function showAllUnit(){
		$this->db->order_by('uid', 'desc');
		$query = $this->db->get('units');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addUnit(){
		$field = array(
			'uname'=>$this->input->post('uname'),
			);
		$this->db->insert('units', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editUnit(){
		$uid = $this->input->get('uid');
		$this->db->where('uid', $uid);
		$query = $this->db->get('units');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateUnit(){
		$uid = $this->input->post('uid');
		$field = array(
			'uname'=>$this->input->post('uname'),
			);
		$this->db->where('uid', $uid);
		$this->db->update('units', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteUnit(){
		$uid = $this->input->get('uid');
		$this->db->where('uid', $uid);
		$this->db->delete('units');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}