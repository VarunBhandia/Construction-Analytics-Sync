<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" />

            <title>Cash Purchase(CP)</title>

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

                <!--top navigation-->        
                <body class="nav-md">
                    <div class="container body">
                        <div class="main_container">

                            <!-- page content -->
                            <div class="right_col" role="main">          
                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h1>Cash Purchase</h1>
                                                <?php 
                                                $user_sites = explode(",",$user_details[0]->site);
                                                $count_site =  count($user_sites);
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <form method="post" action="<?php echo base_url()?>cp/select_by_id">
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
                                                    <div class="col-md-3">
                                                        <div align="right">
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                <li><a href="<?php echo base_url()?>cp/form"><button class="btn btn-primary">Add New CP</button></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div> 
                                <div  class="row">
                                                    <div class="col-md-8">                                                
                                                        <form enctype="multipart/form-data" action="<?php echo base_url()?>cp/select_by_date_range" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                                            <label class="control-label col-md-2 col-sm-3 col-xs-12"> Date From
                                                            </label>
                                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                                <input type="date" class="form-control" name="date_from" >
                                                            </div>
                                                            <label class="control-label col-md-2 col-sm-3 col-xs-12"> Date To
                                                            </label>
                                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                                <input type="date" class="form-control col-md-2 col-sm-3 col-xs-12" name="date_to" >
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-1">
                                                                <input type="submit" value="Show Record" class="btn btn-success" >
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php
    echo '<font style="font-size:16px;" color="red">'.$this->session->flashdata('add_message').'</font>';
                                            ?>

                                            <div class="message">
                                                <?php
                                                if (isset($result_display))
                                                {
                                                    echo "<p><u>Result</u></p>";
                                                    if ($result_display == 'No record found !')
                                                    {
                                                        echo $result_display;
                                                    }
                                                    else
                                                    { ?>	<form method="post" action="<?php echo base_url()?>cp/select_by_id_action">
                                                <input type="hidden" value="<?php echo $sid; ?>" name="sid" >
                                                <input type="hidden" value="<?php echo $vid; ?>" name="vid" >
                                                <input type="submit" name="export" class="btn btn-success" value="Export" />

                                                </form>  

                                                <div id="table-scroll" class="table-scroll">
                                                    <div align="right">
                                                        <div class="table-wrap">
                                                            <table id="datatable" class="main-table table table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>CP Ref-id</th>
                                                                        <th>Site Name</th>
                                                                        <th>Vendor Name</th>
                                                                        <th>Purchase Date</th>
                                                                        <th>Created On</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                     $no = 1;
                                                     foreach($result_display as $test) {?>
                                                                    <tr>
                                                                        <td><?php echo $no;?></td>
                                                                        <td><?php echo $test->cprefid;?></td>
                                                                        <td><?php foreach($sites as $site){
                                                         if($site->sid == $test->sid ){echo $site->sname; }

                                                     } ?></td>                                                                        <td><?php foreach($vendors as $vendor){
                                                         if($vendor->vid == $test->vid ){echo $vendor->vname; }

                                                     } ?></td>                                                                                           <td><?php echo date("d-m-Y",strtotime($test->cppurchasedate));?></td>
                                                                        <td><?php echo $test->cpcreatedon;?></td>
                                                                        <td><a href="<?php echo base_url()?>cp/edit/<?php echo $test->cpid;?>" class="btn btn-success"><i class="glyphicon glyphicon-edit icon-white"></i></a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url()?>cp/delete/<?php echo $test->cpid;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i></a></td>
                                                                        <?php $no++;?>
                                                                    </tr>
                                                                    <?php
                                                                                       }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                    <?php }
                                                }
                                                    ?>
                                            <?php
    echo '<font style="font-size:16px;" color="red">'.$this->session->flashdata('add_message').'</font>';
                                                ?>
                                                <div class="message">
                                                    <?php
                                                    if (isset($result_display_date))
                                                    {
                                                        echo "<p><u>Result</u></p>";
                                                        if ($result_display_date == 'No record found !')
                                                        {
                                                            echo $result_display_date;
                                                        }
                                                        else
                                                        { ?>
                                                    <form method="post" action="<?php echo base_url()?>cp/select_by_date_range_action">
                                                        <input type="hidden" value="<?php echo $date1; ?>" name="date_from">
                                                        <input type="hidden" value="<?php echo $date2; ?>" name="date_to">
                                                        <input type="submit" name="export" class="btn btn-success" value="Export" />

                                                    </form>		    
                                                    <div id="table-scroll" class="table-scroll">
                                                        <div class="table-wrap">
                                                              <table id="datatable" class="main-table table table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>CP Ref-id</th>
                                                                        <th>Site Name</th>
                                                                        <th>Vendor Name</th>
                                                                        <th>Purchase Date</th>
                                                                        <th>Created On</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                     $no = 1;
                                                     foreach($result_display_date as $test) {?>
                                                                    <tr>
                                                                        <td><?php echo $no;?></td>
                                                                        <td><?php echo $test->cprefid;?></td>
                                                                        <td><?php foreach($sites as $site){
                                                         if($site->sid == $test->sid ){echo $site->sname; }

                                                     } ?></td>                                                                        <td><?php foreach($vendors as $vendor){
                                                         if($vendor->vid == $test->vid ){echo $vendor->vname; }

                                                     } ?></td>                                                                                           <td><?php echo date("d-m-Y",strtotime($test->cppurchasedate));?></td>
                                                                        <td><?php echo $test->cpcreatedon;?></td>
                                                                        <td><a href="<?php echo base_url()?>cp/edit/<?php echo $test->cpid;?>" class="btn btn-success"><i class="glyphicon glyphicon-edit icon-white"></i></a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url()?>cp/delete/<?php echo $test->cpid;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i></a></td>
                                                                        <?php $no++;?>
                                                                    </tr>
                                                                    <?php
                                                                                       }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <?php }
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                                $showtable = $this->uri->segment(2);
                                                if($showtable == ''){

                                                ?>
                                                <form method="post" action="<?php echo base_url()?>cp/action">
                                                    <input type="submit" name="export" class="btn btn-success" value="Export" />
                                                </form>

                                                <div id="table-scroll" class="table-scroll">
                                                    <div align="right">
                                                        <div class="table-wrap">
                                                            <table id="datatable" class="main-table table table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>CP Ref-id</th>
                                                                        <th>Site Name</th>
                                                                        <th>Vendor Name</th>
                                                                        <th>Purchase Date</th>
                                                                        <th>Created On</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                    $no = 1;
                                                    foreach($row as $test) {
                                                        for($i=0;$i < $count_site;$i++){
                                                            if($user_sites[$i] == $test->sid ){
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $no;?></td>
                                                                        <td><?php echo $test->cprefid;?></td>
                                                                        <td><?php foreach($sites as $site){
                                                         if($site->sid == $test->sid ){echo $site->sname; }

                                                     } ?></td>                                                                                           <td><?php foreach($vendors as $vendor){
                                                         if($vendor->vid == $test->vid ){echo $vendor->vname; }

                                                     } ?></td>
                                                                        <td><?php echo date("d-m-Y",strtotime($test->cppurchasedate));?></td>
                                                                        <td><?php echo $test->cpcreatedon;?></td>
                                                                        <td><a href="<?php echo base_url()?>cp/edit/<?php echo $test->cpid;?>" class="btn btn-success"><i class="glyphicon glyphicon-edit icon-white"></i></a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url()?>cp/delete/<?php echo $test->cpid;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i></a></td>
                                                                        <?php $no++;?>
                                                                    </tr>
                                                                    <?php
                                                            }
                                                        }}
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div> 
                                                </div><?php } ?>           

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </body>
                <?php
                                                        $this->load->view('include/footer');
                ?>
                <script>
                    jQuery(document).ready(function() {
                        jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');   
                    });
                </script>
