<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor_bills extends CI_Controller {

    public $table = 'vendor_bills_master';
    public $controller = 'Vendor_bills';
    public $message = 'Construction';
    public $primary_id = "id";
    public $model;

    public function __construct() {
        parent::__construct();
        $this->load->model('Model');
        $this->model = 'Model';
        $this->load->model('vendor_bills_m');
    }
    public function index()
    {
        if($this->session->userdata('username') != '')  
        {
            $model = $this->model;
            $data['controller'] = $this->controller;
            $data['result'] = $this->$model->db_query("select `".$this->table."`.*,`sitedetails`.sname,`vendordetails`.vname from `".$this->table."` INNER JOIN `sitedetails` ON `sitedetails`.sid = `".$this->table."`.sid INNER JOIN `vendordetails` ON `vendordetails`.vid = `".$this->table."`.vid ");
            $this->load->view('vendor_bills/manage',$data);
        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  
    }


    public function add() {
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['show_table'] = $this->view_table();
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');

        $user = $this->$model->select(array(),'users',array('uid' => 11),'');

        $data['sites'] = $this->$model->db_query("SELECT * FROM `sitedetails` WHERE sid IN(".$user[0]->site.")");


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
        $user_id = 11;

        $model = $this->model;
        $vid = $this->input->post('vid');
        $sid = $this->input->post('sid');
        $uid = $this->input->post('uid');
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
        $uindex = implode(",",$this->input->post('uindex'));
        $date = date('Y-m-d');
        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');	
        $cgst = count($this->input->post('cgst')) > 0 ? implode(",",$this->input->post('cgst')) : $this->input->post('cgst');	
        $sgst = count($this->input->post('sgst')) > 0 ? implode(",",$this->input->post('sgst')) : $this->input->post('sgst');	
        $igst = count($this->input->post('igst')) > 0 ? implode(",",$this->input->post('igst')) : $this->input->post('igst');  
        $total = count($this->input->post('total')) > 0 ? implode(",",$this->input->post('total')) : $this->input->post('total'); 
        $remark = count($this->input->post('remarks')) > 0 ? implode(",",$this->input->post('remarks')) : $this->input->post('remarks');    

        $create_date = date('Y-m-d H:i:s');

        $status = array();
        for($t=0; $t<count($this->input->post('total'));$t++)
        {
            $status[] = 'Pending';
        }
        $status = implode(",",$status);

        $data = array(
            'vid'  => $vid,
            'sid'  => $sid,
            'order_index' => $uindex,
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
            'remark' => $remark,
            'status' => $status,
            'created_at' => $create_date,
            'created_by' => $user_id
        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('dispMessage','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Vendor Added Successfully!</div>');

        redirect('Vendor_bills');
    }

    public function edit($vbid)
    {
        $vbid = $this->uri->segment(3);
        $model = $this->model;
        $data['controller'] = $this->controller;
        $data['action'] = "insert";
        $data['show_table'] = $this->view_table();
        $data['result'] = $this->$model->select(array(),$this->table,array('id'=>$vbid),'');
        $data['grn_data'] = $this->$model->select(array(),'grn_master',array('sid'=>$data['result'][0]->sid,'vid'=>$data['result'][0]->vid),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['office_details'] = $this->$model->select(array(),'officedetails',array(),'');
        $data['show_table'] = $this->view_table();
        $this->load->view('vendor_bills/form', $data);
    }

    public function update()
    {
        $model = $this->model;

        /* $csgt_total = $this->input->post('csgt_total');
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

        ); */

        $vendor_id = $this->input->post('vendor_id');
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
        $uindex = implode(",",$this->input->post('uindex'));
        $date = date('Y-m-d');
        $unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');	
        $cgst = count($this->input->post('cgst')) > 0 ? implode(",",$this->input->post('cgst')) : $this->input->post('cgst');	
        $sgst = count($this->input->post('sgst')) > 0 ? implode(",",$this->input->post('sgst')) : $this->input->post('sgst');	
        $igst = count($this->input->post('igst')) > 0 ? implode(",",$this->input->post('igst')) : $this->input->post('igst');  
        $total = count($this->input->post('total')) > 0 ? implode(",",$this->input->post('total')) : $this->input->post('total'); 
        $remark = count($this->input->post('remarks')) > 0 ? implode(",",$this->input->post('remarks')) : $this->input->post('remarks');    

        $create_date = date('Y-m-d H:i:s');
        $user_id = 11;

        $data = array(
            'order_index' => $uindex,
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
            'remark' => $remark,
            'updated_at' => $create_date,
            'updated_by' => $user_id
        );

        $this->session->set_flashdata('dispMessage','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Vendor Updated Successfully!</div>');

        $where = array($this->primary_id=>$vendor_id);
        $this->$model->update($this->table,$data,$where);

        redirect('Vendor_bills');
    }

    public function delete($vbid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$vbid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('dispMessage','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');

        redirect('Vendor_bills');
    }
    public function Status($id,$type)
    {
        $model = $this->model;
        $where = array($this->primary_id=>$id);

        if($type == 1){
            $data = array('u_status'=>'Approved');
            $msg = 'Approved';
        }else{
            $data = array('u_status'=>'Disapprove');
            $msg = 'Disapprove';
        }
        $this->$model->update($this->table,$data,$where);


        $this->session->set_flashdata('dispMessage','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>'.$msg.' Successfully!</div>');

        redirect('Vendor_bills');
    }

}
