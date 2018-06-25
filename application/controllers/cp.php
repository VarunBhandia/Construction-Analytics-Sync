<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cp extends CI_Controller
	{
		public $table = 'cp_master';
		public $controller = 'cp';
		public $message = 'Construction';
		public $primary_id = "cpid";
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
			$this->load->view('cp/index',$data);
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
			$this->load->view('cp/form',$data);
		}

		public function insert()
		{
			$model = $this->model;
			$site = $this->input->post('site');
			$vendor = $this->input->post('vendor');
			$date = date('Y-m-d',strtotime($this->input->post('date')));
            $challan = $this->input->post('challan');
            $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
            
            $unitprice = count($this->input->post('unitprice')) > 0 ? implode(",",$this->input->post('unitprice')) : $this->input->post('unitprice');
			
			$linechallan = count($this->input->post('$linechallan')) > 0 ? implode(",",$this->input->post('$linechallan')) : $this->input->post('$linechallan');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $site,
					'vid'  => $vendor,
                    'cppurchasedate'  => $date,
					'cpchallan' => $challan,
					'mid' => $material,
					'cpqty'  => $qty,
					'muid'  => $m_unit,
                    'cpunitprice' => $unitprice,
					'cplinechallan'  => $linechallan,
					'cpremark'  => $remark
				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('Cp');
		}

		public function edit($cpid)
		{
            $model = $this->model;
			$data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$cpid),'');
            $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
            $data['units'] = $this->$model->select(array(),'munits',array(),'');
			$data['action'] = "update";
			$data['controller'] = $this->controller;
			$this->load->view('cp/form',$data);
		}

		public function update()
		{
			$model = $this->model;

			$site = $this->input->post('site');
			$vendor = $this->input->post('vendor');
            $date = date('Y-m-d',strtotime($this->input->post('date')));
			$challan = $this->input->post('challan');
            
			$material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
            
            $unitprice = count($this->input->post('$unitprice')) > 0 ? implode(",",$this->input->post('$unitprice')) : $this->input->post('$unitprice');
			
			$linechallan = count($this->input->post('$linechallan')) > 0 ? implode(",",$this->input->post('$linechallan')) : $this->input->post('$linechallan');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $site,
					'vid'  => $vendor,
					'cppurchasedate'  => $date,
                    'cpchallan' => $challan,
					'mid' => $material,
					'cpqty'  => $qty,
					'muid'  => $m_unit,
                    'cpunitprice' => $unitprice,
					'cplinechallan'  => $linechallan,
					'cpremark'  => $remark
				);
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$cpid = $this->input->post('cpid');
			$where = array($this->primary_id=>$cpid);
			$this->$model->update($this->table,$data,$where);
			
			redirect('Cp');
		}

		public function delete($cpid)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$cpid);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('Cp');
		}
	}
?>