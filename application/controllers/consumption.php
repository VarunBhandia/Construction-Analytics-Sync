<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Consumption extends CI_Controller
	{
		public $table = 'consumption';
		public $sitetable = 'sitedetails';
		public $controller = 'consumption';
		public $message = 'Construction';
		public $primary_id = "consid";
		public $model;
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Model');
            $this->load->model('consumption_m');
			$this->model = 'Model';
			date_default_timezone_set('Asia/Kolkata');
		}
        
        public function view_table()
        {			
            $data['controller'] = $this->controller;
            $model = $this->model;
            $result = $this->consumption_m->show_all_data();
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
                $result = $this->consumption_m->show_data_by_id($sid);
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
            $this->load->view('consumption/index', $data);
        }
	
		public function index()
		{
            $this->load->model("consumption_m");
            $data["cons_data"] = $this->consumption_m->fetch_data();
            $model = $this->model;
			$data['controller'] = $this->controller;
			$data['row'] = $this->$model->select(array(),$this->table,array(),'');

			//$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
			$this->load->view('consumption/index',$data);
		}
        
        function action()
            
	    {
		$this->load->model("consumption_m");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("consid",  "sid", "mid", "muid", "consqty", "consunitprice", "consremark", "conscreatedby", "conscreatedon", "consissuedate" );

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$cons_data = $this->consumption_m->fetch_data();

		$excel_row = 2;

		foreach($cons_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->consid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->consqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->consunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->consremark);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->conscreatedby);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->conscreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->consissuedate);
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
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');
			$this->load->view('consumption/form',$data);
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
					'consissuedate'  => $date,
					'mid' => $mid,
					'consqty'  => $qty,
					'consunitprice'  => $unit,
					'muid'  => $m_unit,
					'consremark'  => $remark
				);
			
			$this->$model->insert($data,$this->table);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');
			
			redirect('consumption');
		}

		public function edit($consid)
		{
			$consid = $this->uri->segment(3);
			echo '<h1>'.$consid.'</h1>';
			$model = $this->model;
			$data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$consid),'');
			$data['units'] = $this->$model->select(array(),'munits',array(),'');
			$data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
			$data['materials'] = $this->$model->select(array(),'materials',array(),'');		
			$data['action'] = "update";
			$data['controller'] = $this->controller;
			$this->load->view('consumption/form',$data);
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
					'consissuedate'  => $date,
					'mid' => $mid,
					'consqty'  => $qty,
					'consunitprice'  => $unit,
					'muid'  => $m_unit,
					'consremark'  => $remark
				);			
			$this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');
			
			$consid = $this->input->post('consid');
			$where = array($this->primary_id=>$consid);
			$this->$model->update($this->table,$data,$where);
			
			redirect('consumption');
		}

		public function delete($consid)
		{
			$model = $this->model;
			$condition = array($this->primary_id=>$consid);
			$this->$model->delete($this->table,$condition);
			
			$this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
			redirect('consumption');
		}

    }
?>