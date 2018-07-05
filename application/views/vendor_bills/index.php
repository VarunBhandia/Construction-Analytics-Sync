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

                    <div id="show_form">
                        <h2>CodeIgniter Select By ID And Date</h2>
                        <?php

                        echo form_open('Vendor_bills/show_data_by_site_vendor');
                        echo form_label('Select Site and Vendor : ');

                        $data = array(
                            'type' => 'text',
                            'name' => 'sid',
                            'placeholder' => 'Sid'
                        );
                        echo form_input($data);
                        $data = array(
                            'type' => 'text',
                            'name' => 'vid',
                            'placeholder' => 'Vid'
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
                                            </td>
                                            <td style="width: 6em;">
                                                <?php echo $result_display[0]->grnreceivedate ; ?>
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
                                                <input type="text" id="app_qty_<?php echo $i; ?>" name="app_qty[]" class="amountonly form-control" placeholder="0.00" value="<?php echo $qty[$i]; ?>">

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

                                            $(function(){

                                                var quantity = $('#app_qty_<?php echo $i; ?>').val();
                                                var unit_price = parseFloat($('#unit_<?php echo $i; ?>').val());

                                                $('#app_qty_<?php echo $i; ?>').keyup(function() {

                                                    netTotal = parseFloat(quantity * unit_price);

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
                                                }); 

                                                $('#unit_<?php echo $i; ?>').keyup(function() {

                                                    unit_price = parseFloat($('#unit_<?php echo $i; ?>').val());
                                                    netTotal = parseFloat(quantity * unit_price);

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
                                                }); 

                                                $('#cgst_<?php echo $i; ?>').keyup(function() {

                                                    netTotal = parseFloat(quantity * unit_price);

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

                                                });                           

                                                $('#sgst_<?php echo $i; ?>').keyup(function() {

                                                    netTotal = parseFloat(quantity * unit_price);

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

                                                });                           

                                                $('#igst_<?php echo $i; ?>').keyup(function() {

                                                    netTotal = parseFloat(quantity * unit_price);

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

                                                });                           


                                            });



                                        </script>                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php   } ?>
                            <?php  }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>