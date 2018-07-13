<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Vendor extends CI_Controller{
	function __construct(){
		parent:: __construct();
        $this->model = 'Model';
		$this->load->model('vendor_m', 'm');
	}

	function index(){
        $this->load->model("vendor_m");
        $data["v_data"] = $this->vendor_m->fetch();
        $this->load->model('Model');
		$this->load->view('layout/footer');
		$this->load->view('vendor_master/index');
	}
    
    public function view_table()
    {			
        $data['controller'] = $this->controller;
        $model = $this->model;
        $result = $this->vendor_m->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        }
    }

    
    function action()
            
	    {
		$this->load->model("vendor_m");
		$this->load->library("excel");
		$object = new PHPExcel();

		$object->setActiveSheetIndex(0);

		$table_columns = array("vid", "vname", "vmobile", "valtmobile", "vemail", "vgst", "vaddress", "vdesc", "vcreatedby");

		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$v_data = $this->vendor_m->fetch();

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
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->vcreatedby);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Employee Data.xls"');
		$object_writer->save('php://output');
            
        }
    
    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('vendor_m');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->vendor_m->fetch_data($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->vid.'</td>
       <td>'.$row->vname.'</td>
       <td>'.$row->vmobile.'</td>
       <td>'.$row->vgst.'</td>
       <td>'.$row->vaddress.'</td>
       <td>'.$row->vdesc.'</td>
       <td>'.$row->vcreatedby.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->vid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->vid.'">Delete</a></td>

      </tr>';
            }
        }
        else
        {
            $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
        }
        $output .= '</table>';
        echo $output;
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