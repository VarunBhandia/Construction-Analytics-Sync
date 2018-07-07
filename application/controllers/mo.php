<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Mo extends CI_Controller
	{
		public $table = 'mo_master';
		public $controller = 'mo';
		public $message = 'Construction';
		public $primary_id = "moid";
		public $model;
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Model');
             $this->load->model('mo_m');
			$this->model = 'Model';
			date_default_timezone_set('Asia/Kolkata');
		}
        
        public function view_table()
        {			
            $data['controller'] = $this->controller;
            $model = $this->model;
            $result = $this->mo_m->show_all_data();
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
                $result = $this->mo_m->show_data_by_id($sid);
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
            $this->load->view('mo/index', $data);
        }
	
		public function index()
		{
			$this->load->model("mo_m");
		    $data["mo_data"] = $this->mo_m->fetch_data();
            $model = $this->model;
			$data['controller'] = $this->controller;
			$data['row'] = $this->$model->select(array(),$this->table,array(),'');
			//$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
			$this->load->view('mo/index',$data);
		}
        
        function action()
            
	    {
		$this->load->model("mo_m");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("moid",  "morefid", "sid", "mochallan", "mid", "muid", "modate", "moqty", "movehicle", "tid", "moremark", "mocreatedon", "mocreatedby");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$mo_data = $this->mo_m->fetch_data();

		$excel_row = 2;

		foreach($mo_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->moid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->morefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->mochallan);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->mid);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->muid);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->modate);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->moqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->movehicle);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->tid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->moremark);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->mocreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->mocreatedby);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Employee Data.xls"');
		$object_writer->save('php://output');
            
        }
		
		public function form()
		{
			$model = $this->model;
			$data['action'] = "insert";
			$data['controller'] = $this->controller;
			$data['units'] = $this->$model->select(array(),'munits',array(),'');
            $data['tsites'] = $this->$model->select(array(),'sitedetails',array(),'');
            $data['rsites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
            $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
			$this->load->view('mo/form',$data);
		}

		public function insert()
		{
			$model = $this->model;
			$tsite = $this->input->post('tsite');
            $rsite = $this->input->post('rsite');
			$date = date('Y-m-d',strtotime($this->input->post('date')));
            $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
			
			$vehicle = count($this->input->post('vehicle')) > 0 ? implode(",",$this->input->post('vehicle')) : $this->input->post('$vehicle');
			
			$challan = count($this->input->post('challan')) > 0 ? implode(",",$this->input->post('challan')) : $this->input->post('$challan');
			
			$transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $tsite,
                    'sid'  => $rsite,
					'modate'  => $date,
					'mid' => $material,
					'moqty'  => $qty,
					'muid'  => $m_unit,
					'movehicle'  => $vehicle,
					'mochallan'  => $challan,
					'tid'  => $transporter,
					'moremark'  => $remark
				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('Mo');
		}

		public function edit($moid)
		{
            $model = $this->model;
			$data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$moid),'');
            $data['tsites'] = $this->$model->select(array(),'sitedetails',array(),'');
            $data['rsites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
            $data['units'] = $this->$model->select(array(),'munits',array(),'');
            $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
			$data['action'] = "update";
			$data['controller'] = $this->controller;
			$this->load->view('mo/form',$data);
		}

		public function update()
		{
			$model = $this->model;

			$tsite = $this->input->post('tsite');
            $rsite = $this->input->post('rsite');
			$date = date('Y-m-d',strtotime($this->input->post('date')));

			$material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');
			
			$qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');
			
			$m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');
			
			$vehicle = count($this->input->post('$vehicle')) > 0 ? implode(",",$this->input->post('$vehicle')) : $this->input->post('$vehicle');
			
			$challan = count($this->input->post('$challan')) > 0 ? implode(",",$this->input->post('$challan')) : $this->input->post('$challan');
			
			$transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');
			
			$remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');
			
			$data = array(
					'sid'  => $tsite,
                    'sid'  => $rsite,
					'modate'  => $date,
					'mid' => $material,
					'moqty'  => $qty,
                    'muid'  => $m_unit,
					'movehicle'  => $vehicle,
					'mochallan'  => $challan,
					'tid'  => $transporter,
					'moremark'  => $remark
				);
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$moid = $this->input->post('moid');
			$where = array($this->primary_id=>$moid);
			$this->$model->update($this->table,$data,$where);
			
			redirect('Mo');
		}

		public function delete($moid)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$moid);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('Mo');
		}
	}
?>