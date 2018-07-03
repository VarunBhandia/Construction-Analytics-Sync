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
		
		public function browse()
		{
			/* File Select */
			$model = $this->model;
			$data['controller'] = $this->controller;
			/* Database In Data Count */
			$data['Count'] = $this->$model->countTableRecords('material_rqst',array());
			$this->load->view('excel',$data);
		}
		
		public function excel()
		{
			$model = $this->model;
			
			/* Excel File Upload folder Directory: /assets/database */
			/* Excel File Upload configuration */
			$file_excel = $_FILES['excel']['name'];
			$config = Array();
			$config['upload_path'] = FCPATH.'/Database/recovery';
			$config['max_size'] = '102400';
			$config['allowed_types'] = 'xlsx';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = true;
			$file_name = $_FILES['excel']['name'];
			$config['file_name'] = $file_name;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			/* file check if condition is file not upload */
			if(!$this->upload->do_upload('excel'))
			{
				$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button> errors '.$this->upload->display_errors().'</div>');
				redirect('My_controller/browse');
			}
			/* file check else condition is file upload */
			else
			{
				$data_upload = $this->upload->data();
			
				/* excel file read */
				include(APPPATH.'/libraries/simplexlsx.class.php');
				$xlsx = new SimpleXLSX($data_upload['full_path']);
				
				$table = 'material_rqst';
				
				$xlsxData = $xlsx->rows(); //excel rows data
				
				$sid  = 0;
				$arr = array();
				$data = array();				
				
				/* excel file write */
				foreach($xlsxData as $key => $row)
				{
					/* excel sheet in first line break (heading) */
					if(strtolower($row[0]) == 'id')
					{
						continue;
					}
					else
					{
						/* excel sheet in second line to start 
							if condition is check sid == '' and key ==0 then break */
						if($key == 0 && $row[2] =="")
						{
							break;
						}
						/* if in key > 0 and sid== '' then condition true */
						if($key > 0 && $row[2] =="")
						{
								$arr[$mid]['mid'][] = $row[3];
								$arr[$mid]['mrqty'][] = $row[4];
								$arr[$mid]['muid'][] = $row[5];
								$arr[$mid]['mrunitprice'][] = $row[6];
								$arr[$mid]['mrremarks'][] = $row[7];
								$arr[$mid]['mrcreatedon'] = date('Y-m-d H:i:s',strtotime($row[11]));
								$arr[$mid]['mrcreatedby'] = $row[12];
						}
						
						/* else in sid != '' then condition true */
						
						else
						{
							if($row[2] != "")
							{
								$sid = $row[1];
								$mid = $row[2];
								$arr[$mid]['sid'] = $sid;
								$arr[$mid]['mrrefid'] = $row[2];
								$arr[$mid]['mid'][] = $row[3];
								$arr[$mid]['mrqty'][] = $row[4];
								$arr[$mid]['muid'][] = $row[5];
								$arr[$mid]['mrunitprice'][] = $row[6];
								$arr[$mid]['mrremarks'][] = $row[7];
								$arr[$mid]['mrcreatedon'] = date('Y-m-d H:i:s',strtotime($row[11]));
								$arr[$mid]['mrcreatedby'] = $row[12];
							}
						}
					}
				}
				
				foreach($arr as $key=>$val)
				{
					/* Database Is Comma seprate Store */
					$sid = $arr[$key]['sid'];
					$q_mrrefid = $arr[$key]['mrrefid'];
					$q_mid = implode(",",$arr[$key]['mid']);
					$q_qty = implode(",",$arr[$key]['mrqty']);
					$q_muid = implode(",",$arr[$key]['muid']);
					$q_mrremarks = implode(",",$arr[$key]['mrremarks']);
					$q_mrunit = implode(",",$arr[$key]['mrunitprice']);
					$q_mrcreatedon = $arr[$key]['mrcreatedon'];
					$q_mrcreatedby = $arr[$key]['mrcreatedby'];
					
					$data[] = array(
						'sid' => $sid,
						'mid' => $q_mid,
						'mrqty' => $q_qty,
						'mrunitprice' => $q_mrunit,
						'mrrefid' => $q_mrrefid,
						'muid' => $q_muid,
						'mrremarks' => $q_mrremarks,
						'mrcreatedon' => $q_mrcreatedon,
						'mrcreatedby' => $q_mrcreatedby,

					);
					
					
				}
				/* if condition is true then data insert database */
				if(count($data) > 0)
				{
					$this->db->trans_start();
					$this->$model->insert_batch($data, $table);
					$this->db->trans_complete();
					
					/* if condition is true then excel file data not insert then data rollback */
					if($this->db->trans_status() == FALSE)
					{
						$this->db->trans_rollback();
						$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Failed to Uploade Excel File</div>');
					}
					/* else condition is true then data success fully excel file inserted */
					else
					{
						$this->db->trans_commit();
						$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Successfully Excel File Inserted</div>');
					}
					
				} 
				/* else condition is true then data not insert database */
				else {
					$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Failed to Uploade Excel File</div>');
				}
			}
				redirect('My_controller/browse');
		}
		/* database in data display */
		public function server_data()
		{
			$model = $this->model;

			/* datatable in sorting */
			$order_col_id = $_POST['order'][0]['column'];
			$order = (($order_col_id == 9 ) ? "CAST(".$_POST['columns'][$order_col_id]['data']." AS DECIMAL)" : $_POST['columns'][$order_col_id]['data']) . ' ' . $_POST['order'][0]['dir'];

			/* datatable recordsTotal And recordsFiltered */
			$totalData = $this->$model->countTableRecords('material_rqst',array());

			$start = $_POST['start'];
			$limit = $_POST['length'];
			
			/* datatable in limited data display */
			$q = $this->db->query("SELECT * FROM `material_rqst`  Order By $order LIMIT $start, $limit")->result();
			
			$data = array();
			
			if(!empty($q))
				{
					foreach ($q as $key=>$value)
					{
						/* records Datatable */
						$id = $this->primary_id;
						
						$nestedData['mrid'] = $value->mrid;
						$nestedData['sid'] = $value->sid;
						$nestedData['mid'] = $value->mid;
						$nestedData['mrqty'] = $value->mrqty;
						$nestedData['mrunitprice'] = $value->mrunitprice;
						$nestedData['mrrefid'] = $value->mrrefid;
						$nestedData['muid'] = $value->muid;
						$nestedData['mrremarks'] =str_replace(",", "", $value->mrremarks);
						$nestedData['mrcreatedon'] = $value->mrcreatedon;
						$nestedData['mrcreatedby'] = $value->mrcreatedby;
						$data[] = $nestedData;
					}
				}

			$json_data = array(
						"draw" => intval($this->input->post('draw')),
						"recordsTotal"    => intval($totalData),
						"recordsFiltered" => intval($totalData),
						"data" => $data
						);
			echo json_encode($json_data);
		}
	}
?>







