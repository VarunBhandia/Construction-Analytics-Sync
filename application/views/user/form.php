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

        <title>New User</title>

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

                <!--    Top navigation-->
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
                                                    <h1>Create New User
                                                    </h1>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <br />
                                                    <form enctype="multipart/form-data" action="<?php echo base_url().$controller.'/'.$action;?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                                        <?php echo '<font style="font-size:16px;" color="green">'.$this->session->flashdata('success_msg').'</font>' ?>
                                                        <div class="form-group">
                                                            <h2>Personal Details</h2>
                                                            <div class="row">
                                                                <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Username
                                                                </label>
                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                    <input type="text" id="uname" name="uname" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->username : '';?>" autocomplete="off" required>
                                                                </div>
                                                                <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Password
                                                                </label>
                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                    <input type="Password" id="password" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->password : '';?>" autocomplete="off" required>
                                                                </div>
                                                                <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Email
                                                                </label>
                                                                <div class="col-md-2 col-sm-6 col-xs-12">
                                                                    <input type="Email" id="uemail" name="uemail" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->uemail : '';?>" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Address
                                                                </label>
                                                                <div class="col-md-7 col-sm-6 col-xs-12">
                                                                    <input type="text" id="uaddress" name="uaddress" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->uaddress : '';?>" autocomplete="off">
                                                                </div>
                                                                <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Mobile Number
                                                                </label>
                                                                <div class="col-md-2 col-sm-6 col-xs-12">
                                                                    <input type="text" id="umobile" name="umobile" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->umobile : '';?>" autocomplete="off" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                        </div>
                                                        <h2> Roles</h2>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Users
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="user" value="0" <?php if($action=='update' ){ echo ($row[0]->user_role == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="user" value="1" <?php if($action=='update' ){ echo ($row[0]->user_role == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="user" value="2" <?php if($action=='update' ){ echo ($row[0]->user_role == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Site
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="site_role" value="0" <?php if($action=='update' ){ echo ($row[0]->site_role == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="site_role" value="1" <?php if($action=='update' ){ echo ($row[0]->site_role == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="site_role" value="2" <?php if($action=='update' ){ echo ($row[0]->site_role == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Material
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="material" value="0" <?php if($action=='update' ){ echo ($row[0]->material == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="material" value="1" <?php if($action=='update' ){ echo ($row[0]->material == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="material" value="2" <?php if($action=='update' ){ echo ($row[0]->material == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Vendor
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="vendor" value="0" <?php if($action=='update' ){ echo ($row[0]->vendor == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="vendor" value="1" <?php if($action=='update' ){ echo ($row[0]->vendor == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="vendor" value="2" <?php if($action=='update' ){ echo ($row[0]->vendor == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Material Request
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="mr" value="0" <?php if($action=='update' ){ echo ($row[0]->mr == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="mr" value="1" <?php if($action=='update' ){ echo ($row[0]->mr == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="mr" value="2" <?php if($action=='update' ){ echo ($row[0]->mr == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Purchase Order
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="po" value="0" <?php if($action=='update' ){ echo ($row[0]->po == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="po" value="1" <?php if($action=='update' ){ echo ($row[0]->po == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="po" value="2" <?php if($action=='update' ){ echo ($row[0]->po == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Return to Vendor
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="rtv" value="0" <?php if($action=='update' ){ echo ($row[0]->rtv == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="rtv" value="1" <?php if($action=='update' ){ echo ($row[0]->rtv == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="rtv" value="2" <?php if($action=='update' ){ echo ($row[0]->rtv == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">cash Purchase
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="cp" value="0" <?php if($action=='update' ){ echo ($row[0]->cp == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="cp" value="1" <?php if($action=='update' ){ echo ($row[0]->cp == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="cp" value="2" <?php if($action=='update' ){ echo ($row[0]->cp == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name"> Good Received
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="uogrn" value="0" <?php if($action=='update' ){ echo ($row[0]->uogrn == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="uogrn" value="1" <?php if($action=='update' ){ echo ($row[0]->uogrn == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="uogrn" value="2" <?php if($action=='update' ){ echo ($row[0]->uogrn == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Vendor Bills
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="vendorbills" value="0" <?php if($action=='update' ){ echo ($row[0]->vendorbills == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="vendorbills" value="1" <?php if($action=='update' ){ echo ($row[0]->vendorbills == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="vendorbills" value="2" <?php if($action=='update' ){ echo ($row[0]->vendorbills == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Vendor Bill Payment
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="vendorbillpayment" value="0" <?php if($action=='update' ){ echo ($row[0]->vendorbillpayment == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="vendorbillpayment" value="1" <?php if($action=='update' ){ echo ($row[0]->vendorbillpayment == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="vendorbillpayment" value="2" <?php if($action=='update' ){ echo ($row[0]->vendorbillpayment == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Move Order
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="moveorder" value="0" <?php if($action=='update' ){ echo ($row[0]->moveorder == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="moveorder" value="1" <?php if($action=='update' ){ echo ($row[0]->moveorder == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="moveorder" value="2" <?php if($action=='update' ){ echo ($row[0]->moveorder == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Office GST Details
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="officegstdetails" value="0" <?php if($action=='update' ){ echo ($row[0]->officegstdetails == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="officegstdetails" value="1" <?php if($action=='update' ){ echo ($row[0]->officegstdetails == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="officegstdetails" value="2" <?php if($action=='update' ){ echo ($row[0]->officegstdetails == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Subcontractor
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="subcontractor" value="0" <?php if($action=='update' ){ echo ($row[0]->subcontractor == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="subcontractor" value="1" <?php if($action=='update' ){ echo ($row[0]->subcontractor == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="subcontractor" value="2" <?php if($action=='update' ){ echo ($row[0]->subcontractor == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Transporter
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="transporter" value="0" <?php if($action=='update' ){ echo ($row[0]->transporter == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="transporter" value="1" <?php if($action=='update' ){ echo ($row[0]->transporter == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="transporter" value="2" <?php if($action=='update' ){ echo ($row[0]->transporter == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Workorder
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="workorder" value="0" <?php if($action=='update' ){ echo ($row[0]->workorder == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="workorder" value="1" <?php if($action=='update' ){ echo ($row[0]->workorder == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="workorder" value="2" <?php if($action=='update' ){ echo ($row[0]->workorder == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Reporting
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="reporting" value="0" <?php if($action=='update' ){ echo ($row[0]->reporting == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="reporting" value="1" <?php if($action=='update' ){ echo ($row[0]->reporting == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="reporting" value="2" <?php if($action=='update' ){ echo ($row[0]->reporting == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Work Order Materials
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="workordermaterials" value="0" <?php if($action=='update' ){ echo ($row[0]->workordermaterials == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="workordermaterials" value="1" <?php if($action=='update' ){ echo ($row[0]->workordermaterials == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="workordermaterials" value="2" <?php if($action=='update' ){ echo ($row[0]->workordermaterials == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-1 col-sm-6 col-xs-12" for="name">Consumption
                                                            </label>
                                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                                <input type="radio" name="consumption" value="0" <?php if($action=='update' ){ echo ($row[0]->consumption == 0) ? 'checked' : '' ; }?>>No
                                                                <input type="radio" name="consumption" value="1" <?php if($action=='update' ){ echo ($row[0]->consumption == "1") ? 'checked' : '' ; }?>>Read Only
                                                                <input type="radio" name="consumption" value="2" <?php if($action=='update' ){ echo ($row[0]->consumption == "2") ? 'checked' : '' ; }?>>Add-Edit
                                                            </div>
                                                        </div>

                                                        <?php 					
                                                        $user_sites = explode(",",$row[0]->site);
                                                        ?>
                                                        <h2> Assign Sites</h2>

                                                        <script language="JavaScript">
                                                            function selectAll(source) {
                                                                checkboxes = document.getElementsByName('site[]');
                                                                for (var i in checkboxes)
                                                                    checkboxes[i].checked = source.checked;
                                                            }
                                                        </script>

                                                        <div class="form-group">
                                                            <div class="col-md-2 col-sm-6 col-xs-12">
                                                                <input type="checkbox" id="selectall" onClick="selectAll(this)" />Select All<br>
                                                            </div>
                                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                                <?php
                                                                $count_site =  count($user_sites);

                                                                foreach($sites as $site)
                                                                { 

                                                                ?>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox" class="" name="site[]" value="<?php echo $site->sid; ?>" <?php if($action=='update' ){ for($x=0 ; $x <=$count_site + 1 ; $x++){echo $user_sites[$x]==$site->sid ? 'checked' : '' ;} ;}?>>
                                                                    <?php echo '('.$site->sid.') '.$site->sname;
                                                                    ?>
                                                                </div>
                                                                <?php }	?>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="uid" value="<?php echo $row[0]->uid; ?>" />

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

                                    $("body").on("click", ".btn-success", function(e) {
                                        e.preventDefault();
                                        var tplData = {
                                            i: counter
                                        };
                                        $(this).closest("tr").after(tpl(tplData));
                                        counter += 1;
                                        var row_index = counter - 1;
                                        return false;
                                    });
                                    $('body').on('click', ".btn-danger", function() {
                                        var count = $('.pending-user').length;
                                        var value = count - 1;
                                        if (value >= 1) {
                                            $(this).closest('.pending-user').fadeOut('fast', function() {
                                                $(this).closest('.pending-user').remove();

                                            });
                                            return false;
                                        }
                                    });
                                });
                            </script>
                            <script>
                                $(document).ready(function() {
                                    var dp = $("#date").datepicker({
                                        format: 'dd-mm-yyyy',
                                        todayHighlight: true,
                                        autoclose: true,
                                    });
                                });
                            </script>
                            <script>
                                $(document).ready(function() {
                                    $('#demo-form2').validate({
                                        rules: {
                                            site: {
                                                required: true
                                            },
                                        },
                                        messages: {
                                            site: {
                                                required: "Please Enter Site"
                                            },
                                        },
                                        submitHandler: function(form) {
                                            $(':input[type="submit"]').prop('disabled', true);
                                            form.submit();
                                        }
                                    });
                                });
                            </script>