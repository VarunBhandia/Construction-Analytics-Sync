<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Consumption_m extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    
    public function show_all_data() {
$this->db->select('*');
$this->db->from('consumption');
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
$this->db->from('consumption');
$this->db->where($condition);
$this->db->limit(null);
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}
    function fetch_data()
	{
		$this->db->order_by("consid", "DESC");
		$query = $this->db->get("consumption");
		return $query->result();
	}
}
?>
