<?php
	error_reporting(0);
	$this->load->view('include/header');
	
?>
          <script src="<?php echo base_url('assets/js/tableToexcel.js')?>" type='text/javascript'></script>

<style>
div#search_data {
    overflow: scroll;
}
</style>
	<!-- page content -->
        <div class="right_col" role="main">      
          <div class="row">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Report </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <br />
                    <form enctype="multipart/form-data"  method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo '<font style="font-size:16px;" color="green">'.$this->session->flashdata('success_msg').'</font>' ?>
					
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-6 col-xs-12" for="report">Report Type :
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
							<select class="select2" name="report" id="report" style="width:100%;">
								<option value=""></option>
								<option value="cp_master">Cash Purchase</option>
								<option value="po_master">Purchase Order</option>
								<option value="grn_master">Good Received</option>
								<option value="mo_master">Move Order</option>
								<option value="">Unbilled Receiving</option>
								<option value="">Billed Receiving</option>
								<option value="">Vendors Rate</option>
								<option value="">Stock Report</option>
								<option value="transporters">Transporter Report</option>

							</select>
                        </div>
                      </div>
                     
                      <div class="form-group" id="transport-content">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site">Transporter :
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <select class="select2" id="transporter" name="transporter" placeholder=" Select Site" style="width:100%;">
								<option value=""></option>

							</select>
                        </div>
                      </div>                    

                      <div class="form-group" id="type-mode" style="display:none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site">Type :
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <select class="select2" id="type-mode-option" name="type_mode_option" placeholder=" Select Site" style="width:100%;">
                                <option value="All">All Meterial</option>
                                <option value="moid" tid="">Mo Master</option>
                                <option value="rtv" tid="">RTV</option>
                                <option value="grn" tid="">GRN</option>

							</select>
                        </div>
                      </div>                    

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Material :
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <select class="select2" id="material" name="material" placeholder=" Select Material" style="width:100%;">
								<option value=""></option>
								<?php
								foreach($material as $value)
								{ ?>
									<option value="<?php echo $value->mid?>"><?php echo $value->mname;?></option>
								<?php }	?>
							</select>
                            <div id="munit-data"></div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site">Site :
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <select class="select2" id="site" name="site" placeholder=" Select Site" style="width:100%;">
								<option value=""></option>
								<?php
								foreach($site as $value)
								{ ?>
									<option value="<?php echo $value->sid?>"><?php echo $value->sname;?></option>
								<?php }	?>
							</select>
                        </div>
                      </div>
					  
					<div id="vendorname">	
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Vendor :
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <select class="select2" id="vendor" name="vendor" placeholder=" Select Vendor" style="width:100%;">
								<option value=""></option>
								<?php
								foreach($vendor as $value)
								{ ?>
									<option value="<?php echo $value->vid?>"><?php echo $value->vname;?></option>
								<?php }	?>
							</select>
                        </div>
                      </div>
					</div>

					  
					  
					  <div id="cat_disp">
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Category :
							</label>
							<div class="col-md-4 col-sm-6 col-xs-12">
							   <select class="select2" id="category" name="category" placeholder=" Select Category" style="width:100%;">
									<option value=""></option>
									<?php
									foreach($category as $value)
									{ ?>
										<option value="<?php echo $value->cid?>"><?php echo $value->cname;?></option>
									<?php }	?>
								</select>
							</div>
						  </div>
					  </div>
					  
					  <div id="amount_disp">
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-date">Amount :
							</label>
							<div class="col-md-2 col-sm-6 col-xs-12">
							   <input class="form-control" id="min" name="min" type="text" placeholder="Min" autocomplete="off" >
							</div>
							<div class="col-md-2 col-sm-6 col-xs-12">
							   <input class="form-control" id="max" name="max" type="text" placeholder="Max" autocomplete="off" >
							</div>
						  </div>
					  </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Range :
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <select class="select2" id="range" name="range" placeholder="Select type" style="width:100%;">
								<option value=""></option>
								<option value="1">Last 7 Days</option>
								<option value="2">Last Month</option>
								<option value="3">Last Quarter</option>
								<option value="4">Last Year</option>
							</select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-date">From Date :
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <!-- <input class="form-control" id="from" name="from" type="text" placeholder="From Data" autocomplete="off" readonly> -->
						   <input class="form-control" id="fromData" name="fromData" type="text" placeholder="From Date" autocomplete="off" >
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to-date">To Date :
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <!-- <input class="form-control" id="to" name="to" type="text"  placeholder="To Data" autocomplete="off" readonly> -->
                           <input class="form-control" id="toData" name="toData" type="text"  placeholder="To Date" autocomplete="off" >
                        </div>
                      </div>
				</div>
					   <div class="form-group">
							<div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-4">
								<button type="button" id="submit" class="btn btn-primary" >Apply</button>
								<button style="display:none;" type="button" id="submit1" class="btn btn-primary" >Apply</button>
								<a href="" class="btn btn-danger">Cancel</a>
							</div>
						</div>
			  </form>
                  </div>
                </div>
              </div>
			  <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_content">
				<div id="search_data">
				<table id="dataTable" class="table table-striped table-bordered" style="width:100%">
				 <tr>
                  <td><a class="btn btn-success ctn_MG_TT" id="btnExport">Export</a></td>
                 </tr>
                	<thead>		
				<?php // if ($cp_master == 'cp_master' ) {
				
				?>		
						<tr>
							<th>ID</th>
							<th>Date</th>
							<th>Reference ID</th>
							<th>Vendor</th>
							<th>Site</th>
							<th>Material</th>
							<th>Material Unit</th>
							<th>Quantity received</th>
							<th>Unit Price</th>
							<th>Total Amount</th>
							<th>Challan No</th>
							<th>Remarks</th>
						</tr>
						
                        <tr id="content-d">
						
						</tr>
						</thead>	
					<tbody>
						
					</tbody>
				</table>
				</div>
				</div>
				</div>
				</div>
				</div>
            </div>
            </div>
        <!-- /page content -->
