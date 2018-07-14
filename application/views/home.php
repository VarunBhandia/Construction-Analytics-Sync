<?php $username = $this->session->userdata('username'); ?>
<!DOCTYPE html>
<html style="overflow-x: hidden;">

    <head>
        <title>Welcome
            <?php echo $username; ?>
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/icons/favicon.ico" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/util.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
        <!--===============================================================================================-->
<!--
        <style>
            .col,
            .col-1,
            .col-10,
            .col-11,
            .col-12,
            .col-2,
            .col-3,
            .col-4,
            .col-5,
            .col-6,
            .col-7,
            .col-8,
            .col-9,
            .col-auto,
            .col-lg,
            .col-lg-1,
            .col-lg-10,
            .col-lg-11,
            .col-lg-12,
            .col-lg-2,
            .col-lg-3,
            .col-lg-4,
            .col-lg-5,
            .col-lg-6,
            .col-lg-7,
            .col-lg-8,
            .col-lg-9,
            .col-lg-auto,
            .col-md,
            .col-md-1,
            .col-md-10,
            .col-md-11,
            .col-md-12,
            .col-md-2,
            .col-md-3,
            .col-md-4,
            .col-md-5,
            .col-md-6,
            .col-md-7,
            .col-md-8,
            .col-md-9,
            .col-md-auto,
            .col-sm,
            .col-sm-1,
            .col-sm-10,
            .col-sm-11,
            .col-sm-12,
            .col-sm-2,
            .col-sm-3,
            .col-sm-4,
            .col-sm-5,
            .col-sm-6,
            .col-sm-7,
            .col-sm-8,
            .col-sm-9,
            .col-sm-auto,
            .col-xl,
            .col-xl-1,
            .col-xl-10,
            .col-xl-11,
            .col-xl-12,
            .col-xl-2,
            .col-xl-3,
            .col-xl-4,
            .col-xl-5,
            .col-xl-6,
            .col-xl-7,
            .col-xl-8,
            .col-xl-9,
            .col-xl-auto {
                position: relative;
                width: 100%;
                min-height: 1px;
                padding-right: 1px;
                padding-left: 1px;
            }

        </style>
