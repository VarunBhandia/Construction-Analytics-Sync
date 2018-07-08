<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grn extends CI_Controller
{
    public $table = 'grn_master';
    public $controller = 'grn';
    public $message = 'Construction';
    public $primary_id = "grnid";
    public $model;
    public $module_name = "GRN";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->load->model('grn_m');
        $this->model = 'Model';
        date_default_timezone_set('Asia/Kolkata');
    }

    public function view_table()
    {			
        $data['controller'] = $this->controller;
        $model = $this->model;
        $result = $this->grn_m->show_all_data();
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
        $sid = $this->input->post('sid');
        $vid = $this->input->post('vid');
        $data['sid'] = $sid;          
        $data['vid'] = $vid;       
        if ($sid != "" || $vid != "") {
            $result = $this->grn_m->show_data_by_id($data);
            if ($result != false) {
                $data['result_display'] = $result;
            }
            else 
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
        $this->load->view('grn/index', $data);
    }

    public function index()
    {
        $this->load->model("grn_m");
        $data["grn_data"] = $this->grn_m->fetch_data();
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        //            echo '<pre>';
        //            print_r($data['row']);
        //            echo '</pre>';
        //$data['row'] = $this->$model->db_query("select * from test INNER JOIN vendor ON `vendor`.id = `test`.vendor");
        $this->load->view('grn/index',$data);
    }

    function action()

    {
        $this->load->model("grn_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("grnid",  "grnrefid", "sid", "vid", "grnchallan", "grnreceivedate", "mid", "muid", "grnunitprice", "grnqty",  "grntruck", "grnlinechallan", "grnremark", "tid", "grncreatedon", "grncreatedby");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $grn_data = $this->grn_m->fetch_data();

        $excel_row = 2;

        foreach($grn_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->grnid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->grnrefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->vid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->grnchallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->grnreceivedate);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->grnunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->grnqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->grntruck);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->grnlinechallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->grnremarks);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->tid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->grncreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->grncreatedby);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');

    }

    function select_by_id_action()

    {
        $sid = $this->input->post('sid');
        $vid = $this->input->post('vid');
        $data['sid'] = $sid;          
        $data['vid'] = $vid;       

        $this->load->model("grn_m");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("grnid",  "grnrefid", "sid", "vid", "grnchallan", "grnreceivedate", "mid", "muid", "grnunitprice", "grnqty",  "grntruck", "grnlinechallan", "grnremark", "tid", "grncreatedon", "grncreatedby");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $grn_data = $this->grn_m->show_data_by_id($data);

        $excel_row = 2;

        foreach($grn_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->grnid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->grnrefid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->sid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->vid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->grnchallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->grnreceivedate);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->mid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->muid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->grnunitprice);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->grnqty);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->grntruck);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->grnlinechallan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->grnremarks);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->tid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->grncreatedon);
            $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->grncreatedby);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="GRN Data.xls"');
        $object_writer->save('php://output');

    }

    public function form()
    {
        $model = $this->model;
        $data['action'] = "insert";
        $data['controller'] = $this->controller;
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
        $this->load->view('grn/form',$data);
    }

    public function insert()
    {
        $model = $this->model;
        $site = $this->input->post('site');
        $vendor = $this->input->post('vendor');
        $challan = $this->input->post('challan');
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');

        $m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');

        $truck = count($this->input->post('truck')) > 0 ? implode(",",$this->input->post('truck')) : $this->input->post('truck');

        $challannum = count($this->input->post('challannum')) > 0 ? implode(",",$this->input->post('challannum')) : $this->input->post('challannum');

        $transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data = array(
            'sid'  => $site,
            'vid'  => $vendor,
            'grnchallan' => $challan,
            'grnreceivedate'  => $date,
            'mid' => $material,
            'grnqty'  => $qty,
            'grnunitprice'  => $unit,
            'muid'  => $m_unit,
            'grntruck'  => $truck,
            'grnlinechallan'  => $challannum,
            'tid'  => $transporter,
            'grnremarks'  => $remark
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('Grn');
    }

    public function edit($grnid)
    {
        $model = $this->model;
        $data['row'] = $this->$model->select(array(),$this->table,array($this->primary_id=>$grnid),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['transporters'] = $this->$model->select(array(),'transporters',array(),'');
        $data['action'] = "update";
        $data['controller'] = $this->controller;
        $this->load->view('grn/form',$data);
    }

    public function update()
    {
        $model = $this->model;

        $site = $this->input->post('site');
        $vendor = $this->input->post('vendor');
        $challan = $this->input->post('challan');
        $date = date('Y-m-d',strtotime($this->input->post('date')));

        $material = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');

        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');

        $m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');

        $truck = count($this->input->post('truck')) > 0 ? implode(",",$this->input->post('truck')) : $this->input->post('truck');

        $challannum = count($this->input->post('challannum')) > 0 ? implode(",",$this->input->post('challannum')) : $this->input->post('challannum');

        $transporter = count($this->input->post('transporter')) > 0 ? implode(",",$this->input->post('transporter')) : $this->input->post('transporter');

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');

        $data = array(
            'sid'  => $site,
            'vid'  => $vendor,
            'grnchallan' => $challan,
            'grnreceivedate'  => $date,
            'mid' => $material,
            'grnqty'  => $qty,
            'grnunitprice'  => $unit,
            'muid'  => $m_unit,
            'grntruck'  => $truck,
            'grnlinechallan'  => $challannum,
            'tid'  => $transporter,
            'grnremarks'  => $remark
        );
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $grnid = $this->input->post('grnid');
        $where = array($this->primary_id=>$grnid);
        $this->$model->update($this->table,$data,$where);

        redirect('Grn');
    }

    public function delete($grnid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$grnid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('Grn');
    }
}
?>