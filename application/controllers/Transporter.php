<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Transporter extends CI_Controller{
    
    public $table = 'transporters';
    public $controller = 'Transporter';
    public $message = 'Transporters';
    public $primary_id = "tid";
    public $model;
    
    function __construct(){
        parent:: __construct();
        $this->load->model('Model');
        $this->model = 'Model';
        $this->load->model('transporter_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("transporter_m");
            $this->load->model('Model');
            $model = $this->model;
            $data['row'] = $this->Model->select(array(),'transporters',array(),'');
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $this->load->view('transporter/index',$data);
        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  
    }
    
    public function form()
    {
        if($this->session->userdata('username') != '')  
        {
        $model = $this->model;
        $data['action'] = "insert";
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('transporter/form',$data);
            }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  

    }
    
    public function insert()
    {
        $model = $this->model;
        $this->load->model("transporter_m");
        $uid = $this->input->post('uid');
        $creationdate = date('Y-m-d H:i:s');
        $tname = $this->input->post('tname');
        $tmobile = $this->input->post('tmobile');
        $taltmobile = $this->input->post('taltmobile');
        $tconame = $this->input->post('tconame');
        $temail = $this->input->post('temail');
        $tgst = $this->input->post('tgst');
        $taddress = $this->input->post('taddress');
        $tdesc = $this->input->post('tdesc');

        $data = array(
            'tcreatedby'  => $uid,
            'tcreatedon' => $creationdate,
            'tname' => $tname,
            'tmobile' => $tmobile,
            'taltmobile'  => $taltmobile,
            'tconame'  => $tconame,
            'temail'  => $temail,
            'tgst' => $tgst,
            'taddress' => $taddress,
            'tdesc'  => $tdesc
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('Transporter');
    }
    
    public function edit($tid)
    {
        $model = $this->model;
        $this->load->model("transporter_m");      
        $this->load->model("Model");      
        $data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$tid),'');
        $data['action'] = "update";
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $username = $this->session->userdata('username');
//        echo "<pre>";
//        print_r ($data);
//        echo "</pre>";
         $this->load->view('Transporter/form',$data);
    }

    public function update()
    {
        $model = $this->model;
        $this->load->model("transporter_m");
        $uid = $this->input->post('uid');
        $creationdate = date('Y-m-d H:i:s');
        $tname = $this->input->post('tname');
        $tmobile = $this->input->post('tmobile');
        $taltmobile = $this->input->post('taltmobile');
        $tconame = $this->input->post('tconame');
        $temail = $this->input->post('temail');
        $tgst = $this->input->post('tgst');
        $taddress = $this->input->post('taddress');
        $tdesc = $this->input->post('tdesc');

        $data = array(
            'tcreatedby'  => $uid,
            'tname' => $tname,
            'tmobile' => $tmobile,
            'taltmobile'  => $taltmobile,
            'tconame'  => $tconame,
            'temail'  => $temail,
            'tgst' => $tgst,
            'taddress' => $taddress,
            'tdesc'  => $tdesc
        );
        
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $tid = $this->input->post('tid');
        $where = array($this->primary_id=>$tid);
        $this->$model->update($this->table,$data,$where);
//        echo "<pre>";
//        print_r ($where);
//        echo "</pre>";
        redirect('Transporter');
    }

    public function delete($tid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$tid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('Transporter');
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
