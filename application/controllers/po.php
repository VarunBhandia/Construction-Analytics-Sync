<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Po extends CI_Controller
	{
		public $table = 'purchaseorder';
		public $sitetable = 'sitedetails';
		public $controller = 'Po';
		public $message = 'Construction';
		public $primary_id = "poid";
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
			$data['row'] = $this->$model->select(array(),'material_rqst',array(mrid=>$poid),'');
            

			//$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
			$this->load->view('po/index',$data);
		}
		
		public function form($poid)
		{
			$model = $this->model;
            echo $poid;
            $data['row'] = $this->$model->select(array(),'material_rqst',array('mrid'=>$poid),'');
			$data['action'] = "insert";
			$data['controller'] = $this->controller;
			$data['units'] = $this->$model->select(array(),'munits',array(),'');
			$data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
            $poid = $this->uri->segment(3);
			$this->load->view('po/form',$data);
            $data['material_rqsts'] = $this->$model->select(array(),'material_rqst',array('mrid'=>$poid),'');
            echo '<pre>';
            print_r($data[material_rqsts]);
            echo '</pre>';


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
	}
?>