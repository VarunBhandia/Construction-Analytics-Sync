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
            $username = $this->session->userdata('username');
            $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
            $data['result'] = $this->$model->db_query("select `".$this->table."`.*,`sitedetails`.sname,`vendordetails`.vname from `".$this->table."` INNER JOIN `sitedetails` ON `sitedetails`.sid = `".$this->table."`.sid INNER JOIN `vendordetails` ON `vendordetails`.vid = `".$this->table."`.vid ");
            $username = $this->session->userdata('username');
            $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
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
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['vendors'] = $this->$model->select(array(),'vendordetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $user = $this->$model->select(array(),'users',array('uid' => 11),'');
        $data['sites'] = $this->$model->db_query("SELECT * FROM `sitedetails` WHERE sid IN(".$user[0]->site.")");
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
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
        if ($sid == 0 || $vid == 0) {
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
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
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
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
        $this->load->view('vendor_bills/index', $data);
    }
	
	    function action()

    {
		

//		$query = $this->db->get('vendor_bills_master');
	//	$result = $query->result();		
		$q = "select `vendor_bills_master`.*,`vendordetails`.vname ,`sitedetails`.sname from `vendor_bills_master` LEFT JOIN `sitedetails` ON `sitedetails`.sid = `vendor_bills_master`.sid LEFT JOIN `vendordetails` ON `vendordetails`.vid = `vendor_bills_master`.vid";
			$result = $this->db->query($q);
			$data = $result->result();		

        $this->load->library("excel");
        $object = new PHPExcel();


        $object->setActiveSheetIndex(0);

        $table_columns = array("SR NO.", "Site Name", "Vendor Name", "Material Name" , "Material Unit" , "Quantity Received", "Material Price" , "CGST" , "SGST", "IGST" , "Total", "Bill No" ,"Bill Date" ,"Bill Type" , "Frieght GST", "Frieght Amount", "Gross Amount" ,"Payment Days" );

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

       // $v_data = $this->vendor_m->fetch();

        $excel_row = 2;
$i = 0;
foreach($data as $key=>$value ){
				
			$mid_arr = explode(",",$value->mid);
			$unit_price = explode(",",$value->unit);
			$qty = explode(",",$value->m_qty);	
			$muid = explode(",",$value->muid);
			$total_amt = explode(",",$value->total);
			$cgst = explode(",",$value->cgst);
			$sgst = explode(",",$value->sgst);
			$igst = explode(",",$value->igst);

		for($t=0; $t<count($mid_arr); $t++)
			{
			$material_detail = $this->db->select(array())->where(array('mid'=>$mid_arr[$t]))->get('materials')->result();
			if(!empty($muid[$t]))$mu_detail = $this->db->select(array())->where(array('muid'=>$muid[$t]))->get('munits')->result();

			 $mname = (isset($material_detail[$t]->mname) && !empty($material_detail[$t]->mname))?$material_detail[$t]->mname:'';
			 $muname = (isset($mu_detail[$t]->muname) && !empty($mu_detail[$t]->muname))?$mu_detail[$t]->muname:'';
				$i = $i+1;
				$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row,  $i);	
				$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $value->sname);	
				$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $value->vname);								
				$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $mname);								
			 	$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $muname);								
			 	$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $qty[$t]);
				$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $unit_price[$t] );								

				$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $cgst[$t] );	
				$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $sgst[$t] );	
				$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $igst[$t] );									

			 	$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $total_amt[$t]);				
				$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $value->bill_no);								
				$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $value->bill_date);
				$object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $value->bill_type);				
				$object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $value->frieght_gst);
				$object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $value->frieght_amount);
				$object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $value->gross_amount);												
				$object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $value->payment_days);	
           
		    $excel_row++;
					
			}
		
		}

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');
        redirect('Vendor_bills');
    }
	
	
	
	
    public function insert()
    {
        $user_id = 11;

        $model = $this->model;
		$grnrefid = $this->input->post('grnrefid');
		$grnid = $this->input->post('grnid');
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
        

		$mid = count($this->input->post('selectMaterial')) > 0 ? implode(",",$this->input->post('selectMaterial')) : $this->input->post('selectMaterial');	
		$unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');	
		$muid = count($this->input->post('m_uid')) > 0 ? implode(",",$this->input->post('m_uid')) : $this->input->post('m_uid');	
		$m_qty = count($this->input->post('app_qty')) > 0 ? implode(",",$this->input->post('app_qty')) : $this->input->post('app_qty');	

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
		
            'grnrefid'=>$grnrefid,
            
			'vid'  => $vid,
            'sid'  => $sid,
			'mid'  => $mid,			
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
            'unit'  => $unit,
            'muid'  => $muid,
            'm_qty'  => $m_qty,           
		    'cgst'  => $cgst,
            'sgst'  => $sgst,
            'igst'  => $igst,
            'total'  => $total,
            'remark' => $remark,
            'status' => $status,
            'created_at' => $create_date,
            'created_by' => $uid
        );
        $success = $this->$model->insert($data,$this->table);
        
		if($success){
			$update_data = array("billed_status"=>$mid , 'billed_genrated'=>'yes');
		    $this->db->where ('grnid', $grnid);
			$updated = $this->db->update ('grn_master', $update_data);
		}

		//if($updated){
				$this->session->set_flashdata('dispMessage','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Vendor Added Successfully!</div>');
		
				redirect('Vendor_bills');
		//}
   }

    public function edit($vbid)
    {

        $vbid = $this->uri->segment(3);
        $model = $this->model;
        $data['controller'] = $this->controller;
        $username = $this->session->userdata('username');
        $data['user_roles'] = $this->$model->select(array(),'users',array('username'=>$username),'');
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
        $username = $this->session->userdata('username');
        $data['user_details'] = $this->$model->select(array(),'users',array('username'=>$username),'');
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
    	$grnrefid = $this->input->post('grnrefid');

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
        $updateddate = date('Y-m-d h:i:s');
        $uid = $this->input->post('uid');

   		$mid = count($this->input->post('mid')) > 0 ? implode(",",$this->input->post('mid')) : $this->input->post('mid');	
		$unit = count($this->input->post('unit')) > 0 ? implode(",",$this->input->post('unit')) : $this->input->post('unit');	
		$muid = count($this->input->post('m_uid')) > 0 ? implode(",",$this->input->post('m_uid')) : $this->input->post('m_uid');	
		$m_qty = count($this->input->post('app_qty')) > 0 ? implode(",",$this->input->post('app_qty')) : $this->input->post('app_qty');	
        $cgst = count($this->input->post('cgst')) > 0 ? implode(",",$this->input->post('cgst')) : $this->input->post('cgst');	
        $sgst = count($this->input->post('sgst')) > 0 ? implode(",",$this->input->post('sgst')) : $this->input->post('sgst');	
        $igst = count($this->input->post('igst')) > 0 ? implode(",",$this->input->post('igst')) : $this->input->post('igst');  
        $total = count($this->input->post('total')) > 0 ? implode(",",$this->input->post('total')) : $this->input->post('total'); 
        $remark = count($this->input->post('remarks')) > 0 ? implode(",",$this->input->post('remarks')) : $this->input->post('remarks');    

        $create_date = date('Y-m-d H:i:s');
        $user_id = 11;

        $data = array(
            'order_index' => $uindex,
            'grnrefid'=>$grnrefid,
			'mid'  => $mid,			
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
            'unit'  => $unit,
            'muid'  => $muid,
            'm_qty'  => $m_qty,           
            'cgst'  => $cgst,
            'sgst'  => $sgst,
            'igst'  => $igst,
            'total'  => $total,
            'remark' => $remark,
            'updated_at' => $updateddate,
            'updated_by' => $uid
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
