<?php
	$this->load->view('/include/header');
?>
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
					<table id="datatable-buttons" class="main-table table table-striped table-bordered">
							<thead>
								<tr>
								  <th>No</th>
								  <th>Site</th>
								  <th>Vendor</th>
								  <th>Challan</th>
								  <th>Receive Date</th>
								  <th>Action</th>
								  <!--
								  <th>Material</th>
								  <th>Qty</th>
								  <th>Unit Price</th>
								  <th>Material Unit</th>
								  <th>Trunk No</th>
								  <th>Challan No</th>
								  <th>Material Unit</th>
								  <th>Transporter</th>
								  <th>Remarks</th>-->
								</tr>
						   </thead>
							<tbody>
								<?php
									$no = 1;
										foreach($row as $test) {?>
									<tr>
									  <td><?php echo $no;?></td>
									  <td><?php echo $test->site;?></td>
									  <td><?php echo $test->vendor;?></td>
									  <td><?php echo $test->challan;?></td>
									  <td><?php echo date("d-m-Y",strtotime($test->receive_date));?></td>
									  <td><a href="<?php echo base_url().$controller;?>/edit/<?php echo $test->id;?>" class="btn btn-success">Edit</a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url().$controller;?>/delete/<?php echo $test->id;?>" class="btn btn-danger">Delete</a></td>
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