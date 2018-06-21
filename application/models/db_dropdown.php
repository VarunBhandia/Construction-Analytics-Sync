<?php
class Db_Dropdown extends CI_Model {
public function form_dropdown() {
$this->load->view("reg_form");
}
public function insert_in_db($data) {
$this->db->insert('dropdown_value', $data);
if ($this->db->affected_rows() > 1) {
return true;
} else {
return false;
}
}
public function read_from_db($data) {
$condition = "dropdown_single =" . "'" . $data['dropdown_single'] . "' AND " . "dropdown_multi =" . "'" . $data['dropdown_multi'] . "'";
$this->db->select('*');
$this->db->from('dropdown_value');
$this->db->where($condition);
$query = $this->db->get();
$data = $query->result();
return $data;
}
}
?>