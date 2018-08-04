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
		$this->db->where ('sid', $data['sid']);
		$this->db->where ('vid', $data['vid']);
        $this->db->where ('billed_status', 0);
		$query = $this->db->get('grn_master');
        if ($query->num_rows() > 0) {
            return $query->result();
        } 
        else {
            return false;
        }
    }

}