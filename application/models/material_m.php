<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_m extends CI_Model{
	public function showAllMaterial(){
		$this->db->order_by('mid', 'desc');
		$query = $this->db->get('materials');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addMaterial(){
		$field = array(
			'mname'=>$this->input->post('mname'),
			'munit'=>$this->input->post('munit'),
			'mcategory'=>$this->input->post('mcategory'),
			'mdesc'=>$this->input->post('mdesc'),
			'hsn'=>$this->input->post('hsn'),
			'mgst'=>$this->input->post('mgst'),
            'mbase'=>$this->input->post('mbase'),
            'mtype'=>$this->input->post('mtype'),
			);
		$this->db->insert('materials', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editMaterial(){
		$mid = $this->input->get('mid');
		$this->db->where('mid', $mid);
		$query = $this->db->get('materials');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateMaterial(){
		$mid = $this->input->post('mid');
		$field = array(
			'mname'=>$this->input->post('mname'),
			'munit'=>$this->input->post('munit'),
			'mcategory'=>$this->input->post('mcategory'),
			'mdesc'=>$this->input->post('mdesc'),
			'hsn'=>$this->input->post('hsn'),
			'mgst'=>$this->input->post('mgst'),
            'mbase'=>$this->input->post('mbase'),
            'mtype'=>$this->input->post('mtype'),
			);
		$this->db->where('mid', $mid);
		$this->db->update('materials', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
    
    
    public function show_all_data() {
$this->db->select('*');
$this->db->from('materials');
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}

    public function show_data_by_id($mid) {
    
$condition = "mid =" . "'" . $mid . "'";
$this->db->select('*');
$this->db->from('materials');
$this->db->where($condition);
$this->db->limit(null);
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}


	function deleteMaterial(){
		$mid = $this->input->get('mid');
		$this->db->where('mid', $mid);
		$this->db->delete('materials');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
    
    
 function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("materials");
  if($query != '')
  {
   $this->db->like('mname', $query);
   $this->db->or_like('munit', $query);
   $this->db->or_like('mcategory', $query);
   $this->db->or_like('mdesc', $query);
   $this->db->or_like('hsn', $query);
   $this->db->or_like('mgst', $query); 
   $this->db->or_like('mtype', $query);
  }
  $this->db->order_by('mid', 'DESC');
  return $this->db->get();
 }
}
?>