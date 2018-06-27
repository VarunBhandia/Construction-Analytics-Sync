<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Grn_copy extends CI_Controller
	{
		public $table = 'grn_master';
		public $controller = 'grn_copy';
		public $message = 'Construction';
		public $primary_id = "grnid";
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
			$data['show_table'] = $this->view_table();
            $this->load->view('grn_Copy/index', $data);
            $model = $this->model;
			$data['controller'] = $this->controller;
			$data['row'] = $this->$model->select(array(),$this->table,array(),'');
			//$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
			$this->load->view('grn_Copy/index',$data);
		}

		
		public function form()
		{
			$model = $this->model;
			$data['action'] = "insert";
			$data['controller'] = $this->controller;
			$data['units'] = $this->$model->select(array(),'munits',array(),'');
            $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
            $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
            $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
			$this->load->view('grn_Copy/form',$data);
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
			
			$challannum = count($this->input->post('challannum')) > 0 ? implode(",",$this->input->post('challannum')) : $this->input->post('challannum');
			
			$transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $site,
					'vid'  => $vendor,
					'grnchallan' => $challan,
					'grnreceivedate'  => $date,
					'mid' => $material,
					'grnqty'  => $qty,
					'grnunitprice'  => $unit,
					'muid'  => $m_unit,
					'grntruck'  => $truck,
					'grnlinechallan'  => $challannum,
					'tid'  => $transporter,
					'grnremarks'  => $remark
				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('grn_Copy');
		}

		public function edit($grnid)
		{
            $model = $this->model;
			$data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$grnid),'');
            $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
            $data['units'] = $this->$model->select(array(),'munits',array(),'');
            $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
			$data['action'] = "update";
			$data['controller'] = $this->controller;
			$this->load->view('grn_Copy/form',$data);
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
			
			$challannum = count($this->input->post('challannum')) > 0 ? implode(",",$this->input->post('challannum')) : $this->input->post('challannum');
			
			$transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $site,
					'vid'  => $vendor,
					'grnchallan' => $challan,
					'grnreceivedate'  => $date,
					'mid' => $material,
					'grnqty'  => $qty,
					'grnunitprice'  => $unit,
					'muid'  => $m_unit,
					'grntruck'  => $truck,
					'grnlinechallan'  => $challannum,
					'tid'  => $transporter,
					'grnremarks'  => $remark
				);
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$grnid = $this->input->post('grnid');
			$where = array($this->primary_id=>$grnid);
			$this->$model->update($this->table,$data,$where);
			
			redirect('grn_Copy');
		}

		public function delete($grnid)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$grnid);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('grn_Copy');
		}
	}
?>