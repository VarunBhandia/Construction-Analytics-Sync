<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_m extends CI_Model{
	public function showAllSite(){
		$this->db->order_by('sid', 'desc');
		$query = $this->db->get('sitedetails');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addSite(){
		$field = array(
			'sname'=>$this->input->post('sname'),
			'sitestartdate'=>$this->input->post('sitestartdate'),
			'uniquesid'=>$this->input->post('uniquesid'),
			'contactname'=>$this->input->post('contactname'),
			'mobile'=>$this->input->post('mobile'),
			'email'=>$this->input->post('email'),
			'address'=>$this->input->post('address'),
			);
		$this->db->insert('sitedetails', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editSite(){
		$sid = $this->input->get('sid');
		$this->db->where('sid', $sid);
		$query = $this->db->get('sitedetails');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateSite(){
		$sid = $this->input->post('sid');
		$field = array(
			'sname'=>$this->input->post('sname'),
			'sitestartdate'=>$this->input->post('sitestartdate'),
			'uniquesid'=>$this->input->post('uniquesid'),
			'contactname'=>$this->input->post('contactname'),
			'mobile'=>$this->input->post('mobile'),
			'email'=>$this->input->post('email'),
			'address'=>$this->input->post('address'),
			);
		$this->db->where('sid', $sid);
		$this->db->update('sitedetails', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteSite(){
		$sid = $this->input->get('sid');
		$this->db->where('sid', $sid);
		$this->db->delete('sitedetails');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
    function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("sitedetails");
  if($query != '')
  {
   $this->db->like('sname', $query);
   $this->db->or_like('uniquesid', $query);
   $this->db->or_like('sitestartdate', $query);
   $this->db->or_like('contactname', $query);
   $this->db->or_like('mobile', $query);
   $this->db->or_like('email', $query);
   $this->db->or_like('address', $query); 
  }
  $this->db->order_by('sid', 'DESC');
  return $this->db->get();
 }
}
?>