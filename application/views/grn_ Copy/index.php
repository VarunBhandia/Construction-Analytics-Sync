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
                     <div id="show_form">
            <?php
echo form_open('grn_copy/select_by_id');
echo form_label('Select By ID : ');
$data = array(
                'name' => 'id',
                'placeholder' => 'Please Enter ID'
);

echo form_input($data);
echo "<div class='error_msg'>";

if (isset($id_error_message)) {
                echo $id_error_message;
}

echo "</div>";
echo form_submit('submit', 'Show Record');
echo form_close();
                      <li><a href="<?php echo base_url().$controller;?>/form"><button class="btn btn-primary">Add New GRN</button></a>
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
									  <td><a href="<?php echo base_url().$controller;?>/edit/<?php echo $test->grnid;?>" class="btn btn-success">Edit</a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url().$controller;?>/delete/<?php echo $test->grnid;?>" class="btn btn-danger">Delete</a></td>
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