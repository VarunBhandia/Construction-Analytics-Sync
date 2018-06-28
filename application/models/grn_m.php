<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Grn_m extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    
    public function show_all_data() {
$this->db->select('*');
$this->db->from('grn_master');
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}
public function show_data_by_id($grnid) {
    
$condition = "grnid =" . "'" . $grnid . "'";
$this->db->select('*');
$this->db->from('grn_master');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}
}
?>
