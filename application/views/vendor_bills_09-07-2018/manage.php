<?php
error_reporting(0);
$this->load->view('include/header');
?>
<style>
	.select2{
		width:100%;
	}
</style>

<div class="right_col" role="main">
<div class="">
	<div class="page-title">
	<div class="title_left">
	</div>
	</div>

<?php echo $this->session->flashdata('dispMessage');?>

	<div class="clearfix"></div>

	<div class="row">
		<a  style="float:right"class="btn btn-primary" href="<?php echo base_url().$controller."/add/" ?>">New</a>
	</div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Vendor Bill Details</h2>
					<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>

					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
					</ul>
					<div class="clearfix"></div>
				</div>
			<div class="x_content">
				<table id="datatable"  class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Sr. No. </th>
							<th>Site</th>
							<th>Vendor Name</th>
							<th>Bill No</th>
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
						<td><?php echo $val->gross_amount; ?></td>
						<td>
							<a class="btn btn-warning btn-sm" href="<?php echo base_url().$controller."/edit/".$val->id."" ?>"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>
							
							<a class="btn btn-danger btn-sm" href="<?php echo base_url().$controller."/delete/".$val->id."" ?>"onclick="return confirm('Are You Sure To Delete This Record?')"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>
							
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
 });
</script>

