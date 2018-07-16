<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Transporter extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->model = 'Model';
        $this->load->model('transporter_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("transporter_m");
            $data["t_data"] = $this->transporter_m->fetch();
            $this->load->model('Model');
            $this->load->view('transporter_master/index');
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
        $this->load->model('transporter_m');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->transporter_m->fetch_data($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->tid.'</td>
       <td>'.$row->tname.'</td>
       <td>'.$row->tmobile.'</td>
       <td>'.$row->taltmobile.'</td>
       <td>'.$row->tconame.'</td>
       <td>'.$row->temail.'</td>
       <td>'.$row->tgst.'</td>
       <td>'.$row->taddress.'</td>
       <td>'.$row->tdesc.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->tid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->tid.'">Delete</a></td>

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
        $this->load->model("transporter_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("tid", "tname", "tmobile", "taltmobile", "temail", "tgst", "taddress", "tdesc");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $t_data = $this->transporter_m->fetch();

        $excel_row = 2;

        foreach($t_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->tid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->tname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->tmobile);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->taltmobile);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->temail);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->tgst);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->taddress);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->tdesc);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');

    }

    public function showAllTransporter(){
        $result = $this->m->showAllTransporter();
        echo json_encode($result);
    }

    public function addTransporter(){
        $result = $this->m->addTransporter();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editTransporter(){
        $result = $this->m->editTransporter();
        echo json_encode($result);
    }

    public function updateTransporter(){
        $result = $this->m->updateTransporter();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function deleteTransporter(){
        $result = $this->m->deleteTransporter();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

}
?>
