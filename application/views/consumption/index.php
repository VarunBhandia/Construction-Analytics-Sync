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
                      <li><a href="<?php echo base_url().$controller;?>/form"><button class="btn btn-primary">Add New Consumption</button></a>
                      </li>
                    </ul>
            <?php
echo form_open('select_tutorial/select_by_id');
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
echo form_open('select_tutorial/select_by_date_range');
echo form_label('Select By Range Of Dates : ');
echo "From : ";

$data = array(
'type' => 'date',
'name' => 'date_from',
'placeholder' => 'yyyy-mm-dd'
);
echo form_input($data);
echo " To : ";

$data = array(
'type' => 'date',
'name' => 'date_to',
'placeholder' => 'yyyy-mm-dd'
);
echo form_input($data);
echo "<div class='error_msg'>";
if (isset($date_range_error_message)) {
echo $date_range_error_message;
}
echo form_submit('submit', 'Show Record');
echo form_close();
?>
                <div class="message">
                    <?php
if (isset($result_display)) {
echo "<p><u>Result</u></p>";
if ($result_display == 'No record found !') {
echo $result_display;
} else {
echo "<table class='result_table'>";
echo '<tr><th>Employee ID</th><th>Employee Name</th><th>Joining Date</th><th>Address</th><th>Mobile</th><tr/>';
foreach ($result_display as $value) {
echo '<tr>' . '<td class="e_id">' . $value->emp_id . '</td>' . '<td>' . $value->emp_name . '</td>' . '<td class="j_date">' . $value->emp_date_of_join . '</td>' . '<td>' . $value->emp_address . '</td>' . '<td class="mob">' . $value->emp_mobile . '</td>' . '<tr/>';
}
echo '</table>';
}
}
?>

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
								  <th>Issue Date</th>
								  <th>Action</th>
								</tr>
						   </thead>
							<tbody>
								<?php
									$no = 1;
										foreach($row as $test) {?>
									<tr>
									  <td><?php echo $no;?></td>
									  <td><?php echo $test->sid;?></td>
									  <td><?php echo date("d-m-Y",strtotime($test->consissuedate));?></td>
									  <td><a href="<?php echo base_url().$controller;?>/edit/<?php echo $test->consid;?>" class="btn btn-success">Edit</a><a onclick="return confirm('Do You Really Delete?');" href="<?php echo base_url().$controller;?>/delete/<?php echo $test->consid;?>" class="btn btn-danger">Delete</a></td>
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