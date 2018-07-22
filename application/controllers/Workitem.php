<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Workitem extends CI_Controller{
    
    public $table = 'workitems';
    public $controller = 'Workitem';
    public $message = 'Workitem List';
    public $primary_id = "wiid";
    public $model;
    
    function __construct(){
        parent:: __construct();
        $this->load->model('Model');
        $this->model = 'Model';
        $this->load->model('workitem_m', 'm');
    }

    function index(){
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("workitem_m");
            $this->load->model('Model');
            $model = $this->model;
            $data['row'] = $this->Model->select(array(),'workitems',array(),'');
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $this->load->view('witem/index',$data);
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
        $this->load->view('witem/form',$data);
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
        $winame = $this->input->post('winame');
        $widesc = $this->input->post('widesc');
        $wigst = $this->input->post('wigst');
        $wibase = $this->input->post('wibase');
        $wicategory = $this->input->post('wicategory');
        $witype = $this->input->post('witype');

        $data = array(
            'vcreatedby'  => $uid,
            'winame' => $winame,
            'widesc' => $widesc,
            'wigst'  => $wigst,
            'wibase'  => $wibase,
            'wicategory' => $wicategory,
            'witype' => $witype,
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('Workitem');
    }
    
    public function edit($wiid)
    {
        $model = $this->model;
        $this->load->model("workitem_m");      
        $this->load->model("Model");      
        $data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$wiid),'');
        $data['action'] = "update";
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $username = $this->session->userdata('username');
//        echo "<pre>";
//        print_r ($data);
//        echo "</pre>";
         $this->load->view('witem/form',$data);
    }

    public function update()
    {
        $model = $this->model;
        $this->load->model("vendor_m");
        $uid = $this->input->post('uid');
        $creationdate = date('Y-m-d H:i:s');
        $winame = $this->input->post('winame');
        $widesc = $this->input->post('widesc');
        $wigst = $this->input->post('wigst');
        $wibase = $this->input->post('wibase');
        $wicategory = $this->input->post('wicategory');
        $witype = $this->input->post('witype');

        $data = array(
            'vcreatedby'  => $uid,
            'winame' => $winame,
            'widesc' => $widesc,
            'wigst'  => $wigst,
            'wibase'  => $wibase,
            'wicategory' => $wicategory,
            'witype' => $witype,
        );
        
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $wiid = $this->input->post('wiid');
        $where = array($this->primary_id=>$wiid);
        $this->$model->update($this->table,$data,$where);
//        echo "<pre>";
//        print_r ($where);
//        echo "</pre>";
        redirect('Workitem');
    }

    public function delete($wiid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$wiid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('Workitem');
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

    }
?>
