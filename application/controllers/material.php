<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Material extends CI_Controller{

    function __construct(){
        parent:: __construct();
        $this->model = 'Model';
        $this->load->model('material_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("material_m");
            $data["m_data"] = $this->material_m->fetch();
            $this->load->model('Model');
            $this->load->view('layout/footer');
            $data['row'] = $this->Model->select(array(),'materials',array(),'');
            $data['mcategorys'] = $this->Model->select(array(),'category',array(),'');
            $data['munits'] = $this->Model->select(array(),'munits',array(),'');
            $this->load->view('material_master/index',$data);
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
        $result = $this->material_m->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        }
    }

    function action()

    {
        $this->load->model("material_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("mid", "mname", "munit", "mcategory", "mdesc", "hsn", "mgst", "mbase", "mtype", "mcreatedby");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $m_data = $this->material_m->fetch();

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
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->mtype);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->mcreatedby);
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
        $this->load->model('material_m');
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }

        $data = $this->material_m->fetch_data($query);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->mid.'</td>
       <td>'.$row->mname.'</td>
       <td>'.$row->munit.'</td>
       <td>'.$row->mcategory.'</td>
       <td>'.$row->mdesc.'</td>
       <td>'.$row->hsn.'</td>
       <td>'.$row->mgst.'</td>
       <td>'.$row->mbase.'</td>
       <td>'.$row->mtype.'</td>
       <td>'.$row->mcreatedby.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->mid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->mid.'">Delete</a></td>

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