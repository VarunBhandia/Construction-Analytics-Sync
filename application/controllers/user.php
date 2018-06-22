<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class user extends CI_Controller
	{
		public $table = 'users';
		public $sitetable = 'sitedetails';
		public $controller = 'user';
		public $message = 'Construction';
		public $primary_id = "uid";
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
			$this->load->view('user/index',$data);
		}
		
		public function form()
		{
			$model = $this->model;
			$data['action'] = "insert";
			$data['controller'] = $this->controller;
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$this->load->view('user/form',$data);
		}

		public function insert()
		{
			$model = $this->model;
			
			$uname = $this->input->post('uname');
			$password = $this->input->post('password');
			$uemail = $this->input->post('uemail');
			$uaddress = $this->input->post('uaddress');
			$umobile = $this->input->post('umobile');
			$user_role = $this->input->post('user');
			$site_role = $this->input->post('site_role');
			$material = $this->input->post('material');
			$vendor = $this->input->post('vendor');
			$mr = $this->input->post('mr');
			$po = $this->input->post('po');
			$rtv = $this->input->post('rtv');
			$cp = $this->input->post('cp');
			$uogrn = $this->input->post('uogrn');
			$vendorbills = $this->input->post('vendorbills');
			$vendorbillpayment = $this->input->post('vendorbillpayment');
			$moveorder = $this->input->post('moveorder');
			$officegstdetails = $this->input->post('officegstdetails');
			$subcontractor = $this->input->post('subcontractor');
			$transporter = $this->input->post('transporter');
			$workorder = $this->input->post('workorder');
			$reporting = $this->input->post('reporting');
			$workordermaterials = $this->input->post('workordermaterials');
			$consumption = $this->input->post('consumption');
            $site = count($this->input->post('site')) > 0 ? implode(",",$this->input->post('site')) : $this->input->post('site');
			$data = array(
					'username'  => $uname,
					'password'  => $password,
					'uemail'  => $uemail,
					'uaddress'  => $uaddress,
					'umobile'  => $umobile,
					'user_role'  => $user_role,
					'site_role'  => $site_role,
					'material'  => $material,
					'vendor'  => $vendor,
					'mr'  => $mr,
					'po'  => $po,
					'rtv'  => $rtv,
					'cp'  => $cp,
					'uogrn'  => $uogrn,
					'vendorbills'  => $vendorbills,
					'vendorbillpayment'  => $vendorbillpayment,
					'moveorder'  => $moveorder,
					'officegstdetails'  => $officegstdetails,
					'subcontractor'  => $subcontractor,
					'transporter'  => $transporter,
					'workorder'  => $workorder,
					'reporting'  => $reporting,
					'workordermaterials'  => $workordermaterials,
					'consumption'  => $consumption,
					'site'  => $site
				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('user');
		}

		public function edit($uid)
		{
//			$uid = $this->uri->segment(3);
//			echo '<h1>'.$uid.'</h1>';
			$model = $this->model;
			$data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$uid),'');
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['action'] = "update";
			$data['controller'] = $this->controller;
			$this->load->view('user/form',$data);
		}

		public function update()
		{
$model = $this->model;
			
			$uname = $this->input->post('uname');
			$password = $this->input->post('password');
			$uemail = $this->input->post('uemail');
			$uaddress = $this->input->post('uaddress');
			$umobile = $this->input->post('umobile');
			$user_role = $this->input->post('user');
			$site_role = $this->input->post('site_role');
			$material = $this->input->post('material');
			$vendor = $this->input->post('vendor');
			$mr = $this->input->post('mr');
			$po = $this->input->post('po');
			$rtv = $this->input->post('rtv');
			$cp = $this->input->post('cp');
			$uogrn = $this->input->post('uogrn');
			$vendorbills = $this->input->post('vendorbills');
			$vendorbillpayment = $this->input->post('vendorbillpayment');
			$moveorder = $this->input->post('moveorder');
			$officegstdetails = $this->input->post('officegstdetails');
			$subcontractor = $this->input->post('subcontractor');
			$transporter = $this->input->post('transporter');
			$workorder = $this->input->post('workorder');
			$reporting = $this->input->post('reporting');
			$workordermaterials = $this->input->post('workordermaterials');
			$consumption = $this->input->post('consumption');
            $site = count($this->input->post('site')) > 0 ? implode(",",$this->input->post('site')) : $this->input->post('site');
			$data = array(
					'username'  => $uname,
					'password'  => $password,
					'uemail'  => $uemail,
					'uaddress'  => $uaddress,
					'umobile'  => $umobile,
					'user_role'  => $user_role,
					'site_role'  => $site_role,
					'material'  => $material,
					'vendor'  => $vendor,
					'mr'  => $mr,
					'po'  => $po,
					'rtv'  => $rtv,
					'cp'  => $cp,
					'uogrn'  => $uogrn,
					'vendorbills'  => $vendorbills,
					'vendorbillpayment'  => $vendorbillpayment,
					'moveorder'  => $moveorder,
					'officegstdetails'  => $officegstdetails,
					'subcontractor'  => $subcontractor,
					'transporter'  => $transporter,
					'workorder'  => $workorder,
					'reporting'  => $reporting,
					'workordermaterials'  => $workordermaterials,
					'consumption'  => $consumption,
					'site'  => $site
				);
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$uid = $this->input->post('uid');
			$where = array($this->primary_id=>$uid);
			$this->$model->update($this->table,$data,$where);
            
            echo $uid;
			
			redirect('user');
		}

		public function delete($uid)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$uid);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('user');
		}
	}
?>