<?php $uid = $this->session->userdata('username'); ?>

<div class="container">
    <h3>All Sub-Contractors List
        <?php echo $uid; ?>
    </h3>
    <div class="alert alert-success" style="display: none;">

    </div>
    <button id="btnAdd" class="btn btn-success">Add New Subcontractor</button>
    <table class="table table-bordered table-responsive" style="margin-top: 20px;" id='example-table'>

        <thead>
            <tr>
                <td>ID</td>
                <td>Subcontractor Name</td>
                <td>Mobile Number</td>
                <td>Alt Mobile Number</td>
                <td>Email-id</td>
                <td>GST Number</td>
                <td>Address</td>
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
                    <input type="hidden" name="subid" value="0">
                    <div class="form-group">
                        <label for="subname" class="label-control col-md-4">Subcontractor Name</label>
                        <div class="col-md-8">
                            <input type="text" name="subname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="submobile" class="label-control col-md-4">Mobile Number</label>
                        <div class="col-md-8">
                            <input type="text" name="submobile" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subaltmobile" class="label-control col-md-4">Alt Mobile Number</label>
                        <div class="col-md-8">
                            <input type="text" name="subaltmobile" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subemail" class="label-control col-md-4">Email-ID</label>
                        <div class="col-md-8">
                            <input type="text" name="subemail" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subgst" class="label-control col-md-4">GST Number</label>
                        <div class="col-md-8">
                            <input type="text" name="subgst" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subaddress" class="label-control col-md-4">Address</label>
                        <div class="col-md-8">
                            <input type="text" name="subaddress" class="form-control">
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
        showAllSubcont();

        //Add New
        $('#btnAdd').click(function() {
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New Sub-Contractor');
            $('#myForm').attr('action', '<?php echo base_url() ?>subcont/addSubcont');
        });


        $('#btnSave').click(function() {
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var subname = $('input[name=subname]');
            var submobile = $('input[name=submobile]');
            var subaltmobile = $('input[name=subaltmobile]');
            var subemail = $('input[name=subemail]');
            var subgst = $('input[name=subgst]');
            var subaddress = $('input[name=subaddress]');
            var result = '';
            if (subname.val() == '') {
                subname.parent().parent().addClass('has-error');
            } else {
                subname.parent().parent().removeClass('has-error');
                result += '1';
            }
            if (submobile.val() == '') {
                submobile.parent().parent().addClass('has-error');
            } else {
                submobile.parent().parent().removeClass('has-error');
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
                            $('.alert-success').html('Subcontractor ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllSubcont();
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
            var subid = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Subcontractor');
            $('#myForm').attr('action', '<?php echo base_url() ?>subcont/updateSubcont');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>subcont/editSubcont',
                data: {
                    subid: subid
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('input[name=subname]').val(data.subname);
                    $('input[name=submobile]').val(data.submobile);
                    $('input[name=subaltmobile').val(data.subaltmobile);
                    $('input[name=subemail]').val(data.subemail);
                    $('input[name=subgst]').val(data.subgst);
                    $('input[name=subaddress]').val(data.subaddress);
                    $('input[name=subid]').val(data.subid);
                },
                error: function() {
                    alert('Could not Edit Data');
                }
            });
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function() {
            var subid = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function() {
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>subcont/deleteSubcont',
                    data: {
                        subid: subid
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Subcontractor Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllSubcont();
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
        function showAllSubcont() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>subcont/showAllSubcont',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].subid + '</td>' +
                            '<td>' + data[i].subname + '</td>' +
                            '<td>' + data[i].submobile + '</td>' +
                            '<td>' + data[i].subaltmobile + '</td>' +
                            '<td>' + data[i].subemail + '</td>' +
                            '<td>' + data[i].subgst + '</td>' +
                            '<td>' + data[i].subaddress + '</td>' +
                            '<td>' +
                            '<a href="javascript:;" class="btn btn-info item-edit" data="' + data[i].subid + '">Edit</a>' +
                            '<a href="javascript:;" class="btn btn-danger item-delete" data="' + data[i].subid + '">Delete</a>' +
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
