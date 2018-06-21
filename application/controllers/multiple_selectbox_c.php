<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Multiple_selectbox_c extends CI_Controller{
  function __construct(){
    parent:: __construct();
        // $this->load->model('food_model');
  }
public function create()
{
          $this->load->view('multipleSelectbox');
    $food_list = $this->input->post('foods');    
    foreach($food_list as $food) {
    $data= array(
        'name' => $this->input->post('name'),
        'foods' => $food
    );
    $this->db->insert('order_items', $data);
    }
}
}
?>