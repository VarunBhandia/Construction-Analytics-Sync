<?php $username = $this->session->userdata('username'); ?>
<!DOCTYPE html>  
<html style="overflow-x: hidden;">  
    <head>  
        <title>Welcome <?php echo $username; ?></title>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/icons/favicon.ico"/>
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
        <style>
            .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto{
                position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 1px;
    padding-left: 1px;
            }
        </style>
    </head>  
    
    <body>  
        <div class="topHeader">
            <div class="row">
                <div class="col-md-10">
                    <h4 class="welcomeUser">Welcome - <?php echo $username ?></h4>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info" style="background-color: #0aa7ff;float: right;"><a  class="Logout" href="<?php echo base_url().'main/logout' ?> ">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="row padding1">
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>user" target="_blank">
                    <div class="ModuleTile" style="background-color:#8ec127">
                        <div class="ModuleHeading" >
                            USER
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>site" target="_blank">
                    <div class="ModuleTile" style="background-color:#00aba9">
                        <div class="ModuleHeading">
                            SITE
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>material" target="_blank">
                    <div class="ModuleTile" style="background-color:#f47835">
                        <div class="ModuleHeading">
                            Materials
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>index.php/vendor" target="_blank">
                    <div class="ModuleTile" style="background-color:#d41243">
                        <div class="ModuleHeading">
                            Vendors
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>material_rqst" target="_blank">
                    <div class="ModuleTile" style="background-color:#00c0ef">
                        <div class="ModuleHeading">
                            Material Request
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>po" target="_blank">
                    <div class="ModuleTile" style="background-color:#36d278">
                        <div class="ModuleHeading">
                            Purchase Order
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>rtv" target="_blank">
                    <div class="ModuleTile" style="background-color:#603cba">
                        <div class="ModuleHeading">
                            Return To Vendor
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>cp" target="_blank">
                    <div class="ModuleTile" style="background-color:#ee0c51">
                        <div class="ModuleHeading">
                            Cash Purchase
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>grn" target="_blank">
                    <div class="ModuleTile" style="background-color:#c127ac">
                        <div class="ModuleHeading">
                            Goods Received
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>" target="_blank">
                    <div class="ModuleTile" style="background-color:#c2d113">
                        <div class="ModuleHeading">
                            Terms and Conditions
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>mo" target="_blank"> 
                    <div class="ModuleTile" style="background-color:#db2c00">
                        <div class="ModuleHeading">
                            Move Order
                        </div>
                    </div>
                </a>
            </div>
<!--
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>office" target="_blank">
                    <div class="ModuleTile" style="background-color:#8ec127">
                        <div class="ModuleHeading">
                            New Offices
                        </div>
                    </div>
                </a>
            </div>
-->
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>subcont" target="_blank">
                    <div class="ModuleTile" style="background-color:#005cfb">
                        <div class="ModuleHeading">
                            Sub-Contractors
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>transporter" target="_blank">
                    <div class="ModuleTile" style="background-color:#8ec127">
                        <div class="ModuleHeading">
                            Transporters
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>workorder" target="_blank">
                    <div class="ModuleTile" style="background-color:#8ec127">
                        <div class="ModuleHeading">
                            Work Order
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>workitem" target="_blank">
                    <div class="ModuleTile" style="background-color:#8ec127">
                        <div class="ModuleHeading">
                            Work Items
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" target="_blank">

                    <div class="ModuleTile" style="background-color:#8ec127">
                        <div class="ModuleHeading">
                            Work Order
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" target="_blank">
                    <a href="<?php echo base_url(); ?>consumption" target="_blank">
                        <div class="ModuleTile" style="background-color:#8ec127">
                            <div class="ModuleHeading">
                                Consumption
                            </div>
                        </div>
                    </a>
                </a></div>
            <div class="col-md-2">
                <a href="#" target="_blank">
                    <div class="ModuleTile" style="background-color:#8ec127">
                        <div class="ModuleHeading">
                            Reporting
                        </div>
                    </div>
                </a>
            </div>
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
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
    </body>  
</html>  

