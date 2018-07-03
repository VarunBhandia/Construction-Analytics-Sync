<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Rtv extends CI_Controller
	{
		public $table = 'rtv_master';
		public $controller = 'rtv';
		public $message = 'Construction';
		public $primary_id = "rtvid";
		public $model;
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Model');
            $this->load->model('rtv_m');
			$this->model = 'Model';
			date_default_timezone_set('Asia/Kolkata');
		}
        
        public function view_table()
        {			
            $data['controller'] = $this->controller;
            $model = $this->model;
            $result = $this->rtv_m->show_all_data();
            if ($result != false) {
                return $result;
            } else {
                return 'Database is empty !';
            }
        }
        
        public function select_by_id() 
        {
            $model = $this->model;
			$data['controller'] = $this->controller;
            $sid = $this->input->post('sid');
            if ($sid != "") {
                $result = $this->rtv_m->show_data_by_id($sid);
                if ($result != false) {
                    $data['result_display'] = $result;
                } else 
                    {
                    $data['result_display'] = "No record found !";
                    }
            } 
            else {
                $data = array(
                    'id_error_message' => "Id field is required"
                );
                }
            $data['row'] = $this->$model->select(array(),$this->table,array(),'');
            $data['show_table'] = $this->view_table();
            $this->load->view('rtv/index', $data);
        }
	
		public function index()
		{
			$model = $this->model;
			$data['controller'] = $this->controller;
			$data['row'] = $this->$model->select(array(),$this->table,array(),'');
			//$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
			$this->load->view('rtv/index',$data);
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
			$this->load->view('rtv/form',$data);
		}

		public function insert()
		{
			$model = $this->model;
			$site = $this->input->post('site');
			$vendor = $this->input->post('vendor');
            $transporter = $this->input->post('transporter');
			$date = date('Y-m-d',strtotime($this->input->post('date')));
            $vchallan = $this->input->post('vchallan');
            $schallan = $this->input->post('schallan');
            $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
			
			$truck = count($this->input->post('truck')) > 0 ? implode(",",$this->input->post('truck')) : $this->input->post('truck');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $site,
					'vid'  => $vendor,
					'vchallan' => $vchallan,
                    'schallan' => $schallan,
                    'tid' => $transporter,
					'rtvreturndate'  => $date,
					'mid' => $material,
					'rtvqty'  => $qty,
					'muid'  => $m_unit,
					'rtvtruck'  => $truck,
					'rtvremark'  => $remark
				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('Rtv');
		}

		public function edit($rtvid)
		{
            $model = $this->model;
			$data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$rtvid),'');
            $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
            $data['units'] = $this->$model->select(array(),'munits',array(),'');
            $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
			$data['action'] = "update";
			$data['controller'] = $this->controller;
			$this->load->view('rtv/form',$data);
		}

		public function update()
		{
			$model = $this->model;

			$site = $this->input->post('site');
			$vendor = $this->input->post('vendor');
            $transporter = $this->input->post('transporter');
            $date = date('Y-m-d',strtotime($this->input->post('date')));
			$vchallan = $this->input->post('vchallan');
            $schallan = $this->input->post('schallan');
            
			$material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
			
			$truck = count($this->input->post('truck')) > 0 ? implode(",",$this->input->post('truck')) : $this->input->post('truck');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $site,
					'vid'  => $vendor,
                	'tid'  => $transporter,
					'rtvreturndate'  => $date,
                    'vchallan' => $vchallan,
                    'schallan' => $schallan,
					'mid' => $material,
					'rtvqty'  => $qty,
					'muid'  => $m_unit,
					'rtvtruck'  => $truck,
					'rtvremark'  => $remark
				);
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$rtvid = $this->input->post('rtvid');
			$where = array($this->primary_id=>$rtvid);
			$this->$model->update($this->table,$data,$where);
			
			redirect('Rtv');
		}

		public function delete($rtvid)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$rtvid);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('Rtv');
		}
	}
?>