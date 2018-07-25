<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Subcont extends CI_Controller{
    
    public $table = 'subcontdetails';
    public $controller = 'Subcont';
    public $message = 'Subcontractors List';
    public $primary_id = "subid";
    public $model;
    
    function __construct(){
        parent:: __construct();
        $this->load->model('Model');
        $this->model = 'Model';
        $this->load->model('subcont_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("subcont_m");
            $this->load->model('Model');
            $model = $this->model;
            $data['row'] = $this->Model->select(array(),'vendordetails',array(),'');
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $this->load->view('subcont/index',$data);
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
        $this->load->view('Subcont/form',$data);
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
        $subname = $this->input->post('subname');
        $submobile = $this->input->post('submobile');
        $subaltmobile = $this->input->post('subaltmobile');
        $subemail = $this->input->post('subemail');
        $subgst = $this->input->post('subgst');
        $subaddress = $this->input->post('subaddress');

        $data = array(
            'subcreatedby'  => $uid,
            'subname' => $subname,
            'submobile' => $submobile,
            'subaltmobile'  => $subaltmobile,
            'subemail'  => $subemail,
            'subgst' => $subgst,
            'subaddress' => $subaddress,
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('Subcont');
    }
    
    public function edit($subid)
    {
        $model = $this->model;
        $this->load->model("subcont_m");      
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
         $this->load->view('Subcont/form',$data);
    }

    public function update()
    {
        $model = $this->model;
        $this->load->model("vendor_m");
        $uid = $this->input->post('uid');
        $creationdate = date('Y-m-d H:i:s');
        $subname = $this->input->post('subname');
        $submobile = $this->input->post('submobile');
        $subaltmobile = $this->input->post('subaltmobile');
        $subemail = $this->input->post('subemail');
        $subgst = $this->input->post('subgst');
        $subaddress = $this->input->post('subaddress');

        $data = array(
            'subcreatedby'  => $uid,
            'subname' => $subname,
            'submobile' => $submobile,
            'subaltmobile'  => $subaltmobile,
            'subemail'  => $subemail,
            'subgst' => $subgst,
            'subaddress' => $subaddress,
        );
        
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $subid = $this->input->post('subid');
        $where = array($this->primary_id=>$subid);
        $this->$model->update($this->table,$data,$where);
//        echo "<pre>";
//        print_r ($where);
//        echo "</pre>";
        redirect('subcont');
    }

    public function delete($subid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$subid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('subcont');
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
        header('Content-Disposition: attachment;filename="Subcontractors.xls"');
        $object_writer->save('php://output');

    }
}
?>
