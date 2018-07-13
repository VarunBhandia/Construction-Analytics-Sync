<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model{
	public function showAllCategory(){
		$this->db->order_by('cid', 'desc');
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addCategory(){
		$field = array(
			'cname'=>$this->input->post('cname'),
			'uid'=>$this->input->post('uid'),
			);
		$this->db->insert('category', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editCategory(){
		$cid = $this->input->get('cid');
		$this->db->where('cid', $cid);
		$query = $this->db->get('category');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateCategory(){
		$cid = $this->input->post('cid');
		$field = array(
			'uid'=>$this->input->post('uid'),
			'cname'=>$this->input->post('cname'),
            );
		$this->db->where('cid', $cid);
		$this->db->update('category', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteCategory(){
		$cid = $this->input->get('cid');
		$this->db->where('cid', $cid);
		$this->db->delete('category');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
    
    function fetch_data()
	{
		$this->db->order_by("cid", "DESC");
		$query = $this->db->get("category");
		return $query->result();
	}
}
?>


