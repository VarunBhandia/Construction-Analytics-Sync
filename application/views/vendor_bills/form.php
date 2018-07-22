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

        <title>Vendor Bills</title>

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


                <!--Top Navigation-->
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
                                                    <h1>Vendor Bills</h1>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <?php 
                                                $user_sites = explode(",",$user_details[0]->site);
                                                $count_site =  count($user_sites);
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <form method="post" action="<?php echo base_url()?>Vendor_bills/select_by_site_vendor">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <select class="itemname form-control" id="sid" name="sid">
                                                                        <option value="">---site name----</option>
                                                                        <?php

    foreach($sites as $site)
    {                                                                   for($i=0;$i < $count_site;$i++){
        if($user_sites[$i] == $site->sid ){ ?>
                                                                        <option value="<?php echo $site->sid; ?>" >
                                                                            <?php echo $site->sname;?>
                                                                        </option>

                                                                        <?php  }

    }

    }	?>
                                                                    </select>

                                                                    <script type="text/javascript">
                                                                        $('#sid').select2({
                                                                            placeholder: '--- Select Sites ---',
                                                                        });
                                                                    </script>
                                                                </div>
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-4">
                                                                    <select class="itemname form-control" id="vid" name="vid">
                                                                        <option value="">---Vendor name----</option>
                                                                        <?php
                                                                        foreach($vendors as $vendor)
                                                                        {?>
                                                                        <option value="<?php echo $vendor->vid; ?>" >
                                                                            <?php echo $vendor->vname;?>
                                                                        </option>


                                                                        <?php }	?>
                                                                    </select>
                                                                    <script type="text/javascript">
                                                                        $('#vid').select2({
                                                                            placeholder: '--- Select Vendor ---',
                                                                        });
                                                                    </script>
                                                                </div>

                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-1">
                                                                    <input type="submit" value="Show Record" class="btn btn-success" >
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>                                                
                                                    <div class="x_content">
                                                        <br />        
                                                        <?php
                                                        if (isset($result_display))
                                                        {
                                                            echo "<p><u>Result</u></p>";
                                                            if ($result_display == 'No record found !')
                                                            {
                                                                echo 'Select Site and Vendor Both';
                                                            }
                                                            else
                                                            { ?>
                                                        <form enctype="multipart/form-data" action="<?php echo base_url().$controller.'/'.$action;?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                                            <?php echo '<font style="font-size:16px;" color="green">'.$this->session->flashdata('success_msg').'</font>' ?>

                                                            <div class="datatable-responsive">
                                                                <table id="datatable1" class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr class="headings">
                                                                            <th class="column-title">Material Name</th>
                                                                            <th class="column-title">Qty</th>
                                                                            <th class="column-title">  Unit Price</th>
                                                                            <th class="column-title"> Remarks</th>
                                                                            <th class="column-title no-link last">
                                                                                <span class="nobr">Action</span>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if($action == 'insert') 
                                                            {

                                                                $material = explode(",",$result_display[0]->mid);
                                                                $qty = explode(",",$result_display[0]->mrqty);
                                                                $unit = explode(",",$result_display[0]->mrunitprice);
                                                                $m_unit = explode(",",$result_display[0]->muid);
                                                                $remarks = explode(",",$result_display[0]->mrremarks); 
//                                                                echo '<pre>';
//                                                                print_r(count($material));
//                                                                echo '</pre>';
                                                                for($i=0; $i<count($material); $i++){

                                                                        ?>

                                                                        <tr class="pending-user">
                                                                            <td>
                                                                                <select class="form-control select_width" id="material_0" name="material[]">
                                                                                    <option value=""></option>
                                                                                    <?php
                                                                foreach($materials as $value)
                                                                { ?>
                                                                                    <option <?php if($action == 'insert'){  echo ((int)$value->mid == (int)$material[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->mid?>"><?php echo $value->mname; 
                                                                 foreach($units as $m_unit){
                                                                     if($value->munit == $m_unit->muid){
                                                                         echo '('.$m_unit->muname.')' ;
                                                                     }
                                                                 }
                                                                                        ?></option>
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
                                                                                <input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off">
                                                                            </td>
                                                                            <td><a class="btn btn-sm btn-success" id="plus">+</a>
                                                                                <a class="btn btn-sm btn-danger" id="minus">-</a>
                                                                            </td>
                                                                        </tr>
                                                                        <script type="text/javascript">
                                                                            $('.select_width').select2({
                                                                                placeholder: '--- Select Material ---',
                                                                            });
                                                                        </script>
                                                                        <?php 
                                                          }  } 
                                                             else 
                                                             { ?>
                                                                        <input type="hidden" name="mrid" value="<?php echo $row[0]->mrid; ?>"/>
                                                                        <?php 

                                                              $material = explode(",",$result_display[0]->mid);
                                                              $qty = explode(",",$result_display[0]->mrqty);
                                                              $unit = explode(",",$result_display[0]->mrunitprice);
                                                              $m_unit = explode(",",$result_display[0]->muid);
                                                              $remarks = explode(",",$result_display[0]->mrremarks);  
                                                              for($i=0; $i<count($material); $i++)
                                                              {
                                                                        ?>
                                                                        <tr class="pending-user">
                                                                            <td>
                                                                                <select class="materialname form-control select_width" id="material_0" name="material[]">
                                                                                    <option value=""></option>
                                                                                    <?php
                                                                  foreach($materials as $value)
                                                                  { echo $material[$i]; ?>
                                                                                    <option <?php if($action == 'update'){  echo ((int)$value->mid == (int)$material[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->mid?>"><?php echo $value->mname; 
                                                                   foreach($units as $m_unit){
                                                                       if($value->munit == $m_unit->muid){
                                                                           echo '('.$m_unit->muname.')' ;
                                                                       }
                                                                   }
                                                                                        ?></option>
                                                                                    <?php }	?>
                                                                                </select>
                                                                                <script type="text/javascript">
                                                                                    $('.materialname').select2({
                                                                                        placeholder: '--- Select Material ---',
                                                                                    });
                                                                                </script> 
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="qty_0" name="qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $unit[$i]; ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off" value="<?php echo $remarks[$i]; ?>">
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
                                                        <?php }
                                                        }
                                                        ?>


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
                                                    <option value="<?php echo $value->mid?>"><?php echo $value->mname; 
 foreach($units as $m_unit){
     if($value->munit == $m_unit->muid){
         echo '('.$m_unit->muname.')' ;
     }
 }
                                                        ?></option>
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
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off">
                                    </td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
                                    </td>
                                    </tr>   
                                </script>

                                <script>

                                    $(document).ready(function() {
                                        $('#datatable').DataTable();
                                    } );
                                </script>