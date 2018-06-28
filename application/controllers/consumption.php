<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Consumption extends CI_Controller
	{
		public $table = 'consumption';
		public $sitetable = 'sitedetails';
		public $controller = 'consumption';
		public $message = 'Construction';
		public $primary_id = "consid";
		public $model;
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Model');
			$this->model = 'Model';
			date_default_timezone_set('Asia/Kolkata');
		}
	
		public function index()
		{
			$model = $this->model;
			$data['controller'] = $this->controller;
			$data['row'] = $this->$model->select(array(),$this->table,array(),'');
			$data['row'] = $this->$model->select(array(),$this->table,array(),'');

			//$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
			$this->load->view('consumption/index',$data);
		}
        

		public function form()
		{
			$model = $this->model;
			$data['action'] = "insert";
			$data['controller'] = $this->controller;
			$data['units'] = $this->$model->select(array(),'munits',array(),'');
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
			$this->load->view('consumption/form',$data);
		}

		public function insert()
		{
			$model = $this->model;
			
			$site = $this->input->post('site');
			$date = date('Y-m-d',strtotime($this->input->post('date')));

			$mid = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $site,
					'consissuedate'  => $date,
					'mid' => $mid,
					'consqty'  => $qty,
					'consunitprice'  => $unit,
					'muid'  => $m_unit,
					'consremark'  => $remark
				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('consumption');
		}

		public function edit($consid)
		{
			$consid = $this->uri->segment(3);
			echo '<h1>'.$consid.'</h1>';
			$model = $this->model;
			$data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$consid),'');
			$data['units'] = $this->$model->select(array(),'munits',array(),'');
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');		
			$data['action'] = "update";
			$data['controller'] = $this->controller;
			$this->load->view('consumption/form',$data);
		}

		public function update()
		{
$model = $this->model;
			
			$site = $this->input->post('site');
			$date = date('Y-m-d',strtotime($this->input->post('date')));

			$mid = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $site,
					'consissuedate'  => $date,
					'mid' => $mid,
					'consqty'  => $qty,
					'consunitprice'  => $unit,
					'muid'  => $m_unit,
					'consremark'  => $remark
				);			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$consid = $this->input->post('consid');
			$where = array($this->primary_id=>$consid);
			$this->$model->update($this->table,$data,$where);
			
			redirect('consumption');
		}

		public function delete($consid)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$consid);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('consumption');
		}
        public function view_table(){
$result = $this->employee_database->show_all_data();
if ($result != false) {
return $result;
} else {
return 'Database is empty !';
}
}

public function select_by_id() {
$id = $this->input->post('id');
if ($id != "") {
$result = $this->employee_database->show_data_by_id($id);
if ($result != false) {
$data['result_display'] = $result;
} else {
$data['result_display'] = "No record found !";
}
} else {
$data = array(
'id_error_message' => "Id field is required"
);
}
$data['show_table'] = $this->view_table();
$this->load->view('Consumption', $data);
}

public function select_by_date() {
$date = $this->input->post('date');
if ($date != "") {
$result = $this->employee_database->show_data_by_date($date);

if ($result != false) {
$data['result_display'] = $result;
} else {
$data['result_display'] = "No record found !";
}
} else {
$data['date_error_message'] = "Date field is required";
}
$data['show_table'] = $this->view_table();
$this->load->view('Consumption', $data);
}

public function select_by_date_range() {
$date1 = $this->input->post('date_from');
$date2 = $this->input->post('date_to');
$data = array(
'date1' => $date1,
'date2' => $date2
);
if ($date1 == "" || $date2 == "") {
$data['date_range_error_message'] = "Both date fields are required";
} else {
$result = $this->employee_database->show_data_by_date_range($data);
if ($result != false) {
$data['result_display'] = $result;
} else {
$data['result_display'] = "No record found !";
}
}
$data['show_table'] = $this->view_table();
$this->load->view('Consumption', $data);
}

	}
?>