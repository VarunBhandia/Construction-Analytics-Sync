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
    public function show_data_by_id($data) {

        if($data['tsid'] == ''){
            $condition = "rsid=". "'". $data['rsid']."'";
        }
        else if($data['rsid'] == ''){
            $condition = "tsid=". "'". $data['tsid']."'";
        }
        else if($data['rsid'] !='' && $data['tsid'] !='') {
            $condition = "tsid=". "'". $data['tsid']."' AND rsid=". "'". $data['rsid']."'";
        }
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
    
    function fetch_data()
    {
        $this->db->order_by("moid", "DESC");
        $query = $this->db->get("mo_master");
        return $query->result();
    }
}
?>
