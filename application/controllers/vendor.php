<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Vendor extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('vendor_m', 'm');
	}

	function index(){
        $this->load->model("vendor_m");
        $data["v_data"] = $this->vendor_m->fetch_data();
		$this->load->view('layout/header');
		$this->load->view('vendor_master/index');
		$this->load->view('layout/footer');
	}
    
    function action()
            
	    {
		$this->load->model("vendor_m");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("vid", "vname", "vmobile", "valtmobile", "vemail", "vgst", "vaddress", "vdesc");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$v_data = $this->vendor_m->fetch_data();

		$excel_row = 2;

		foreach($v_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->vid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->vname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->vmobile);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->valtmobile);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->vemail);
			$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->vgst);
			$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->vaddress);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->vdesc);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Employee Data.xls"');
		$object_writer->save('php://output');
            
        }

	public function showAllVendor(){
		$result = $this->m->showAllVendor();
		echo json_encode($result);
	}

	public function addVendor(){
		$result = $this->m->addVendor();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editVendor(){
		$result = $this->m->editVendor();
		echo json_encode($result);
	}

	public function updateVendor(){
		$result = $this->m->updateVendor();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteVendor(){
		$result = $this->m->deleteVendor();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>