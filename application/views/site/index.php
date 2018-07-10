<?php $uid = $this->session->userdata('username'); ?>

<div class="container">
    <h3>Site Lists
    </h3>
    <div class="alert alert-success" style="display: none;">

    </div>
    <button id="btnAdd" class="btn btn-success">Add New Site</button>
    <div align="right">
                    <form method="post" action="<?php echo base_url()?>site/action">
				    <input type="submit" name="export" class="btn btn-success" value="Export" />
                    </form>
                       </div>
    <table class="table table-bordered table-responsive" style="margin-top: 20px;" id='example-table'>

        <thead>
            <tr>
                <td><b>ID</b></td>
                <td><b>Name</b></td>
                <td><b>Start Date</b></td>
                <td><b>Unique ID</b></td>
                <td><b>Contact Name</b></td>
                <td><b>Mobile</b></td>
                <td><b>Email</b></td>
                <td><b>Addres</b></td>
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
                    <input type="hidden" name="sid" value="0">
                    <div class="form-group">
                        <label for="name" class="label-control col-md-4">Name</label>
                        <div class="col-md-8">
                            <input type="text" name="sname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="label-control col-md-4">Start Date</label>
                        <div class="col-md-8">
                            <input type="date" name="sitestartdate" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="label-control col-md-4">Unique ID</label>
                        <div class="col-md-8">
                            <input type="text" name="uniquesid" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="label-control col-md-4">Conatct Name</label>
                        <div class="col-md-8">
                            <input type="text" name="contactname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="label-control col-md-4">Mobile</label>
                        <div class="col-md-8">
                            <input type="text" name="mobile" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="label-control col-md-4">Email ID</label>
                        <div class="col-md-8">
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="label-control col-md-4">Address</label>
                        <div class="col-md-8">
                            <input type="text" name="address" class="form-control">
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
    $(function() {
        showAllSite();

        //Add New
        $('#btnAdd').click(function() {
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New Site');
            $('#myForm').attr('action', '<?php echo base_url() ?>site/addSite');
        });


        $('#btnSave').click(function() {
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var sname = $('input[name=sname]');
            var sitestartdate = $('input[name=sitestartdate]');
            var uniquesid = $('input[name=uniquesid]');
            var contactname = $('input[name=contactname]');
            var mobile = $('input[name=mobile]');
            var email = $('input[name=email]');
            var address = $('input[name=address]');
            var result = '';
            if (sname.val() == '') {
                sname.parent().parent().addClass('has-error');
            } else {
                sname.parent().parent().removeClass('has-error');
                result += '1';
            }
            if (contactname.val() == '') {
                contactname.parent().parent().addClass('has-error');
            } else {
                contactname.parent().parent().removeClass('has-error');
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
                            $('.alert-success').html('Site ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllSite();
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
            var sid = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Site');
            $('#myForm').attr('action', '<?php echo base_url() ?>site/updateSite');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>site/editSite',
                data: {
                    sid: sid
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('input[name=sname]').val(data.sname);
                    $('input[name=sitestartdate]').val(data.sitestartdate);
                    $('input[name=uniquesid]').val(data.uniquesid);
                    $('input[name=contactname]').val(data.contactname);
                    $('input[name=mobile]').val(data.mobile);
                    $('input[name=email]').val(data.email);
                    $('input[name=address]').val(data.address);
                    $('input[name=sid]').val(data.sid);
                },
                error: function() {
                    alert('Could not Edit Data');
                }
            });
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function() {
            var sid = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>site/deleteSite',
                    data: {
                        sid: sid
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Site Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllSite();
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
        function showAllSite() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>site/showAllSite',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].sid + '</td>' +
                            '<td>' + data[i].sname + '</td>' +
                            '<td>' + data[i].sitestartdate + '</td>' +
                            '<td>' + data[i].uniquesid + '</td>' +
                            '<td>' + data[i].contactname + '</td>' +
                            '<td>' + data[i].mobile + '</td>' +
                            '<td>' + data[i].email + '</td>' +
                            '<td>' + data[i].address + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].sid + '">Edit</a>' +
                            '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].sid + '">Delete</a>' +
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
    <input type="button" id="btnExport" value="Export" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/js/table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#example-table").table2excel({
                    filename: "Table.xls"
                });
            });
        });
    </script>

