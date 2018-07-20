<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wo extends CI_Controller
{
    public $table = 'wo_master';
    public $sitetable = 'sitedetails';
    public $controller = 'wo';
    public $message = 'Construction';
    public $primary_id = "woid";
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        $this->model = 'Model';
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index()
    {
        if($this->session->userdata('username') != '')  
        {
            $model = $this->model;
            $data['controller'] = $this->controller;
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['row'] = $this->$model->select(array(),$this->table,array(),'');

            $this->load->view('wo/index',$data);
        }
        else  
        {  
            redirect(base_url() . 'main/login');  
        }  
    }

    public function form()
    {
        $model = $this->model;
        $data['action'] = "insert";
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['workitems'] = $this->$model->select(array(),'workitems',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['subcontdetails'] = $this->$model->select(array(),'subcontdetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('wo/form',$data);
    }

    public function insert()
    {
        $model = $this->model;

        $sid = $this->input->post('site');
        $uid = $this->input->post('uid');
        $subid = $this->input->post('subcontdetail');
        $csgt_total = $this->input->post('csgt_total');
        $ssgt_total = $this->input->post('ssgt_total');
        $isgt_total = $this->input->post('isgt_total');
        $total_amount = $this->input->post('total_amount');
        $frieght_amount = $this->input->post('frieght_amount');
        $gst_frieght_amount = $this->input->post('gst_frieght_amount');
        $gross_amount = $this->input->post('gross_amount');
        $invoice_to = $this->input->post('invoice_to');
        $contact_name = $this->input->post('contact_name');
        $contact_no = $this->input->post('contact_no');
        $tandc = $this->input->post('tandc');
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $creationdate = date('Y-m-d H:i:s');        

        $wiid = count($this->input->post('workitem')) > 0 ? implode(",",$this->input->post('workitem')) : $this->input->post('workitem');

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
        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');    
        $data = array(
            'sid'  => $sid,
            'wocreatedby'  => $uid,
            'subid'  => $subid,
            'wodate'  => $date,
            'wiid'  => $wiid,
            'muid'  => $m_unit,
            'woqty'  => $qty,
            'wounitprice'  => $unit,              
            'dtid'  => $discount_type,
            'wodiscount'  => $discount,
            'wocgst'  => $csgt_total,
            'wosgst'  => $ssgt_total,
            'woigst'  => $isgt_total,
            'wototal'  => $total_amount,
            'woremark'  => $remark,
            'wocgsttotal'  => $cgst,
            'wosgsttotal'  => $sgst,
            'woigsttotal'  => $igst,
            'wototalamount'  => $total,
            'wofreight'  => $frieght_amount,
            'wogstfreight' => $gst_frieght_amount,
            'wogrossamount'  => $gross_amount,
            'oid'  => $invoice_to,
            'wocontactname'  => $contact_name,
            'wocontactno'  => $contact_no,
            'wotandc'  => $tandc,	
            'wodate'  => $date,
            'wocreatedon' => $creationdate

        );

        $this->$model->insert($data,$this->table);

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Added Successfully!</div>');

        redirect('wo');
    }

    public function edit($woid)
    {
        $model = $this->model;
        $data['action'] = "update";
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['workitems'] = $this->$model->select(array(),'workitems',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['subcontdetails'] = $this->$model->select(array(),'subcontdetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('wo/form',$data);
    }

    public function update()
    {
        $model = $this->model;

        $sid = $this->input->post('site');
        $uid = $this->input->post('uid');
        $subid = $this->input->post('subcontdetail');
        $csgt_total = $this->input->post('csgt_total');
        $ssgt_total = $this->input->post('ssgt_total');
        $isgt_total = $this->input->post('isgt_total');
        $total_amount = $this->input->post('total_amount');
        $frieght_amount = $this->input->post('frieght_amount');
        $gst_frieght_amount = $this->input->post('gst_frieght_amount');
        $gross_amount = $this->input->post('gross_amount');
        $invoice_to = $this->input->post('invoice_to');
        $contact_name = $this->input->post('contact_name');
        $contact_no = $this->input->post('contact_no');
        $tandc = $this->input->post('tandc');
        $date = date('Y-m-d',strtotime($this->input->post('date')));
        $updateddate = date('Y-m-d H:i:s');

        $wiid = count($this->input->post('workitem')) > 0 ? implode(",",$this->input->post('workitem')) : $this->input->post('workitem');

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
        $remark = count($this->input->post('remark')) > 0 ? implode(",",$this->input->post('remark')) : $this->input->post('remark');    
        $data = array(
            'sid'  => $sid,
            'woupdatedby'  => $uid,
            'subid'  => $subid,
            'wodate'  => $date,
            'wiid'  => $wiid,
            'muid'  => $m_unit,
            'woqty'  => $qty,
            'wounitprice'  => $unit,              
            'dtid'  => $discount_type,
            'wodiscount'  => $discount,
            'wocgst'  => $csgt_total,
            'wosgst'  => $ssgt_total,
            'woigst'  => $isgt_total,
            'wototal'  => $total_amount,
            'woremark'  => $remark,
            'wocgsttotal'  => $cgst,
            'wosgsttotal'  => $sgst,
            'woigsttotal'  => $igst,
            'wototalamount'  => $total,
            'wofreight'  => $frieght_amount,
            'wogstfreight' => $gst_frieght_amount,
            'wogrossamount'  => $gross_amount,
            'oid'  => $invoice_to,
            'wocontactname'  => $contact_name,
            'wocontactno'  => $contact_no,
            'wotandc'  => $tandc,	
            'wodate'  => $date,
            'woupdatedon' => $updateddate

        );

        $this->session->set_flashdata('add_message','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Updated Successfully!</div>');

        $woid = $this->input->post('woid');
        $where = array($this->primary_id=>$woid);
        $this->$model->update($this->table,$data,$where);

        redirect('wo');
    }

    public function delete($woid)
    {
        $model = $this->model;
        $condition = array($this->primary_id=>$woid);
        $this->$model->delete($this->table,$condition);

        $this->session->set_flashdata('add_message','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Deleted Successfully!</div>');
        redirect('wo');
    }
}
?>
