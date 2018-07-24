<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cp_m extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    
    public function show_all_data() {
$this->db->select('*');
$this->db->from('cp_master');
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}
public function show_data_by_id($data) {
    
    if($data['sid'] == ''){
$condition = "vid=". "'". $data['vid']."'";
    }
   else if($data['vid'] == ''){
$condition = "sid=". "'". $data['sid']."'";
    }
    else if($data['vid'] !='' && $data['sid'] !='') {
$condition = "sid=". "'". $data['sid']."' AND vid=". "'". $data['vid']."'";
    }
$this->db->select('*');
$this->db->from('cp_master');
$this->db->where($condition);
$this->db->limit(null);
$query = $this->db->get();
if ($query->num_rows() > 0) {
return $query->result();
} else {
return false;
}
}
    
    public function show_data_by_date_range($data) {
        $condition = "cpcreatedon BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
        $this->db->select('*');
        $this->db->from('cp_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function fetch_data()
	{
		$this->db->order_by("cpid", "DESC");
		$query = $this->db->get("cp_master");
		return $query->result();
	}
}
?>
