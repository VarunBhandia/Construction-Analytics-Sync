<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Vendor extends CI_Controller{
    
    public $table = 'vendordetails';
    public $controller = 'Vendor';
    public $message = 'Vendor List';
    public $primary_id = "vid";
    public $model;
    
    function __construct(){
        parent:: __construct();
        $this->load->model('Model');
        $this->model = 'Model';
        $this->load->model('vendor_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("vendor_m");
            $this->load->model('Model');
            $model = $this->model;
            $data['row'] = $this->Model->select(array(),'vendordetails',array(),'');
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $this->load->view('Vendor/index',$data);
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
        $this->load->view('vendor/form',$data);
            }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  

    }
    
    public function insert()
    {
        $model = $this->model;
        $this->load->model("vendor_m");
        $uid = $this->input->post('uid');
        $creationdate = date('Y-m-d H:i:s');
        $vname = $this->input->post('vname');
        $vmobile = $this->input->post('vmobile');
        $valtmobile = $this->input->post('valtmobile');
        $vemail = $this->input->post('vemail');
        $vgst = $this->input->post('vgst');
        $vaddress = $this->input->post('vaddress');
        $vdesc = $this->input->post('vdesc');

        $data = array(
            'vcreatedby'  => $uid,
            'vcreatedon' => $creationdate,
            'vname' => $vname,
            'vmobile' => $vmobile,
            'valtmobile'  => $valtmobile,
            'vemail'  => $vemail,
            'vgst' => $vgst,
            'vaddress' => $vaddress,
            'vdesc'  => $vdesc
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('vendor');
    }
    
    public function edit($vid)
    {
        $model = $this->model;
        $this->load->model("vendor_m");      
        $this->load->model("Model");      
        $data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$vid),'');
        $data['action'] = "update";
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $username = $this->session->userdata('username');
//        echo "<pre>";
//        print_r ($data);
//        echo "</pre>";
         $this->load->view('vendor/form',$data);
    }

    public function update()
    {
        $model = $this->model;
        $this->load->model("vendor_m");
        $uid = $this->input->post('uid');
        $creationdate = date('Y-m-d H:i:s');
        $vname = $this->input->post('vname');
        $vmobile = $this->input->post('vmobile');
        $valtmobile = $this->input->post('valtmobile');
        $vemail = $this->input->post('vemail');
        $vgst = $this->input->post('vgst');
        $vaddress = $this->input->post('vaddress');
        $vdesc = $this->input->post('vdesc');

        $data = array(
            'vcreatedby'  => $uid,
            'vname' => $vname,
            'vmobile' => $vmobile,
            'valtmobile'  => $valtmobile,
            'vemail'  => $vemail,
            'vgst' => $vgst,
            'vaddress' => $vaddress,
            'vdesc'  => $vdesc
        );
        
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $vid = $this->input->post('vid');
        $where = array($this->primary_id=>$vid);
        $this->$model->update($this->table,$data,$where);
//        echo "<pre>";
//        print_r ($where);
//        echo "</pre>";
        redirect('vendor');
    }

    public function delete($vid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$vid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('vendor');
    }
    

    public function view_table()
    {			
        $this->load->model("vendor_m");
        $this->load->model('Model');
        $data['controller'] = $this->controller;
        $model = $this->model;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
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

}
?>
