<?php $uid = $this->session->userdata('username'); ?>
<?php
error_reporting(0);
	$this->load->view('include/header');
	
	if($action == 'insert')
	{
		$btn = 'Save';
	}
	elseif($action == 'update')
	{
		$btn = 'Update';
	}
?>
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
                    <form enctype="multipart/form-data" action="<?php echo base_url().$controller.'/'.$action;?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
					<?php echo '<font style="font-size:16px;" color="green">'.$this->session->flashdata('success_msg').'</font>' ?>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Site
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                           <select class="sitename form-control" id="site" name="site">
								<option value="">---site name----</option>
								<?php
								foreach($sites as $site)
								{ ?>
									<option <?php if($action == 'update'){  echo $site->sid == $row[0]->sid ? 'selected' : '' ; }?> value="<?php echo $site->sid?>"><?php echo $site->sname;?></option>
								<?php }	?>
							</select>
                       <script type="text/javascript">
      $('.sitename').select2({
        placeholder: '--- Select Sitename ---',
        });
</script>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Subcontractor
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                           <select class="subcont form-control" id="subcontdetail" name="subcontdetail">
								<option value="">---Subcontractor name----</option>
								<?php
								foreach($subcontdetails as $subcontdetail)
								{ ?>
									<option <?php if($action == 'update'){  echo $subcontdetail->subid == $row[0]->subid ? 'selected' : '' ; }?> value="<?php echo $subcontdetail->subid?>"><?php echo $subcontdetail->subname;?></option>
								<?php }	?>
							</select>
                        <script type="text/javascript">
      $('.subcont').select2({
        placeholder: '--- Select Subcont ---',
        });
