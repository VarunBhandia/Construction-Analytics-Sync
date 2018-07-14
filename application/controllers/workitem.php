<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Workitem extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->model = 'Model';
        $this->load->model('workitem_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("workitem_m");
            $data["wi_data"] = $this->workitem_m->fetch();
            $this->load->model('Model');
            $this->load->view('witem_master/index');
            $this->load->view('layout/footer');
            else  
            {  
                redirect(base_url() . 'main/login');  
            }  
        }

        function fetch()
        {
            $output = '';
            $query = '';
            $this->load->model('workitem_m');
            if($this->input->post('query'))
            {
                $query = $this->input->post('query');
            }

            $data = $this->workitem_m->fetch_data($query);
            $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">  ';
            if($data->num_rows() > 0)
            {
                foreach($data->result() as $row)
                {
                    $output .= '
      <tr>
       <td>'.$row->wiid.'</td>
       <td>'.$row->winame.'</td>
       <td>'.$row->widesc.'</td>
       <td>'.$row->wigst.'</td>
       <td>'.$row->wibase.'</td>
       <td>'.$row->wicategory.'</td>
       <td>'.$row->wicreatedby.'</td>
       <td>'.$row->witype.'</td>
       <td>
       <a href="javascript:;" class="btn btn-info item-edit" data="'.$row->wiid.'">Edit</a>
       <a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->wiid.'">Delete</a></td>

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
            $this->load->model("workitem_m");
            $this->load->library("excel");
            $object = new PHPExcel();

            $object->setActiveSheetIndex(0);

            $table_columns = array("wiid", "winame", "widesc", "wigst", "wibase", "wicategory","wicreatedby", "witype");

            $column = 0;

            foreach($table_columns as $field)
            {
                $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }

            $wi_data = $this->workitem_m->fetch();

            $excel_row = 2;

            foreach($wi_data as $row)
            {
                $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->wiid);
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->winame);
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->widesc);
                $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->wigst);
                $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->wibase);
                $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->wicategory);
                $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->wicreatedby);
                $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->witype);
                $excel_row++;
            }

            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Work Item.xls"');
            $object_writer->save('php://output');

        }

        public function showAllWorkItem(){
            $result = $this->m->showAllWorkItem();
            echo json_encode($result);
        }

        public function addWorkItem(){
            $result = $this->m->addWorkItem();
            $msg['success'] = false;
            $msg['type'] = 'add';
            if($result){
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }

        public function editWorkItem(){
            $result = $this->m->editWorkItem();
            echo json_encode($result);
        }

        public function updateWorkItem(){
            $result = $this->m->updateWorkItem();
            $msg['success'] = false;
            $msg['type'] = 'update';
            if($result){
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }

        public function deleteWorkItem(){
            $result = $this->m->deleteWorkItem();
            $msg['success'] = false;
            if($result){
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }

    }
?>