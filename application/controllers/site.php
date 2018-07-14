<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Site extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('site_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("site_m");
            $data["site_data"] = $this->site_m->fetch();        
            $this->load->model('Model');
            $this->load->view('layout/footer');
            $this->load->view('site/index');
            $this->load->view('layout/footer');
        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  
    }

    public function view_table()
    {			
        $data['controller'] = $this->controller;
        $model = $this->model;
        $result = $this->site_m->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        }
    }

    function action()

    {
        $this->load->model("site_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("sid", "sname", "sitestartdate", "uniquesid", "contactname", "mobile", "email", "address", "screatedby");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $site_data = $this->site_m->fetch();

        $excel_row = 2;

        foreach($site_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->sname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sitestartdate);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->uniquesid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->contactname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->mobile);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->address);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->screatedby);
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
        $this->load->model('site_m');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->site_m->fetch_data($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->sid.'</td>
       <td>'.$row->sname.'</td>
       <td>'.$row->sitestartdate.'</td>
       <td>'.$row->uniquesid.'</td>
       <td>'.$row->contactname.'</td>
       <td>'.$row->mobile.'</td>
       <td>'.$row->email.'</td>
       <td>'.$row->address.'</td>
       <td>'.$row->screatedby.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->sid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->sid.'">Delete</a></td>

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

    public function showAllSite(){
        $result = $this->m->showAllSite();
        echo json_encode($result);
    }

    public function addSite(){
        $result = $this->m->addSite();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function editSite(){
        $result = $this->m->editSite();
        echo json_encode($result);
    }

    public function updateSite(){
        $result = $this->m->updateSite();
        $msg['success'] = false;
        $msg['type'] = 'update';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function deleteSite(){
        $result = $this->m->deleteSite();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

}
?>