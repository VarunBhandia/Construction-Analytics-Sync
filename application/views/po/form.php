<?php
error_reporting(0);
	$this->load->view('include/header');
	if($action == 'insert')
	{
		$btn = 'Create PO';
	}
	elseif($action == 'update')
	{
		$btn = 'Update PO';
	}
?>

	<!-- page content -->
        <div class="right_col" role="main">          
          <div class="row">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Constructions <?php echo $action; ?></h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <br />
                    <form enctype="multipart/form-data" action="<?php echo base_url().$controller.'/'.$action;?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo '<font style="font-size:16px;" color="green">'.$this->session->flashdata('success_msg').'</font>' ?>
                        <div class="table-responsive">
                            <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Site
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                            
                           <select class="form-control" id="site" name="site">
								<?php
								foreach($sites as $site)
								{ ?>
									<option <?php if($action != ''){  echo $site->sid == $row[0]->sid ? 'selected' : '' ; }?> value="<?php echo $site->sid?>"><?php echo $site->sname;?></option>
								<?php }	?>
							</select>
                            
                        </div>
                      </div>
       				<?php	$vid = explode(",",$row_po[0]->vid); 
                            print_r ($vid); ?>

                            <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Vendor
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                            
							<select class="form-control select_width" id="vendor" name="vendor[]">
								<option value=""></option>
								<?php
								foreach($vendors as $value)
								{?>
									<option <?php if($action == 'update'){  echo ($value->vid == $vid[0]) ? 'selected' : '' ; }?> value="<?php echo $value->vid?>"><?php echo $value->vname;?></option>
								<?php }	?>
							</select>
                            
                        </div>
                      </div>
       
		<table class="table table-striped jambo_table" style="width:100%;">
				<thead>
					<tr class="headings">
					<th class="column-title">Material Name</th>
					<th class="column-title">Material Unit</th>
					<th class="column-title">Requested Quantity</th>
					<th class="column-title">Approved Quantity</th>
					<th class="column-title">Unit Price</th>
					<th class="column-title">Discount Type</th>
					<th class="column-title">Discount </th>
					<th class="column-title">CGST </th>
					<th class="column-title">SGST </th>
					<th class="column-title">IGST </th>
					<th class="column-title">Total </th>
					<th class="column-title">Remarks </th>
					<th class="column-title no-link last">
					<span class="nobr">Action</span>
					</th>
					</tr>
				</thead>
				<tbody>
				<?php if($action == 'update') 
{ 
                
                    $m_unit = explode(",",$row_po[0]->m_unit);
					$qty = explode(",",$row_po[0]->qty);
					$app_qty = explode(",",$row_po[0]->app_qty);
					$unit = explode(",",$row_po[0]->unit);
					$dtid = explode(",",$row_po[0]->dtid);
					$discount = explode(",",$row_po[0]->discount);
					$cgst = explode(",",$row_po[0]->cgst);
					$sgst = explode(",",$row_po[0]->sgst);
					$igst = explode(",",$row_po[0]->igst);
					$total = explode(",",$row_po[0]->total);
					$vid = explode(",",$row_po[0]->vid);
					$remark = explode(",",$row_po[0]->remark);
					$material = explode(",",$row_po[0]->mid);

//    echo '<pre>';
//    print_r($material);
//    echo '</pre>';
    					for($i=0; $i<count($material); $i++)
					{
?>
                    				<input type="hidden" name="poid" value="<?php echo $row_po[0]->poid; ?>"/>

				<tr class="pending-user">
						<td>
							<select class="form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($materials as $value)
								{ echo $material[$i]; ?>
									<option <?php if($action == 'update'){  echo ((int)$value->mid == (int)$material[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->mid?>"><?php echo $value->mname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<select class="form-control select_width" id="m_unit_0" name="m_unit[]">
								<option value=""></option>
								<?php
								foreach($units as $value)
								{ ?>
									<option <?php if($action == 'update'){  echo ($value->muid == $m_unit[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->muid?>"><?php echo $value->muname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off" readonly>
						</td>
						<td>
							<input type="text" id="app_qty_0" name="app_qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off">
						</td>
						<td>
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $unit[$i]; ?>">
						</td>
						<td>
							<select class="form-control select_width" id="discount_type" name="discount_type[]">
								<option value=""></option>
								<?php
								foreach($discount_types as $value)
								{ ?>
									<option <?php if($action == 'update'){  echo ($value->dtid == $dtid[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->dtid?>"><?php echo $value->dtname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="discount" name="discount[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $$discount[$i]; ?>">
						</td>
						<td>
							<input type="text" id="gst" name="cgst[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $cgst[$i]; ?>">
						</td>
						<td>
							<input type="text" id="gst" name="sgst[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $sgst[$i]; ?>">
						</td>
						<td>
							<input type="text" id="gst" name="igst[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $igst[$i]; ?>">
						</td>
						<td>
							<input type="text" id="total_0" name="total[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $total[$i]; ?>">
						</td>
                    <td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off" value="<?php echo $remark[$i]; ?>">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr>
				<?php } }else 
{
                  ?>
				<?php 

					$material = explode(",",$row[0]->mid);
					$qty = explode(",",$row[0]->mrqty);
					$unit = explode(",",$row[0]->mrunitprice);
					$m_unit = explode(",",$row[0]->muid);
					$remarks = explode(",",$row[0]->mrremarks);
//    echo '<pre>';
//    print_r($unit);
//    echo '</pre>';

					for($i=0; $i<count($material); $i++)
					{
				?>
				<tr class="pending-user">
						<td>
							<select class="form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($materials as $value)
								{ echo $material[$i]; ?>
									<option <?php if($action == 'insert'){  echo ((int)$value->mid == (int)$material[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->mid?>"><?php echo $value->mname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<select class="form-control select_width" id="m_unit_0" name="m_unit[]">
								<option value=""></option>
								<?php
								foreach($units as $value)
								{ ?>
									<option <?php if($action == 'insert'){  echo ($value->muid == $m_unit[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->muid?>"><?php echo $value->muname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off" readonly>
						</td>
						<td>
							<input type="text" id="app_qty_0" name="app_qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off">
						</td>
						<td>
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $unit[$i]; ?>">
						</td>
						<td>
							<select class="form-control select_width" id="discount_type" name="discount_type[]">
								<option value=""></option>
								<?php
								foreach($discount_types as $value)
								{ ?>
									<option <?php if($action == 'update'){  echo ($value->dtid == $dtid[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->dtid?>"><?php echo $value->dtname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="discount" name="discount[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="cgst_<?php echo $i; ?>" name="cgst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="sgst_<?php echo $i; ?>" name="sgst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="igst_<?php echo $i; ?>" name="igst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="total_<?php echo $i; ?>" name="total[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
\						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off" value="">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr>
                    <script>
                        $(function(){
                            var cgst = $('#cgst_<?php echo $i; ?>').val();
                            var sgst = $('#sgst_<?php echo $i; ?>').val();
                            var igst = $('#igst_<?php echo $i; ?>').val();
                            

                            $('#cgst_<?php echo $i; ?>').keyup(function() {
                                var cgst = $('#cgst_<?php echo $i; ?>').val();
                                document.getElementById("total_<?php echo $i; ?>").innerHTML = "22";
                                alert(cgst);
//                                $('#total<?php echo $i; ?>').html(cgst);
                            });
                            
                            $('#sgst_<?php echo $i; ?>').keyup(function() {
                                var sgst = $('#sgst_<?php echo $i; ?>').val();
                                alert(cgst);
                                console.log(cgst)
                                
                            });


                            $('#igst_<?php echo $i; ?>').keyup(function() {
                                var igst = $('#igst_<?php echo $i; ?>').val();
                            });
                        });
                        
                        
                    </script>

				<?php }  }?>
				</tbody>
			</table>
	
                        </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">CGST
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="csgt" name="csgt_total" type="text" value="" autocomplete="off" readonly>
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">SGST
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="ssgt" name="ssgt_total" type="text" value="" autocomplete="off" readonly>
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">IGST
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="isgt" name="isgt_total" type="text" value="" autocomplete="off" readonly>
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Total Amount
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="total_amount" name="total_amount" type="text" value="" autocomplete="off" readonly>
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Frieght Amount
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="frieght_amount" name="frieght_amount" type="text" value="" autocomplete="off" >
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">GST on Freight (in %)
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="gst_frieght_amount" name="gst_frieght_amount" type="text" value="" autocomplete="off" >
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Gross Amount
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="gross_amount" name="gross_amount" type="text" value="" autocomplete="off" readonly>
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Invoice To
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="invoice_to" name="invoice_to" type="text" value="" autocomplete="off" >
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Contact Name
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="contact_name" name="contact_name" type="text" value="" autocomplete="off" >
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Contact No.
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="contact_no" name="contact_no" type="text" value="" autocomplete="off" >
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Terms & Conditions
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="tandc" name="tandc" type="text" value="" autocomplete="off" >
						</div>
                      </div>
					  
                      <div class="form-group">
                        <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" id="submit" class="btn btn-primary"><?php echo $btn;?></button>
                          <a href="<?php echo base_url().$controller;?>" class="btn btn-danger">Cancel</a>
                        </div>
                      </div>
                    </form>
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
	<script src="<?php echo base_url();?>assets/js/underscore-min.js">
</script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
	_.templateSettings.variable = "element";
		var tpl = _.template($("#form_tpl").html());
		var counter = 1;
		
		$("body").on("click",".btn-success", function (e) {
		   e.preventDefault();
			 var tplData = {
				i: counter
			};
			 $(this).closest("tr").after(tpl(tplData));
				counter += 1;
				var row_index = counter-1; 
			return false;
		});
		$('body').on('click',".btn-danger",function()
		{ 
			var count= $('.pending-user').length; 
			var value=count-1;
			if(value>=1)
			{
			$(this).closest('.pending-user').fadeOut('fast', function(){$(this).closest('.pending-user').remove();
			 
			 });
			 return false;
			}
		});		
    });
</script>
<script>
$(document).ready(function (){		
	var dp = $("#date").datepicker({
		format: 'dd-mm-yyyy',
		todayHighlight: true,
        autoclose: true,
	});
});
</script>
<script>
$(document).ready(function (){	
	$('#demo-form2').validate({
		rules:{
			site: { required: true },
		},
		messages: {
			site: { required: "Please Enter Site" },					
		},
	submitHandler: function(form) {
		$(':input[type="submit"]').prop('disabled', true);
		form.submit();
	}
});
}); 
</script>
<script  type="text/html" id="form_tpl">
				<tr class="pending-user">
						<td>
							<select class="form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($materials as $value)
								{ echo $material[$i]; ?>
									<option value="<?php echo $value->mid?>"><?php echo $value->mname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<select class="form-control select_width" id="m_unit_0" name="m_unit[]">
								<option value=""></option>
								<?php
								foreach($units as $value)
								{ ?>
									<option value="<?php echo $value->muid?>"><?php echo $value->muname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off">
						</td>
						<td>
							<input type="text" id="app_qty_0" name="app_qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off">
						</td>
						<td>
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $unit[$i]; ?>">
						</td>
						<td>
							<select class="form-control select_width" id="discount_type" name="discount_type[]">
								<option value=""></option>
								<?php
								foreach($discount_types as $value)
								{ ?>
									<option value="<?php echo $value->dtid?>"><?php echo $value->dtname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="discount" name="discount[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="cgst_0" name="cgst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="sgst_0" name="sgst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="igst_0" name="igst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="total_0" name="total[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off" value="">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr>
</script>

