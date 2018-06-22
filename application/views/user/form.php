<?php
	error_reporting(0);
		$this->load->view('include/header');
		
		if($action == 'insert')
		{
			$btn = 'Save';
		}
		elseif($action == 'update')
		{
			$btn = 'Update';
		}
	?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Construction</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form enctype="multipart/form-data" action="<?php echo base_url().$controller.'/'.$action;?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <?php echo '<font style="font-size:16px;" color="green">'.$this->session->flashdata('success_msg').'</font>' ?>
                                <div class="form-group">
                                    <h2>Personal Details</h2>

                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Username
	                        </label>
                                    <div class="col-md-10 col-sm-6 col-xs-12">
                                        <input type="text" id="uname" name="uname" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->uname : '';?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Password
	                        </label>
                                    <div class="col-md-10 col-sm-6 col-xs-12">
                                        <input type="Password" id="password" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->password : '';?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Email
	                        </label>
                                    <div class="col-md-10 col-sm-6 col-xs-12">
                                        <input type="Email" id="uemail" name="uemail" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->uemail : '';?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Address
	                        </label>
                                    <div class="col-md-10 col-sm-6 col-xs-12">
                                        <input type="text" id="uaddress" name="uaddress" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->uaddress : '';?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Mobile Number
	                        </label>
                                    <div class="col-md-10 col-sm-6 col-xs-12">
                                        <input type="text" id="umobile" name="umobile" class="form-control col-md-7 col-xs-12" value="<?php echo ($action == 'update') ? $row[0]->umobile : '';?>" autocomplete="off">
                                    </div>
                                </div>
                                <h2> Roles</h2>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Users
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="user" value="No" checked>No
                                        <input type="radio" name="user" value="ReadOnly">Read Only
                                        <input type="radio" name="user" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Site
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="site_role" value="No" checked>No
                                        <input type="radio" name="site_role" value="ReadOnly">Read Only
                                        <input type="radio" name="site_role" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Material
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="material" value="No" checked>No
                                        <input type="radio" name="material" value="ReadOnly">Read Only
                                        <input type="radio" name="material" value="AddEdit">Add-Edit
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Vendor
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="vendor" value="No" checked>No
                                        <input type="radio" name="vendor" value="ReadOnly">Read Only
                                        <input type="radio" name="vendor" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Material Request
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="mr" value="No" checked>No
                                        <input type="radio" name="mr" value="ReadOnly">Read Only
                                        <input type="radio" name="mr" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Purchase Order
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="po" value="No" checked>No
                                        <input type="radio" name="po" value="ReadOnly">Read Only
                                        <input type="radio" name="po" value="AddEdit">Add-Edit
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Return to Vendor
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="rtv" value="No" checked>No
                                        <input type="radio" name="rtv" value="ReadOnly">Read Only
                                        <input type="radio" name="rtv" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">cash Purchase
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="cp" value="No" checked>No
                                        <input type="radio" name="cp" value="ReadOnly">Read Only
                                        <input type="radio" name="cp" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Unordered Good Received
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="uogrn" value="No" checked>No
                                        <input type="radio" name="uogrn" value="ReadOnly">Read Only
                                        <input type="radio" name="uogrn" value="AddEdit">Add-Edit
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Vendor Bills
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="vendorbills" value="No" checked>No
                                        <input type="radio" name="vendorbills" value="ReadOnly">Read Only
                                        <input type="radio" name="vendorbills" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Vendor Bill Payment
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="vendorbillpayment" value="No" checked>No
                                        <input type="radio" name="vendorbillpayment" value="ReadOnly">Read Only
                                        <input type="radio" name="vendorbillpayment" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Move Order
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="moveorder" value="No" checked>No
                                        <input type="radio" name="moveorder" value="ReadOnly">Read Only
                                        <input type="radio" name="moveorder" value="AddEdit">Add-Edit
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Office GST Details
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="officegstdetails" value="No" checked>No
                                        <input type="radio" name="officegstdetails" value="ReadOnly">Read Only
                                        <input type="radio" name="officegstdetails" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Subcontractor
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="subcontractor" value="No" checked>No
                                        <input type="radio" name="subcontractor" value="ReadOnly">Read Only
                                        <input type="radio" name="subcontractor" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Transporter
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="transporter" value="No" checked>No
                                        <input type="radio" name="transporter" value="ReadOnly">Read Only
                                        <input type="radio" name="transporter" value="AddEdit">Add-Edit
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Workorder
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="workorder" value="No" checked>No
                                        <input type="radio" name="workorder" value="ReadOnly">Read Only
                                        <input type="radio" name="workorder" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Reporting
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="reporting" value="No" checked>No
                                        <input type="radio" name="reporting" value="ReadOnly">Read Only
                                        <input type="radio" name="reporting" value="AddEdit">Add-Edit
                                    </div>
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Work Order Materials
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="workordermaterials" value="No" checked>No
                                        <input type="radio" name="workordermaterials" value="ReadOnly">Read Only
                                        <input type="radio" name="workordermaterials" value="AddEdit">Add-Edit
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="name">Consumption
			                        </label>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="radio" name="consumption" value="No" checked>No
                                        <input type="radio" name="consumption" value="ReadOnly">Read Only
                                        <input type="radio" name="consumption" value="AddEdit">Add-Edit
                                    </div>
                                </div>

                                <h2> Assign Sites</h2>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Site
                        </label>
                                    <div class="col-md-10 col-sm-6 col-xs-12">
                                        <?php
								foreach($sites as $site)
								{ ?>
                                            <div class="col-md-3">
                                                <input type="checkbox" class="" name="site" value="<?php echo $site->sid?>" <?php if($action=='update' ){ echo $site->sid == $row[0]->sid ? 'checked' : '' ; }?>>
                                                <?php echo '('.$site->sid.') '.$site->sname;?>
                                            </div>
                                            <?php }	?>
                                    </div>
                                </div>

                                <div class="formm-group">
                                    <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" id="submit" class="btn btn-primary"><?php echo $btn;?></button>
                                        <a href="<?php echo base_url().$controller;?>" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            // Initialize select2
            $("#site").select2();
        });
    </script>
    <!-- /page content -->
    <?php
		$this->load->view('include/footer');
	?>
    <!-- Validate Js -->
    <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/underscore-min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
            _.templateSettings.variable = "element";
            var tpl = _.template($("#form_tpl").html());
            var counter = 1;

            $("body").on("click", ".btn-success", function(e) {
                e.preventDefault();
                var tplData = {
                    i: counter
                };
                $(this).closest("tr").after(tpl(tplData));
                counter += 1;
                var row_index = counter - 1;
                return false;
            });
            $('body').on('click', ".btn-danger", function() {
                var count = $('.pending-user').length;
                var value = count - 1;
                if (value >= 1) {
                    $(this).closest('.pending-user').fadeOut('fast', function() {
                        $(this).closest('.pending-user').remove();

                    });
                    return false;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var dp = $("#date").datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#demo-form2').validate({
                rules: {
                    site: {
                        required: true
                    },
                },
                messages: {
                    site: {
                        required: "Please Enter Site"
                    },
                },
                submitHandler: function(form) {
                    $(':input[type="submit"]').prop('disabled', true);
                    form.submit();
                }
            });
        });
    </script>
    <script type="text/html" id="form_tpl">
        <tr class="pending-user">
            <td>
                <select class="form-control select_width" id="material_0" name="material[]">
									<option value=""></option>
									<?php
									foreach($materials as $value)
									{ ?>
										<option value="<?php echo $value->mid?>"><?php echo $value->mname;?></option>
									<?php }	?>
								</select>
            </td>
            <td>
                <input type="text" id="qty_0" name="qty[]" class="amountonly form-control" placeholder="0.00" autocomplete="off">
            </td>
            <td>
                <select class="form-control select_width" id="m_unit_0" name="m_unit[]">
									<option value=""></option>
									<?php
									foreach($units as $value)
									{ ?>
										<option value="<?php echo $value->muid?>"><?php echo $value->muname;?></option>
									<?php }	?>
								</select>
            </td>
            <td>
                <input type="text" id="unit_0" name="unit[]" class="amountonly form-control" placeholder="0.00">
            </td>
            <td>
                <input type="text" id="remark_0" name="remark[]" class="form-control" autocomplete="off">
            </td>
            <td><a class="btn btn-sm btn-success" id="plus">+</a>
                <a class="btn btn-sm btn-danger" id="minus">-</a>
            </td>
        </tr>
    </script>