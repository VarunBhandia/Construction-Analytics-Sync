<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Wo extends CI_Controller
	{
		public $table = 'wo_master';
		public $sitetable = 'sitedetails';
		public $controller = 'wo';
		public $message = 'Construction';
		public $primary_id = "woid";
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
			$this->load->view('wo/index',$data);
		}
		
		public function form()
		{
			$model = $this->model;
			$data['action'] = "insert";
			$data['controller'] = $this->controller;
			$data['units'] = $this->$model->select(array(),'munits',array(),'');
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
			$data['subcontdetails'] = $this->$model->select(array(),'subcontdetails',array(),'');
			$data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
			$this->load->view('wo/form',$data);
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
					'mrcreatedon'  => $date,
					'mid' => $mid,
					'mrqty'  => $qty,
					'mrunitprice'  => $unit,
					'muid'  => $m_unit,
					'mrremarks'  => $remark
				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('material_rqst');
		}

		public function edit($mrid)
		{
			$mrid = $this->uri->segment(3);
			echo '<h1>'.$mrid.'</h1>';
			$model = $this->model;
			$data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$mrid),'');
			$data['units'] = $this->$model->select(array(),'munits',array(),'');
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');		
			$data['action'] = "update";
			$data['controller'] = $this->controller;
			$this->load->view('material_rqst/form',$data);
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
					'mrcreatedon'  => $date,
					'mid' => $mid,
					'mrqty'  => $qty,
					'mrunitprice'  => $unit,
					'muid'  => $m_unit,
					'mrremarks'  => $remark
				);			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$mrid = $this->input->post('mrid');
			$where = array($this->primary_id=>$mrid);
			$this->$model->update($this->table,$data,$where);
			
			redirect('material_rqst');
		}

		public function delete($mrid)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$mrid);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('material_rqst');
		}
	}
?>