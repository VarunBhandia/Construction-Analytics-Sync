<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Material extends CI_Controller{

    public $table = 'materials';
    public $controller = 'Material';
    public $message = 'Material List';
    public $primary_id = "mid";
    public $model;

    function __construct(){
        parent:: __construct();
        $this->load->model('Model');
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
            $model = $this->model;
            $data['row'] = $this->$model->select(array(),$this->table,array(),'');
            $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $this->load->view('material/index',$data);
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
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['categorys'] = $this->$model->select(array(),'category',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('material/form',$data);
            }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  

    }
    
    public function insert()
    {
        $model = $this->model;
        $this->load->model("material_m");
        $uid = $this->input->post('uid');
        $creationdate = date('Y-m-d H:i:s');
        $mname = $this->input->post('mname');
        $munit = $this->input->post('munit');
        $mcategory = $this->input->post('mcategory');
        $mdesc = $this->input->post('mdesc');
        $hsn = $this->input->post('hsn');
        $mgst = $this->input->post('mgst');
        $mbase = $this->input->post('mbase');
        $mtype = $this->input->post('mtype');

        $data = array(
            'mcreatedby'  => $uid,
            'mname' => $mname,
            'munit' => $munit,
            'mcategory'  => $mcategory,
            'mdesc'  => $mdesc,
            'hsn' => $hsn,
            'mgst' => $mgst,
            'mbase'  => $mbase,
            'mtype'  => $mtype
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('material');
    }
    
    public function edit($mid)
    {
        $model = $this->model;
        $this->load->model("material_m");      
        $this->load->model("Model");      
        $data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$mid),'');
        $data['action'] = "update";
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['categorys'] = $this->$model->select(array(),'category',array(),'');
        $username = $this->session->userdata('username');
//        echo "<pre>";
//        print_r ($data);
//        echo "</pre>";
         $this->load->view('material/form',$data);
    }

    public function update()
    {
        $model = $this->model;
        $this->load->model("material_m");
        $uid = $this->input->post('uid');
        $creationdate = date('Y-m-d H:i:s');
        $mname = $this->input->post('mname');
        $munit = $this->input->post('munit');
        $mcategory = $this->input->post('mcategory');
        $mdesc = $this->input->post('mdesc');
        $hsn = $this->input->post('hsn');
        $mgst = $this->input->post('mgst');
        $mbase = $this->input->post('mbase');
        $mtype = $this->input->post('mtype');

        $data = array(
            'mcreatedby'  => $uid,
            'mname' => $mname,
            'munit' => $munit,
            'mcategory'  => $mcategory,
            'mdesc'  => $mdesc,
            'hsn' => $hsn,
            'mgst' => $mgst,
            'mbase'  => $mbase,
            'mtype'  => $mtype
        );
        
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $mid = $this->input->post('mid');
        $where = array($this->primary_id=>$mid);
        $this->$model->update($this->table,$data,$where);
//        echo "<pre>";
//        print_r ($where);
//        echo "</pre>";
        redirect('material');
    }

    public function delete($mid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$mid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('material');
    }

    public function view_table()
    {			
        $this->load->model("material_m");
        $this->load->model('Model');
        $data['controller'] = $this->controller;
        $model = $this->model;
        $username = $this->session->userdata('username');
       $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
       $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
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

    



    
}
?>
