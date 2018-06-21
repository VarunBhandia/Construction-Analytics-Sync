<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class My_controller extends CI_Controller
	{
		public $table = 'test';
		public $controller = 'My_controller';
		public $message = 'Construction';
		public $primary_id = "id";
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
			//$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
			$this->load->view('table',$data);
		}
		
		public function form()
		{
			$model = $this->model;
			$data['action'] = "insert";
			$data['controller'] = $this->controller;
			$data['vendors'] = $this->$model->select(array(),'vendor',array(),'');
			$data['materials'] = $this->$model->select(array(),'material',array(),'');
			$this->load->view('form',$data);
		}

		public function insert()
		{
			$model = $this->model;
			
			$site = $this->input->post('site');
			$vendor = $this->input->post('vendor');
			$challan = $this->input->post('challan');
			$date = date('Y-m-d',strtotime($this->input->post('date')));

			$material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
			
			$truck = count($this->input->post('truck')) > 0 ? implode(",",$this->input->post('truck')) : $this->input->post('truck');
			
			$challan_no = count($this->input->post('challan_no')) > 0 ? implode(",",$this->input->post('challan_no')) : $this->input->post('challan_no');
			
			$transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'site'  => $site,
					'vendor'  => $vendor,
					'challan' => $challan,
					'receive_date'  => $date,
					'material' => $material,
					'qty'  => $qty,
					'unit_price'  => $unit,
					'material_unit'  => $m_unit,
					'trunk_no'  => $truck,
					'challan_no'  => $challan_no,
					'transporter'  => $transporter,
					'remarks'  => $remark
				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('My_controller');
		}

		public function edit($id)
		{
			$model = $this->model;
			$data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$id),'');
			$data['vendors'] = $this->$model->select(array(),'vendor',array(),'');
			$data['materials'] = $this->$model->select(array(),'material',array(),'');
			$data['action'] = "update";
			$data['controller'] = $this->controller;
			$this->load->view('form',$data);
		}

		public function update()
		{
			$model = $this->model;

			$site = $this->input->post('site');
			$vendor = $this->input->post('vendor');
			$challan = $this->input->post('challan');
			$date = date('Y-m-d',strtotime($this->input->post('date')));

			$material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
			
			$truck = count($this->input->post('truck')) > 0 ? implode(",",$this->input->post('truck')) : $this->input->post('truck');
			
			$challan_no = count($this->input->post('challan_no')) > 0 ? implode(",",$this->input->post('challan_no')) : $this->input->post('challan_no');
			
			$transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'site'  => $site,
					'vendor'  => $vendor,
					'challan' => $challan,
					'receive_date'  => $date,
					'material' => $material,
					'qty'  => $qty,
					'unit_price'  => $unit,
					'material_unit'  => $m_unit,
					'trunk_no'  => $truck,
					'challan_no'  => $challan_no,
					'transporter'  => $transporter,
					'remarks'  => $remark
				);
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$id = $this->input->post('id');
			$where = array($this->primary_id=>$id);
			$this->$model->update($this->table,$data,$where);
			
			redirect('My_controller');
		}

		public function delete($id)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$id);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('My_controller');
		}
	}
?>