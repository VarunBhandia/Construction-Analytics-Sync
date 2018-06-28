 <!-- footer content -->
        <footer>
          <div class="pull-right">
            Bootstrap - Codeigniter
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<!--
                       <script type="text/javascript">
      $('.form-control').select2({
        placeholder: '--- Select Sites ---',
        });
</script>
-->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>assets/js/bootstrap-progressbar.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url();?>assets/js/skycons.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url();?>assets/js/date.js"></script>
	
	<!--Data Table-->
	<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
		
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
	
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/js/custom.min.js"></script>
	
	<!-- Include Date Range Picker -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
	
	<!-- Copy Data -->
	<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
	
	<!-- Comman Js -->
	<script src="<?php echo base_url();?>assets/js/common.js"></script>
    
	<script>
    $(document).ready(function() {
    $('#example').DataTable();
	} );
</script>
<script>
	function delet()
	{
		if(confirm("Do You Really Delete Record"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
	
  </body>
</html>
