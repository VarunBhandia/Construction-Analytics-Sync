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
            $data['categorys'] = $this->Model->select(array(),'category',array(),'');
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
        $data['categorys'] = $this->$model->select(array(),'category',array(),'');
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
        $mcategory = $this->input->post('mcategory');
        $witype = $this->input->post('witype');

        $data = array(
            'wicreatedby'  => $uid,
            'wicreatedon' => $creationdate,
            'winame' => $winame,
            'widesc' => $widesc,
            'wigst'  => $wigst,
            'wibase'  => $wibase,
            'wicategory' => $mcategory,
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
        $data['categorys'] = $this->$model->select(array(),'category',array(),'');
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
        $mcategory = $this->input->post('mcategory');
        $witype = $this->input->post('witype');

        $data = array(
            'wicreatedby'  => $uid,
            'winame' => $winame,
            'widesc' => $widesc,
            'wigst'  => $wigst,
            'wibase'  => $wibase,
            'wicategory' => $mcategory,
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
       <td><a href="'.base_url().'/workitem/pdf_genrate/?item_id='.$row->wiid.'" target="_blank"><i class="fa fa-file-pdf-o" style="font-size: 40px;color: red;"></i></a></td>
      </tr>
	  ';
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


function pdf_genrate(){

          $this->load->model('workitem_m');
if(isset($_REQUEST['item_id'])) {
  require_once("dompdf/dompdf_config.inc.php");
	        $wiid = $_REQUEST['item_id'];

            $rersult = $this->workitem_m->pdf_data($wiid);
	
   $html = '
		<table cellpadding="0" cellspacing="0" style="width: 60%; border: 1px solid #ccc; margin-bottom: 0em!important; margin-top: 0em!important; margin: auto; font-size: 20px;">
			<tr>
			 <td>
			  <img src="'.base_url().'images/tringle.png">
			 </td>
			 <td colspan="7">
				<h1 style="font-family: Knewave, cursive;color: #c50303;font-size: 25px;">Dee Kay Buildcon Pvt. ltd.</h1>
				<h3 style="text-align: left;font-size: 20px;font-family: sans-serif;color: #5f5c5c;margin-top: -5px;">(Engineers &amp; Contractors)<br><b>(ISO 9001:200,14001:2004 &amp; OHSAS)</b></h3>
			 </td>

             </tr>
			<tr>
			 <th style="border: 1px solid #ccc;padding: 10px;background: #fcfcab;text-align: center;font-size: 13px;font-family: sans-serif;">ID</th>
			 <th style="border: 1px solid #ccc;padding: 10px;background: #fcfcab;text-align: center;font-size: 13px;font-family: sans-serif;">
			  Material Name
			 </th>
			 <th style="border: 1px solid #ccc;padding: 10px;background: #fcfcab;text-align: center;font-size: 13px;font-family: sans-serif;">
			  Material Description 
			 </th>
			 <th style="border: 1px solid #ccc;padding: 10px;background: #fcfcab;text-align: center;font-size: 13px;font-family: sans-serif;">GST Rate</th>
			 <th style="border: 1px solid #ccc;padding: 10px;background: #fcfcab;text-align: center;font-size: 13px;font-family: sans-serif;">Base Rate</th>
			 <th style="border: 1px solid #ccc;padding: 10px;background: #fcfcab;text-align: center;font-size: 13px;font-family: sans-serif;">Category</th>
			 <th style="border: 1px solid #ccc;padding: 10px;background: #fcfcab;text-align: center;font-size: 13px;font-family: sans-serif;">
			  WI Created By
			 </th>
			 <th style="border: 1px solid #ccc;padding: 10px;background: #fcfcab;text-align: center;font-size: 13px;font-family: sans-serif;">
			  Material type
			 </th>

			 
			<tr>
				<td style="border: 1px solid #ccc;padding: 10px;text-align: center;">'.$rersult[0]->wiid.'</td>
				<td style="border: 1px solid #ccc;padding: 10px;text-align: center;">'.$rersult[0]->winame.'</td>
				<td style="border: 1px solid #ccc;padding: 10px;text-align: center;">'.$rersult[0]->widesc.'</td>
				<td style="border: 1px solid #ccc;padding: 10px;text-align: center;">'.$rersult[0]->wigst.'</td>
				<td style="border: 1px solid #ccc;padding: 10px;text-align: center;">'.$rersult[0]->wibase.'</td>
				<td style="border: 1px solid #ccc;padding: 10px;text-align: center;">'.$rersult[0]->wicategory.'</td>
				<td style="border: 1px solid #ccc;padding: 10px;text-align: center;">	'.$rersult[0]->wicreatedby.'</td> 
				<td style="border: 1px solid #ccc;padding: 10px;text-align: center;">'.$rersult[0]->witype.'</td>
			</tr>
			<tr>
			 <td colspan="8">
			<h2 style="color: #2b2b2b;font-size: 15px;font-family: sans-serif;padding: 17px 15px 25px;margin-top: 24px!important;margin:  auto;">System generated Document. May not require Signature.</h2>
			 </td>
			</tr>
</table>';
error_reporting(0);
 
  $dompdf = new DOMPDF();
  $dompdf->load_html($html );
  $dompdf->render();
  $dompdf->stream("/wp-content/themes/financialadvisors/dompdf_out.pdf", array("Attachment" => false));

  exit(0);


}



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
