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
					<th class="column-title">Vendor Name </th>
					<th class="column-title">Remarks </th>
					<th class="column-title no-link last">
					<span class="nobr">Action</span>
					</th>
					</tr>
				</thead>
				<tbody>
				<?php if($action == 'update') 
{ ?>
					<tr class="pending-user">
						<td>
							<select class="form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($materials as $value)
								{ ?>
									<option value="<?php echo $value->mid?>"><?php echo $value->mname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" placeholder="0.00" autocomplete="off">
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
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00">
						</td>
						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr>
				<?php } else {
                  ?>
				<input type="hidden" name="mrid" value="<?php echo $row[0]->mrid; ?>"/>
				<?php 
				
					$material = explode(",",$row[0]->mid);
					$qty = explode(",",$row[0]->mrqty);
					$unit = explode(",",$row[0]->mrunitprice);
					$m_unit = explode(",",$row[0]->muid);
					$remarks = explode(",",$row[0]->mrremarks);

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
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off">
						</td>
						<td>
							<input type="text" id="app_qty_0" name="app_qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off">
						</td>
						<td>
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $unit[$i]; ?>">
						</td>
						<td>
							<input type="radio" id="discount_type" name="discount_type[<?php echo $i; ?>]" class="amountonly form-control" value="amount">Amount
							<input type="radio" id="discount_type" name="discount_type[<?php echo $i; ?>]" class="amountonly form-control" value="percentage">Percentage
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
							<select class="form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($vendors as $value)
								{ echo $vendors[$i]; ?>
									<option value="<?php echo $value->vid?>"><?php echo $value->vname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off" value="">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr>
				<?php }  }?>
				</tbody>
			</table>
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
							<input type="radio" id="discount_type" name="discount_type[<?php echo $i; ?>]" class="amountonly form-control" value="amount">Amount
							<input type="radio" id="discount_type" name="discount_type[<?php echo $i; ?>]" class="amountonly form-control" value="percentage">Percentage
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
							<select class="form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($vendors as $value)
								{ echo $vendors[$i]; ?>
									<option value="<?php echo $value->vid?>"><?php echo $value->vname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off" value="">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr>
</script>

