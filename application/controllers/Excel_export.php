<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export extends CI_Controller {
	
	function index()
	{
		$this->load->model("excel_export_model");
		$data["employee_data"] = $this->excel_export_model->fetch_data();
		$this->load->view("excel_export_view", $data);
	}

	function action()
	{
		$this->load->model("excel_export_model");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("Name", "Address", "Gender", "Designation", "Age");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$employee_data = $this->excel_export_model->fetch_data();

		$excel_row = 2;

		foreach($employee_data as $row)
		{
			$object->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("L")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("M")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("N")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("O")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("P")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("Q")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("R")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("S")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("T")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("U")->setAutoSize(true);
			$object->getActiveSheet()->getColumnDimension("V")->setAutoSize(true);
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->address);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->gender);
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->designation);
			$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->age);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Employee Data.xls"');
		$object_writer->save('php://output');
	}

	
	
}

















































	