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
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['workitems'] = $this->$model->select(array(),'workitems',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['subcontdetails'][0] = $this->$model->select(array(),'subcontdetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
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
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        foreach($data['sites'] as $site_details){
            if($site_details->sid == $site){
                $site_unique_identifier = $site_details->uniquesid;
                $site_id = $site_details->sid;
                $worefid = 'WO/2018/'.$site_unique_identifier."/".$site_id;
            }
        }
        echo $worefid;
        
        $data = array(
            'sid'  => $sid,
            'wocreatedby'  => $uid,
            'wocreatedon' => $creationdate,
            'worefid' => $worefid,
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
            'wocreatedon'  => $date

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
        $data['units'] = $this->$model->select(array(),'munits',array(),'');
        $data['sites'] = $this->$model->select(array(),'sitedetails',array(),'');
        $data['workitems'] = $this->$model->select(array(),'workitems',array(),'');
        $data['materials'] = $this->$model->select(array(),'materials',array(),'');
        $data['subcontdetails'][0] = $this->$model->select(array(),'subcontdetails',array(),'');
        $data['discount_types'] = $this->$model->select(array(),'discount_type',array(),'');
        $data['row'] = $this->$model->select(array(),$this->table,array(),'');
        $this->load->view('wo/form',$data);
    }
	
	function pdf_genrate($woid){

//echo "<pre>";  
  require_once("dompdf/dompdf_config.inc.php");
		$model = $this->model;
		
        $result = $this->$model->get_data_for_pdf($woid,$this->table);
 
//		echo "<pre>";
//			print_r($result);
			$workitem_qty = explode("," , $result['All'][0]->woqty);
			$workitem_cgst = explode("," , $result['All'][0]->wocgst);	
			$workitem_cgst_rate = explode("," , $result['All'][0]->wocgst_rate);	
								
			$workitem_sgst = explode("," , $result['All'][0]->wosgst);					
			$workitem_sgst_rate = explode("," , $result['All'][0]->wosgst_rate);	


			$workitem_igst = explode("," , $result['All'][0]->woigst);	
			$workitem_igst_rate = explode("," , $result['All'][0]->woigst_rate);	

			$workitem_wototal = explode("," , $result['All'][0]->wototal);	
			$workitem_discount = explode("," , $result['All'][0]->wodiscount);
   
ob_start(); 
?>

<style>
*{
	padding:0px 0 0px!important;
	margin:0px 0 2px!important;

}
@page { margin: 50px 0; }
.main{
 width:90%;
 margin:auto;
 overflow:scroll;
 height:850px;
margin:50px 0 2px!important;
 

} 
.main table.po-table{
      width: 100%;
      padding: 8px;
      font-size: 10px !important;
      position: absolute;
	  left:40px;
      page-break-after: auto; 
      top: 15px; 
      height: 100%!important;
      margin: 0;
	  margin-bottom: 0em!important;
      margin-top: 0em!important;	
}
.main table.po-table tr td img.logo{
      width: 76px;
}




.main table.po-table tr.first-head td {
    padding: 10px 0 10px;
}

.main table.po-table tr.first-head td h1 {
    font-family: 'Knewave'!important;
	font-style:italic;
    color: #c50303;
    letter-spacing: 0px;
    line-height: 0.4em;
	font-size: 20px!important;	
}


.main table.po-table tr.first-head td h3 {
	text-align: left;
	font-size: 16px;
	font-family: sans-serif;color: #5f5c5c;
	line-height:1.5em;
	margin-top: -5px;
}
.main table.po-table tr.first-head td h5 {
    padding: 10px 0 10px;
	text-align:right;
	line-height:15px;
}

.main table.po-table tr.first-head td h5 span.po-order {
	font-size: 18px;
    font-family: sans-serif;
    color: #5f5c5c;
	line-height:20px;
}
.main table.po-table tr.first-head td{
 padding-bottom:15px!important
}
.main table.po-table tr.second-head td{
 padding-top:10px!important;
 padding-bottom:10px!important;
}
.main table.po-table tr.second-head td h2.vendor {
    font-family: sans-serif;
    line-height: 15px;
    font-size: 13px!important;
    color: #000000;
    margin: 0;
    padding-top: 10px!important;
}
.main table.po-table tr.second-head td h3.vendor-address {
    font-size: 15px;
    font-family: sans-serif;
    font-weight: 500;
    color: #4c4b4b;
    line-height: 15px;
    margin: 0!important;
}

.main table.po-table tr.second-head td h4.vendor-other-details {
    font-size: 12px!important;
    color: #4c4b4b;
    font-family: 'Open Sans Condensed'!important;;
    font-weight: 600;
    line-height: 15px;

}
.main table.po-table tr.third-head td{
 
  padding-bottom:15px!important;
  border-bottom: 2px solid #ccc!important;
  margin-bottom:10px!important;

}
.main table.po-table tr.third-head td h2.ship-details {
    font-family: sans-serif;
    line-height: 15px;
    font-size: 13px!important;
    color: #000000;
    margin: 0;
    padding-top: 10px!important;
}

.main table.po-table tr.third-head td h4.ship-address {
    font-size: 12px!important;
    color: #4c4b4b;
    font-family: 'Open Sans Condensed'!important;;
    font-weight: 600;
    line-height: 15px;

}
 
.main table.po-table tr.third-head td h2.invoice-to {
    font-family: sans-serif;
    line-height: 15px;
    font-size: 13px!important;
    color: #000000;
    margin: 0;
    padding-top:10px!important;
}

.main table.po-table tr.third-head h4.invoice-other-details {
    font-size: 12px!important;
    color: #4c4b4b;
    font-family: 'Open Sans Condensed'!important;;
    font-weight: 600;
    line-height: 15px;

}
  
 
tr.second-head td, tr.third-head td  {
    border-top: 2px solid #ccc;
    padding: 15px 0 15px;
}

.main table.po-table tr.forth-head th{
    border: 1px solid #ccc;
    padding: 10px 0px 10px 0px!important;
    background: #eee8aa;
    text-align: center;
    font-size: 10px;
    font-family: sans-serif;
    margin-bottom:10px!important;
	

}
.main table.po-table tr.fifth-head td{
    color: #2b2b2b;
    font-size: 11px!important;
    font-family: sans-serif;
    border: 1px solid #ccc;
    text-align: center;
    font-weight: bold;
    padding: 5px 0 5px!important;
}

.main table.po-table tr.comman-rows th{
    color: #2b2b2b;
    font-size: 11px!important;
    font-family: sans-serif;
    font-weight: bold;
    padding: 10px;
    text-align: right;
    border-left: 1px solid #ccc!important;	
} 
.main table.po-table tr.comman-rows td{
    color: #2b2b2b;
    font-size: 11px;
    font-family: sans-serif;
    border: 1px solid #ccc;
    text-align: center;
    font-weight: bold;
    padding: 5px 0px 5px!important ;
}

.main table.po-table tr.sixth-head {
    background: #eee8aa;
	font-size:12px!important;
    font-family: sans-serif!important;

}
.main table.po-table tr.sixth-head td {
	padding: 12px;
}
.main table.po-table tr.sixth-head h2 {
    color: #2b2b2b;
    font-size: 16px;
    font-family: sans-serif;
    margin: 20px 0 -15px 0;
}
.main table.po-table tr.sixth-head h4 { 
	font-size: 13px;
    color: #000000;
    font-family: sans-serif;
    line-height: 15px;
}
.main table.po-table tr.seventh-head h4 { 
    font-size: 12px!important;
    color: #000000;
    font-family: sans-serif;
    margin-top: 15px!important;
    line-height: 2.5em;
}
.main table.po-table tr.eight-head td.contact_info h2 {
    color: #000000;
    font-size: 12px!important;
    color: #000000;
    font-family: sans-serif;
    line-height: 20px;
}
.main table.po-table tr.eight-head td.Office h3 {
    font-size: 12px!important;
    font-family: sans-serif;
    font-weight: 500;
    margin-bottom: -10px!important;
    color: #4c4b4b;
    line-height: 25px;
	text-align:right;		
}
 .main table.po-table tr.eight-head td.Office h2 {
    color: #000000;
    font-size: 12px!important;
    font-family: sans-serif;
    line-height: 20px;	
	text-align:right;	
}
.main table.po-table tr.ninth-head td h2 {
	color: #2b2b2b;
    font-size: 12px!important;
	font-family: sans-serif;
	padding: 17px 15px 25px!important;
	margin-top: 24px!important;
    border-top: 2px solid #ccc;
 }
html {
    height: 0;
}
</style>

<title>Work Order</title>
<div class="main">
 
  <table cellpadding="0" cellspacing="0" class="po-table">
  

   
<tr  class="first-head">
			 <td>  <img class="logo" src="<?php echo base_url()?>images/tringle.png"> </td>
			 <td colspan="11">
				<h1>Dee Kay Buildcon Pvt. ltd.</h1>
				<h3>(Engineers &amp; Contractors)<br><b>(ISO 9001:200,14001:2004 &amp; OHSAS)</b></h3>
			 </td>
             <td colspan="5">
                        <h5>
                           <span class="po-order"> Work Order</span>
                           <br />
                           <b>Dt-<?php echo (isset($result['All'][0]->wodate))?date("d/m/y" , strtotime($result['All'][0]->wodate)):'';?></b>
                           <br />
                           <b>PO/2018/stanvac551/37/83</b>
                           <br />
                           <b>
						    <?php echo (isset($result['All'][0]->wodate))?date("d M Y" , strtotime($result['All'][0]->wocreatedon)):'';?>
                           </b>
                          
                        </h5>
                 </td>

             </tr>   

		  <tr class="second-head">
			 <td colspan="17" >
				<h2 class="vendor">
                 <?php if(!empty($result['subcontdetails'])):?>
				 Vendor: <?php echo (isset($result['subcontdetails'][0]->subname))?$result['subcontdetails'][0]->subname:'';?></h2>
				<h3 class="vendor-address"> <?php echo (isset($result['subcontdetails'][0]->subaddress))?ucwords(strtolower($result['subcontdetails'][0]->subaddress)):'';?><br />
				Phone :<?php echo (isset($result['subcontdetails'][0]->submobile))?$result['subcontdetails'][0]->submobile:'';?></h3><br>
                 <?php 
				 else: echo "No Vendor Details";
				 endif;
				 ?>
			 </td>

			</tr>

<tr class="third-head">
			 <td colspan="10">
               <?php if(!empty($result['site'])):?>

				<h2 class="ship-details">Ship To: <br /> <?php echo ucwords(strtolower($result['site'][0]->sname));?></h2>
				<h4 class="ship-address">
				 Address.: <?php echo (isset($result['site'][0]->address))?ucwords(strtolower($result['site'][0]->address)):'';?><br />
                 Contact.: <?php echo (isset($result['site'][0]->contactname))?$result['site'][0]->contactname:''?><br />
				 Phone :<?php echo (isset($result['site'][0]->mobile))?$result['site'][0]->mobile:''?><br />
				 Email :<?php echo (isset($result['site'][0]->email))?$result['site'][0]->email:'';?></h4>
				<?php 
				 else: echo "No Site Details";
				 endif;
				 ?>                 
			 </td>

			 <td colspan="7" >
               <?php if(!empty($result['oid'])):?>
				<h2 class="invoice-to">Invoice To:<br /><?php echo $result['oid'][0]->oname?></h2>
                
				<h4 class="invoice-other-details">
				 Address.: <?php echo (isset($result['oid'][0]->oaddress))?$result['oid'][0]->oaddress:'';?><br />
                 Contact.: <?php echo (isset($result['site'][0]->contactname))?$result['site'][0]->contactname:'';?><br />
				 GST :<?php echo (isset($result['oid'][0]->ogst))?$result['oid'][0]->ogst:'';?><br />
                </h4> 
				<?php 
				 else: echo "No Invoice Details";
				 endif;
				 ?>                   
			 </td>

             </tr>
             
	        <tr> <th style="padding-top:20px!important;" colspan="17"></th>  </tr>    
             
            <tr class="forth-head">
                <th rowspan="2">Sr.No</th>
                <th rowspan="2">Material Name </th>
                <th rowspan="2">HSN</th>
                <th rowspan="2">Material Description </th>
                <th rowspan="2">Remarks</th>
                <th rowspan="2">Unit</th>
                <th rowspan="2">Quantity</th>
                <th rowspan="2">Rate</th>
                <th rowspan="2">Total</th>
                <th rowspan="2">LESS<br />(Discount)</th>
                <th colspan="2">CGST Rate</th>
                <th colspan="2">SGST Rate</th>
                <th colspan="2">IGST Rate</th>
                <th rowspan="2">AGREED AMOUNT(Rs.)</th>
            </tr>  
            <tr class="forth-head">
            
                    <th>Rate</th>
                    <th>Amount</th>
                    <th>Rate</th>
                    <th>Amount</th>
                    <th>Rate</th>
                    <th>Amount</th>
            
            </tr>
            
             <?php foreach($result['workitems'] as $key=>$value):?>
        	<tr class="fifth-head">
				<td><?php echo $key+1;?></td>
				<td><?php echo $value->winame;?></td>
				<td><?php echo '';?></td>
				<td><?php echo $value->widesc;?></td>
				<td><?php echo '';?></td>
				<td><?php echo $result['munits'][$key]->muname;?></td>
				<td><?php echo $workitem_qty[$key];?></td>
   				<td><?php echo '';?></td>
   				<td><?php echo $workitem_wototal[$key]?></td>
   				<td><?php echo $workitem_discount[$key];?></td>
         		<td><?php echo $workitem_cgst_rate[$key];?></td>
               	<td><?php echo $workitem_cgst[$key];?></td>
         		<td><?php echo $workitem_sgst_rate[$key];;?></td>
               	<td><?php echo $workitem_sgst[$key];?></td>
         		<td><?php echo $workitem_igst_rate[$key];;?></td>
               	<td><?php echo $value->wigst;?></td>
         		<td>
				  <?php 
				  $cgst = (empty($workitem_cgst[$key]))?0:$workitem_cgst[$key];
				  $sgst = (empty($workitem_sgst[$key]))?0:$workitem_sgst[$key];				  
				  $igst = (empty($value->wigst))?0:$value->wigst;				  
				  
				 echo ( is_numeric($workitem_wototal[$key])&& is_numeric($cgst) && is_numeric($sgst) && is_numeric($igst)    )?number_format($workitem_wototal[$key]+$cgst+$sgst+$igst):'';?>

                </td>
                
			</tr>
            <?php endforeach;?>
        	<tr class="comman-rows" >
              <th colspan="15">CGST</th>
              <td>RS</td>                
              <td><?php echo $result['All'][0]->wocgsttotal;?></td>
        	</tr>
            <tr class="comman-rows">
                 <th  colspan="15">SGST:</th>
                <td>RS</td>
              <td><?php echo $result['All'][0]->wosgsttotal;?></td>
          </tr>
            <tr class="comman-rows">
                <th  colspan="15">IGST:</th>
                <td>RS</td>
              <td><?php echo $result['All'][0]->woigsttotal;?></td>
            </tr>

            <tr class="comman-rows">
                <th  colspan="15">Total Amount:</th>
                <td>RS</td>
              <td><?php echo $result['All'][0]->wototalamount;?></td>
            </tr>

            <tr class="comman-rows">
                <th  colspan="15">Freight:</th>
                <td>RS</td>
                <td><?php echo $result['All'][0]->wofreight;?></td>
            </tr>

            <tr class="comman-rows">
                <th  colspan="15">GST on Freight(18%):</th>
                <td>RS</td>
                <td><?php echo $result['All'][0]->wogstfreight;?></td>
            </tr>


            <tr class="comman-rows">
                <th  colspan="15">Gross Amount:</th>
                <td>RS</td>
                <td><?php echo $result['All'][0]->wogrossamount;?></td>
            </tr>
            <tr class="">
            <td colspan="17" style="padding-bottom:10px;">&nbsp;</td>
            </tr>
            <tr class="sixth-head">
                <td colspan="17">

                        <h2 class="term-condition">Terms and Conditions:</h2>
                        <?php echo $result['All'][0]->wotandc;?>
                        <h4>Payment : 30 days after receiving date of material at site<br>
                        Transportation : Inclusive<br>
                        GST % : inclusive<br>
                        Delivery : 2 days after po date, If material would be delay as discussed action would be taken.<br>
                        Make : Tata Fe 500D with Tc<br>
                        This PO is placed as per your quotation Dt: DTCPL/PI/2018-19/105/JULY<br><br>
                        The material should be of good quality and of proper size else would not be received.</h4>
                
                </td>
            </tr>

            <tr class="seventh-head">
                <td colspan="17">

                      <h4>If you have any query against purchase order, Please feel free to contact:<span class="span"> <?php echo $result['All'][0]->wocontactname;?> 
                      <span style=" color:#4c4b4b">at</span> <?php echo $result['All'][0]->wocontactno; ?>, 29M</span><br>
                      
                      Note: As confirmation, please sign. and send back a duplicate copy of purchase order to the organization.</h4>                
                </td>
            </tr>
                         <tr class="">
              <td colspan="17">&nbsp;</td>
             </tr>
            <tr class="eight-head">

                <td colspan="9"  class="contact_info" >
                       <h2>For: <?php echo (!empty($result['oid']) && isset($result['oid']) )?$result['oid'][0]->oname:'';?><br>
                            Authorized Signatory :<br>
                            Annexure
                        </h2>
                                 
                </td>
                <td colspan="8" class="Office">
					<h3>Accepted By:</h3>
                    <h2>FOR : OFFICE<br>
                        Authorized Signatory :
                    </h2>                                 
                </td>           
            </tr>            

			<tr class="ninth-head">
                 <td colspan="17" class="">
                    <h2>               System generated Document. May not require Signature.             </h2>
                </td>
		    </tr>

            
  </table>

 </div>



<?php
$data = ob_get_contents();
ob_end_clean();
//exit;
error_reporting(0);
 
  $dompdf = new DOMPDF();
  $dompdf->load_html($data);
  $dompdf->render();
  $dompdf->stream("work-order.pdf", array("Attachment" => false));

  exit(0);






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
            'wocreatedon'  => $date

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
