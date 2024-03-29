<?php $uid = $this->session->userdata('username'); ?>

<div class="container">
    <h3>All categories
    </h3>
    <div class="alert alert-success" style="display: none;">

    </div>
    <button id="btnAdd" class="btn btn-success">Add New category</button>
    <div align="right">
                    <form method="post" action="<?php echo base_url()?>category/action">
				    <input type="submit" name="export" class="btn btn-success" value="Export" />
        </form>
    </div>
    <table class="table table-bordered table-responsive" style="margin-top: 20px;" id='example-table'>
        <thead>
            <tr>
                <td>ID</td>
                <td>category Name</td>
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
                    <input type="hidden" name="cid" value="0">
                    <div class="form-group">
                        <label for="cname" class="label-control col-md-4">Category Name</label>
                        <div class="col-md-8">
                            <input type="text" name="cname" class="form-control">
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
        showAllCategory();

        //Add New
        $('#btnAdd').click(function() {
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New category');
            $('#myForm').attr('action', '<?php echo base_url() ?>category/addCategory');
        });


        $('#btnSave').click(function() {
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var cname = $('input[name=cname]');
            var result = '';
            if (cname.val() == '') {
                cname.parent().parent().addClass('has-error');
            } else {
                cname.parent().parent().removeClass('has-error');
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
                            $('.alert-success').html('Category ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllCategory();
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
            var cid = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Category');
            $('#myForm').attr('action', '<?php echo base_url() ?>category/updateCategory');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>category/editCategory',
                data: {
                    cid: cid
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('input[name=cname]').val(data.cname);
                    $('input[name=cid]').val(data.cid);
                },
                error: function() {
                    alert('Could not Edit Data');
                }
            });
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function() {
            var cid = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>category/deleteCategory',
                    data: {
                        cid: cid
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Category Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllCategory();
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
        function showAllCategory() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>category/showAllCategory',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].cid + '</td>' +
                            '<td>' + data[i].cname + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].cid + '"><i class="glyphicon glyphicon-edit icon-white"></i></a>' +
                            '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].cid + '"><i class="glyphicon glyphicon-trash icon-white"></i></a>' +
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
