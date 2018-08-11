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
	
function action()
 {
	error_reporting(0);
		$q = "select `vendor_bills_master`.*,`vendordetails`.vname ,`sitedetails`.sname from `vendor_bills_master` LEFT JOIN `sitedetails` ON `sitedetails`.sid = `vendor_bills_master`.sid LEFT JOIN `vendordetails` ON `vendordetails`.vid = `vendor_bills_master`.vid";
	$result = $this->db->query($q);
	$data = $result->result();		
	$i = 0;
	$filename = "Vendor_bills_".date('Y-m-d') . ".xls";
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");
?>

   <table id="dataTable" class="table table-striped table-bordered" cellpadding="0" cellspacing="0" style="width:100%">
	<thead>
          <tr>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">SR. NO.</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Vendor</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Site</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Material Name</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Material Unit</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Quantity Received</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Unit Price</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">CGST</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">SGST</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">IGST</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Total Amount</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Bill NO.</th>
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Bill Date.</th>           
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Bill Type.</th>           
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Fright GST.</th>           
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Fright Amount</th>           
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Gross Amount</th>           
            <th style="background: #ccc; padding:10px 0 10px;  font-size: 13px; border-right:1px solid #fff;">Payment Days</th>           
          </tr>
	<thead>
    <tbody>
          
<?php


$data = $this->get_material_details($data);


foreach($data as $key=>$value ){
			$mid_arr = explode(",",$value->mid);
			$mname = explode(",",$value->mname);			
			$muid = explode(",",$value->muid);
			$muname = explode(",",$value->muname);
			$munit_arr_price = explode(",",$value->unit);
			$total_amt = explode(",",$value->total);
			$qty = explode(",",$value->m_qty);			
			$cgst = explode(",",$value->cgst);
			$sgst = explode(",",$value->sgst);
			$igst = explode(",",$value->igst);
			$colspan = count($mid_arr);
				 ?>
            <tr bordercolor="red">                
 				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $i = $i+1;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->vname;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"  rowspan="<?=$colspan;?>"><?php echo $value->sname ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" ><?php echo $mname[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $muname[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $qty[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $munit_arr_price[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $cgst[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $sgst[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $igst[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo number_format((float)$total_amt[0], 2, '.', '');?></td>
                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->bill_no;?></td>
                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->bill_date;?></td>           
                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->bill_type;?></td>           
                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->frieght_gst;?></td>                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->frieght_amount;?></td>                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->gross_amount;?></td>                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->payment_days;?></td> 				
		   </tr>
   <?php 
		unset($mid_arr[0]);
 	    foreach($mid_arr as $key=>$value){
		   ?>
			<tr>
			 <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?=$mname[$key];?></td>
			 <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?=$muname[$key];;?></td>
			 <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?=$qty[$key];?></td>
			 <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?=$munit_arr_price[$key];?></td>
	         <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $cgst[$key] ;?></td>
             <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $sgst[$key] ;?></td>
             <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $igst[$key] ;?></td>
			 <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo number_format((float)$total_amt[$key], 2, '.', '');?></td>
			</tr>
		   <?php
		  }
}?>
        </tbody>
		</table>
		<?php
		
        redirect('Vendor_bills');
    }
	
	
		function get_material_details($Data){

		foreach($Data as $key =>$value){

   			$mid_arr = explode(",",$value->mid);
			$muid = explode(",",$value->muid);

			for($t=0; $t<count($mid_arr); $t++){

				if(!empty($mid_arr[$t])) $material_detail = $this->db->select(array())->where(array('mid'=>$mid_arr[$t]))->get('materials')->result();

			    if(!empty($muid[$t]))$mu_detail = $this->db->select(array())->where(array('muid'=>$muid[$t]))->get('munits')->result();

				if(isset($material_detail[0]->mname) && !empty($material_detail[0]->mname)){
					$value->mname[] = $material_detail[0]->mname;	
				}
				if(isset($mu_detail[0]->muname) && !empty($mu_detail[0]->muname)){
										$value->muname[] = $mu_detail[0]->muname;	
					}
			}
		  
		}
		
		foreach($Data as $key=>$values ){
				if(isset($values->mname)) 
								$values->mname = implode(",",$values->mname); 							
				if(isset($values->muname)) $values->muname = implode(",",$values->muname); 							
	
			}
			
					//		echo "<pre>";
	
			return $Data;
		}
	
	
	function Bill_details(){

		$billId = $this->input->post('id');

    $i = 0;
			$q = "select `vendor_bills_master`.*,`vendordetails`.vname ,`sitedetails`.sname from `vendor_bills_master` LEFT JOIN `sitedetails` ON `sitedetails`.sid = `vendor_bills_master`.sid LEFT JOIN `vendordetails` ON `vendordetails`.vid = `vendor_bills_master`.vid where id = $billId";
	$result = $this->db->query($q);
	$data = $result->result();		
	$data = $this->get_material_details($data);
//print_r($data);

?>
   <table id="dataTable" class="table table-striped table-bordered" cellpadding="0" cellspacing="0" style="width:100%">
	<thead>
          <tr>
            <th >SR. NO.</th>
            <th >Vendor</th>
            <th >Site</th>
            <th>Material Name</th>
            <th>Material Unit</th>
            <th>Quantity Received</th>
            <th>Unit Price</th>
            <th>CGST</th>
            <th>SGST</th>
            <th>IGST</th>
            <th>Total Amount</th>
            <th>Bill NO.</th>
            <th>Bill Date.</th>           
            <th>Bill Type.</th>           
            <th>Fright GST.</th>           
            <th>Fright Amount</th>           
            <th>Gross Amount</th>           
            <th>Payment Days</th>           
          </tr>
	<thead>


<?php

foreach($data as $key=>$value ){
			$mid_arr = explode(",",$value->mid);
			$mname = explode(",",$value->mname);			
			$muid = explode(",",$value->muid);
			$muname = explode(",",$value->muname);
			$munit_arr_price = explode(",",$value->unit);
			$total_amt = explode(",",$value->total);
			$qty = explode(",",$value->m_qty);			
			$cgst = explode(",",$value->cgst);
			$sgst = explode(",",$value->sgst);
			$igst = explode(",",$value->igst);
			$colspan = count($mid_arr);
				 ?>
            <tr bordercolor="red">                
 				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $i = $i+1;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->vname;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"  rowspan="<?=$colspan;?>"><?php echo $value->sname ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" ><?php echo $mname[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $muname[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $qty[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $munit_arr_price[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $cgst[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $sgst[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $igst[0] ;?></td>
				   <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo number_format((float)$total_amt[0], 2, '.', '');?></td>
                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->bill_no;?></td>
                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->bill_date;?></td>           
                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->bill_type;?></td>           
                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->frieght_gst;?></td>                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->frieght_amount;?></td>                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->gross_amount;?></td>                   <td style="padding:10px; text-align:center;border: 1px solid #ccc;" rowspan="<?=$colspan;?>"><?php echo $value->payment_days;?></td> 				
		   </tr>
   <?php 
		unset($mid_arr[0]);
 	    foreach($mid_arr as $key=>$value){
		   ?>
			<tr>
			 <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?=$mname[$key];?></td>
			 <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?=$muname[$key];;?></td>
			 <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?=$qty[$key];?></td>
			 <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?=$munit_arr_price[$key];?></td>
	         <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $cgst[$key] ;?></td>
             <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $sgst[$key] ;?></td>
             <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo $igst[$key] ;?></td>
			 <td style="padding:10px; text-align:center;border: 1px solid #ccc;"><?php echo number_format((float)$total_amt[$key], 2, '.', '');?></td>
			</tr>
		   <?php
		  }
}

	
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
        $date = date('Y-m-d');
        

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
            'date'  => $date,
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
            'created_by' => $user_id
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
        $date = date('Y-m-d');

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
            'date'  => $date,
            'unit'  => $unit,
            'muid'  => $muid,
            'm_qty'  => $m_qty,           
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
