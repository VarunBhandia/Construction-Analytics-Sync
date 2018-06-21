<?php
error_reporting(0);
	$this->load->view('include/header');
	
	if($action == 'insert')
	{
		$btn = 'Save';
	}
	elseif($action == 'update')
	{
		$btn = 'Update';
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
                    <h2>Construction</h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <br />
                    <form enctype="multipart/form-data" action="<?php echo base_url().$controller.'/'.$action;?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo '<font style="font-size:16px;" color="green">'.$this->session->flashdata('success_msg').'</font>' ?>
					
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Site
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="text" id="site" name="site" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->site : '';?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Vendor
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                           <select class="form-control" id="vendor" name="vendor">
								<option value=""></option>
								<?php
								foreach($vendors as $vendor)
								{ ?>
									<option <?php if($action == 'update'){  echo $vendor->id == $row[0]->vendor ? 'selected' : '' ; }?> value="<?php echo $vendor->id?>"><?php echo $vendor->vendor;?></option>
								<?php }	?>
							</select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Challan No
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="number" min="1" id="challan" name="challan" class="form-control col-md-7 col-xs-12" placeholder="Challan No" value="<?php echo ($action == 'update') ? $row[0]->challan : '';?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Receive Date
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="date" name="date" type="text" value="<?php echo ($action == 'update') ? date("d-m-Y",strtotime($row[0]->receive_date)) :  date("d-m-Y"); ?>" autocomplete="off">
						</div>
                      </div>
	<div class="table-responsive">		  
		<table class="table table-striped jambo_table" style="width:100%;">
				<thead>
					<tr class="headings">
					<th class="column-title">Material Name</th>
					<th class="column-title">Qty</th>
					<th class="column-title">Unit Pice</th>
					<th class="column-title"> Material Unit </th>
					<th class="column-title"> Trunk No </th>
					<th class="column-title"> Challan No </th>
					<th class="column-title"> Transporter </th>
					<th class="column-title"> Remarks</th>
					<th class="column-title no-link last">
					<span class="nobr">Action</span>
					</th>
					</tr>
				</thead>
				<tbody>
				<?php if($action == 'insert') { ?>
					<tr class="pending-user">
						<td>
							<select class="form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($materials as $value)
								{ ?>
									<option value="<?php echo $value->id?>"><?php echo $value->material;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" placeholder="0.00" autocomplete="off">
						</td>
						<td>
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00">
						</td>
						<td>
							<select class="form-control select_width" id="m_unit_0" name="m_unit[]">
								<option value=""></option>
								<?php
								foreach($vendors as $vendor)
								{ ?>
									<option value="<?php echo $vendor->id?>"><?php echo $vendor->vendor;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="truck_0" name="truck[]" class="form-control" autocomplete="off">
						</td>
						<td>
							<input type="text" id="challan_no_0" name="challan_no[]" class="form-control" autocomplete="off">
						</td>
						<td>
							<select class="form-control" id="transporter_0" width="100%" name="transporter[]">
								<option value=""></option>
								<?php
								foreach($vendors as $vendor)
								{ ?>
									<option value="<?php echo $vendor->id?>"><?php echo $vendor->vendor;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr>
				<?php } else { ?>
				<input type="hidden" name="id" value="<?php echo $row[0]->id; ?>"/>
				<?php 
				
					$material = explode(",",$row[0]->material);
					$qty = explode(",",$row[0]->qty);
					$unit = explode(",",$row[0]->unit_price);
					$m_unit = explode(",",$row[0]->material_unit);
					$truck = explode(",",$row[0]->trunk_no);
					$challan_no = explode(",",$row[0]->challan_no);
					$transporter = explode(",",$row[0]->transporter);
					$remarks = explode(",",$row[0]->remarks);
					
					for($i=0; $i<count($material); $i++)
					{
				?>
				<tr class="pending-user">
						<td>
							<select class="form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($materials as $value)
								{ ?>
									<option <?php if($action == 'update'){  echo ($value->id == $material[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->id?>"><?php echo $value->material;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $qty[$i]; ?>" autocomplete="off">
						</td>
						<td>
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $unit[$i]; ?>">
						</td>
						<td>
							<select class="form-control select_width" id="m_unit_0" name="m_unit[]">
								<option value=""></option>
								<?php
								foreach($vendors as $vendor)
								{ ?>
									<option <?php if($action == 'update'){  echo ($vendor->id == $m_unit[$i]) ? 'selected' : '' ; }?> value="<?php echo $vendor->id?>"><?php echo $vendor->vendor;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="truck_0" name="truck[]" class="form-control" value="<?php echo $truck[$i]; ?>" autocomplete="off">
						</td>
						<td>
							<input type="text" id="challan_no_0" name="challan_no[]" class="form-control" value="<?php echo $challan_no[$i]; ?>" autocomplete="off">
						</td>
						<td>
							<select class="form-control" id="transporter_0" width="100%" name="transporter[]">
								<option value=""></option>
								<?php
								foreach($vendors as $vendor)
								{ ?>
									<option <?php if($action == 'update'){  echo ($vendor->id == $transporter[$i]) ? 'selected' : '' ; }?> value="<?php echo $vendor->id?>"><?php echo $vendor->vendor;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" value="<?php echo $remarks[$i]; ?>" autocomplete="off">
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
			vendor:{ required: true },
			challan:{ required: true },
		},
		messages: {
			site: { required: "Please Enter Site" },
			vendor: { required: "Please Enter Vendor" },						
			challan: { required: "Please Enter Challan No" },						
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
				{ ?>
					<option value="<?php echo $value->id?>"><?php echo $value->material;?></option>
				<?php }	?>
			</select>
		</td>
		<td>
			<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" placeholder="0.00" autocomplete="off">
		</td>
		<td>
			<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00">
		</td>
		<td>
			<select class="form-control select_width" id="m_unit_0" name="m_unit[]">
				<option value=""></option>
				<?php
				foreach($vendors as $vendor)
				{ ?>
					<option value="<?php echo $vendor->id?>"><?php echo $vendor->vendor;?></option>
				<?php }	?>
			</select>
		</td>
		<td>
			<input type="text" id="truck_0" name="truck[]" class="form-control" autocomplete="off">
		</td>
		<td>
			<input type="text" id="challan_no_0" name="challan_no[]" class="form-control" autocomplete="off">
		</td>
		<td>
			<select class="form-control" id="transporter_0" width="100%" name="transporter[]">
				<option value=""></option>
				<?php
				foreach($vendors as $vendor)
				{ ?>
					<option value="<?php echo $vendor->id?>"><?php echo $vendor->vendor;?></option>
				<?php }	?>
			</select>
		</td>
		<td>
			<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off">
		</td>
		<td><a class="btn btn-sm btn-success" id="plus">+</a>
		<a class="btn btn-sm btn-danger" id="minus">-</a>
		</td>
	</tr>    
</script>

