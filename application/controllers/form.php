<?php
class Form extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->helper('form');
}
public function form_dropdown() {
$this->load->view("reg_form");
}
public function data_submitted() {
//storing the value send by submit using post method in an array
$mul_array = $this->input->post('Technical_skills');
//converting array into a string
$mul_val_string = serialize($mul_array);
$data = array(
'dropdown_single' => $this->input->post('Department'),
'dropdown_multi' => $mul_val_string
);
$this->load->model("db_dropdown");
$this->db_dropdown->insert_in_db($data);
$this->load->model("db_dropdown");
$result = $this->db_dropdown->read_from_db($data);
$data['result'] = $result[0];
$this->load->view("reg_form", $data);
}
}
?>