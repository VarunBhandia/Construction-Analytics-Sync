<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Category extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('Category_m', 'm');
	}

	function index()
    {
		$this->load->model("Category_m");
        $data["category_data"] = $this->Category_m->fetch_data();
        $this->load->view('Layout/Header');
		$this->load->view('Category/Index');
		$this->load->view('Layout/Footer');
	}

	public function showAllCategory(){
		$result = $this->m->showAllCategory();
		echo json_encode($result);
	}
    
    function action()
            
	    {
		$this->load->model("Category_m");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("Cid",  "cname" );

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$category_data = $this->Category_m->fetch_data();

		$excel_row = 2;

		foreach($category_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->cid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->cname);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Employee Data.xls"');
		$object_writer->save('php://output');
            
        }

	public function addCategory(){
		$result = $this->m->addCategory();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editCategory(){
		$result = $this->m->editCategory();
		echo json_encode($result);
	}

	public function updateCategory(){
		$result = $this->m->updateCategory();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteCategory(){
		$result = $this->m->deleteCategory();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
?>