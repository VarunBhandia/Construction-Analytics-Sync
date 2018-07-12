<?php $uid = $this->session->userdata('username'); ?>
<!DOCTYPE html>
<html>

    <head>
        <title>Vendors List</title>
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
    <h3>Vendors List
    </h3>
    <br />
    <div class="alert alert-success" style="display: none;">

    </div>
    <div class="row">
       <div class="col-md-9">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search by Vendors" class="form-control" />
            </div>
        </div>
            
        </div>
         <div class="col-md-1">
        <div align="right">
            <form method="post" action="<?php echo base_url()?>vendor/action">
                <input type="submit" name="export" class="btn btn-success" value="Export" />
            </form>
        </div>
        </div>
        <div class="col-md-2">
    <button id="btnAdd" class="btn btn-success">Add New Vendor</button>
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
                <td>Vendor Name</td>
                <td>Mobile Number</td>
                <td>GST Number</td>
                <td>Address</td>
                <td>Description/Remarks</td>
                <td>Created By</td>
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
                    <input type="hidden" name="vid" value="0">
                    <div class="form-group">
                        <label for="vname" class="label-control col-md-4">Vendor Name</label>
                        <div class="col-md-8">
                            <input type="text" name="vname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vmobile" class="label-control col-md-4">Mobile Number</label>
                        <div class="col-md-8">
                            <input type="text" name="vmobile" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="valtmobile" class="label-control col-md-4">Alt Mobile Number</label>
                        <div class="col-md-8">
                            <input type="text" name="valtmobile" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vemail" class="label-control col-md-4">Email-ID</label>
                        <div class="col-md-8">
                            <input type="text" name="vemail" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vgst" class="label-control col-md-4">GST Number</label>
                        <div class="col-md-8">
                            <input type="text" name="vgst" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vaddress" class="label-control col-md-4">Address</label>
                        <div class="col-md-8">
                            <input type="text" name="vaddress" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vdesc" class="label-control col-md-4">Description</label>
                        <div class="col-md-8">
                            <input type="text" name="vdesc" class="form-control">
                        <input type="hidden" value="<?php echo $uid; ?>" name="vcreatedby"> 
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
                url:"<?php echo base_url(); ?>vendor/fetch",
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
        showAllVendor();

        //Add New
        $('#btnAdd').click(function() {
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New Vendor');
            $('#myForm').attr('action', '<?php echo base_url() ?>vendor/addVendor');
        });


        $('#btnSave').click(function() {
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var vname = $('input[name=vname]');
            var vmobile = $('input[name=vmobile]');
            var valtmobile = $('input[name=valtmobile]');
            var vemail = $('input[name=vemail]');
            var vgst = $('input[name=vgst]');
            var vaddress = $('input[name=vaddress]');
            var vdesc = $('input[name=vdesc]');
            var vcreatedby = $('input[name=vcreatedby]');
            var result = '';
            if (vname.val() == '') {
                vname.parent().parent().addClass('has-error');
            } else {
                vname.parent().parent().removeClass('has-error');
                result += '1';
            }
            if (vmobile.val() == '') {
                vmobile.parent().parent().addClass('has-error');
            } else {
                vmobile.parent().parent().removeClass('has-error');
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
                            $('.alert-success').html('Vendor ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllVendor();
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
            var vid = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Vendor');
            $('#myForm').attr('action', '<?php echo base_url() ?>vendor/updateVendor');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>vendor/editVendor',
                data: {
                    vid: vid
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('input[name=vname]').val(data.vname);
                    $('input[name=vmobile]').val(data.vmobile);
                    $('input[name=valtmobile').val(data.valtmobile);
                    $('input[name=vemail]').val(data.vemail);
                    $('input[name=vgst]').val(data.vgst);
                    $('input[name=vaddress]').val(data.vaddress);
                    $('input[name=vdesc]').val(data.vdesc);
                    $('input[name=vcreatedby]').val(data.vcreatedby);
                    $('input[name=vid]').val(data.vid);
                },
                error: function() {
                    alert('Could not Edit Data');
                }
            });
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function() {
            var vid = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>vendor/deleteVendor',
                    data: {
                        vid: vid
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Vendor Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllVendor();
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
        function showAllVendor() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>vendor/showAllVendor',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].vid + '</td>' +
                            '<td>' + data[i].vname + '</td>' +
                            '<td>' + data[i].vmobile + '</td>' +
                            '<td>' + data[i].vgst + '</td>' +
                            '<td>' + data[i].vaddress + '</td>' +
                            '<td>' + data[i].vdesc + '</td>' +
                            '<td>' + data[i].vcreatedby + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].vid + '"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>' +
                            '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].vid + '"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>' +
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
