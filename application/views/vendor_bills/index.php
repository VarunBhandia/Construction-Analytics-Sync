<html>
    <head>
        <title>CodeIgniter Select Demo</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div id="main">
            <div id="note"><span><b>Note : </b></span> In this DEMO we have used a default table for record. </div>
            <div class="message">
                <?php
                if (isset($read_set_value)) {
                    echo $read_set_value;
                }
                if (isset($message_display)) {
                    echo $message_display;
                }
                ?>
            </div>

            <div id="show_form">
                <h2>CodeIgniter Select By ID And Date</h2>
                <?php
                
                echo form_open('Vendor_bills/show_data_by_site_vendor');
                echo form_label('Select Site and Vendor : ');
                echo "From : ";

                $data = array(
                    'type' => 'text',
                    'name' => 'sid',
                    'placeholder' => 'Sid'
                );
                echo form_input($data);
                echo " To : ";

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
                        { echo $result_display; } else 
                        { ?>
                           <table class='result_table'>
                            <tr>
                                <th>GRN ID</th>
                                <th>SID</th>
                                <th>VID</th>
                               <tr/>
                               <?php
                            foreach ($result_display as $value) 
                               { ?>
                                <tr>
                                    <td class="e_id"><?php echo $value->grnid; ?></td>
                                    <td class="e_id"><?php echo $value->sid; ?></td>
                                    <td class="e_id"><?php echo $value->vid; ?></td>
                               </tr>
                         <?php   } ?>
                           </table>
                      <?php  }
                    }
                    ?>
            </div>
            </div>
        </div>
    </body>
</html>