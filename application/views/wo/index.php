    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" />

            <title>Work Order(WO)</title>

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
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
				<div class="x_title">
                    <h1>Work Order List</h1>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="<?php echo base_url().$controller;?>/form"><button class="btn btn-primary">Add New</button></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                 </div>
				 <?php
					echo '<font style="font-size:16px;" color="red">'.$this->session->flashdata('add_message').'</font>';
				  ?>
			<div id="table-scroll" class="table-scroll">
			  <div class="table-wrap">
					<table id="datatable" class="main-table table table-striped table-bordered">
							<thead>
								<tr>
								  <th>No</th>
								  <th>Ref No.</th>
								  <th>Site Name	</th>
								  <th>Subcontractor Name</th>
								  <th>Workorder Date</th>
								  <th>Created On</th>
								  <th>Action</th>
								  <th>PDF</th>                                  
								</tr>
						   </thead>
							<tbody>
								<?php
									$no = 1;
										foreach($row as $test) {?>
									<tr>
									  <td><?php echo $no;?></td>
                                      <td><?php echo $test->worefid; ?></td>
                                      <td><?php foreach($sites as $site){
                                            if($site->sid == $test->sid ){echo $site->sname; }
                                                     } ?></td>									  
                                      <td><?php foreach($subcontdetails as $subcontdetail){
                                            if($subcontdetail->subid == $test->subid ){echo $subcontdetail->subname; }
                                                     } ?></td>
									  <td><?php echo date("d-m-Y",strtotime($test->wodate));?></td>
								      <td><?php echo $test->wocreatedon;?></td>
									  <td>
                                          <a href="<?php echo base_url().$controller;?>/edit/<?php echo $test->woid;?>" class="btn btn-success"><i class="glyphicon glyphicon-edit icon-white"></i></a>
                                          <a onClick="return confirm('Do You Really Delete?');" href="<?php echo base_url().$controller;?>/delete/<?php echo $test->woid;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i></a>
                                        </td>
										<td>                                      
                                          <a href="<?php echo base_url().$controller;?>/pdf_genrate/<?php echo $test->woid;?>">
                                           <i class="fa fa-file-pdf-o" style="    font-size: 35px;color: red;"></i>
                                          </a>
                                        </td>                                        
									  <?php $no++;?>
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
<?php
	$this->load->view('include/footer');
?>
<script>
	jQuery(document).ready(function() {
	jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');   
	});
</script>