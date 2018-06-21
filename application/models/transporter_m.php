<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transporter_m extends CI_Model{
	public function showAllTransporter(){
		$this->db->order_by('tid', 'desc');
		$query = $this->db->get('transporters');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addTransporter(){
		$field = array(
			'tname'=>$this->input->post('tname'),
			'tmobile'=>$this->input->post('tmobile'),
			'taltmobile'=>$this->input->post('taltmobile'),
            'tconame'=>$this->input->post('tconame'),
			'temail'=>$this->input->post('temail'),
			'tgst'=>$this->input->post('tgst'),
			'taddress'=>$this->input->post('taddress'),
			'tdesc'=>$this->input->post('tdesc'),
			);
		$this->db->insert('transporters', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editTransporter(){
		$tid = $this->input->get('tid');
		$this->db->where('tid', $tid);
		$query = $this->db->get('transporters');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateTransporter(){
		$tid = $this->input->post('tid');
		$field = array(
			'tname'=>$this->input->post('tname'),
			'tmobile'=>$this->input->post('tmobile'),
			'taltmobile'=>$this->input->post('taltmobile'),
            'tconame'=>$this->input->post('tconame'),
			'temail'=>$this->input->post('temail'),
			'tgst'=>$this->input->post('tgst'),
			'taddress'=>$this->input->post('taddress'),
			'tdesc'=>$this->input->post('tdesc'),
			);
		$this->db->where('tid', $tid);
		$this->db->update('transporters', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteTransporter(){
		$tid = $this->input->get('tid');
		$this->db->where('tid', $tid);
		$this->db->delete('transporters');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}