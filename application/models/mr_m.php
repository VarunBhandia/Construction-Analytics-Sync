<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mr_m extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    
    public function show_all_data() {
$this->db->select('*');
$this->db->from('material_rqst');
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
$this->db->from('material_rqst');
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
        $condition = "mrcreatedon BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
        $this->db->select('*');
        $this->db->from('material_rqst');
        $this->db->where($condition);
        $query = $this->db->get();
//        echo '<pre>';
//        print_r($query);
//        echo '</pre>';
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function fetch_data()
    {
        $this->db->order_by("mrid", "DESC");
        $query = $this->db->get("material_rqst");
        return $query->result();
    }
}
?>
