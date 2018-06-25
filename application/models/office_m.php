<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_m extends CI_Model{
	public function showAllOffice(){
		$this->db->order_by('oid', 'desc');
		$query = $this->db->get('officedetails');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addOffice(){
		$field = array(
			'oname'=>$this->input->post('oname'),
            'oaddress'=>$this->input->post('oaddress'),
			'ogst'=>$this->input->post('ogst'),
			);
		$this->db->insert('officedetails', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editOffice(){
		$oid = $this->input->get('oid');
		$this->db->where('oid', $oid);
		$query = $this->db->get('officedetails');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateOffice(){
		$oid = $this->input->post('oid');
		$field = array(
			'oname'=>$this->input->post('oname'),
            'oaddress'=>$this->input->post('oaddress'),
			'ogst'=>$this->input->post('ogst'),
			);
		$this->db->where('oid', $oid);
		$this->db->update('officedetails', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteOffice(){
		$oid = $this->input->get('oid');
		$this->db->where('oid', $oid);
		$this->db->delete('officedetails');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}