<?php error_reporting(0); ?>
<table id="dataTable" class="table table-striped table-bordered" style="width:100%">
	<?php 
		if($tablename == 'cp_master')
		{
	?>	
	<thead>		
		<tr id="cp_master_header">
			<th>ID</th>
			<th>Date</th>
			<th>Reference ID</th>
			<th>Vendor</th>
			<th>Site</th>
			<th>Material</th>
			<th>Material Unit</th>
			<th>Quantity received</th>
			<th>Unit Price</th>
			<th>Total Amount</th>
			<th>Challan No</th>
			<th>Remarks</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$c=1;
			foreach($result as $key=>$val)
			{
				$total = floatval($val->cpqty) * floatval($val->cpunitprice);
				
				if($max != ''){
					if($total > $max){ continue; }
				}
				if($min != ''){
					if($total < $min){ continue; }
				}
		?>
				<tr>
					<td><?php echo $c; ?></td>
					<td><?php echo date('d-m-Y',strtotime($val->cppurchasedate)); ?></td>
					<td><?php echo $val->cprefid; ?></td>
					<td><?php echo $val->vname; ?></td>
					<td><?php echo $val->sname; ?></td>
					<td><?php echo $val->mname; ?></td>
					<td><?php echo $val->muname; ?></td>
					<td><?php echo $val->cpqty; ?></td>
					<td><?php echo $val->cpunitprice; ?></td>
					<td><?php echo $total; ?></td>
					<td><?php echo $val->cpchallan; ?></td>
					<td><?php echo $val->cpremark; ?></td>
				</tr>
		<?php
		$c++;
			}
		?>
	</tbody>
	<?php 
		}
		else if($tablename == 'po_master')
		{
	?>
		<thead>
			<tr>
				<th>ID</th>
				<th>Po Ref No.</th>
				<th>Vendor</th>
				<th>Site</th>
				<th>Material Name</th>
				<th>Material Description</th>
				<th>Material Unit</th>
				<th>CGST</th>
				<th>SGST</th>
				<th>ISGT</th>
				<th>Freight</th>
				<th>Freight	GST</th>
				<th>Discount</th>
				<th>Discount Type</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Total Amount</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$c=1;
			foreach($result as $key=>$val)
			{
				$qty_arr = explode(",",$val->qty);				
				$unit_arr = explode(",",$val->unit);
				$mid_arr = explode(",",$val->mid);
				$munit_arr = explode(",",$val->m_unit);
				$total_arr = explode(",",$val->total);
				$cgst = explode(",", $val->cgst);			
				$sgst = explode(",", $val->sgst);
				$igst = explode(",", $val->igst);
				$discount = explode(",", $val->discount);
				$unit_arr = explode(",", $val->unit);	
							
				
				for($t=0; $t<count($qty_arr); $t++)
				{
					if($max != ''){
					if($total_arr[$t] > $max){ continue; }
					}
					if($min != ''){
						if($total_arr[$t] < $min){ continue; }
					}
					$material_detail = $this->$model->select(array(),'materials',array('mid'=>$mid_arr[$t]),'');
					$mu_detail = $this->$model->select(array(),'munits',array('muid'=>$munit_arr[$t]),'');

					
				?>
				<tr>
					<td><?php echo $c; ?></td>
					<td><?php echo $val->porefid; ?></td>
					<td><?php echo $val->vname; ?></td>
					<td><?php echo $val->sname; ?></td>
					<td><?php echo $material_detail[0]->mname; ?></td>
					<td><?php echo $material_detail[0]->mdesc; ?></td>
					<td><?php echo $mu_detail[0]->muname; ?></td>
					<td><?php echo $cgst[$t]; ?></td>
					<td><?php echo $igst[$t]; ?></td>
					<td><?php echo $sgst[$t]; ?></td>
					<td><?php echo $freight_amount; ?></td>
					<td><?php echo $gst_freight_amount; ?></td>
					<td><?php echo $discount[$t]; ?></td>
					<td><?php echo $val->dtname; ?></td>				
					<td><?php echo $qty_arr[$t]; ?></td>
					<td><?php echo $unit_arr[$t]; ?></td>
					<td><?php echo $total_arr[$t]; ?></td>
				</tr>
		<?php
			$c++;
				}
			}
		?>
		</tbody>
	<?php
		}
		else if($tablename == 'mo_master') {
	?>
	<thead>
		<tr>
			<th>ID</th>
			<th>Date</th>
			<th>Reference ID</th>
			<th>Transferring Site</th>
			<th>Requesting Site</th>
			<th>Material Description</th>
			<th>Material Name</th>
			<th>Material Unit</th>
			<th>Quantity Received</th>
			<th>Transporter</th>
			<th>Vehicle No.</th>
			<th>Remarks</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$c=1;
			foreach($result as $key=>$val)
			{
				// $total = floatval($val->cpqty) * floatval($val->cpunitprice);
				
				// if($max != ''){
				// 	if($total > $max){ continue; }
				// }
				// if($min != ''){
				// 	if($total < $min){ continue; }
				// }
		?>
				<tr>
					<td><?php echo $c; ?></td>
					<td><?php echo date('d-m-Y',strtotime($val->modate)); ?></td>
					<td><?php echo $val->morefid; ?></td>
					<td><?php echo $val->TSID; ?></td>
					<td><?php echo $val->RSID; ?></td>
					<td><?php echo $val->mdesc; ?></td>
					<td><?php echo $val->mname; ?></td>
					<td><?php echo $val->muname; ?></td>
					<td><?php echo $val->moqty; ?></td>
					<td><?php echo $val->tname; ?></td>
					<td><?php echo $val->movehicle; ?></td>
					<td><?php echo $val->moremark; ?></td> 
				</tr>
		<?php
		$c++;
			}
		?>
	</tbody>
	<?php 
		}
		elseif ($tablename = 'grn_master') {
		?>
		<thead>
			<th>GRN</th>
			<th>PO Ref.No.</th>
			<th>Vendor</th>
			<th>Site</th>
			<th>Date of Receipt</th>
			<th>Last Updated On</th>
			<th>Material ID</th>
			<th>Material Description</th>
			<th>Material Name</th>
			<th>Material Unit</th>
			<th>Quantity Received</th>
			<th>Unit Price</th>
			<th>Total Amount</th>
			<th>Challan No.</th>
			<th>Transporter</th>
		</thead>
		<tbody>
			<?php
			$c=1;
			foreach($result as $key=>$val)
			{	
				$mid_arr = explode(",",$val->mid);	
				$qty_res = explode(",",$val->grnqty);
				
				for($a=0; $a<count($mid_arr); $a++)
				{
					$total = (($qty_res[$a] !="") ? (float)$qty_res[$a] : 0.00) *  (($val->grnunitprice !="") ? (float)$val->grnunitprice : 0.00);
					
					
		?>
				 <tr>
					<td><?php echo $c; ?></td>
					<td></td>
					<td><?php echo $val->vname; ?></td>
					<td><?php echo $val->sname; ?></td>
					<td><?php echo date('d-m-Y',strtotime($val->grnreceivedate)); ?></td>
					<td><?php echo date('d-m-Y',strtotime($val->grncreatedon)); ?></td>
					<td><?php echo $mid_arr[$a]; ?></td>
					<td><?php echo $val->mdesc; ?></td>
					<td><?php echo $val->mname; ?></td>
					<td><?php echo $val->muname; ?></td>
					<td><?php echo $qty_res[$a]; ?></td>
					<td><?php echo $val->grnunitprice; ?></td>
					<td><?php echo $total; ?></td>
					<td><?php echo $val->grnchallan; ?></td>
					<td><?php echo $val->tname; ?></td>
				
				</tr> 
		<?php
		$c++;
			}
		}
		?>
		</tbody>
	
	<?php	
		}
		else 
		{
		}
	?>
</table>
<script>
$(document).ready(function (){	
$("#dataTable").dataTable();
});
</script>
				