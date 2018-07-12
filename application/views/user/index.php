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
                    <h2>User List</h2>
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
								  <th>Username</th>
								  <th>Address</th>
								  <th>Mobile Number</th>
								  <th>Action</th>
								</tr>
						   </thead>
							<tbody>
								<?php
									$no = 1;
										foreach($row as $test) {?>
									<tr>
									  <td><?php echo $no;?></td>
									  <td><?php echo $test->username;?></td>
									  <td><?php echo $test->uaddress;?></td>
									  <td><?php echo $test->umobile;?></td>

									  <td><a href="<?php echo base_url().$controller;?>/edit/<?php echo $test->uid;?>" class="btn btn-success"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url().$controller;?>/delete/<?php echo $test->uid;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a></td>

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