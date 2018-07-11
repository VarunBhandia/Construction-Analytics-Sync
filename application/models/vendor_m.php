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
    
    public function show_all_data() {
$this->db->select('*');
$this->db->from('vendordetails');
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
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
    
    function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("vendordetails");
  if($query != '')
  {
   $this->db->like('vname', $query);
   $this->db->or_like('vmobile', $query);
   $this->db->or_like('valtmobile', $query);
   $this->db->or_like('vgst', $query);
   $this->db->or_like('vaddress', $query);
   $this->db->or_like('vdesc', $query); 
  }
  $this->db->order_by('vid', 'DESC');
  return $this->db->get();
 }
    
  function fetch()
    {
        $this->db->order_by("vid", "DESC");
        $query = $this->db->get("vendordetails");
        return $query->result();
    }  
    
    
}