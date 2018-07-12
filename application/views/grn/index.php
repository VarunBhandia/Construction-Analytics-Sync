<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" />

        <title>GRN </title>

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
                                                <h1>Good Reciept Note</h1>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <form method="post" action="<?php echo base_url()?>grn/select_by_id">
                                                            <input type="text" name="sid" class="form=control" >
                                                            <input type="text" name="vid" class="form=control" >
                                                            <input type="submit" value="Show Record" class="btn btn-success" >
                                                        </form>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div align="right">
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                <li><a href="<?php echo base_url();?>grn/form"><button class="btn btn-primary">Add New GRN</button></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <?php
                                            echo '<font style="font-size:16px;" color="red">'.$this->session->flashdata('add_message').'</font>';
                                            ?>
                                            <div class="message">
                                                <?php
                                                if (isset($result_display))
                                                {

                                                    if ($result_display == 'No record found !')
                                                    {
                                                        echo '<h2>No record found !</h2>';
                                                    }
                                                    else
                                                    { ?>
                                                <form method="post" action="<?php echo base_url()?>grn/select_by_id_action">
                                                    <input type="hidden" value="<?php echo $sid; ?>" name="sid" >
                                                    <input type="hidden" value="<?php echo $vid; ?>" name="vid" >
                                                    <input type="submit" name="export" class="btn btn-success" value="Export" />
                                                </form>

                                                <div id="table-scroll" class="table-scroll">
                                                    <div class="table-wrap">
                                                        <table id="datatable-buttons" class="main-table table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>GRN Ref-id</th>
                                                                    <th>Site Name</th>
                                                                    <th>Vendor Name</th>
                                                                    <th>Challan Number</th>
                                                                    <th>Receive Date</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                     $no = 1;
                                                     foreach($result_display as $test) {?>
                                                                <tr>
                                                                    <td><?php echo $no;?></td>
                                                                    <td><?php echo $test->grnid;?></td>
                                                                    <td><?php echo $test->sid;?></td>
                                                                    <td><?php echo $test->vid;?></td>
                                                                    <td><?php echo date("d-m-Y",strtotime($test->grnreceivedate));?></td>
                                                                    <td><?php echo $test->grnreceivedate;?></td>
                                                                    <td><a href="<?php echo base_url()?>grn/edit/<?php echo $test->grnid;?>" class="btn btn-success"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url();?>grn/delete/<?php echo $test->grnid;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a></td>
                                                                    <?php $no++;?>
                                                                </tr>
                                                                <?php
                                                                                       }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>   <?php }
                                                }
                                                ?>

                                            </div>
                                            <?php
                                            $showtable = $this->uri->segment(2);
                                            if($showtable != 'select_by_id'){

                                            ?>
                                            <form method="post" action="<?php echo base_url()?>grn/action">
                                                <input type="submit" name="export" class="btn btn-success" value="Export" />
                                            </form>
                                            <div id="table-scroll" class="table-scroll">
                                                <div class="table-wrap">
                                                    <table id="datatable-buttons" class="main-table table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>GRN Ref-id</th>
                                                                <th>Site Name</th>
                                                                <th>Vendor Name</th>
                                                                <th>Challan Number</th>
                                                                <th>Receive Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                $no = 1;
                                                foreach($row as $test) {?>
                                                            <tr>
                                                                <td><?php echo $no;?></td>
                                                                <td><?php echo $test->grnid;?></td>
                                                                <td><?php echo $test->sid;?></td>
                                                                <td><?php echo $test->vid;?></td>
                                                                <td><?php echo date("d-m-Y",strtotime($test->grnreceivedate));?></td>
                                                                <td><?php echo $test->grnreceivedate;?></td>
                                                                <td><a href="<?php echo base_url()?>grn/edit/<?php echo $test->grnid;?>" class="btn btn-success"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url();?>grn/delete/<?php echo $test->grnid;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a></td>
                                                                <?php $no++;?>
                                                            </tr>
                                                            <?php
                                                                       }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> <?php } ?>
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