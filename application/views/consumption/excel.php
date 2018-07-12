<?php
	error_reporting(0);
	$this->load->view('include/header');
?>
<link href="<?php echo base_url();?>assets/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	<!-- page content -->
        <div class="right_col" role="main">          
          <div class="row">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Construction</h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <br />
                    <form enctype="multipart/form-data" action="<?php echo base_url().$controller.'/excel';?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo $this->session->flashdata('add_message'); ?>
					
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Excel File
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <input type="file" id="excel" name="excel" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" id="submit1" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
				  <?php	if($Count > 0) {	?>
				  <div class="col-md-12 col-sm-6 col-xs-12">
					<h4>Number Of Row : <?php echo $Count;?></h4>
				  </div>
				  <?php	}	?>
				  <div class="datatable-responsive">
					<table id="datatable1" class="table table-striped table-bordered">
						<thead>
							<th>sid</th>
							<th>conscreatedon</th>
							<th>mid</th>
							<th>consqty</th>
							<th>consunitprice</th>
							<th>muid</th>
							<th>consremark</th>
						</thead>

                    <tbody>

                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
        <!-- /page content -->
<?php
	$this->load->view('include/footer');
?>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/additional-methods.min.js"></script>
<script>
$(document).ready(function (){	
	$('#demo-form2').validate({
		rules:{
			excel: { 
				required: true,
				extension: "xlsx"
			},
		},
		messages: {
			excel: { 
				required: "Please Select Excel Sheet",
				extension: "File Only .xlsx Allowed"
			},						
		},
	submitHandler: function(form) {
		$(':input[type="submit1"]').prop('disabled', true);
		form.submit();
	}
});
}); 
</script>
<script>

    jQuery(document).ready(function(){
      $('#datatable1').DataTable({
        "processing": true,
        "serverSide": true,
		"searching": false,
        "ajax":{
            "url": "<?php echo base_url().$controller."/server_data" ?>",
            "dataType": "json",
            "type": "POST",
            },
        "columns": [
          { "data": "sid",},
          { "data": "conscreatedon",},
          { "data": "mid"},
          { "data": "consqty"},
          { "data": "consunitprice"},
          { "data": "muid"},
          { "data": "consremark"},
        ],
		"columnDefs": [ {
			"targets": [2,3,4,5,6,7],
			"orderable": false
		} ],
      });
    });
</script>
<script>
$(document).ready(function() {
    $('#datatable1').DataTable();
} );
</script>