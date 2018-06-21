<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class food_model extends CI_Model{
    
public function add_food($data)
{
    $this->db->insert('order_items', $data);
}
}
?>