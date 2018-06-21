<?php $uid = $this->session->userdata('username'); ?>

<div class="container">
    <h3>All vendors List
        <?php echo $uid; ?>
    </h3>
    <div class="alert alert-success" style="display: none;">

    </div>
    <button id="btnAdd" class="btn btn-success">Add New</button>
    <table class="table table-bordered table-responsive" style="margin-top: 20px;" id='example-table'>

        <thead>
            <tr>
                <td>ID</td>
                <td>Material Name</td>
                <td>Material Unit</td>
                <td>Material Description</td>
                <td>HSN Code</td>
                <td>GST Rate</td>
                <td>Base Rate</td>
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
                            <input type="text" name="munit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mcategory" class="label-control col-md-4">Category</label>
                        <div class="col-md-8">
                            <input type="text" name="mcategory" class="form-control">
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

            if (mcategory.val() == '') {
                mcategory.parent().parent().addClass('has-error');
            } else {
                mcategory.parent().parent().removeClass('has-error');
                result += '3';
            }
            if (result == '123') {
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
            $('#myModal').find('.modal-title').text('Edit WorkItem');
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
                    $('input[name=munit]').val(data.munit);
                    $('input[name=mcategory]').val(data.mcategory);
                    $('input[name=mdesc]').val(data.mdesc);
                    $('input[name=hsn]').val(data.hsn);
                    $('input[name=mgst]').val(data.mgst);
                    $('input[name=mbase]').val(data.mbase);
                    $('input[name=mtype]').val(data.mtype);
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
                url: '<?php echo base_url() ?>material/showAllMaterial',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].mid + '</td>' +
                            '<td>' + data[i].mname + '</td>' +
                            '<td>' + data[i].munit + '</td>' +
                            '<td>' + data[i].mcategory + '</td>' +
                            '<td>' + data[i].mdesc + '</td>' +
                            '<td>' + data[i].hsn + '</td>' +
                            '<td>' + data[i].mgst + '</td>' +
                            '<td>' + data[i].mbase + '</td>' +
                            '<td>' + data[i].mtype + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].mid + '">Edit</a>' +
                            '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].mid + '">Delete</a>' +
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