<?php
	$this->load->view('include/footer');
?>
<!-- Validate Js -->
	<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/underscore-min.js"></script>
<script>


$(document).ready(function (){	
$('#transport-content').hide();
	var getdata;
	$('body').on('change','#report', function() {
		var report = $(this).val();
	
		if(report == 'cp_master'){
			$('#amount_disp').show();
			$('#cat_disp').hide();
		}
		else if(report == 'po_master'){
			$('#amount_disp').show();
			$('#cat_disp').hide();
		}
		else if(report == 'mo_master'){
			$('#vendorname').hide();
			$('#amount_disp').hide();
		}
		else if(report == 'grn_master'){
			$('#amount_disp').hide();
		}
		else if(report == 'transporters'){
			
			
			$('#amount_disp').hide();

			
		}
		else{
			$('#amount_disp').hide();
			$('#cat_disp').show();
		}
		if(report == '')
		{
			alert("Please Select Report Type");
			return false;
		}
		else{
			
			if(report == 'transporters'){
									$.ajax({
									"url": "<?php echo base_url()."My_controller_report/get_transport/" ?>",
									"data": {id: report},	
									"type": "POST",
									success: function(response)
									{
										$('#transport-content').show();
										$('select#transporter').html(response);
										$('#vendorname').html('');
									}
							});
						}
			else {	
				$('#transport-content').hide();		
				$.ajax({
				"url": "<?php echo base_url()."My_controller_report/get_tables/" ?>",
				"dataType": "json",
				"data": {id: report},	
				"type": "POST",
				success: function(response)
				{
					getdata = response;
				}
				});
			}
		}
	});

	$('body').on('change','#transporter', function() {
		var transporter = $(this).val();
	
	
									$.ajax({
									"url": "<?php echo base_url()."My_controller_report/get_id_for_transport/" ?>",
									"data": {tid: transporter},	
									"type": "POST",
									success: function(response)
									{
										$('#type-mode').show();
										$('#type-mode-option option').attr("tid",transporter);
										//$('#material').html(response);
									}
							});
						});
			
	

	$('body').on('change','#type-mode-option', function() {
		var type_mode = $(this).val();
		
			var tid = $('#type-mode-option option').attr('tid');
	
	
									$.ajax({
									"url": "<?php echo base_url()."My_controller_report/get_type_of_data/" ?>",
									"data": {type_mode: type_mode , tid:tid},	
									"type": "POST",
									success: function(response)
									{
										 //alert(response);
										//$('#type-mode').show();
										
										$('#material').html(response);
									}
							});
						});
			


	$('body').on('change','#material', function() {


			var sid = $('option:selected' , this).attr('sid');
			var category_id = $('option:selected' , this).attr('category_id');
			var munit = $('option:selected' , this).attr('unit');

									$.ajax({
									"url": "<?php echo base_url()."My_controller_report/get_site_data/" ?>",
									"data": {sid: sid , category_id:category_id , munit_id:munit },	
									"type": "POST",
									success: function(response)
									{
										 var Obj = JSON.parse(response);
										
										//$('#type-mode').show();
										
										$('#site').html(Obj.Site);
										$('#category').html(Obj.Category);
										$("#munit-data").html('<input type="hidden" id="munits" type="text" value="'+Obj.munit+'" />');
									}
							});
						});
			



$('body').on('click','#submit1', function() {

		var transpoter_name = $('#transporter option:selected').attr('transpoter-name');
		var materail_name = $('#material option:selected').attr('materail-name');
		var materail_id = $('#material option:selected').attr('value');		
		var site_name = $('#site option:selected').attr('site-name');
		var category_name = $('#category option:selected').attr('category-name');
		var FormDate = $('#fromData').val();
		var munits = $('#munits').val();
	 
  		
      var toData = $('#fromData').val();
  
			$.ajax({
					"url": "<?php echo base_url()."My_controller_report/set_data_into_table/" ?>",
					"data": {materail_id:materail_id,transpoter_name: transpoter_name , materail_name:materail_name , site_name:site_name, category_name:category_name,munits:munits,FormDate:FormDate,toData:toData},	
					"type": "POST",
					success: function(response)
					{
						
						
						$('#dataTable').show();
						
						$('#dataTable #content-d').html(response);
					}
			});
	 
//	  alert(transpoter_name+" "+materail_name+" "+site_name+" "+category_name+" "+FormDate+toData);
});
		
/*$("body").on('click','#btnExport',function () {
			$("#dataTable").table2excel({
				filename: "Report.xls"
		});
});		
*/


	$("#dataTable").hide();
	
	$('body').on('click','#submit', function() {
		var site = $("#site").val();
		var vendor = $("#vendor").val();
		var material = $("#material").val();
		var fromData = $("#fromData").val();
		var toData = $("#toData").val();
		var min = $("#min").val();
		var max = $("#max").val();
		
		var report = $("#report").val();
		if(report == '')
		{
			alert("Please Select Report Type");
			return false;
		}
		else
		{
			/* $("#dataTable").dataTable().fnDestroy();
			$("#dataTable").show();
			$("#dataTable").DataTable({
				processing:true,
				"pageLength":  100,
				"pagingType": "full_numbers",
				serverside:true,
				columns:getdata,
				autoWidth:false,
					ajax:{
						"url": "<?php //echo base_url()."My_controller_report/reportData/" ?>",
						"dataType": "json",
						"data": {id:report,site:site,vendor:vendor,material:material,getdata:getdata,fromData:fromData,toData:toData,min:min,max:max},
					},
				}).on( 'order.dt search.dt', function () {
				$("#dataTable").DataTable().column(0, {search:'applied',order:'applied'}).nodes().each( function (cell, i) {
					cell.innerHTML = i+1;
				});
			}).draw(); */
			
			$.ajax({
				type:"POST",
				url:"<?php echo base_url()."My_controller_report/reportData/" ?>",
				data:{id:report,site:site,vendor:vendor,material:material,getdata:getdata,fromData:fromData,toData:toData,min:min,max:max},
				success:function (res)
				{
					//alert(res)
					 $('#search_data').empty().append(res);
				}
			});
			
			return false;
		}
		});
		
	$('#demo-form2').validate({
		submitHandler: function(form) {
			$(':input[type="submit"]').prop('disabled', true);
		form.submit();
		}
	});
	

}); 
</script>
<script>
$(document).ready(function (){	
	
	var dp = $("#from").datepicker({
		format: 'dd-mm-yyyy',
		todayHighlight: true,
        autoclose: true,
	});
	
	var pd = $("#to").datepicker({
		format: 'dd-mm-yyyy',
		todayHighlight: true,
        autoclose: true,
	});
});
</script>
<?php
	/* $arr = Array();
   $arr[]["data"] = "cpid";
   $arr[]["data"] = "cppurchasedate";
   $arr[]["data"] = "cprefid";
   $arr[]["data"] = "vid";
   $arr[]["data"] = "sid";
   $arr[]["data"] = "mid";
   $arr[]["data"] = "muid";
   $arr[]["data"] = "cpqty";
   $arr[]["data"] = "cpunitprice";
   $arr[]["data"] = "total";
   $arr[]["data"] = "cpchallan";
   $arr[]["data"] = "cpremark";	 */
?>
<script>
	var $abc = null;
	/* Range Ajax */
	$('#range').on('change',function(){
	var range = $('#range').val();
		  $.ajax({
			  url:'<?php echo base_url().'My_controller_report/get_date';?>',
			  method:"post",
			  dataType:"JSON",
			  data:{range:range},
			  success:function(res)
			  { //var Obj = JSON.parse(res);

				$("input#fromData").val(res.d[0]);
				$("#toData").val(res.d[1]);
			  }
		  });
	});
	
	/* Report Ajax */
	// $('#report').on('change',function(){
	// var report = $('#report').val();
	// 	  $.ajax({
	// 		  url:'<?php //echo base_url().$controller.'/get_tables';?>',
	// 		  method:"post",
	// 		  dataType:"JSON",
	// 		  data:{report:report},
	// 		  success:function(data)
	// 		  {
	// 			$abc = data.rData;
	// 		  }
	// 	  });
	// });
</script>
