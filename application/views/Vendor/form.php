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

            <title>New Vendor</title>

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
                    <h1>New Vendor</h1>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <br />
                    <form enctype="multipart/form-data" action="<?php echo base_url().$controller.'/'.$action;?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo '<font style="font-size:16px;" color="green">'.$this->session->flashdata('success_msg').'</font>' ?>
                          <input type="hidden" name="vid" value="<?php echo ($action == 'update') ? $row[0]->vid : '';?>">
                        <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Vendor Name
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="text" min="1" id="vname" name="vname" class="form-control col-md-7 col-xs-12" placeholder="---Enter Vendor Name---" value="<?php echo ($action == 'update') ? $row[0]->vname : '';?>" required>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Mobile No
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="text" min="1" id="vmobile" name="vmobile" class="form-control col-md-7 col-xs-12" placeholder="Mobile Number" value="<?php echo ($action == 'update') ? $row[0]->vmobile : '';?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Alternate Mobile No
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="text" min="1" id="valtmobile" name="valtmobile" class="form-control col-md-7 col-xs-12" placeholder="Alt mobile number" value="<?php echo ($action == 'update') ? $row[0]->valtmobile : '';?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Email ID
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="text" min="1" id="vemail" name="vemail" class="form-control col-md-7 col-xs-12" placeholder="Email-ID" value="<?php echo ($action == 'update') ? $row[0]->vemail : '';?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Vendor GST
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="text" min="1" id="vgst" name="vgst" class="form-control col-md-7 col-xs-12" placeholder="GST" value="<?php echo ($action == 'update') ? $row[0]->vgst : '';?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Address
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="text" min="1" id="vaddress" name="vaddress" class="form-control col-md-7 col-xs-12" placeholder="Address" value="<?php echo ($action == 'update') ? $row[0]->vaddress : '';?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Description
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="number" min="1" id="vdesc" name="vdesc" class="form-control col-md-7 col-xs-12" placeholder="Description" value="<?php echo ($action == 'update') ? $row[0]->vdesc : '';?>">
                        </div>
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