-->
    </head>

    <body>
        <div class="topHeader">
            <div class="row">
                <div class="col-md-9 col-xs-8 ">
                    <h4 class="welcomeUser">Welcome -
                        <?php echo $username ?>
                    </h4>
                </div>
                <div class="col-md-3 col-md-3">
                    <button class="btn btn-info" style="background-color: black;float: right;"><a  class="Logout" href="<?php echo base_url().'main/logout' ?> ">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="topSecondHeader">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="consAnal">CONSTRUCTION ANALYTICS 2018</h4>
                </div>
            </div>
        </div>
        <?php
    $user_module = $user_roles[0]->user_role;
                        $site_module = $user_roles[0]->site_role;
                        $material_module = $user_roles[0]->material;
                        $vendor_module = $user_roles[0]->vendor;
                        $mr_module = $user_roles[0]->mr;
                        $po_module = $user_roles[0]->po;
                        $rtv_module = $user_roles[0]->rtv;
                        $cp_module = $user_roles[0]->cp;
                        $uogrn_module = $user_roles[0]->uogrn;
                        $vendorbills_module = $user_roles[0]->vendorbills;
                        $vendorbillpayment_module = $user_roles[0]->vendorbillpayment;
                        $moveorder_module = $user_roles[0]->moveorder;
                        $officegstdetails_module = $user_roles[0]->officegstdetails;
                        $subcontractor_module = $user_roles[0]->subcontractor;
                        $transporter_module = $user_roles[0]->transporter;
                        $workorder_module = $user_roles[0]->workorder;
                        $reporting_module = $user_roles[0]->reporting;
                        $workordermaterials_module = $user_roles[0]->workordermaterials;
                        $consumption_module = $user_roles[0]->consumption;
        ?>
        <div class="row padding1">
            <?php if($user_module != 0){ ?>
            <div class="col-md-2 col-xs-6">
                <a href="<?php echo base_url(); ?>user" target="_blank">
                    <div class="ModuleTile" style="background-color:#8ec127">
                        <div class="countData">
                            <?php echo $Count_users;?>
                        </div> 
                        <div class="ModuleHeading">
                            USER
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>

            <div class="col-md-2 col-xs-6">
                <?php if($site_module != 0){ ?>
                <a href="<?php echo base_url(); ?>site" target="_blank">
                    <div class="ModuleTile" style="background-color:#00aba9">
                        <div class="countData">
                            <?php echo $Count_sitedetails;?>
                        </div> 

                        <div class="ModuleHeading">
                            SITE
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($material_module != 0){ ?>
            <div class="col-md-2 col-xs-6">
                <a href="<?php echo base_url(); ?>material" target="_blank">
                    <div class="ModuleTile" style="background-color:#f47835">
                        <div class="countData">
                            <?php echo $Count_materials;?>
                        </div> 

                        <div class="ModuleHeading">
                            Materials
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($vendor_module != 0){ ?>
            <div class="col-md-2 col-xs-6">
                <a href="<?php echo base_url(); ?>index.php/vendor" target="_blank">
                    <div class="ModuleTile" style="background-color:#d41243">
                        <div class="countData">
                            <?php echo $Count_vendordetails;?>
                        </div> 

                        <div class="ModuleHeading">
                            Vendors
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($mr_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>material_rqst" target="_blank">
                    <div class="ModuleTile" style="background-color:#00c0ef">
                        <div class="countData">
                            <?php echo $Count_material_rqst;?>
                        </div> 

                        <div class="ModuleHeading">
                            Material Request
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($po_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>po" target="_blank">
                    <div class="ModuleTile" style="background-color:#36d278">
                        <div class="countData">
                            <?php echo $Count_po_master;?>
                        </div> 

                        <div class="ModuleHeading">
                            Purchase Order
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($rtv_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>rtv" target="_blank">
                    <div class="ModuleTile" style="background-color:#603cba">
                        <div class="countData">
                            <?php echo $Count_rtv_master;?>
                        </div> 

                        <div class="ModuleHeading">
                            Return To Vendor
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($cp_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>cp" target="_blank">
                    <div class="ModuleTile" style="background-color:#ee0c51">
                        <div class="countData">
                            <?php echo $Count_cp_master;?>
                        </div> 

                        <div class="ModuleHeading">
                            Cash Purchase
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($uogrn_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>grn" target="_blank">
                    <div class="ModuleTile" style="background-color:#c127ac">
                        <div class="countData">
                            <?php echo $Count_grn_master;?>
                        </div> 

                        <div class="ModuleHeading">
                            Goods Received
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($moveorder_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>mo" target="_blank">
                    <div class="ModuleTile" style="background-color:#db2c00">
                        <div class="countData">
                            <?php echo $Count_mo_master;?>
                        </div> 

                        <div class="ModuleHeading">
                            Move Order
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($vendorbills_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>vendor_bills" target="_blank">
                    <div class="ModuleTile" style="background-color:#db2c00">
                        <div class="countData">
                            <?php echo $Count_vendor_bills_master;?>
                        </div> 

                        <div class="ModuleHeading">
                            Vendor Bills
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($subcontractor_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>subcont" target="_blank">
                    <div class="ModuleTile" style="background-color:#005cfb">
                        <div class="countData">
                            <?php echo $Count_subcontdetails;?>
                        </div> 

                        <div class="ModuleHeading">
                            Sub-Contractors
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($transporter_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>transporter" target="_blank">
                    <div class="ModuleTile" style="background-color:#26f7f4">
                        <div class="countData">
                            <?php echo $Count_transporters;?>
                        </div> 

                        <div class="ModuleHeading">
                            Transporters
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($workorder_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>wo" target="_blank">
                    <div class="ModuleTile" style="background-color:#ff00bf">
                        <div class="countData">
                            <?php echo $Count_wo_master;?>
                        </div> 

                        <div class="ModuleHeading">
                            Work Order
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($workordermaterials_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>workitem" target="_blank">
                    <div class="ModuleTile" style="background-color:#ffc107">
                        <div class="countData">
                            <?php echo $Count_workitems;?>
                        </div> 

                        <div class="ModuleHeading">
                            Work Items
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
            <?php if($consumption_module != 0){ ?>
            <div class="col-md-2">
                <a href="#" target="_blank">
                    <a href="<?php echo base_url(); ?>consumption" target="_blank">
                        <div class="ModuleTile" style="background-color:#28a745">
                            <div class="countData">
                                <?php echo $Count_consumption;?>
                            </div> 

                            <div class="ModuleHeading">
                                Consumption
                            </div>
                        </div>
                    </a>
                </a>
            </div>
            <?php } ?>
            <?php if($reporting_module != 0){ ?>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>Reporting" target="_blank">
                    <div class="ModuleTile" style="background-color:#17a2b8">
                        <div class="countData">
                            <?php echo $Count_users;?>
                        </div> 

                        <div class="ModuleHeading">
                            Reporting
                        </div>
                    </div>

                </a>
            </div>
            <?php } ?>
        </div>

        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>vendor/bootstrap/js/popper.js"></script>
        <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo base_url(); ?>vendor/tilt/tilt.jquery.min.js"></script>
        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })

        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
    </body>

</html>
