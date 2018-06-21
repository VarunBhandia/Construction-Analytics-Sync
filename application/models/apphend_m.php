<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apphend_m extends CI_Model{
    
	public function addData(){
        $number = count($this->input->post('name'));
        for($i=0; $i<10; $i++) {echo $i;}
        for($i=0; $i<$number; $i++) {
            echo $i;
            $field = array (
            'name'=>$this->input->post('name[$i]'));
            $this->db->insert('dyform', $field);    
        }
	}
}