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
            $this->load->model('cp_m');
			$this->model = 'Model';
			date_default_timezone_set('Asia/Kolkata');
		}
        
		public function index()
		{
			$this->load->model("cp_m");
		    $data["cp_data"] = $this->cp_m->fetch_data();
            $model = $this->model;
			$data['controller'] = $this->controller;
			$data['row'] = $this->$model->select(array(),$this->table,array(),'');
			//$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
			$this->load->view('cp/index',$data);
		}
        
        function action()
            
	    {
		$this->load->model("cp_m");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("Cpid",  "cprefid", "sid", "vid", "cppurchasedate","cpchallan", "mid", "muid", "cpunitprice",  "cplinechallan", "cpremark", "cpcreatedon", "cpcreatedby", "cpqty");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$cp_data = $this->cp_m->fetch_data();

		$excel_row = 2;

		foreach($cp_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->cpid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->cprefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->vid);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->cppurchasedate);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->cpchallan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->cpunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->cplinechallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->cpremark);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->cpcreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->cpcreatedby);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->cpqty);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Employee Data.xls"');
		$object_writer->save('php://output');
            
        }
        
        function select_by_id_action()
            
	    {
		$sid = $this->input->post('sid');
        $vid = $this->input->post('vid');
        $data['sid'] = $sid;          
        $data['vid'] = $vid;     
             
        
        $this->load->model("cp_m");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("Cpid",  "cprefid", "sid", "vid", "cppurchasedate","cpchallan", "mid", "muid", "cpunitprice",  "cplinechallan", "cpremark", "cpcreatedon", "cpcreatedby", "cpqty");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$cp_data = $this->cp_m->show_data_by_id($data);

		$excel_row = 2;

		foreach($cp_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->cpid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->cprefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->vid);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->cppurchasedate);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->cpchallan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->cpunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->cplinechallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->cpremark);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->cpcreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->cpcreatedby);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->cpqty);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Employee Data.xls"');
		$object_writer->save('php://output');
            
        }

        public function view_table()
        {			
            $data['controller'] = $this->controller;
            $model = $this->model;
            $result = $this->cp_m->show_all_data();
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
            $vid = $this->input->post('vid');
            $data['sid'] = $sid;
            $data['vid'] = $vid;
            if ($sid != "" || $vid != "") 
            {
                $result = $this->cp_m->show_data_by_id($data);
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
            $this->load->view('cp/index', $data);
            
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
			$uid = $this->input->post('uid');
			$vendor = $this->input->post('vendor');
			$date = date('Y-m-d',strtotime($this->input->post('date')));
            $challan = $this->input->post('challan');
            $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
            
            $unitprice = count($this->input->post('unitprice')) > 0 ? implode(",",$this->input->post('unitprice')) : $this->input->post('unitprice');
			
			$linechallan = count($this->input->post('linechallan')) > 0 ? implode(",",$this->input->post('linechallan')) : $this->input->post('linechallan');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $site,
					'cpcreatedby'  => $uid,
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
			$uid = $this->input->post('uid');
			$vendor = $this->input->post('vendor');
            $date = date('Y-m-d',strtotime($this->input->post('date')));
			$challan = $this->input->post('challan');
            
			$material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
            
            $unitprice = count($this->input->post('unitprice')) > 0 ? implode(",",$this->input->post('unitprice')) : $this->input->post('unitprice');
			
			$linechallan = count($this->input->post('linechallan')) > 0 ? implode(",",$this->input->post('linechallan')) : $this->input->post('linechallan');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $site,
					'cpcreatedby'  => $uid,
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