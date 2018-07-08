<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_m extends CI_Model{
	public function showAllVendor(){
		$this->db->order_by('vid', 'desc');
		$query = $this->db->get('vendordetails');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addVendor(){
		$field = array(
			'vname'=>$this->input->post('vname'),
			'vmobile'=>$this->input->post('vmobile'),
			'valtmobile'=>$this->input->post('valtmobile'),
			'vemail'=>$this->input->post('vemail'),
			'vgst'=>$this->input->post('vgst'),
			'vaddress'=>$this->input->post('vaddress'),
			'vdesc'=>$this->input->post('vdesc'),
			);
		$this->db->insert('vendordetails', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editVendor(){
		$vid = $this->input->get('vid');
		$this->db->where('vid', $vid);
		$query = $this->db->get('vendordetails');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateVendor(){
		$vid = $this->input->post('vid');
		$field = array(
			'vname'=>$this->input->post('vname'),
			'vmobile'=>$this->input->post('vmobile'),
			'valtmobile'=>$this->input->post('valtmobile'),
			'vemail'=>$this->input->post('vemail'),
			'vgst'=>$this->input->post('vgst'),
			'vaddress'=>$this->input->post('vaddress'),
			'vdesc'=>$this->input->post('vdesc'),
			);
		$this->db->where('vid', $vid);
		$this->db->update('vendordetails', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteVendor(){
		$vid = $this->input->get('vid');
		$this->db->where('vid', $vid);
		$this->db->delete('vendordetails');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
    
    function fetch_data()
	{
		$this->db->order_by("vid", "DESC");
		$query = $this->db->get("vendordetails");
		return $query->result();
	}
    
    
}