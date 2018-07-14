<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Subcont extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->model = 'Model';
        $this->load->model('subcont_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("subcont_m");
            $data["sub_data"] = $this->subcont_m->fetch();
            $this->load->model('Model');
            $this->load->view('subcont/index');
            $this->load->view('layout/footer');
        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  
    }

    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('subcont_m');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->subcont_m->fetch_data($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->subid.'</td>
       <td>'.$row->subname.'</td>
       <td>'.$row->submobile.'</td>
       <td>'.$row->subaltmobile.'</td>
       <td>'.$row->subemail.'</td>
       <td>'.$row->subgst.'</td>
       <td>'.$row->subaddress.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->subid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->subid.'">Delete</a></td>

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

    function action()

    {
        $this->load->model("subcont_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("subid", "subname", "submobile", "subaltmobile", "subemail", "subgst", "subaddress");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $sub_data = $this->subcont_m->fetch();

        $excel_row = 2;

        foreach($sub_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->subid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->subname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->submobile);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->subaltmobile);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->subemail);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->subgst);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->subaddress);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');

    }

    public function showAllSubcont(){
        $result = $this->m->showAllSubcont();
        echo json_encode($result);
    }

    public function addSubcont(){
        $result = $this->m->addSubcont();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editSubcont(){
        $result = $this->m->editSubcont();
        echo json_encode($result);
    }

    public function updateSubcont(){
        $result = $this->m->updateSubcont();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function deleteSubcont(){
        $result = $this->m->deleteSubcont();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

}
?>