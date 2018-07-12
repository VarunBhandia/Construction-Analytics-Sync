<?php $uid = $this->session->userdata('username'); ?>
<!DOCTYPE html>
<html>

    <head>
        <title>Workitems</title>
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
                <h3>Workitems List
                </h3>
                <br />
                <div class="alert alert-success" style="display: none;">

                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Search</span>
                                <input type="text" name="search_text" id="search_text" placeholder="Search by workitems" class="form-control" />
                            </div>
                        </div>

                    </div>
                    <div class="col-md-1">
                        <div align="right">
                            <form method="post" action="<?php echo base_url()?>workitem/action">
                                <input type="submit" name="export" class="btn btn-success" value="Export" />
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button id="btnAdd" class="btn btn-success">Add New Work Item</button>
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
                            <td>Material Name</td>
                            <td>Material Description</td>
                            <td>GST Rate</td>
                            <td>Base Rate</td>
                            <td>Category</td>
                            <td>WI Created By</td>
                            <td>Material type</td>
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
                                <input type="hidden" name="wiid" value="0">
                                <div class="form-group">
                                    <label for="winame" class="label-control col-md-4">Material Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="winame" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="widesc" class="label-control col-md-4">Material Description</label>
                                    <div class="col-md-8">
                                        <input type="text" name="widesc" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="wigst" class="label-control col-md-4">GST Rate</label>
                                    <div class="col-md-8">
                                        <input type="text" name="wigst" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="wibase" class="label-control col-md-4">Base Rate</label>
                                    <div class="col-md-8">
                                        <input type="text" name="wibase" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="wicategory" class="label-control col-md-4">Category</label>
                                    <div class="col-md-8">
                                        <input type="text" name="wicategory" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="witype" class="label-control col-md-4">Material Type</label>
                                    <div class="col-md-8">
                                        <input type="text" name="witype" class="form-control">
                        <input type="hidden" value="<?php echo $uid; ?>" name="wicreatedby"> 
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
                            url:"<?php echo base_url(); ?>workitem/fetch",
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
                    showAllWorkItem();

                    //Add New
                    $('#btnAdd').click(function() {
                        $('#myModal').modal('show');
                        $('#myModal').find('.modal-title').text('Add New Work Item');
                        $('#myForm').attr('action', '<?php echo base_url() ?>workitem/addWorkItem');
                    });


                    $('#btnSave').click(function() {
                        var url = $('#myForm').attr('action');
                        var data = $('#myForm').serialize();
                        //validate form
                        var winame = $('input[name=winame]');
                        var widesc = $('input[name=widesc]');
                        var wigst = $('input[name=wigst]');
                        var wibase = $('input[name=wibase]');
                        var wicategory = $('input[name=wicategory]');
                        var witype = $('input[name=witype]');
                        var wicreatedby = $('input[name=wicreatedby]');
                        var result = '';
                        if (winame.val() == '') {
                            winame.parent().parent().addClass('has-error');
                        } else {
                            winame.parent().parent().removeClass('has-error');
                            result += '1';
                        }

                        if (result == '1') {
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
                                        $('.alert-success').html('Work Item ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');
                                        showAllWorkItem();
                                    } else {
                                        alert('Nothing to Update');
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
                        var wiid = $(this).attr('data');
                        $('#myModal').modal('show');
                        $('#myModal').find('.modal-title').text('Edit WorkItem');
                        $('#myForm').attr('action', '<?php echo base_url() ?>workitem/updateWorkItem');
                        $.ajax({
                            type: 'ajax',
                            method: 'get',
                            url: '<?php echo base_url() ?>workitem/editWorkItem',
                            data: {
                                wiid: wiid
                            },
                            async: false,
                            dataType: 'json',
                            success: function(data) {
                                $('input[name=winame]').val(data.winame);
                                $('input[name=widesc]').val(data.widesc);
                                $('input[name=wigst]').val(data.wigst);
                                $('input[name=wibase]').val(data.wibase);
                                $('input[name=wicategory]').val(data.wicategory);
                                $('input[name=witype]').val(data.witype);
                                $('input[name=wicreatedby]').val(data.wicreatedby);
                                $('input[name=wiid]').val(data.wiid);
                            },
                            error: function() {
                                alert('Could not Edit Data');
                            }
                        });
                    });

                    //delete- 
                    $('#showdata').on('click', '.item-delete', function() {
                        var wiid = $(this).attr('data');
                        $('#deleteModal').modal('show');
                        //prevent previous handler - unbind()
                        $('#btnDelete').unbind().click(function() {
                            $.ajax({
                                type: 'ajax',
                                method: 'get',
                                async: false,
                                url: '<?php echo base_url() ?>workitem/deleteWorkItem',
                                data: {
                                    wiid: wiid
                                },
                                dataType: 'json',
                                success: function(response) {
                                    if (response.success) {
                                        $('#deleteModal').modal('hide');
                                        $('.alert-success').html('Work-Item Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                                        showAllWorkItem();
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
                    function showAllWorkItem() {
                        $.ajax({
                            type: 'ajax',
                            url: '<?php echo base_url() ?>workitem/showAllWorkItem',
                            async: false,
                            dataType: 'json',
                            success: function(data) {
                                var html = '';
                                var i;
                                for (i = 0; i < data.length; i++) {
                                    html += '<tr>' +
                                        '<td>' + data[i].wiid + '</td>' +
                                        '<td>' + data[i].winame + '</td>' +
                                        '<td>' + data[i].widesc + '</td>' +
                                        '<td>' + data[i].wigst + '</td>' +
                                        '<td>' + data[i].wibase + '</td>' +
                                        '<td>' + data[i].wicategory + '</td>' +
                                        '<td>' + data[i].witype + '</td>' +
                                        '<td>' + data[i].wicreatedby + '</td>' +
                                        '<td>' +
                                        '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].wiid + '">Edit</a>' +
                                        '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].wiid + '">Delete</a>' +
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

