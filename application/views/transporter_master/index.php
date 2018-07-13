<?php $uid = $this->session->userdata('username'); ?>
<!DOCTYPE html>
<html>

    <head>
        <title>Transporters</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,900" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tabletojson.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    </head>

    <body style="font-family: 'Montserrat', sans-serif;">

        <div class="navbar navbar-default">
            <div class="container">
                <h2><span class="glyphicon glyphicon-home"></span> Construction Analytics</h2>
            </div>
        </div>
        <div class="container">
<div class="container">
    <h3>Transporters
    </h3>
    <br />
    <div class="alert alert-success" style="display: none;">

    </div>
    <div class="row">
        <div class="col-md-9">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search by transporters" class="form-control" />
            </div>
        </div>
            
        </div>
        <div class="col-md-1">
        <div align="right">
            <form method="post" action="<?php echo base_url()?>transporter/action">
                <input type="submit" name="export" class="btn btn-success" value="Export" />
            </form>
        </div>
        </div>
        <div class="col-md-2">
    <button id="btnAdd" class="btn btn-success">Add New Transporter</button>
     </div>
        
       
    </div>
    <div class="container">
        <br />
        <br />
        <div id="result"></div>

    </div>
    <div style="clear:both"></div>

    <table class="table table-bordered table-responsive" style="margin-top: 20px;" id='example-table'>
        <thead>
            <tr>
                <td>ID</td>
                <td>Transporter Name</td>
				<td>Mobile number</td>
				<td>Alt Mobile number</td>
				<td>Contact Name</td>
				<td>E-mail ID</td>
                <td>GST no</td>
				<td>Address</td>
                <td>Desc</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody id="showdata">

        </tbody>
    </table>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <form id="myForm" action="" method="post" class="form-horizontal">
                    <input type="hidden" name="tid" value="0">
                    <div class="form-group">
                        <label for="tname" class="label-control col-md-4">Transporter Name</label>
                        <div class="col-md-8">
                            <input type="text" name="tname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tmobile" class="label-control col-md-4">Mobile Number</label>
                        <div class="col-md-8">
                            <input type="text" name="tmobile" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taltmobile" class="label-control col-md-4">Alt Mobile Number</label>
                        <div class="col-md-8">
                            <input type="text" name="taltmobile" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tconame" class="label-control col-md-4">Contact Name</label>
                        <div class="col-md-8">
                            <input type="text" name="tconame" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="temail" class="label-control col-md-4">Email-ID</label>
                        <div class="col-md-8">
                            <input type="text" name="temail" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgst" class="label-control col-md-4">GST Number</label>
                        <div class="col-md-8">
                            <input type="text" name="tgst" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taddress" class="label-control col-md-4">Address</label>
                        <div class="col-md-8">
                            <input type="text" name="taddress" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tdesc" class="label-control col-md-4">Description</label>
                        <div class="col-md-8">
                            <input type="text" name="tdesc" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                Do you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"<?php echo base_url(); ?>transporter/fetch",
                method:"POST",
                data:{query:query},
                success:function(data){
                    $('#showdata').html(data);
                }
            })
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>
<script>
    $(function() {
        showAllTransporter();

        //Add New
        $('#btnAdd').click(function() {
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New Transporter');
            $('#myForm').attr('action', '<?php echo base_url() ?>transporter/addTransporter');
        });


        $('#btnSave').click(function() {
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var tname = $('input[name=tname]');
            var tmobile = $('input[name=tmobile]');
            var taltmobile = $('input[name=taltmobile]');
            var tconame = $('input[name=tconame]');
            var temail = $('input[name=temail]');
            var tgst = $('input[name=tgst]');
            var taddress = $('input[name=taddress]');
            var tdesc = $('input[name=tdesc]');
            var result = '';
            if (tname.val() == '') {
                tname.parent().parent().addClass('has-error');
            } else {
                tname.parent().parent().removeClass('has-error');
                result += '1';
            }
            if (tmobile.val() == '') {
                tmobile.parent().parent().addClass('has-error');
            } else {
                tmobile.parent().parent().removeClass('has-error');
                result += '2';
            }

            if (result == '12') {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#myModal').modal('hide');
                            $('#myForm')[0].reset();
                            if (response.type == 'add') {
                                var type = 'added'
                            } else if (response.type == 'update') {
                                var type = "updated"
                            }
                            $('.alert-success').html('Transporter ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllTransporter();
                        } else {
                            alert('Error');
                        }
                    },
                    error: function() {
                        alert('Could not add data');
                    }
                });
            }
        });

        //edit
        $('#showdata').on('click', '.item-edit', function() {
            var tid = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Transporter');
            $('#myForm').attr('action', '<?php echo base_url() ?>transporter/updateTransporter');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>transporter/editTransporter',
                data: {
                    tid: tid
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('input[name=tname]').val(data.tname);
                    $('input[name=tmobile]').val(data.tmobile);
                    $('input[name=taltmobile').val(data.taltmobile);
                    $('input[name=tconame').val(data.tconame);
                    $('input[name=temail]').val(data.temail);
                    $('input[name=tgst]').val(data.tgst);
                    $('input[name=taddress]').val(data.taddress);
                    $('input[name=tdesc]').val(data.tdesc);
                    $('input[name=tid]').val(data.tid);
                },
                error: function() {
                    alert('Could not Edit Data');
                }
            });
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function() {
            var tid = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>transporter/deleteTransporter',
                    data: {
                        tid: tid
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Transporter Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllTransporter();
                        } else {
                            alert('Error');
                        }
                    },
                    error: function() {
                        alert('Error deleting');
                    }
                });
            });
        });



        //function
        function showAllTransporter() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>transporter/showAllTransporter',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].tid + '</td>' +
                            '<td>' + data[i].tname + '</td>' +
                            '<td>' + data[i].tmobile + '</td>' +
                            '<td>' + data[i].taltmobile + '</td>' +
                            '<td>' + data[i].tconame + '</td>' +
                            '<td>' + data[i].temail + '</td>' +
                            '<td>' + data[i].tgst + '</td>' +
                            '<td>' + data[i].taddress + '</td>' +
                            '<td>' + data[i].tdesc + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].tid + '"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>' +
                            '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].tid + '"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#showdata').html(html);
                },
                error: function() {
                    alert('Could not get Data from Database');
                }
            });
        }
    });
</script>

<!--
<button id="run" class="btn btn-primary">Convert!</button>
<p id="demo"></p>

<script>

 var table = $('#example-table').tableToJSON();
var myJSON = JSON.stringify(table);
document.getElementById("demo").innerHTML = myJSON;

</script>
<script>
$('#run').click( function() {
 var table = $('#example-table').tableToJSON();
 alert(JSON.stringify(table));  

});
    </script>
-->
