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