</script>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Work Order Date
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                          <input class="form-control" id="date" name="date" type="text" value="<?php echo ($action == 'update') ? date("d-m-Y",strtotime($row[0]->wodate)) :  date("d-m-Y"); ?>" autocomplete="off">
						</div>
                      </div>
	<div class="table-responsive">
        
		<table id="datatable1" table class="table table-striped jambo_table" style="width:100%;">
				<thead>
					<tr class="headings">
					<th class="column-title">Work Items</th>	
					<th class="column-title">Unit</th>	
					<th class="column-title">Quantity</th>
					<th class="column-title">Unit Price</th>
					<th class="column-title">Discount Type</th>
					<th class="column-title">Discount </th>
					<th class="column-title">CGST </th>
					<th class="column-title">SGST </th>
					<th class="column-title">IGST </th>
					<th class="column-title">Total </th>
					<th class="column-title">Remarks </th>
					<th class="column-title no-link last">
					<span class="nobr">Action</span>
					</th>
					</tr>
				</thead>
				<tbody>
				<?php if($action == 'insert') 
{ ?>
					<tr class="pending-user">
						<td>
							<select class="witem form-control select_width" id="workitem_0" name="workitem[]">
								<option value=""></option>
								<?php
								foreach($workitems as $value)
								{ ?>
									<option value="<?php echo $value->wiid?>"><?php echo $value->winame;?></option>
								<?php }	?>
							</select>
							 <script type="text/javascript">
      $('.witem').select2({
        placeholder: '--- Select Workitems ---',
        });
</script>
						</td>
						<td>
							<select class="wiunit form-control select_width" id="m_unit_0" name="m_unit[]">
								<option value=""></option>
								<?php
								foreach($units as $value)
								{ ?>
									<option value="<?php echo $value->muid?>"><?php echo $value->muname;?></option>
								<?php }	?>						
							</select>
							<script type="text/javascript">
      $('.wiunit').select2({
        placeholder: '--- Select Unit ---',
        });
</script>
						</td>
						<td>
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" placeholder="0.00" autocomplete="off">
						</td>
						<td>
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00">
						</td>
                        <td>
							<select class="form-control select_width" id="discount_type" name="discount_type[]">
								<option value=""></option>
								<?php
								foreach($discount_types as $value)
								{ ?>
									<option <?php if($action == 'update'){  echo ($value->dtid == $dtid[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->dtid?>"><?php echo $value->dtname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="discount" name="discount[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="cgst_<?php echo $i; ?>" name="cgst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="sgst_<?php echo $i; ?>" name="sgst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="igst_<?php echo $i; ?>" name="igst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="total_<?php echo $i; ?>" name="total[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off" value="">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr>
				<?php } else { ?>
				<input type="hidden" name="woid" value="<?php echo $row[0]->woid; ?>"/>
                                        <script>
                                            var cgst_d_total = [];
                                            var sgst_d_total = [];
                                            var igst_d_total = [];
                                            var total_total = [];
                                        </script>
                                        <?php 

                                            $material = explode(",",$row[0]->mid);
                                            $qty = explode(",",$row[0]->mrqty);
                                            $unit = explode(",",$row[0]->mrunitprice);
                                            $m_unit = explode(",",$row[0]->muid);
                                            $remarks = explode(",",$row[0]->mrremarks);



                                            for($i=0; $i<count($material); $i++)
                                            {
                                        ?>
                                        <tr class="pending-user">
                                            <td>
                                                <select class="witem form-control select_width" id="workitem_0" name="workitem[]">
                                                    <option value=""></option>
                                                    <?php
                                                foreach($workitems as $value)
                                                { echo $workitem[$i]; ?>
                                                    <option <?php if($action == 'insert'){  echo ((int)$value->wiid == (int)$workitem[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->wiid?>"><?php echo $value->winame;?></option>
                                                    <?php }	?>
                                                </select>
                                                <script type="text/javascript">
      $('.witem').select2({
        placeholder: '--- Select Workitems ---',
        });
</script>
                                            </td>
                                            <td>
							        <select class="wiunit form-control select_width" id="m_unit_0" name="m_unit[]">
								    <option value=""></option>
								    <?php
								    foreach($units as $value)
								    { ?>
									    <option <?php if($action == 'update'){  echo ($value->muid == $m_unit[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->muid?>"><?php echo $value->muname;?></option>
								    <?php }	?>							
							        </select>
                                         <script type="text/javascript">
      $('.wiunit').select2({
        placeholder: '--- Select Unit ---',
        });
</script>
						                    </td>
                                            <td>
                                                <input type="text" id="app_qty_<?php echo $i; ?>" name="app_qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>" placeholder="0.00" autocomplete="off">
                                            </td>
                                            <td>
                                                <input type="text" id="unit_<?php echo $i; ?>" name="unit[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $unit[$i]; ?>">
                                            </td>
                                            <td>
                                                <select class="form-control select_width" id="discount_type_<?php echo $i; ?>" name="discount_type[]">
                                                    <?php
                                                foreach($discount_types as $value)
                                                { ?>
                                                    <option <?php if($action == 'update'){  echo ($value->dtid == $dtid[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->dtid?>"><?php echo $value->dtname;?></option>
                                                    <?php }	?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" id="discount_<?php echo $i; ?>" name="discount[]" class="amountonly form-control" placeholder="0.00" value="">
                                            </td>
                                            <td>
                                                <input type="number" id="cgst_<?php echo $i; ?>" name="cgst[]" class="amountonly form-control" min="0" placeholder="0.00" value="">
                                            </td>
                                            <td>
                                                <input type="number" id="sgst_<?php echo $i; ?>" name="sgst[]" class="amountonly form-control" min="0" placeholder="0.00" value="">
                                            </td>
                                            <td>
                                                <input type="number" id="igst_<?php echo $i; ?>" name="igst[]" class="amountonly form-control" min="0" placeholder="0.00" value="">
                                            </td>
                                            <td>
                                                <input type="number" id="total_<?php echo $i; ?>" name="total[]" class="amountonly form-control" min="0" placeholder="0.00" value="" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="remark_<?php echo $i; ?>" name="remark[]" class="form-control" autocomplete="off" value="">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-danger" id="minus">-</a>
                                            </td>
                                        </tr>

                                        <script>

                                            $(function(){

                                                var quantity = $('#app_qty_<?php echo $i; ?>').val();
                                                var unit_price = parseFloat($('#unit_<?php echo $i; ?>').val());

                                                $('#app_qty_<?php echo $i; ?>').keyup(function() {

                                                    quantity = parseFloat($('#app_qty_<?php echo $i; ?>').val());
                                                    dicount_Type = parseFloat(document.getElementById("discount_type_<?php echo $i; ?>").value);
                                                    discount = parseFloat($('#discount_<?php echo $i; ?>').val());
                                                    if (!discount){ discount = parseFloat(0); }

                                                    if(dicount_Type == 1){
                                                        discount = discount;
                                                        console.log(discount);
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                    else
                                                    {
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        discount = qtyprice * discount * .01
                                                        console.log(discount);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                }); 

                                                $('#unit_<?php echo $i; ?>').keyup(function() {

                                                    unit_price = parseFloat($('#unit_<?php echo $i; ?>').val());
                                                    dicount_Type = parseFloat(document.getElementById("discount_type_<?php echo $i; ?>").value);
                                                    discount = parseFloat($('#discount_<?php echo $i; ?>').val());
                                                    if (!discount){ discount = parseFloat(0); }

                                                    if(dicount_Type == 1){
                                                        discount = discount;
                                                        console.log(discount);
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                    else
                                                    {
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        discount = qtyprice * discount * .01
                                                        console.log(discount);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                }); 

                                                $('#discount_<?php echo $i; ?>').keyup(function() {
                                                    dicount_Type = parseFloat(document.getElementById("discount_type_<?php echo $i; ?>").value);
                                                    discount = parseFloat($('#discount_<?php echo $i; ?>').val());
                                                    if (!discount){ discount = parseFloat(0); }

                                                    if(dicount_Type == 1){
                                                        discount = discount;
                                                        console.log(discount);
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                    else
                                                    {
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        discount = qtyprice * discount * .01
                                                        console.log(discount);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                });

                                                $('#cgst_<?php echo $i; ?>').keyup(function() {

                                                    dicount_Type = parseFloat(document.getElementById("discount_type_<?php echo $i; ?>").value);
                                                    discount = parseFloat($('#discount_<?php echo $i; ?>').val());
                                                    if (!discount){ discount = parseFloat(0); }

                                                    if(dicount_Type == 1){
                                                        discount = discount;
                                                        console.log(discount);
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                    else
                                                    {
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        discount = qtyprice * discount * .01
                                                        console.log(discount);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                });                           

                                                $('#frieght_amount').keyup(function() {

                                                    dicount_Type = parseFloat(document.getElementById("discount_type_<?php echo $i; ?>").value);
                                                    discount = parseFloat($('#discount_<?php echo $i; ?>').val());
                                                    if (!discount){ discount = parseFloat(0); }

                                                    if(dicount_Type == 1){
                                                        discount = discount;
                                                        console.log(discount);
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                    else
                                                    {
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        discount = qtyprice * discount * .01
                                                        console.log(discount);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                }); 

                                                $('#frieght_gst').keyup(function() {
                                                    dicount_Type = parseFloat(document.getElementById("discount_type_<?php echo $i; ?>").value);
                                                    discount = parseFloat($('#discount_<?php echo $i; ?>').val());
                                                    if (!discount){ discount = parseFloat(0); }

                                                    if(dicount_Type == 1){
                                                        discount = discount;
                                                        console.log(discount);
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                    else
                                                    {
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        discount = qtyprice * discount * .01
                                                        console.log(discount);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total: '+total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                }); 

                                                $('#sgst_<?php echo $i; ?>').keyup(function() {

                                                    dicount_Type = parseFloat(document.getElementById("discount_type_<?php echo $i; ?>").value);
                                                    discount = parseFloat($('#discount_<?php echo $i; ?>').val());
                                                    if (!discount){ discount = parseFloat(0); }

                                                    if(dicount_Type == 1){
                                                        discount = discount;
                                                        console.log(discount);
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                    else
                                                    {
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        discount = qtyprice * discount * .01
                                                        console.log(discount);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                }); 

                                                $('#igst_<?php echo $i; ?>').keyup(function() {

                                                    dicount_Type = parseFloat(document.getElementById("discount_type_<?php echo $i; ?>").value);
                                                    discount = parseFloat($('#discount_<?php echo $i; ?>').val());
                                                    if (!discount){ discount = parseFloat(0); }

                                                    if(dicount_Type == 1){
                                                        discount = discount;
                                                        console.log(discount);
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                    else
                                                    {
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        discount = qtyprice * discount * .01
                                                        console.log(discount);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst + frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                }); 

                                                $('#discount_type_<?php echo $i; ?>').change(function() {

                                                    dicount_Type = parseFloat(document.getElementById("discount_type_<?php echo $i; ?>").value);
                                                    discount = parseFloat($('#discount_<?php echo $i; ?>').val());
                                                    if (!discount){ discount = parseFloat(0); }

                                                    if(dicount_Type == 1){
                                                        discount = discount;
                                                        console.log(discount);
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                    else
                                                    {
                                                        qtyprice = parseFloat(quantity * unit_price);
                                                        discount = qtyprice * discount * .01
                                                        console.log(discount);
                                                        netTotal = parseFloat(qtyprice - discount);
                                                        console.log(netTotal);

                                                        cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                        if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                        cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(cgst_d_<?php echo $i; ?>);
                                                        cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                        console.log(cgst_d_total);

                                                        var cgst_d_j;
                                                        var cgst_d_k=parseFloat(0);
                                                        for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                        { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                        $('#cgst').val(cgst_d_k);

                                                        sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                        if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                        sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                        sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(sgst_d_<?php echo $i; ?>);
                                                        sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                        console.log(sgst_d_total);

                                                        var sgst_d_j;
                                                        var sgst_d_k=parseFloat(0);
                                                        for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                        { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                        $('#sgst').val(sgst_d_k);

                                                        igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                        if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                        igst_d_<?php echo $i; ?> = parseFloat(0);
                                                        igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                        console.log(igst_d_<?php echo $i; ?>);
                                                        igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                        console.log(igst_d_total);

                                                        var igst_d_j;
                                                        var igst_d_k=parseFloat(0);
                                                        for (igst_d_j = 0; igst_d_j < igst_d_total.length; igst_d_j++) 
                                                        { igst_d_k += parseFloat(igst_d_total[igst_d_j]) ; } 

                                                        $('#igst').val(igst_d_k);

                                                        total_<?php echo $i; ?> = parseFloat(netTotal + cgst_d_<?php echo $i; ?> + sgst_d_<?php echo $i; ?> + igst_d_<?php echo $i; ?>);
                                                        $('#total_<?php echo $i; ?>').val(total_<?php echo $i; ?>);
                                                        total_total[<?php echo $i; ?>] = parseFloat(total_<?php echo $i; ?>);
                                                        console.log('total_total');
                                                        console.log(total_total);

                                                        var total_d_j;
                                                        var total_d_k=parseFloat(0);
                                                        for (total_d_j = 0; total_d_j < total_total.length; total_d_j++) 
                                                        { total_d_k += parseFloat(total_total[total_d_j]) ; } 
                                                        $('#total_total').val(total_d_k);
                                                        console.log('total_d_k : '+total_d_k);

                                                        frieght_amount = parseFloat(document.getElementById("frieght_amount").value);
                                                        if (!frieght_amount){ frieght_amount = parseFloat(0); }
                                                        console.log('frieght_amount : '+frieght_amount);

                                                        frieght_gst = parseFloat(document.getElementById("frieght_gst").value);
                                                        if (!frieght_gst){ frieght_gst = parseFloat(0); }
                                                        console.log('frieght_gst : '+frieght_gst);

                                                        frieght_amount_gst = frieght_amount * frieght_gst * .01;
                                                        console.log('frieght_amount_gst : '+frieght_amount_gst);

                                                        frieght_amount_total = total_d_k + frieght_amount_gst+ frieght_amount;
                                                        console.log('frieght_amount_total : '+frieght_amount_total);

                                                        $('#gross_amount').val(frieght_amount_total);

                                                    }
                                                }); 
                                            });



                                        </script>

                                        <?php }  }?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">CGST
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="cgst" name="csgt_total" type="text" value="" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">SGST
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="sgst" name="ssgt_total" type="text" value="" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">IGST
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="igst" name="isgt_total" type="text" value="" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Total Amount
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="total_total" name="total_amount" type="text" value="" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Frieght Amount
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="frieght_amount" name="frieght_amount" type="text" value="" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">GST on Freight (in %)
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="frieght_gst" name="frieght_gst" type="text" value="" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Gross Amount
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="gross_amount" name="gross_amount" type="text" value="" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Invoice To
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                <select class="invoice_to form-control select_width" id="invoice_to" name="invoice_to">
                                    <option value=""></option>
                                    <?php
                                        foreach($invoices as $invoice)
                                    {?>
                                     <option value="<?php echo $invoice->oid?>"><?php echo $invoice->oname.' ('.$invoice->oaddress .' )';?></option>
                                    <?php }	?>
                                </select>
                                      <script type="text/javascript">
                                          $('.invoice_to').select2({
                                              placeholder: '--- Select Invoice ---',
                                          });
                                      </script>    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Contact Name
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="contact_name" name="contact_name" type="text" value="" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Contact No.
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="contact_no" name="contact_no" type="text" value="" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Terms & Conditions
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="tandc" name="tandc" type="text" value="" autocomplete="off" >
                                </div>
                            </div>

                        <input type="hidden" value="<?php echo $uid; ?>" name="uid"> 
                            <div class="form-group">
                                <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" id="submit" class="btn btn-primary"><?php echo $btn;?></button>
                                    <a href="<?php echo base_url().$controller;?>" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>

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
<!-- Validate Js -->
	<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/underscore-min.js">
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
	_.templateSettings.variable = "element";
		var tpl = _.template($("#form_tpl").html());
		var counter = 1;
		
		$("body").on("click",".btn-success", function (e) {
		   e.preventDefault();
			 var tplData = {
				i: counter
			};
			 $(this).closest("tr").after(tpl(tplData));
				counter += 1;
				var row_index = counter-1; 
			return false;
		});
		$('body').on('click',".btn-danger",function()
		{ 
			var count= $('.pending-user').length; 
			var value=count-1;
			if(value>=1)
			{
			$(this).closest('.pending-user').fadeOut('fast', function(){$(this).closest('.pending-user').remove();
			 
			 });
			 return false;
			}
		});		
    });
</script>
<script>
$(document).ready(function (){		
	var dp = $("#date").datepicker({
		format: 'dd-mm-yyyy',
		todayHighlight: true,
        autoclose: true,
	});
});
</script>
<script>
$(document).ready(function (){	
	$('#demo-form2').validate({
		rules:{
			site: { required: true },
		},
		messages: {
			site: { required: "Please Enter Site" },					
		},
	submitHandler: function(form) {
		$(':input[type="submit"]').prop('disabled', true);
		form.submit();
	}
});
}); 
</script>
<script  type="text/html" id="form_tpl">
					<tr class="pending-user">
						<td>
							<select class="form-control select_width" id="material_0" name="material[]">
								<option value=""></option>
								<?php
								foreach($materials as $value)
								{ ?>
									<option value="<?php echo $value->mid?>"><?php echo $value->mname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<select class="form-control select_width" id="m_unit_0" name="m_unit[]">
								<option value=""></option>
								<?php
								foreach($units as $value)
								{ ?>
									<option value="<?php echo $value->muid?>"><?php echo $value->muname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="qty_0" name="qty[]" class="amountonly form-control" placeholder="0.00" autocomplete="off">
						</td>
						<td>
							<input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00">
						</td>
                        <td>
							<select class="form-control select_width" id="discount_type" name="discount_type[]">
								<option value=""></option>
								<?php
								foreach($discount_types as $value)
								{ ?>
									<option <?php if($action == 'update'){  echo ($value->dtid == $dtid[$i]) ? 'selected' : '' ; }?> value="<?php echo $value->dtid?>"><?php echo $value->dtname;?></option>
								<?php }	?>
							</select>
						</td>
						<td>
							<input type="text" id="discount" name="discount[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="cgst_<?php echo $i; ?>" name="cgst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="sgst_<?php echo $i; ?>" name="sgst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="igst_<?php echo $i; ?>" name="igst[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
						<td>
							<input type="text" id="total_<?php echo $i; ?>" name="total[]" class="amountonly form-control" placeholder="0.00" value="">
						</td>
\						<td>
							<input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off" value="">
						</td>
						<td><a class="btn btn-sm btn-success" id="plus">+</a>
						<a class="btn btn-sm btn-danger" id="minus">-</a>
						</td>
					</tr></script>

