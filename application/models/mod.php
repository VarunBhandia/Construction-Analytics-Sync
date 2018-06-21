<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_m extends CI_Model{
    
public function insert_t_basic($basic_data) {
    if(!empty($basic_data)) {

        foreach($basic_data as $value) {
            $this->db->insert('t_basic', $basic_data);
        }

    }
}
}