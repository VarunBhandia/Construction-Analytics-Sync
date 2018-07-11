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
<style>
	.select2{
		width:100%;
	}
</style>

<div class="right_col" role="main">          
    <div class="row">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Construction<?php echo $action; ?></h2>
                        <div class="clearfix"></div>
                    </div>

                    <?php
                    echo form_open('vendor_bills/show_data_by_site_vendor');
                    echo form_label('Select Site and Vendor : ');
					
					$valueSite = array();
					foreach($sites as $value)
					{
						$valueSite[$value->sid] = $value->sname;
					}
					
					echo form_dropdown('vid', array('0' => '-- Select Site --') + $valueSite, '','class="select2 vid"');
					echo '<br /><br />';
					
					$valueVendor = array();
					foreach($vendors as $value)
					{
						$valueVendor[$value->vid] = $value->vname;
					}
					
					echo form_dropdown('sid', array('0' => '-- Select Vendor --') + $valueVendor, '','class="select2 sid"');
					echo '<br /><br />';
					
                    echo "<div class='error_msg'>";
                    if (isset($date_range_error_message)) {
                        echo $date_range_error_message;
                    }
                    echo form_submit('submit', 'Show Record', 'class="show_record"');
                    echo form_close();
					$this->load->view('include/footer');
                    ?>

                    <div class="message">
                        <?php
                        if (isset($result_display)) {
                            echo "<p><u>Result</u></p>";
                            if ($result_display == 'No record found !') 
                            { echo $result_display; } 
                            else 
                            { ?>

                        <div class="datatable-responsive">
                            <table id="datatable1" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">GRNID</th>
                                        <th class="column-title">Receive Date</th>
                                        <th class="column-title">Challan No.</th>
                                        <th class="column-title">Material Name	</th>
                                        <th class="column-title">Material Unit	</th>
                                        <th class="column-title">Quantity</th>
                                        <th class="column-title">Unit Price</th>
                                        <th class="column-title">CGST</th>
                                        <th class="column-title">SGST</th>
                                        <th class="column-title">IGST</th>
                                        <th class="column-title">Total</th>
                                        <th class="column-title">Remarks</th>
                                        <th class="column-title no-link last">
                                            <span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        var cgst_d_total = [];
                                        var sgst_d_total = [];
                                        var igst_d_total = [];
                                        var total_total = [];
                                    </script>

                                    <?php

                                foreach ($result_display as $value) {
                                    ?>

                                    <input type="hidden" name="vbid" value="<?php echo $row[0]->vbid; ?>"/>
                                    <?php 

                                    $material = explode(",",$value->mid);
                                    $qty = explode(",",$value->grnqty);
                                    $grnlinechallan = explode(",",$value->grnlinechallan);
                                    $unit = explode(",",$value->grnunitprice);
                                    $m_unit = explode(",",$value->muid);
                                    $remarks = explode(",",$value->grnremarks);
                                    for($i=0; $i<count($material); $i++)
                                    {
                                    ?>
                                    <tr class="pending-user">
                                        <td style="width: 6em;">
                                            <?php echo $result_display[0]->grnrefid; ?>
                                            <input type="hidden" id="grnrefid" name="grnrefid" class="amountonly form-control" value="<?php echo $result_display[0]->grnrefid; ?>">
                                        </td>
                                        <td style="width: 6em;">
                                            <?php echo $result_display[0]->grnreceivedate ; ?>
                                            <input type="hidden" id="grnreceivedate" name="grnreceivedate" class="amountonly form-control" value="<?php echo $result_display[0]->grnreceivedate; ?>">
                                        </td>
                                        <td style="width: 6em;">
                                            <?php echo $grnlinechallan[$i]; ?>
                                        </td>
                                        <td style="width: 7em;">
                                            <?php
                                        foreach($materials as $material_detail)
                                        {  ?>
                                            <?php if($material[$i]==$material_detail->mid){echo $material_detail->mname;} ?> 
                                            <?php }	?>
                                        </td>
                                        <td style="width: 5em;">
                                            <?php
                                        foreach($units as $value)
                                        { ?>
                                            <?php if($m_unit[$i]==$value->muid){echo $value->muname;} ?> 
                                            <?php }	?>
                                        </td>
                                        <td style="width: 5em;">
                                            <?php echo $qty[$i]; ?>
                                            <input type="hidden" id="app_qty_<?php echo $i; ?>" name="app_qty[]" class="amountonly form-control" value="<?php echo $qty[$i]; ?>">

                                        </td>
                                        <td style="width: 7em;">
                                            <input type="text" id="unit_<?php echo $i; ?>" name="unit[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $unit[$i]; ?>">
                                        </td>
                                        <td style="width: 5em;">
                                            <input type="text" id="cgst_<?php echo $i; ?>" name="cgst[]" class="amountonly form-control" min="0" placeholder="0" value="">
                                        </td>
                                        <td style="width: 5em;">
                                            <input type="text" id="sgst_<?php echo $i; ?>" name="sgst[]" class="amountonly form-control" min="0" placeholder="0" value="">
                                        </td>
                                        <td style="width: 5em;">
                                            <input type="text" id="igst_<?php echo $i; ?>" name="igst[]" class="amountonly form-control" min="0" placeholder="0" value="">
                                        </td>
                                        <td style="width: 9em;">
                                            <input type="text" id="total_<?php echo $i; ?>" name="total[]" class="amountonly form-control" min="0" placeholder="0.00" value="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="remarks_<?php echo $i; ?>" name="remarks[]" value="<?php echo $remarks[$i]; ?>" class="amountonly form-control">
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-danger" id="minus">-</a>
                                        </td>
                                    </tr>
									
                                    <script>

                                        jQuery(document).ready(function(){

                                            var quantity = $('#app_qty_<?php echo $i; ?>').val();
                                            var unit_price = parseFloat($('#unit_<?php echo $i; ?>').val());

                                            $('#app_qty_<?php echo $i; ?>').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

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


                                            }); 

                                            $('#unit_<?php echo $i; ?>').keyup(function() {

                                                unit_price = parseFloat($('#unit_<?php echo $i; ?>').val());
                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

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



                                            }); 

                                            $('#cgst_<?php echo $i; ?>').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

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


                                            });                           

                                            $('#sgst_<?php echo $i; ?>').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

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


                                            });                           

                                            $('#igst_<?php echo $i; ?>').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

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


                                            });

                                            $('#frieght_amount').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

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


                                            });  

                                            $('#frieght_gst').keyup(function() {

                                                netTotal = parseFloat(quantity * unit_price);
                                                if (!netTotal){ netTotal = parseFloat(0); }

                                                console.log('netTotal: '+netTotal);

                                                cgst_<?php echo $i; ?> = parseFloat($('#cgst_<?php echo $i; ?>').val());
                                                if (!cgst_<?php echo $i; ?>){ cgst_<?php echo $i; ?> = parseFloat(0); }

                                                cgst_d_<?php echo $i; ?> = parseFloat(0);
                                                cgst_d_<?php echo $i; ?> = parseFloat(cgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('cgst_d_'+<?php echo $i; ?>+' : '+cgst_d_<?php echo $i; ?>);
                                                cgst_d_total[<?php echo $i; ?>] = parseFloat(cgst_d_<?php echo $i; ?>);
                                                console.log('cgst_d_total : '+cgst_d_total);

                                                var cgst_d_j;
                                                var cgst_d_k=parseFloat(0);
                                                for (cgst_d_j = 0; cgst_d_j < cgst_d_total.length; cgst_d_j++) 
                                                { cgst_d_k += parseFloat(cgst_d_total[cgst_d_j]) ; } 

                                                $('#cgst').val(cgst_d_k);

                                                sgst_<?php echo $i; ?> = parseFloat($('#sgst_<?php echo $i; ?>').val());
                                                if (!sgst_<?php echo $i; ?>){ sgst_<?php echo $i; ?> = parseFloat(0); }

                                                sgst_d_<?php echo $i; ?> = parseFloat(0);
                                                sgst_d_<?php echo $i; ?> = parseFloat(sgst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('sgst_d_'+<?php echo $i; ?>+' : '+sgst_d_<?php echo $i; ?>);
                                                sgst_d_total[<?php echo $i; ?>] = parseFloat(sgst_d_<?php echo $i; ?>);
                                                console.log('sgst_d_total : '+sgst_d_total);

                                                var sgst_d_j;
                                                var sgst_d_k=parseFloat(0);
                                                for (sgst_d_j = 0; sgst_d_j < sgst_d_total.length; sgst_d_j++) 
                                                { sgst_d_k += parseFloat(sgst_d_total[sgst_d_j]) ; } 

                                                $('#sgst').val(sgst_d_k);

                                                igst_<?php echo $i; ?> = parseFloat($('#igst_<?php echo $i; ?>').val());
                                                if (!igst_<?php echo $i; ?>){ igst_<?php echo $i; ?> = parseFloat(0); }

                                                igst_d_<?php echo $i; ?> = parseFloat(0);
                                                igst_d_<?php echo $i; ?> = parseFloat(igst_<?php echo $i; ?> * netTotal * 0.01)
                                                console.log('igst_d_'+<?php echo $i; ?>+' : '+igst_d_<?php echo $i; ?>);
                                                igst_d_total[<?php echo $i; ?>] = parseFloat(igst_d_<?php echo $i; ?>);
                                                console.log('igst_d_total : '+igst_d_total);

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


                                            });                           
                                        });

                                    </script>                                        
                                    <?php } } ?>
                                </tbody>
                            </table>
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
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Bill No.
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="bill_no" name="bill_no" type="text" value="" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Bill Date
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="bill_date" name="bill_date" type="date" value="" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Bill Type
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <select name="bill_type" id="bill_type" class="form-control select_width">
                                        <option value="purchase">Purchase</option>
                                        <option value="asset">Asset</option>
                                        <option value="maintenance">Maintenance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Invoice To
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <select name="invoice_to" id="invoice_to" class="form-control select_width">
                                        <?php
                                                foreach($office_details as $office_detail)
                                                { ?>
                                                    <option value="<?php echo $office_detail->oid?>"><?php echo $office_detail->oname.' ('.$office_detail->oaddress.' )'; ?></option>
                                                    <?php }	?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Payment Days (After Bill Date)
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="payment_days" name="payment_days" type="text" value="60" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Remarks
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group">
                                    <input class="form-control" id="vbremarks" name="vbremarks" type="text" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        <?php   } ?>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" id="submit" class="btn btn-primary"><?php echo $btn;?></button>
                                    <a href="<?php echo base_url().$controller;?>" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        <?php  }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

