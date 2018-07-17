<?php $uid = $this->session->userdata('username'); ?>
<!DOCTYPE html>
<html>

    <head>
        <title>Material List</title>
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
    <h3>All Materials List
    </h3>
    <br />
    <div class="alert alert-success" style="display: none;">

    </div>
    <div class="row">
        <div class="col-md-9">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search by materials Details" class="form-control" />
            </div>
        </div>
            
        </div>
        <div class="col-md-1">
        <div align="right">
            <form method="post" action="<?php echo base_url()?>material/action">
                <input type="submit" name="export" class="btn btn-success" value="Export" />
            </form>
        </div>
        </div>
        <div class="col-md-2">
    <button id="btnAdd" class="btn btn-success">Add New Material</button>
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
                <td><b>ID</b></td>
                <td><b>Material Name</b></td>
                <td><b>Material Unit</b></td>
                <td><b>Material Category</b></td>
                <td><b>Material Description</b></td>
                <td><b>HSN Code</b></td>
                <td><b>GST Rate</b></td>
                <td><b>Base Rate</b></td>
                <td><b>Material type</b></td>
                <td><b>Created By</b></td>
                <td><b>Action</b></td>
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
                    <input type="hidden" name="mid" value="0">
                    <div class="form-group">
                        <label for="mname" class="label-control col-md-4">Material Name</label>
                        <div class="col-md-8">
                            <input type="text" name="mname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="munit" class="label-control col-md-4">Material Unit</label>
                        <div class="col-md-8">
                            <select class=" form-control" id="munit" name="munit">
                                <option value="">---Unit name----</option>
                                <?php
    foreach($munits as $munit)
    { ?>
                                <option value="<?php echo $munit->muid; ?>"><?php echo $munit->muname;?></option>
                                <?php }	?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mdesc" class="label-control col-md-4">Category</label>
                        <div class="col-md-8">
                            <select class=" form-control" id="mcategory" name="mcategory">
                                <option value="">---category name----</option>
                                <?php
                                foreach($mcategorys as $mcategory)
                                { ?>
                                <option value="<?php echo $mcategory->cid; ?>"><?php echo $mcategory->cname;?></option>
                                <?php }	?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mdesc" class="label-control col-md-4">Material Description</label>
                        <div class="col-md-8">
                            <input type="text" name="mdesc" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hsn" class="label-control col-md-4">HSN Code</label>
                        <div class="col-md-8">
                            <input type="text" name="hsn" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mgst" class="label-control col-md-4">GST Rate</label>
                        <div class="col-md-8">
                            <input type="text" name="mgst" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mbase" class="label-control col-md-4">Base Rate</label>
                        <div class="col-md-8">
                            <input type="text" name="mbase" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mtype" class="label-control col-md-4">Material Type</label>
                        <div class="col-md-8">
                            <input type="text" name="mtype" class="form-control">
                        <input type="hidden" value="<?php echo $uid; ?>" name="mcreatedby"> 
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
<!--           <i class="glyphicon glyphicon-trash icon-white"></i> Delete-->
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
                url:"<?php echo base_url(); ?>material/fetch",
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
        showAllMaterial();

        //Add New
        $('#btnAdd').click(function() {
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New Material');
            $('#myForm').attr('action', '<?php echo base_url() ?>material/addMaterial');
        });


        $('#btnSave').click(function() {
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var mname = $('input[name=mname]');
            var munit = $('input[name=munit]');
            var mcategory = $('input[name=mcategory]');
            var mdesc = $('input[name=mdesc]');
            var hsn = $('input[name=hsn]');
            var mgst = $('input[name=mgst]');
            var mbase = $('input[name=mbase]');
            var mtype = $('input[name=mtype]');
            var mcreatedby = $('input[name=mcreatedby]');
            var result = '';
            if (mname.val() == '') {
                mname.parent().parent().addClass('has-error');
            } else {
                mname.parent().parent().removeClass('has-error');
                result += '1';
            }

            if (munit.val() == '') {
                munit.parent().parent().addClass('has-error');
            } else {
                munit.parent().parent().removeClass('has-error');
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
                            $('.alert-success').html('Material ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllMaterial();
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
            var mid = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Material');
            $('#myForm').attr('action', '<?php echo base_url() ?>material/updateMaterial');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>material/editMaterial',
                data: {
                    mid: mid
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('input[name=mname]').val(data.mname);
                    $('input[name=munit]').val(<?php foreach($munits as $munit)
{ } ?>data.munit);
                    $('input[name=mcategory]').val(<?php foreach($mcategorys as $mcategory)
{ } ?>data.mcategory);
                    $('input[name=mdesc]').val(data.mdesc);
                    $('input[name=hsn]').val(data.hsn);
                    $('input[name=mgst]').val(data.mgst);
                    $('input[name=mbase]').val(data.mbase);
                    $('input[name=mtype]').val(data.mtype);
                    $('input[name=mcreatedby]').val(data.mcreatedby);
                },
                error: function() {
                    alert('Could not Edit Data');
                }
            });
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function() {
            var mid = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>material/deleteMaterial',
                    data: {
                        mid: mid
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Material Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllMaterial();
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
        function showAllMaterial() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>Material/showAllMaterial',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].mid + '</td>' +
                            '<td>' + data[i].mname + '</td>' +
                            '<td>' + data[i].munit + '</td>' + <?php echo 'tet'; ?>
                            '<td>' + data[i].mcategory + '</td>' +
                            '<td>' + data[i].mdesc + '</td>' +
                            '<td>' + data[i].hsn + '</td>' +
                            '<td>' + data[i].mgst + '</td>' +
                            '<td>' + data[i].mbase + '</td>' +
                            '<td>' + data[i].mtype + '</td>' +
                            '<td>' + data[i].mcreatedby + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].mid + '"><i class="glyphicon glyphicon-edit icon-white"></i> Edit</a>' +
                            '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].mid + '"><i class="glyphicon glyphicon-trash icon-white"></i> Delete</a>' +
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
