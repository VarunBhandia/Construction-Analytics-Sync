<?php $uid = $this->session->userdata('username'); ?>

<div class="container">
    <h3>All vendors List
        <?php echo $uid; ?>
    </h3>
    <div class="alert alert-success" style="display: none;">

    </div>
    <button id="btnAdd" class="btn btn-success">Add New Work Item</button>
    <table class="table table-bordered table-responsive" style="margin-top: 20px;" id='example-table'>

        <thead>
            <tr>
                <td>ID</td>
                <td>Material Name</td>
                <td>Material Description</td>
                <td>GST Rate</td>
                <td>Base Rate</td>
                <td>Category</td>
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
