<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Vendor_bills_m extends CI_Model {

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


    public function show_data_by_site_vendor($data) {
        $condition = "sid=" . $data['sid'] . "'" . " AND vid= " . $data['vid'] . "'";
        $this->db->select('*'); 
        $this->db->from('grn_master');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}