<?php $uid = $this->session->userdata('username'); ?>
<?php
error_reporting(0);

if($action == 'insert')
{
    $btn = 'Save';
}
elseif($action == 'update')
{
    $btn = 'Update';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" />

        <title>New GRN</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/mycss.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="<?php echo base_url();?>assets/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="<?php echo base_url();?>assets/css/daterangepicker.css" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker3.css"/>

        <link href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <!-- Datatable -->
        <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

        <!--Copy Data-->
        <link href="<?php echo base_url();?>assets/css/buttons.bootstrap.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?php echo base_url();?>assets/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">

        <!--     Select2 JS and CSS Files -->
        <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>" type='text/javascript'></script>
        <script src="<?php echo base_url('assets/select2/dist/js/select2.min.js')?>" type='text/javascript'></script>

        <link href="<?php echo base_url('assets/select2/dist/css/select2.min.css')?>" rel='stylesheet' type='text/css'>

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">


                        <!-- sidebar menu -->
                        <?php
    $this->load->view('include/sidebar');
                        ?>
                        <!-- /sidebar menu -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                        </nav>
                    </div>
                </div>


                <!--top Navigation-->
                <body class="nav-md">
                    <div class="container body">
                        <div class="main_container">


	<!-- page content -->
        <div class="right_col" role="main">          
          <div class="row">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1>New GRN</h1>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <br />
                    <form enctype="multipart/form-data" action="<?php echo base_url().$controller.'/'.$action;?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo '<font style="font-size:16px;" color="green">'.$this->session->flashdata('success_msg').'</font>' ?>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Site
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                           <select class="itemname form-control" id="site" name="site">
								<option value="">---site name----</option>
								<?php
								foreach($sites as $site)
								{ ?>
									<option <?php if($action == 'update'){  echo $site->sid == $row[0]->sid ? 'selected' : '' ; }?> value="<?php echo $site->sid?>"><?php echo $site->sname;?></option>
								<?php }	?>
							</select>
                       <script type="text/javascript">
      $('.itemname').select2({
        placeholder: '--- Select Sites ---',
        });
</script>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Vendor
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                           <select class="vendor form-control" id="vendor" name="vendor" required>
								<option value="">---vendor name----</option>
								<?php
								foreach($vendors as $vendor)
								{ ?>
									<option <?php if($action == 'update'){  echo $vendor->vid == $row[0]->vid ? 'selected' : '' ; }?> value="<?php echo $vendor->vid?>"><?php echo $vendor->vname;?></option>
								<?php }	?>
							</select>
                       <script type="text/javascript">
      $('.vendor').select2({
        placeholder: '--- Select Vendors ---',
        });
</script>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Challan No
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="number" min="1" id="challan" name="challan" class="form-control col-md-7 col-xs-12" placeholder="Challan No" value="<?php echo ($action == 'update') ? $row[0]->grnchallan : '';?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Receive Date
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="date" name="date" type="text" value="<?php echo ($action == 'update') ? date("d-m-Y",strtotime($row[0]->grnreceivedate)) :  date("d-m-Y"); ?>" autocomplete="off">
						</div>
                      </div>
	<div class="table-responsive">		  
		<table id="datatable1" table class="table table-striped jambo_table" style="width:100%;">
				<thead>
					<tr class="headings">
					<th class="column-title">Material Name</th>
					<th class="column-title">Qty</th>
					<th class="column-title">Material Unit</th>
					<th class="column-title">Unit Price</th>
					<th class="column-title">Truck Number</th>
					<th class="column-title">Challan Number</th>
					<th class="column-title">Transporter</th>
					<th class="column-title">Remarks</th>
					<th class="column-title no-link last">
					<span class="nobr">Action</span>
					</th>
					</tr>
				</thead>
				<tbody>
				<?php if($action == 'insert') { ?>
					<tr class="pending-user">
						<td>
							<select class="materialname form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($materials as $value)
								{ ?>
									<option value="<?php echo $value->mid?>"><?php echo $value->mname;?></option>
								<?php }	?>
							</select>
							<script type="text/javascript">
      $('.materialname').select2({
        placeholder: '--- Select Materials ---',
        });
</script>
						</td>
						<td>
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" placeholder="0.00" autocomplete="off">
                            <input type="hidden" id="" name="billed_status" class="" placeholder="" autocomplete="off" value="0">
						</td>
						<td>
							<select class="materialunit form-control select_width" id="m_unit_0" name="m_unit[]">
								<option value=""></option>
								<?php
								foreach($units as $value)
								{ ?>
									<option value="<?php echo $value->muid?>"><?php echo $value->muname;?></option>
								<?php }	?>
							</select>
				    <script type="text/javascript">
      $('.materialunit').select2({
        placeholder: '--- Select Materials ---',
        });
</script>
						</td>
						<td>
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00">
						</td>
						<td>
							<input type="text" id="truck_0" name="truck[]" class="amountonly form-control" placeholder="Enter Truck Number">
						</td>
						<td>
							<input type="text" id="challannum_0" name="challannum[]" class="amountonly form-control" placeholder="Enter Challan Number">
						</td>
						<td>
							<select class="transporter form-control select_width" id="transporter_0" name="transporter[]">
								<option value=""></option>
								<?php
								foreach($transporters as $value)
								{ ?>
									<option value="<?php echo $value->tid?>"><?php echo $value->tname;?></option>
								<?php }	?>
							</select>
							<script type="text/javascript">
      $('.transporter').select2({
        placeholder: '--- Select Transporters ---',
        });
</script>
						</td>
						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr>
				<?php } else { ?>
				<input type="hidden" name="grnid" value="<?php echo $row[0]->grnid; ?>"/>
				<?php 
				
					$material = explode(",",$row[0]->mid);
					$qty = explode(",",$row[0]->grnqty);
                    $m_unit = explode(",",$row[0]->muid);
					$unit = explode(",",$row[0]->grnunitprice);
                    $truck = explode(",",$row[0]->grntruck);
                    $challannum = explode(",",$row[0]->grnlinechallan);
                    $transporter = explode(",",$row[0]->tid);          
					$remark = explode(",",$row[0]->grnremarks);
					
					for($i=0; $i<count($material); $i++)
					{
				?>
				<tr class="pending-user">
						<td>
							<select class="itemname form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($materials as $value)
								{ echo $material[$i]; ?>
									<option <?php if($action == 'update'){  echo ((int)$value->mid == (int)$material[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->mid?>"><?php echo $value->mname;?></option>
								<?php }	?>
							</select>
							 <script type="text/javascript">
      $('.itemname').select2({
        placeholder: '--- Select Materials ---',
        });
</script>
						</td>
						<td>
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off">
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
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $unit[$i]; ?>">
						</td>
						<td>
							<input type="text" id="truck_0" name="truck[]" class="amountonly form-control" placeholder="Enter Truck Number" value="<?php echo $truck[$i]; ?>">
						</td>
						<td>
							<input type="text" id="challannum_0" name="challannum[]" class="amountonly form-control" placeholder="Enter challan Number" value="<?php echo $challannum[$i]; ?>">
						</td>
						<td>
							<select class="tname form-control select_width" id="transporter_0" name="transporter[]">
								<option value=""></option>
								<?php
								foreach($transporters as $value)
								{ ?>
									<option <?php if($action == 'update'){  echo ($value->tid == $transporter[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->tid?>"><?php echo $value->tname;?></option>
								<?php }	?>
							</select>
							 <script type="text/javascript">
      $('.tname').select2({
        placeholder: '--- Select Transporters ---',
        });
</script>
						</td>
						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off" value="<?php echo $remark[$i]; ?>">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr>
				<?php }  }?>
				</tbody>
			</table>
	</div>
					  <input type="hidden" value="<?php echo $uid; ?>" name="uid">
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
 <script type="text/javascript">
      $('.material').select2({
        placeholder: '--- Select Materials ---',
        });
</script>
<script  type="text/html" id="form_tpl">
	<tr class="pending-user">
						<td>
							<select class="material form-control select_width" id="material_0" name="material[]">
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
							<input type="text" id="truck_0" name="truck[]" class="amountonly form-control" placeholder="Enter Truck Number">
						</td>
                        <td>
							<input type="text" id="challannum_0" name="challannum[]" class="amountonly form-control" placeholder="Enter Challan Number">
						</td>
                        <td>
							<select class="form-control select_width" id="transporter_0" name="transporter[]">
								<option value=""></option>
								<?php
								foreach($transporters as $value)
								{ ?>
									<option value="<?php echo $value->tid?>"><?php echo $value->tname;?></option>
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

