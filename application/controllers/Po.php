<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Po extends CI_Controller
{
    public $table = 'po_master';
    public $sitetable = 'sitedetails';
    public $controller = 'Po';
    public $message = 'Construction';
    public $primary_id = "poid";
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('po_m');
        $this->load->model('Model');
        $this->model = 'Model';
        date_default_timezone_set('Asia/Kolkata');
    }

    public function view_table()
    {			
        $data['controller'] = $this->controller;
        $model = $this->model;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $result = $this->po_m->show_all_data();
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
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $sid = $this->input->post('sid');
        $vid = $this->input->post('vid');
        $data['sid'] = $sid;          
        $data['vid'] = $vid;  
        if ($sid != "" || $vid != "") {
            $result = $this->po_m->show_data_by_id($data);
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
        $this->load->view('po/index', $data);
    }

    function action()

    {
        $this->load->model("po_m");
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

        $po_data = $this->po_m->fetch_data();

        $excel_row = 2;

        foreach($po_data as $row)
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
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');

    }

    function select_by_id_action()
    {
        $sid = $this->input->post('sid');
        $vid = $this->input->post('vid');
        $data['sid'] = $sid;          
        $data['vid'] = $vid;       

        $this->load->model("po_m");
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

        $po_data = $this->po_m->show_data_by_id($data);

        $excel_row = 2;

        foreach($po_data as $row)
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
        header('Content-Disposition: attachment;filename="GRN Data.xls"');
        $object_writer->save('php://output');

    }

    public function index()
    {
        if($this->session->userdata('username') != '')  
        {
            $this->load->model("po_m");
            $data["po_data"] = $this->po_m->fetch_data();
            $model = $this->model;
            $data['controller'] = $this->controller;
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['row'] = $this->$model->select(array(),'material_rqst',array(),'');
            $data['po_row'] = $this->$model->select(array(),$this->table,array(),'');
            $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
            $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
            $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
            $username = $this->session->userdata('username');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $this->load->view('po/index',$data);

        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  

    }

    public function form($poid)
    {
        if($this->session->userdata('username') != '')  
        {
            $model = $this->model;
            $data['row'] = $this->$model->select(array(),'material_rqst',array('mrid'=>$poid),'');
            $data['action'] = "insert";
            $data['controller'] = $this->controller;
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['units'] = $this->$model->select(array(),'munits',array(),'');
            $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
            $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
            $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
            $data['materials'] = $this->$model->select(array(),'materials',array(),'');
            $data['material_rqsts'] = $this->$model->select(array(),'material_rqst',array('mrid'=>$poid),'');
            $username = $this->session->userdata('username');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $poid = $this->uri->segment(3);
            $this->load->view('po/form',$data);
        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  

    }

    public function insert()
    {
        $model = $this->model;
        $site = $this->input->post('site');
        $uid = $this->input->post('uid');
        $csgt_total = $this->input->post('csgt_total');
        $ssgt_total = $this->input->post('ssgt_total');
        $isgt_total = $this->input->post('isgt_total');
        $total_amount = $this->input->post('total_amount');
        $frieght_amount = $this->input->post('frieght_amount');
        //        $gst_frieght_amount = $this->input->post('gst_frieght_amount');
        $gross_amount = $this->input->post('gross_amount');
        $invoice_to = $this->input->post('invoice_to');
        $contact_name = $this->input->post('contact_name');
        $contact_no = $this->input->post('contact_no');
        $tandc = $this->input->post('tandc');
        $date = date('Y-m-d',strtotime($this->input->post('date')));

        $mid = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');	

        $app_qty = count($this->input->post('app_qty')) > 0 ? implode(",",$this->input->post('app_qty')) : $this->input->post('app_qty');		

        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');		

        $discount_type = count($this->input->post('discount_type')) > 0 ? implode(",",$this->input->post('discount_type')) : $this->input->post('discount_type');		

        $discount = count($this->input->post('discount')) > 0 ? implode(",",$this->input->post('discount')) : $this->input->post('discount');	

        $cgst = count($this->input->post('cgst')) > 0 ? implode(",",$this->input->post('cgst')) : $this->input->post('cgst');		
        $sgst = count($this->input->post('sgst')) > 0 ? implode(",",$this->input->post('sgst')) : $this->input->post('sgst');		
        $igst = count($this->input->post('igst')) > 0 ? implode(",",$this->input->post('igst')) : $this->input->post('igst');  

        $total = count($this->input->post('total')) > 0 ? implode(",",$this->input->post('total')) : $this->input->post('total');    
        $vendor = count($this->input->post('vendor')) > 0 ? implode(",",$this->input->post('vendor')) : $this->input->post('vendor');    

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');    
        $data = array(
            'sid'  => $site,
            'pocreatedby'  => $uid,
            'mid'  => $mid,
            'csgt_total'  => $csgt_total,
            'ssgt_total'  => $ssgt_total,
            'isgt_total'  => $isgt_total,
            'total_amount'  => $total_amount,
            'frieght_amount'  => $frieght_amount,
            //            'gst_frieght_amount' => $gst_frieght_amount,
            'gross_amount'  => $gross_amount,
            'invoice_to'  => $invoice_to,
            'contact_name'  => $contact_name,
            'contact_no'  => $contact_no,
            'tandc'  => $tandc,
            'pocreatedon'  => $date,
            'm_unit'  => $m_unit,
            'qty'  => $qty,
            'app_qty'  => $app_qty,
            'unit'  => $unit,
            'dtid'  => $discount_type,
            'discount'  => $discount,
            'cgst'  => $cgst,
            'sgst'  => $sgst,
            'igst'  => $igst,
            'total'  => $total,
            'vid'  => $vendor,
            'remark'  => $remark

        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('po/index');
    }

    public function edit($poid)
    {
        $poid = $this->uri->segment(3);
        $model = $this->model;
        $data['action'] = "update";
        $data['row_po'] = $this->$model->select(array(),$this->table,array('poid'=>$poid),'');
        $data['row'] = $this->$model->select(array(),'material_rqst',array('mrid'=>$poid),'');
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('po/form',$data);
    }

    public function update()
    {
        $model = $this->model;

        $site = $this->input->post('site');
        $uid = $this->input->post('uid');
        $csgt_total = $this->input->post('csgt_total');
        $ssgt_total = $this->input->post('ssgt_total');
        $isgt_total = $this->input->post('isgt_total');
        $total_amount = $this->input->post('total_amount');
        $frieght_amount = $this->input->post('frieght_amount');
        //        $gst_frieght_amount = $this->input->post('gst_frieght_amount');
        $gross_amount = $this->input->post('gross_amount');
        $invoice_to = $this->input->post('invoice_to');
        $contact_name = $this->input->post('contact_name');
        $vendor = $this->input->post('vendor');
        $contact_no = $this->input->post('contact_no');
        $tandc = $this->input->post('tandc');
        $date = date('Y-m-d',strtotime($this->input->post('date')));

        $mid = count($this->input->post('material')) > 0 ? implode(",",$this->input->post('material')) : $this->input->post('material');

        $m_unit = count($this->input->post('m_unit')) > 0 ? implode(",",$this->input->post('m_unit')) : $this->input->post('m_unit');

        $qty = count($this->input->post('qty')) > 0 ? implode(",",$this->input->post('qty')) : $this->input->post('qty');	

        $app_qty = count($this->input->post('app_qty')) > 0 ? implode(",",$this->input->post('app_qty')) : $this->input->post('app_qty');		

        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');		

        $discount_type = count($this->input->post('discount_type')) > 0 ? implode(",",$this->input->post('discount_type')) : $this->input->post('discount_type');		

        $discount = count($this->input->post('discount')) > 0 ? implode(",",$this->input->post('discount')) : $this->input->post('discount');	

        $cgst = count($this->input->post('cgst')) > 0 ? implode(",",$this->input->post('cgst')) : $this->input->post('cgst');		
        $sgst = count($this->input->post('sgst')) > 0 ? implode(",",$this->input->post('sgst')) : $this->input->post('sgst');		
        $igst = count($this->input->post('igst')) > 0 ? implode(",",$this->input->post('igst')) : $this->input->post('igst');  

        $total = count($this->input->post('total')) > 0 ? implode(",",$this->input->post('total')) : $this->input->post('total');    
        $vendor = count($this->input->post('vendor')) > 0 ? implode(",",$this->input->post('vendor')) : $this->input->post('vendor');    

        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');    
        $data = array(
            'sid'  => $site,
            'pocreatedby'  => $uid,
            'csgt_total'  => $csgt_total,
            'ssgt_total'  => $ssgt_total,
            'isgt_total'  => $isgt_total,
            'total_amount'  => $total_amount,
            'frieght_amount'  => $frieght_amount,
            //            'gst_frieght_amount' => $gst_frieght_amount,
            'gross_amount'  => $gross_amount,
            'invoice_to'  => $invoice_to,
            'contact_name'  => $contact_name,
            'contact_no'  => $contact_no,
            'tandc'  => $tandc,
            'pocreatedon'  => $date,
            'mid'  => $mid,
            'm_unit'  => $m_unit,
            'qty'  => $qty,
            'app_qty'  => $app_qty,
            'unit'  => $unit,
            'dtid'  => $discount_type,
            'discount'  => $discount,
            'cgst'  => $cgst,
            'sgst'  => $sgst,
            'igst'  => $igst,
            'total'  => $total,
            'vid'  => $vendor,
            'remark'  => $remark

        );
        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $poid = $this->input->post('poid');
        $where = array($this->primary_id=>$poid);
        $this->$model->update($this->table,$data,$where);

        redirect('po/index');
    }

    public function delete($poid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$poid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('po/index');
    }
    public function browse()
    {
        /* File Select */
        $model = $this->model;
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        /* Database In Data Count */

        $data['Count'] = $this->$model->countTableRecords('po_master',array());
        $this->load->view('po/excel',$data);
    }

    public function excel()
    {
        $model = $this->model;

        /* Excel File Upload folder Directory: /assets/database */
        /* Excel File Upload configuration */
        $file_excel = $_FILES['excel']['name'];
        $config = Array();
        $config['upload_path'] = FCPATH.'/Database/recovery';
        $config['max_size'] = '102400';
        $config['allowed_types'] = 'xlsx';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = true;
        $file_name = $_FILES['excel']['name'];
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        /* file check if condition is file not upload */
        if(!$this->upload->do_upload('excel'))
        {
            $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button> errors '.$this->upload->display_errors().'</div>');
            redirect('po/browse');
        }
        /* file check else condition is file upload */
        else
        {
            $data_upload = $this->upload->data();

            /* excel file read */
            include(APPPATH.'/libraries/simplexlsx.class.php');
            $xlsx = new SimpleXLSX($data_upload['full_path']);

            $table = 'po_master';

            $xlsxData = $xlsx->rows(); //excel rows data

            $sid  = 0;
            $arr = array();
            $data = array();				

            /* excel file write */
            foreach($xlsxData as $key => $row)
            {
                /* excel sheet in first line break (heading) */
                if(strtolower($row[0]) == 'id')
                {
                    continue;
                }
                else
                {
                    /* excel sheet in second line to start 
							if condition is check sid == '' and key ==0 then break */
                    if($key == 0 && $row[10] =="")
                    {
                        break;
                    }
                    /* if in key > 0 and sid== '' then condition true */
                    if($key > 0 && $row[10] =="")
                    {
                        $arr[$mid]['mid'][] = $row[11];
                        $arr[$mid]['app_qty'][] = $row[12];
                        $arr[$mid]['pocreatedby'][] = $row[13];
                        $arr[$mid]['unit'][] = $row[14];
                        $arr[$mid]['dtid'][] = $row[15];
                        $arr[$mid]['discount'] = $row[16];
                        $arr[$mid]['cgst'] = $row[17];
                        $arr[$mid]['sgst'] = $row[18];
                        $arr[$mid]['igst'] = $row[19];
                        $arr[$mid]['remark'] = $row[20];
                    }

                    /* else in sid != '' then condition true */

                    else
                    {
                        if($row[10] != "")
                        {
                            $porefid = $row[1];
                            $mid = $row[2];
                            $vid = $row[3];
                            $sid = $row[4];
                            $frieght_amount = $row[5];
                            $csgt_total = $row[6];
                            $ssgt_total = $row[7];
                            $isgt_total = $row[8];
                            $gross_amount = $row[9];
                            $pocreatedon = $row[10];
                            $arr[$mid]['porefid'] = $row[1];
                            $arr[$mid]['mrrefid'] = $row[2];
                            $arr[$mid]['vid'] = $row[3];
                            $arr[$mid]['sid'] = $row[4];
                            $arr[$mid]['frieght_amount'] = $row[5];
                            $arr[$mid]['csgt_total'] = $row[6];
                            $arr[$mid]['ssgt_total'] = $row[7];
                            $arr[$mid]['isgt_total'] = $row[8];
                            $arr[$mid]['gross_amount'] = $row[9];
                            $arr[$mid]['pocreatedon'] = $row[10];
                            $arr[$mid]['mid'][] = $row[11];
                            $arr[$mid]['app_qty'][] = $row[12];
                            $arr[$mid]['pocreatedby'][] = $row[13];
                            $arr[$mid]['unit'][] = $row[14];
                            $arr[$mid]['dtid'][] = $row[15];
                            $arr[$mid]['discount'] = $row[16];
                            $arr[$mid]['cgst'] = $row[17];
                            $arr[$mid]['sgst'] = $row[18];
                            $arr[$mid]['igst'] = $row[19];
                            $arr[$mid]['remark'] = $row[20];
                        }
                    }
                }
            }

            foreach($arr as $key=>$val)
            {
                /* Database Is Comma seprate Store */
                $porefid = $arr[$key]['porefid'];
                $mrrefid = $arr[$key]['mrrefid'];
                $vid = $arr[$key]['vid'];
                $sid = $arr[$key]['sid'];
                $frieght_amount = $arr[$key]['frieght_amount'];
                $csgt_total = $arr[$key]['csgt_total'];
                $ssgt_total = $arr[$key]['ssgt_total'];
                $isgt_total = $arr[$key]['isgt_total'];
                $gross_amount = $arr[$key]['gross_amount'];
                $pocreatedon = $arr[$key]['pocreatedon'];
                $mid = implode(",",$arr[$key]['mid']);
                $app_qty = implode(",",$arr[$key]['app_qty']);
                $pocreatedby = implode(",",$arr[$key]['pocreatedby']);
                $unit = implode(",",$arr[$key]['unit']);
                $dtid = implode(",",$arr[$key]['dtid']);
                $discount = $arr[$key]['discount'];
                $cgst = $arr[$key]['cgst'];
                $sgst = $arr[$key]['sgst'];
                $igst = $arr[$key]['igst'];
                $remark = $arr[$key]['remark'];

                $data[] = array(
                    'porefid' => $porefid,
                    'mrrefid' => $mrrefid,
                    'vid' => $vid,
                    'sid' => $sid,
                    'frieght_amount' => $frieght_amount,
                    'csgt_total' => $csgt_total,
                    'ssgt_total' => $ssgt_total,
                    'isgt_total' => $isgt_total,
                    'gross_amount' => $gross_amount,
                    'pocreatedon' => $pocreatedon,
                    'mid' => $mid,
                    'app_qty' => $app_qty,
                    'pocreatedby' => $pocreatedby,
                    'unit' => $unit,
                    'dtid' => $dtid,
                    'discount' => $discount,
                    'cgst' => $cgst,
                    'sgst' => $sgst,
                    'igst' => $igst,
                    'remark' => $remark,
                );


            }
            /* if condition is true then data insert database */
            if(count($data) > 0)
            {
                $this->db->trans_start();
                $this->$model->insert_batch($data, $table);
                $this->db->trans_complete();

                /* if condition is true then excel file data not insert then data rollback */
                if($this->db->trans_status() == FALSE)
                {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Failed to Uploade Excel File</div>');
                }
                /* else condition is true then data success fully excel file inserted */
                else
                {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Successfully Excel File Inserted</div>');
                }

            } 
            /* else condition is true then data not insert database */
            else {
                $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Failed to Uploade Excel File</div>');
            }
        }
        redirect('po/browse');
    }
    /* database in data display */
    public function server_data()
    {
        $model = $this->model;

        /* datatable in sorting */
        $order_col_id = $_POST['order'][0]['column'];
        $order = (($order_col_id == 9 ) ? "CAST(".$_POST['columns'][$order_col_id]['data']." AS DECIMAL)" : $_POST['columns'][$order_col_id]['data']) . ' ' . $_POST['order'][0]['dir'];

        /* datatable recordsTotal And recordsFiltered */
        $totalData = $this->$model->countTableRecords('po_master',array());

        $start = $_POST['start'];
        $limit = $_POST['length'];

        /* datatable in limited data display */
        $q = $this->db->query("SELECT * FROM `po_master`  Order By $order LIMIT $start, $limit")->result();

        $data = array();

        if(!empty($q))
        {
            foreach ($q as $key=>$value)
            {
                /* records Datatable */
                $id = 'poid';

                $nestedData['porefid'] = $value->porefid;
                $nestedData['mrrefid'] = $value->mrrefid;
                $nestedData['vid'] = $value->vid;
                $nestedData['sid'] = $value->sid;
                $nestedData['frieght_amount'] = $value->frieght_amount;
                $nestedData['csgt_total'] = $value->csgt_total;
                $nestedData['ssgt_total'] = $value->ssgt_total;
                $nestedData['isgt_total'] = $value->isgt_total;
                $nestedData['gross_amount'] = $value->gross_amount;
                $nestedData['pocreatedon'] = $value->pocreatedon;
                $nestedData['mid'] = $value->mid;
                $nestedData['app_qty'] = $value->app_qty;
                $nestedData['pocreatedby'] = $value->pocreatedby;
                $nestedData['unit'] = $value->unit;
                $nestedData['dtid'] = $value->dtid;
                $nestedData['discount'] = $value->discount;
                $nestedData['cgst'] = $value->cgst;
                $nestedData['sgst'] = $value->sgst;
                $nestedData['igst'] = $value->igst;
                $nestedData['remark'] = $value->remark;
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data" => $data
        );
        echo json_encode($json_data);
    }
}
?>