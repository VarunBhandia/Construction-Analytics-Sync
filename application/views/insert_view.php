<html>
<head>
<title>Insert Data Into Database Using CodeIgniter Form</title>
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
</head>
<body>

<div id="container">
<?php echo form_open('insert_ctrl'); ?>
<h1>Insert Data Into Database Using CodeIgniter</h1><hr/>
<?php if (isset($message)) { ?>
<CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
<?php } ?>
    <table id="dynamic_field">
        <tr>
            <td><input type="text" name="fname[]" placeholder="Enter your First Name" class="form-control name_list" /></td>
            <td><input type="text" name="lname[]" placeholder="Enter your Last Name" class="form-control name_list" /></td>
            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
        </tr>
    </table>
                    <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />

<!--
<div id="fugo">

</div>
-->
</div>
    <script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '><td><input type="text" name="fname[]" placeholder="Enter your First Name" class="form-control name_list" /></td><td><input type="text" name="lname[]" placeholder="Enter your Last Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });

</script>
</body>
</html>