<?php
error_reporting(0);
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<style type="text/css">
@media (min-width: 768px){
.modal-dialog {
    width: 75%!important;
    margin: 30px auto!important;
 }
}
.modal-body{overflow:scroll;}
</style>
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
               
                <!-- /top navigation -->
<!--
                <style>
                    .select2{
                        width:100%;
                    }
                </style>
-->

                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                            </div>
                        </div>

                        <?php echo $this->session->flashdata('dispMessage');?>

                        <div class="clearfix"></div>

                        <div class="row">
                            <a  style="float:right"class="btn btn-primary" href="<?php echo base_url().$controller."/add/" ?>">New Bill</a>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h1>
                                          Vendor Bill Details
		                                    <form method="post" action="<?php echo  base_url().$controller."/action/";?>">
        	                                    <input type="submit" name="export" class="btn btn-success" value="Export">
                                            </form>                                        
                                        </h1>

<!--
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>

                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
-->
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                    
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                                    
                                    
                                    
                                        <table id="datatable"  class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No. </th>
                                                    <th>Site</th>
                                                    <th>Vendor Name</th>
                                                    <th>Bill No</th>
                                                    <th>Bill Date</th>
                                                    <th>Gross Amount</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
    foreach($result as $key=>$val)
    {
                                                ?>
                                                <tr>
                                                    <td><?php echo $key+1; ?></td>
                                                    <td><?php echo $val->sname; ?></td>
                                                    <td><?php echo $val->vname; ?></td>
                                                    <td><?php echo $val->bill_no; ?></td>
                                                    <td><?php echo $val->bill_date; ?></td>
                                                    <td><?php echo $val->gross_amount; ?></td>
                                                    <td>
                                                    
                                                    <a class="btn btn-warning btn-sm modal_show" data-toggle="modal" data-target="#myModal" bill_id="<?php echo $val->id;?>">
                                                         <i class="glyphicon glyphicon-list-alt icon-white"></i>
                                                        </a>
                                                    

                                                        <a class="btn btn-warning btn-sm" href="<?php echo base_url().$controller."/edit/".$val->id."" ?>"><i class="glyphicon glyphicon-edit icon-white"></i> </a>

                                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url().$controller."/delete/".$val->id."" ?>"onclick="return confirm('Are You Sure To Delete This Record?')"><i class="glyphicon glyphicon-trash icon-white"></i> </a>

                                                        <?php 
                                                    if($val->u_status == 'Disapprove')
                                                    {
                                                        ?>
                                                        <a class="btn btn-warning btn-sm" href="<?php echo base_url().$controller."/Status/".$val->id."/1" ?>"><i class="glyphicon glyphicon-ok icon-white"></i> Approve</a>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <a class="btn btn-warning btn-sm" href="<?php echo base_url().$controller."/Status/".$val->id."/0" ?>"><i class="glyphicon glyphicon-remove icon-white"></i> Disapprove</a>
                                                        <?php
                                                    }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
    }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
                    </body>
                </div>
            </div>
        </body>
</html>
                <?php $this->load->view('include/footer');?>
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

					$('body').on('click','.modal_show', function() {
    				    var bill_id = $(this).attr('bill_id');
						$.ajax({
						
							type:"POST",
							url:"<?php echo base_url()."Vendor_bills/Bill_details/"?>",
							data:{id:bill_id},
							success:function (res)
							{
								//alert(res)
								 $('.modal-body').html(res);
							}
						});
					});
						

                    
		});

					
					
					
					
                </script>