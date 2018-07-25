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
                                        <td><?php echo 'test'; ?></td>
									  <td><?php echo $test->sid;?></td>
									  <td><?php echo $test->subid;?></td>
									  <td><?php echo date("d-m-Y",strtotime($test->wocreatedon));?></td>
									  <td><?php echo date("d-m-Y",strtotime($test->wodate));?></td>
									  <td>
                                          <a href="<?php echo base_url().$controller;?>/edit/<?php echo $test->woid;?>" class="btn btn-success"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
                                          <a onClick="return confirm('Do You Really Delete?');" href="<?php echo base_url().$controller;?>/delete/<?php echo $test->woid;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
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