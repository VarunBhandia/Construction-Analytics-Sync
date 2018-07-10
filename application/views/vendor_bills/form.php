<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" />

        <title>Codeigniter | </title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,900" rel="stylesheet">
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

        <!--     Select2 JS and CSS Files -->
        <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>" type='text/javascript'></script>
        <script src="<?php echo base_url('assets/select2/dist/js/select2.min.js')?>" type='text/javascript'></script>

        <link href="<?php echo base_url('assets/select2/dist/css/select2.min.css')?>" rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                        <div class="col-md-3 left_col">
                            <div class="left_col scroll-view">
                                <div class="navbar nav_title" style="border: 0;">
                                    <a href="<?php echo base_url();?>" class="site_title">Construction Analytics 2018</a>
                                </div>

                                <!-- sidebar menu -->
                                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                                    <div class="menu_section">
                                    </div>

                                </div>
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
                        <!-- /top navigation -->
                        <?php
error_reporting(0);
?>
<style>
	.select2{
		width:100%;
	}
</style>

<div class="right_col" role="main">          
    <div class="row">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Update Construction</h2>
                        <div class="clearfix"></div>
                    </div>

                    <?php
						$this->load->view('include/footer');
                    ?>

                    <div class="message">
                        <?php
                        if (isset($result)){
                            echo "<p><u>Result</u></p>";
                            
                             ?>
						
						<?php 
						 echo form_open('Vendor_bills/update');
						?>
                        <div class="datatable-responsive">
                            <table id="datatable1" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">GRNID</th>
                                        <th class="column-title">Receive Date</th>
                                        <th class="column-title">Challan No.</th>
                                        <th class="column-title">Material Name	</th>
                                        <th class="column-title">Material Unit	</th>
                                        <th class="column-title">Quantity</th>
                                        <th class="column-title">Unit Price</th>
                                        <th class="column-title">CGST</th>
                                        <th class="column-title">SGST</th>
                                        <th class="column-title">IGST</th>
                                        <th class="column-title">Total</th>
                                        <th class="column-title">Remarks</th>
                                        <th class="column-title no-link last">
                                            <span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        var cgst_d_total = [];
                                        var sgst_d_total = [];
                                        var igst_d_total = [];
                                        var total_total = [];
                                    </script>
									
									<?php
										$c=0;
										$tr = 0;
										$order_index = explode(",",$result[0]->order_index);
										$unit = explode(",",$result[0]->unit);
										$cgst = explode(",",$result[0]->cgst);
										$sgst = explode(",",$result[0]->sgst);
										$igst = explode(",",$result[0]->igst);
										$total = explode(",",$result[0]->total);
										$remark = explode(",",$result[0]->remark);
										
										 foreach($grn_data as $key=>$value){
										$material = explode(",",$value->mid);
										$qty = explode(",",$value->grnqty);
										$grnlinechallan = explode(",",$value->grnlinechallan);
										$grnunit = explode(",",$value->grnunitprice);
										$m_unit = explode(",",$value->muid);
										$remarks = explode(",",$value->grnremarks);
									?>

                                    <input type="hidden" name="vid" value="<?php echo $result[0]->vid; ?>"/>
                                    <input type="hidden" name="sid" value="<?php echo $result[0]->sid; ?>"/>
                                    <input type="hidden" name="vendor_id" value="<?php echo $result[0]->id; ?>"/>
                                    <?php 

									
                                    for($i=0; $i<count($material); $i++)
                                    {
                                    ?>
                                    <tr class="pending-user">
                                        <td style="width: 6em;">
											<input type="hidden" name="uindex[]" value="<?php echo $c; ?>" />
                                            <?php echo $value->grnrefid; ?>
                                            <input type="hidden" id="grnrefid" name="grnrefid" class="amountonly form-control" value="<?php echo $value->grnrefid; ?>">
                                        </td>
                                        <td style="width: 6em;">
                                            <?php echo $value->grnreceivedate ; ?>
                                            <input type="hidden" id="grnreceivedate" name="grnreceivedate" class="amountonly form-control" value="<?php echo $value->grnreceivedate; ?>">
                                        </td>
                                        <td style="width: 6em;">
                                            <?php echo $grnlinechallan[$i]; ?>
                                        </td>
                                        <td style="width: 7em;">
                                            <?php
                                        foreach($materials as $material_detail)
                                        {  ?>
                                            <?php if($material[$i]==$material_detail->mid){echo $material_detail->mname;} ?> 
                                            <?php }	?>
                                        </td>
                                        <td style="width: 5em;">
                                            <?php
                                        foreach($units as $val)
                                        { ?>
                                            <?php if($m_unit[$i]==$val->muid){echo $val->muname;} ?> 
                                            <?php }	?>
                                        </td>
                                        <td style="width: 5em;">
                                            <?php echo $qty[$i]; ?>
                                            <input type="hidden" id="app_qty_<?php echo $i; ?>" name="app_qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>">

                                        </td>
                                        <td style="width: 7em;">
											<?php
												if(in_array($c,$order_index)){
													$unit_val = $unit[$tr];
												}else{
													$unit_val = '';
												}
											?>
                                            <input type="text" <?php echo (in_array($c,$order_index)) ? 'readonly' : ''; ?> id="unit_<?php echo $i; ?>" name="unit[]" class="amountonly form-control remove_unit" placeholder="0.00" value="<?php echo $unit_val; ?>">
                                        </td>
                                        <td style="width: 5em;">
											<?php
												if(in_array($c,$order_index)){
													$cgst_val = $cgst[$tr];
												}else{
													$cgst_val = '';
												}
											?>
                                            <input type="text" <?php echo (in_array($c,$order_index)) ? 'readonly' : ''; ?> id="cgst_<?php echo $i; ?>" name="cgst[]" class="amountonly form-control" min="0" placeholder="0" value="<?php echo $cgst_val; ?>">
                                        </td>
                                        <td style="width: 5em;">
											<?php
												if(in_array($c,$order_index)){
													$sgst_val = $sgst[$tr];
												}else{
													$sgst_val = '';
												}
											?>
                                            <input type="text" <?php echo (in_array($c,$order_index)) ? 'readonly' : ''; ?> id="sgst_<?php echo $i; ?>" name="sgst[]" class="amountonly form-control" min="0" placeholder="0" value="<?php echo $sgst_val; ?>">
                                        </td>
                                        <td style="width: 5em;">
											<?php
												if(in_array($c,$order_index)){
													$igst_val = $igst[$tr];
												}else{
													$igst_val = '';
												}
											?>
                                            <input type="text" <?php echo (in_array($c,$order_index)) ? 'readonly' : ''; ?> id="igst_<?php echo $i; ?>" name="igst[]" class="amountonly form-control" min="0" placeholder="0" value="<?php echo $igst_val; ?>">
                                        </td>
                                        <td style="width: 9em;">
											<?php
												if(in_array($c,$order_index)){
													$total_val = $total[$tr];
												}else{
													$total_val = '';
												}
											?>
                                            <input type="text" id="total_<?php echo $i; ?>" name="total[]" class="amountonly form-control" min="0" placeholder="0.00" value="<?php echo $total_val; ?>" readonly>
                                        </td>
                                        <td>
											<?php
												if(in_array($c,$order_index)){
													$remark_val = $remark[$tr];
												}else{
													$remark_val = $remark[$i];
												}
											?>
                                            <input type="text" <?php echo (in_array($c,$order_index)) ? 'readonly' : ''; ?> id="remarks_<?php echo $i; ?>" name="remarks[]" value="<?php echo $remark_val; ?>" class="form-control">
                                        </td>
                                        <td>
											<?php 
												if(! in_array($c,$order_index))
												{
													echo '<a class="btn btn-sm btn-danger" id="minus">-</a>';
												}
											?>
                                        </td>
                                    </tr>
									<?php if(in_array($c,$order_index)){$tr++;} //$this->load->view('include/footer');?>
                                    <script>

                                        jQuery(document).ready(function(){

                                            var quantity = $('#app_qty_<?php echo $i; ?>').val();
                                            var unit_price = parseFloat($('#unit_<?php echo $i; ?>').val());

                                            $('#app_qty_<?php echo $i; ?>').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

                                                var igst_d_j;
                                                var igst_d_k=parseFloat(0);
                                                for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                $('#igst').val(igst_d_k);

                                                total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);

                                                total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                console.log('total_total: '+total_total);

                                                var total_d_j;
                                                var total_d_k=parseFloat(0);
                                                for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                $('#total_total').val(total_d_k);
                                                console.log('total_d_k : '+total_d_k);

                                                frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                console.log('frieght_amount : '+frieght_amount);

                                                frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                console.log('frieght_gst : '+frieght_gst);

                                                frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                console.log('frieght_amount_total : '+frieght_amount_total);

                                                $('#gross_amount').val(frieght_amount_total);


                                            }); 

                                            $('#unit_<?php echo $i; ?>').keyup(function() {

                                                unit_price = parseFloat($('#unit_<?php echo $i; ?>').val());
                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

                                                var igst_d_j;
                                                var igst_d_k=parseFloat(0);
                                                for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                $('#igst').val(igst_d_k);

                                                total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);

                                                total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                console.log('total_total: '+total_total);

                                                var total_d_j;
                                                var total_d_k=parseFloat(0);
                                                for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                $('#total_total').val(total_d_k);
                                                console.log('total_d_k : '+total_d_k);

                                                frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                console.log('frieght_amount : '+frieght_amount);

                                                frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                console.log('frieght_gst : '+frieght_gst);

                                                frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                console.log('frieght_amount_total : '+frieght_amount_total);

                                                $('#gross_amount').val(frieght_amount_total);
                                            }); 

                                            $('#cgst_<?php echo $i; ?>').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

                                                var igst_d_j;
                                                var igst_d_k=parseFloat(0);
                                                for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                $('#igst').val(igst_d_k);

                                                total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);

                                                total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                console.log('total_total: '+total_total);

                                                var total_d_j;
                                                var total_d_k=parseFloat(0);
                                                for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                $('#total_total').val(total_d_k);
                                                console.log('total_d_k : '+total_d_k);

                                                frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                console.log('frieght_amount : '+frieght_amount);

                                                frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                console.log('frieght_gst : '+frieght_gst);

                                                frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                console.log('frieght_amount_total : '+frieght_amount_total);

                                                $('#gross_amount').val(frieght_amount_total);


                                            });                           

                                            $('#sgst_<?php echo $i; ?>').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

                                                var igst_d_j;
                                                var igst_d_k=parseFloat(0);
                                                for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                $('#igst').val(igst_d_k);

                                                total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);

                                                total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                console.log('total_total: '+total_total);

                                                var total_d_j;
                                                var total_d_k=parseFloat(0);
                                                for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                $('#total_total').val(total_d_k);
                                                console.log('total_d_k : '+total_d_k);

                                                frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                console.log('frieght_amount : '+frieght_amount);

                                                frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                console.log('frieght_gst : '+frieght_gst);

                                                frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                console.log('frieght_amount_total : '+frieght_amount_total);

                                                $('#gross_amount').val(frieght_amount_total);


                                            });                           

                                            $('#igst_<?php echo $i; ?>').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

                                                var igst_d_j;
                                                var igst_d_k=parseFloat(0);
                                                for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                $('#igst').val(igst_d_k);

                                                total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);

                                                total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                console.log('total_total: '+total_total);

                                                var total_d_j;
                                                var total_d_k=parseFloat(0);
                                                for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                $('#total_total').val(total_d_k);
                                                console.log('total_d_k : '+total_d_k);

                                                frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                console.log('frieght_amount : '+frieght_amount);

                                                frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                console.log('frieght_gst : '+frieght_gst);

                                                frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                console.log('frieght_amount_total : '+frieght_amount_total);

                                                $('#gross_amount').val(frieght_amount_total);


                                            });

                                            $('#frieght_amount').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

                                                var igst_d_j;
                                                var igst_d_k=parseFloat(0);
                                                for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                $('#igst').val(igst_d_k);

                                                total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);

                                                total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                console.log('total_total: '+total_total);

                                                var total_d_j;
                                                var total_d_k=parseFloat(0);
                                                for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                $('#total_total').val(total_d_k);
                                                console.log('total_d_k : '+total_d_k);

                                                frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                console.log('frieght_amount : '+frieght_amount);

                                                frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                console.log('frieght_gst : '+frieght_gst);

                                                frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                console.log('frieght_amount_total : '+frieght_amount_total);

                                                $('#gross_amount').val(frieght_amount_total);


                                            });  

                                            $('#frieght_gst').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

                                                var igst_d_j;
                                                var igst_d_k=parseFloat(0);
                                                for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                $('#igst').val(igst_d_k);

                                                total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);

                                                total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                console.log('total_total: '+total_total);

                                                var total_d_j;
                                                var total_d_k=parseFloat(0);
                                                for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                $('#total_total').val(total_d_k);
                                                console.log('total_d_k : '+total_d_k);

                                                frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                console.log('frieght_amount : '+frieght_amount);

                                                frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                console.log('frieght_gst : '+frieght_gst);

                                                frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                console.log('frieght_amount_total : '+frieght_amount_total);

                                                $('#gross_amount').val(frieght_amount_total);


                                            });                           
                                        });

                                    </script>                                        
						<?php $c++; }}  ?>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">CGST
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="cgst" name="csgt_total" type="text" value="<?php echo $result[0]->csgt_total; ?>" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">SGST
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="sgst" name="ssgt_total" type="text" value="<?php echo $result[0]->ssgt_total; ?>" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">IGST
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="igst" name="isgt_total" type="text" value="<?php echo $result[0]->isgt_total; ?>" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Total Amount
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="total_total" name="total_amount" type="text" value="<?php echo $result[0]->total_amount; ?>" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Frieght Amount
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="frieght_amount" name="frieght_amount" type="text" value="<?php echo $result[0]->frieght_amount; ?>" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">GST on Freight (in %)
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="frieght_gst" name="frieght_gst" type="text" value="<?php echo $result[0]->frieght_gst; ?>" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Gross Amount
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="gross_amount" name="gross_amount" type="text" value="<?php echo $result[0]->gross_amount; ?>" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Bill No.
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="bill_no" name="bill_no" type="text" value="<?php echo $result[0]->bill_no; ?>" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Bill Date
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="bill_date" name="bill_date" type="date" value="<?php echo $result[0]->bill_date; ?>" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Bill Type
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <select name="bill_type" id="bill_type" class="form-control select_width">
                                        <option <?php echo ($result[0]->bill_type == 'purchase') ? 'selected' : ''; ?> value="purchase">Purchase</option>
                                        <option <?php echo ($result[0]->bill_type == 'asset') ? 'selected' : ''; ?> value="asset">Asset</option>
                                        <option <?php echo ($result[0]->bill_type == 'maintenance') ? 'selected' : ''; ?> value="maintenance">Maintenance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Invoice To
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <select name="invoice_to" id="invoice_to" class="form-control select_width">
                                        <?php
                                                foreach($office_details as $office_detail)
                                                { ?>
                                                    <option <?php echo ($result[0]->invoice_to == $office_detail->oid) ? 'selected' : ''; ?> value="<?php echo $office_detail->oid?>"><?php echo $office_detail->oname.' ('.$office_detail->oaddress.' )'; ?></option>
                                                    <?php }	?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Payment Days (After Bill Date)
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="payment_days" name="payment_days" type="text" value="60" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Remarks
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" value="<?php echo $result[0]->vbremarks; ?>" id="vbremarks" name="vbremarks" type="text" autocomplete="off" >
                                </div>
                            </div>
                        </div>
						
                            <div class="form-group">
                                <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" id="submit" class="btn btn-primary">Update</button>
                                    <a href="<?php echo base_url().$controller;?>" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        <?php  }
                        ?>
						<?php  echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
jQuery(document).ready(function(){
	$('body').on('click',".btn-danger",function()
	{
		var count= $('.pending-user').length; 
		var value=count-1;
		if(value>=1)
		{
			$(this).closest('.pending-user').fadeOut('fast', function(){$(this).	closest('.pending-user').remove();
			});
			$('.remove_unit').trigger('keyup');
		}
	});
 });
</script>

