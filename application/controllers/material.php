<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Material extends CI_Controller{
    
	function __construct(){
		parent:: __construct();
		$this->load->model('material_m', 'm');
	}

	function index(){
        $this->load->model("material_m");
        $data["m_data"] = $this->material_m->fetch_data();
		$this->load->model('Model');
		$this->load->view('layout/header');
		$this->load->view('layout/footer');
        $data['row'] = $this->Model->select(array(),'materials',array(),'');
        $data['mcategorys'] = $this->Model->select(array(),'category',array(),'');
        $data['munits'] = $this->Model->select(array(),'munits',array(),'');
		$this->load->view('material_master/index',$data);

	}
    
    function action()
            
	    {
		$this->load->model("material_m");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("mid", "mname", "munit", "mcategory", "mdesc", "hsn",  "mgst", "mbase", "mtype");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$m_data = $this->material_m->fetch_data();

		$excel_row = 2;

		foreach($m_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->mname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->munit);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->mcategory);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->mdesc);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->hsn);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mgst);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->mbase);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->mtype);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Employee Data.xls"');
		$object_writer->save('php://output');
            
        }

	public function showAllMaterial(){
		$result = $this->m->showAllMaterial();
		echo json_encode($result);
	}

	public function addMaterial(){
		$result = $this->m->addMaterial();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editMaterial(){
		$result = $this->m->editMaterial();
		echo json_encode($result);
	}

	public function updateMaterial(){
		$result = $this->m->updateMaterial();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteMaterial(){
		$result = $this->m->deleteMaterial();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>