<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor_bills extends CI_Controller {

    public $table = 'vendor_bills_master';
    public $controller = 'Vendor_bills';
    public $message = 'Construction';
    public $primary_id = "vbid";
    public $model;

    public function __construct() {
        parent::__construct();
        $this->load->model('Model');
        $this->model = 'Model';
        $this->load->model('vendor_bills_m');
    }

    public function index() {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['show_table'] = $this->view_table();
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $this->load->view('vendor_bills/index', $data);
    }
    public function view_table(){
        $result = $this->vendor_bills_m->show_all_data();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        }
    }

    public function show_data_by_site_vendor() {

        $sid = $this->input->post('sid');
        $vid = $this->input->post('vid');
        $data = array(
            'sid' => $sid,
            'vid' => $vid
        );
        if ($sid == "" || $vid == "") {
            $data['error_message'] = "Both date fields are required";
        } else {
            $result = $this->vendor_bills_m->show_data_by_site_vendor($data);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
        }
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['action'] = "insert";
        $data['show_table'] = $this->view_table();
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['office_details'] = $this->$model->select(array(),'officedetails',array(),'');
        $data['show_table'] = $this->view_table();
        $this->load->view('vendor_bills/index', $data);
    }
    public function insert()
    {
        $model = $this->model;
        $vid = $this->input->post('vid');
        $sid = $this->input->post('sid');
        $csgt_total = $this->input->post('csgt_total');
        $ssgt_total = $this->input->post('ssgt_total');
        $isgt_total = $this->input->post('isgt_total');
        $total_amount = $this->input->post('total_amount');
        $frieght_amount = $this->input->post('frieght_amount');
        $frieght_gst = $this->input->post('frieght_gst');
        $gross_amount = $this->input->post('gross_amount');
        $bill_no = $this->input->post('bill_no');
        $bill_date = $this->input->post('bill_date');
        $bill_type = $this->input->post('bill_type');
        $invoice_to = $this->input->post('invoice_to');
        $payment_days = $this->input->post('payment_days');
        $vbremarks = $this->input->post('vbremarks');
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');	
        $cgst = count($this->input->post('cgst')) > 0 ? implode(",",$this->input->post('cgst')) : $this->input->post('cgst');	
        $sgst = count($this->input->post('sgst')) > 0 ? implode(",",$this->input->post('sgst')) : $this->input->post('sgst');	
        $igst = count($this->input->post('igst')) > 0 ? implode(",",$this->input->post('igst')) : $this->input->post('igst');  
        $total = count($this->input->post('total')) > 0 ? implode(",",$this->input->post('total')) : $this->input->post('total'); 
        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');    
        $data = array(
            'sid'  => $vid,
            'mid'  => $sid,
            'csgt_total'  => $csgt_total,
            'ssgt_total'  => $ssgt_total,
            'isgt_total'  => $isgt_total,
            'total_amount'  => $total_amount,
            'frieght_amount'  => $frieght_amount,
            'frieght_gst' => $frieght_gst,
            'gross_amount'  => $gross_amount,
            'bill_no'  => $bill_no,
            'bill_date'  => $bill_date,
            'bill_type'  => $bill_type,
            'invoice_to'  => $invoice_to,
            'pocreatedon'  => $date,
            'payment_days'  => $payment_days,
            'vbremarks'  => $vbremarks,
            'date'  => $date,
            'unit'  => $unit,
            'cgst'  => $cgst,
            'sgst'  => $sgst,
            'igst'  => $igst,
            'total'  => $total,
            'remark'  => $remark
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('vendor_bills/table');
    }

    public function edit($vbid)
    {
        $vbid = $this->uri->segment(3);
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['action'] = "insert";
        $data['show_table'] = $this->view_table();
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['office_details'] = $this->$model->select(array(),'officedetails',array(),'');
        $data['show_table'] = $this->view_table();
        $this->load->view('vendor_bills/index', $data);
    }

    public function update()
    {
        $model = $this->model;

        $site = $this->input->post('site');
        $csgt_total = $this->input->post('csgt_total');
        $ssgt_total = $this->input->post('ssgt_total');
        $isgt_total = $this->input->post('isgt_total');
        $total_amount = $this->input->post('total_amount');
        $frieght_amount = $this->input->post('frieght_amount');
        $gst_frieght_amount = $this->input->post('gst_frieght_amount');
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
            'csgt_total'  => $csgt_total,
            'ssgt_total'  => $ssgt_total,
            'isgt_total'  => $isgt_total,
            'total_amount'  => $total_amount,
            'frieght_amount'  => $frieght_amount,
            'gst_frieght_amount' => $gst_frieght_amount,
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

        $poid = $this->input->post('vbid');
        $where = array($this->primary_id=>$vbid);
        $this->$model->update($this->table,$data,$where);

        redirect('po/index');
    }

    public function delete($vbid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$vbid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('vendor_bills/index');
    }

}