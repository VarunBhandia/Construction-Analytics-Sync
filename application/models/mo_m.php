<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mo_m extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    
    public function show_all_data() {
$this->db->select('*');
$this->db->from('mo_master');
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}
public function show_data_by_id($sid) {
    
$condition = "sid =" . "'" . $sid . "'";
$this->db->select('*');
$this->db->from('mo_master');
$this->db->where($condition);
$this->db->limit(null);
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}
}
?>
