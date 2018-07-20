<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo extends CI_Controller
{
    public $table = 'mo_master';
    public $controller = 'mo';
    public $message = 'Move Order';
    public $primary_id = "moid";
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->model('mo_m');
        $this->model = 'Model';
        date_default_timezone_set('Asia/Kolkata');
    }

    public function view_table()
    {			
        $data['controller'] = $this->controller;
        $model = $this->model;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $result = $this->mo_m->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        }
    }

    public function select_by_id() 
    {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $tsid = $this->input->post('tsid');
        $rsid = $this->input->post('rsid');
        $data['tsid'] = $tsid;
        $data['rsid'] = $rsid;
            if ($tsid != "" || $rsid != "") {
                $result = $this->mo_m->show_data_by_id($data);
                if ($result != false) {
                    $data['result_display'] = $result;
                } else 
                {
                    $data['result_display'] = "No record found !";
                }
            } 
        else {
            $data = array(
                'id_error_message' => "Id field is required"
            );
        }
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $data['show_table'] = $this->view_table();
        $this->load->view('mo/index', $data);
    }

    public function index()
    {
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("mo_m");
            $data["mo_data"] = $this->mo_m->fetch_data();
            $model = $this->model;
            $data['controller'] = $this->controller;
            $data['row'] = $this->$model->select(array(),$this->table,array(),'');
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
            $this->load->view('mo/index',$data);
        }  
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  
    }

    function action()
    {
        $this->load->model("mo_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("moid",  "morefid", "tsid", "rsid", "mochallan", "mid", "muid", "modate", "moqty", "movehicle", "tid", "moremark", "mocreatedon", "mocreatedby");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $mo_data = $this->mo_m->fetch_data();

        $excel_row = 2;

        foreach($mo_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->moid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->morefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->tsid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->rsid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->mochallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->modate);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->moqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->movehicle);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->tid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->moremark);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->mocreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->mocreatedby);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');

    }

    function select_by_id_action()
    {
        $sid = $this->input->post('tsid');
        $vid = $this->input->post('rsid');
        $data['tsid'] = $tsid;          
        $data['rsid'] = $rsid;       

        $this->load->model("mo_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("poid",  "porefid", "mrrefid", "sid", "vid", "mid", "unit", "m_unit", "app_qty", "remark", "dtid", "discount",  "cgst", "sgst", "igst", "total", "csgt_total", "ssgt_total", "isgt_total", "total_amount", "gst_frieght_amount", "frieght_amount", "gross_amount", "invoice_to", "contact_name", "contact_no", "tandc", "pocreatedby", "pocreatedon");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $po_data = $this->mo_m->show_data_by_id($data);

        $excel_row = 2;

        foreach($mo_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->poid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->porefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->mrrefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->vid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->unit);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->m_unit);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->app_qty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->remark);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->dtid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->discount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->cgst);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->sgst);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->igst);
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->total);
            $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->csgt_total);
            $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row->ssgt_total);
            $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row->isgt_total);
            $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row->total_amount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row->gst_frieght_amount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row->frieght_amount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row->gross_amount);
            $object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row->invoice_to);
            $object->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $row->contact_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $row->contact_no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $row->tandc);
            $object->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $row->pocreatedby);
            $object->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $row->pocreatedon);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Move Order.xls"');
        $object_writer->save('php://output');

    }
    
    public function form()
    {
        $model = $this->model;
        $data['action'] = "insert";
        $data['controller'] = $this->controller;
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('mo/form',$data);
    }

    public function insert()
    {
        $model = $this->model;
        $tsite = $this->input->post('tsite');
        $rsite = $this->input->post('rsite');
        $uid = $this->input->post('uid');
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $creationdate = date('Y-m-d H:i:s');
        
        $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $vehicle = count($this->input->post('vehicle')) > 0 ? implode(",",$this->input->post('vehicle')) : $this->input->post('$vehicle');

        $challan = count($this->input->post('challan')) > 0 ? implode(",",$this->input->post('challan')) : $this->input->post('$challan');

        $transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data = array(
            'tsid'  => $tsite,
            'rsid'  => $rsite,
            'mocreatedby'  => $uid,
            'modate'  => $date,
            'mocreatedon' => $creationdate,
            'mid' => $material,
            'moqty'  => $qty,
            'movehicle'  => $vehicle,
            'mochallan'  => $challan,
            'tid'  => $transporter,
            'moremark'  => $remark
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('Mo');
    }

    public function edit($moid)
    {
        $model = $this->model;
        $data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$moid),'');
        $data['tsites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['rsites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['action'] = "update";
        $data['controller'] = $this->controller;
        $this->load->view('mo/form',$data);
    }

    public function update()
    {
        $model = $this->model;

        $tsite = $this->input->post('tsite');
        $rsite = $this->input->post('rsite');
        $uid = $this->input->post('uid');
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $updateddate = date('Y-m-d H:i:s');        

        $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $vehicle = count($this->input->post('$vehicle')) > 0 ? implode(",",$this->input->post('$vehicle')) : $this->input->post('$vehicle');

        $challan = count($this->input->post('$challan')) > 0 ? implode(",",$this->input->post('$challan')) : $this->input->post('$challan');

        $transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data = array(
            'tsid'  => $tsite,
            'rsid'  => $rsite,
            'moupdatedby'  => $uid,
            'modate'  => $date,
            'moupdatedon' => $updateddate,
            'mid' => $material,
            'moqty'  => $qty,
            'movehicle'  => $vehicle,
            'mochallan'  => $challan,
            'tid'  => $transporter,
            'moremark'  => $remark
        );
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $moid = $this->input->post('moid');
        $where = array($this->primary_id=>$moid);
        $this->$model->update($this->table,$data,$where);

        redirect('Mo');
    }

    public function delete($moid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$moid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('Mo');
    }
}
?>
