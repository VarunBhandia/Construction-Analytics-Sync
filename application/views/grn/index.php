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
              
              <div id="show_form">
          
            <?php
echo form_open('grn/select_by_id');
echo form_label('Select By ID : ');
$data = array(
    'name' => 'grnid',
    'placeholder' => 'Please Enter ID'
);

echo form_input($data);
echo "<div class='error_msg'>";

if (isset($id_error_message))
{
    echo $id_error_message;
}

echo "</div>";
echo form_submit('submit', 'Show Record');
echo form_close();
                  ?>
              </div>
              </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  
					<li><a href="<?php echo base_url().$this->controller;?>">Construction</a></li>
				  </ul>
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
                    <h2>Construction</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="<?php echo base_url();?>grn/form"><button class="btn btn-primary">Add New GRN</button></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
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
    { ?>
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
									  <td><a href="<?php echo base_url()?>grn/edit/<?php echo $test->grnid;?>" class="btn btn-success">Edit</a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url();?>grn/delete/<?php echo $test->grnid;?>" class="btn btn-danger">Delete</a></td>
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
									  <td><a href="<?php echo base_url()?>grn/edit/<?php echo $test->grnid;?>" class="btn btn-success">Edit</a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url();?>grn/delete/<?php echo $test->grnid;?>" class="btn btn-danger">Delete</a></td>
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