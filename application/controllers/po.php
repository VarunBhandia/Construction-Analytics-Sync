<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Po extends CI_Controller
	{
		public $table = 'po_master';
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
			$data['row'] = $this->$model->select(array(),'material_rqst',array(),'');
			$data['po_row'] = $this->$model->select(array(),$this->table,array(),'');
			$data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
//            echo '<pre>';
//            print_r($data['po_row']);
//            echo '</pre>';

			//$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
			$this->load->view('po/index',$data);
		}
		
		public function form($poid)
		{
			$model = $this->model;
//            echo $poid;
            $data['row'] = $this->$model->select(array(),'material_rqst',array('mrid'=>$poid),'');
			$data['action'] = "insert";
			$data['controller'] = $this->controller;
			$data['units'] = $this->$model->select(array(),'munits',array(),'');
			$data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
			$data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
            $poid = $this->uri->segment(3);
			$this->load->view('po/form',$data);
            $data['material_rqsts'] = $this->$model->select(array(),'material_rqst',array('mrid'=>$poid),'');
//            echo '<pre>';
//            print_r($data[material_rqsts]);
//            echo '</pre>';


		}

		public function insert()
		{
			$model = $this->model;
			$site = $this->input->post('site');
			$csgt_total = $this->input->post('csgt_total');
			$ssgt_total = $this->input->post('ssgt_total');
			$isgt_total = $this->input->post('isgt_total');
			$total_amount = $this->input->post('total_amount');
			$frieght_amount = $this->input->post('frieght_amount');
			$gst_frieght_amount = $this->input->post('gst_frieght_amount');
			$gross_amount = $this->input->post('gross_amount');
			$invoice_to = $this->input->post('invoice_to');
			$contact_name = $this->input->post('contact_name');
			$contact_no = $this->input->post('contact_no');
			$tandc = $this->input->post('tandc');
			$date = date('Y-m-d',strtotime($this->input->post('date')));
            
			$mid = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
            
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
            
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');	
            
			$app_qty = count($this->input->post('app_qty')) > 0 ? implode(",",$this->input->post('app_qty')) : $this->input->post('app_qty');		
            
			$unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');		
            
			$discount_type = count($this->input->post('discount_type')) > 0 ? implode(",",$this->input->post('discount_type')) : $this->input->post('discount_type');		
            
			$discount = count($this->input->post('discount')) > 0 ? implode(",",$this->input->post('discount')) : $this->input->post('discount');	
            
			$cgst = count($this->input->post('cgst')) > 0 ? implode(",",$this->input->post('cgst')) : $this->input->post('cgst');		
			$sgst = count($this->input->post('sgst')) > 0 ? implode(",",$this->input->post('sgst')) : $this->input->post('sgst');		
			$igst = count($this->input->post('igst')) > 0 ? implode(",",$this->input->post('igst')) : $this->input->post('igst');  
            
			$total = count($this->input->post('total')) > 0 ? implode(",",$this->input->post('total')) : $this->input->post('total');    
			$vendor = count($this->input->post('vendor')) > 0 ? implode(",",$this->input->post('vendor')) : $this->input->post('vendor');    
            
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');    
			$data = array(
					'sid'  => $site,
					'csgt_total'  => $csgt_total,
					'ssgt_total'  => $ssgt_total,
					'isgt_total'  => $isgt_total,
					'total_amount'  => $total_amount,
					'frieght_amount'  => $frieght_amount,
					'gst_frieght_amount' => $gst_frieght_amount,
					'gross_amount'  => $gross_amount,
					'invoice_to'  => $invoice_to,
					'contact_name'  => $contact_name,
					'contact_no'  => $contact_no,
					'tandc'  => $tandc,
					'pocreatedon'  => $date,
					'm_unit'  => $m_unit,
					'qty'  => $qty,
					'app_qty'  => $app_qty,
					'unit'  => $unit,
					'dtid'  => $discount_type,
					'discount'  => $discount,
					'cgst'  => $cgst,
					'sgst'  => $sgst,
					'igst'  => $igst,
					'total'  => $total,
					'vid'  => $vendor,
					'remark'  => $remark

				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('po/index');
		}
        
        public function edit($poid)
		{
			$poid = $this->uri->segment(3);
//			echo '<h1>'.$poid.'</h1>';
			$model = $this->model;
			$data['action'] = "update";
			$data['row_po'] = $this->$model->select(array(),$this->table,array('poid'=>$poid),'');
            $data['row'] = $this->$model->select(array(),'material_rqst',array('mrid'=>$poid),'');
			$data['controller'] = $this->controller;
			$data['units'] = $this->$model->select(array(),'munits',array(),'');
			$data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
			$data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
			$this->load->view('po/form',$data);
//            echo '<pre>';
//            print_r($data['row_po']);
//            echo '</pre>';
		}

		public function update()
		{
            $model = $this->model;
			
			$site = $this->input->post('site');
			$csgt_total = $this->input->post('csgt_total');
			$ssgt_total = $this->input->post('ssgt_total');
			$isgt_total = $this->input->post('isgt_total');
			$total_amount = $this->input->post('total_amount');
			$frieght_amount = $this->input->post('frieght_amount');
			$gst_frieght_amount = $this->input->post('gst_frieght_amount');
			$gross_amount = $this->input->post('gross_amount');
			$invoice_to = $this->input->post('invoice_to');
			$contact_name = $this->input->post('contact_name');
			$vendor = $this->input->post('vendor');
			$contact_no = $this->input->post('contact_no');
			$tandc = $this->input->post('tandc');
			$date = date('Y-m-d',strtotime($this->input->post('date')));
            
			$mid = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
            
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
            
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');	
            
			$app_qty = count($this->input->post('app_qty')) > 0 ? implode(",",$this->input->post('app_qty')) : $this->input->post('app_qty');		
            
			$unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');		
            
			$discount_type = count($this->input->post('discount_type')) > 0 ? implode(",",$this->input->post('discount_type')) : $this->input->post('discount_type');		
            
			$discount = count($this->input->post('discount')) > 0 ? implode(",",$this->input->post('discount')) : $this->input->post('discount');	
            
			$cgst = count($this->input->post('cgst')) > 0 ? implode(",",$this->input->post('cgst')) : $this->input->post('cgst');		
			$sgst = count($this->input->post('sgst')) > 0 ? implode(",",$this->input->post('sgst')) : $this->input->post('sgst');		
			$igst = count($this->input->post('igst')) > 0 ? implode(",",$this->input->post('igst')) : $this->input->post('igst');  
            
			$total = count($this->input->post('total')) > 0 ? implode(",",$this->input->post('total')) : $this->input->post('total');    
			$vendor = count($this->input->post('vendor')) > 0 ? implode(",",$this->input->post('vendor')) : $this->input->post('vendor');    
            
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');    
			$data = array(
					'sid'  => $site,
					'csgt_total'  => $csgt_total,
					'ssgt_total'  => $ssgt_total,
					'isgt_total'  => $isgt_total,
					'total_amount'  => $total_amount,
					'frieght_amount'  => $frieght_amount,
					'gst_frieght_amount' => $gst_frieght_amount,
					'gross_amount'  => $gross_amount,
					'invoice_to'  => $invoice_to,
					'contact_name'  => $contact_name,
					'contact_no'  => $contact_no,
					'tandc'  => $tandc,
					'pocreatedon'  => $date,
					'mid'  => $mid,
					'm_unit'  => $m_unit,
					'qty'  => $qty,
					'app_qty'  => $app_qty,
					'unit'  => $unit,
					'dtid'  => $discount_type,
					'discount'  => $discount,
					'cgst'  => $cgst,
					'sgst'  => $sgst,
					'igst'  => $igst,
					'total'  => $total,
					'vid'  => $vendor,
					'remark'  => $remark

				);
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$poid = $this->input->post('poid');
			$where = array($this->primary_id=>$poid);
			$this->$model->update($this->table,$data,$where);
			
			redirect('po/index');
		}

		public function delete($poid)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$poid);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('po/index');
		}
	}
?>