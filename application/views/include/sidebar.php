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

<div class="navbar nav_title">
    <a href="<?php echo base_url();?>" class="site_title">Construction Analytics 2018</a>

    <?php if($user_module != 0){ ?>
    <a href="<?php echo base_url(); ?>user" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                USER
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($site_module != 0){ ?>
    <a href="<?php echo base_url(); ?>site" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                SITE
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($material_module != 0){ ?>
    <a href="<?php echo base_url(); ?>material" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Materials
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($vendor_module != 0){ ?>
    <a href="<?php echo base_url(); ?>index.php/vendor" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                vendor
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($mr_module != 0){ ?>
    <a href="<?php echo base_url(); ?>material_rqst" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                material request
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($po_module != 0){ ?>
    <a href="<?php echo base_url(); ?>po" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Purchase Order
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($rtv_module != 0){ ?>
    <a href="<?php echo base_url(); ?>rtv" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Return To Vendor
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($cp_module != 0){ ?>
    <a href="<?php echo base_url(); ?>cp" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Cash Purchase
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($uogrn_module != 0){ ?>
    <a href="<?php echo base_url(); ?>grn" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Goods Received
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($moveorder_module != 0){ ?>
    <a href="<?php echo base_url(); ?>mo" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Move Order
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($vendorbills_module != 0){ ?>
    <a href="<?php echo base_url(); ?>vendor_bills" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Vendor Bills
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($subcontractor_module != 0){ ?>
    <a href="<?php echo base_url(); ?>subcont" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Sub-Contractors
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($transporter_module != 0){ ?>
    <a href="<?php echo base_url(); ?>transporter" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Transporters
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($workorder_module != 0){ ?>
    <a href="<?php echo base_url(); ?>wo" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Work Order
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($workordermaterials_module != 0){ ?>
    <a href="<?php echo base_url(); ?>workitem" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                Work Items
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($consumption_module != 0){ ?>
    <a href="<?php echo base_url(); ?>consumption" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                                Consumption
            </div>
        </div>
    </a>
    <?php } ?>

    <?php if($reporting_module != 0){ ?>
    <a href="<?php echo base_url(); ?>Reporting" target="_blank">
        <div class="SidebarModuleTile">
            <div class="SidebarModuleHeading">
                            Reporting
            </div>
        </div>
    </a>
    <?php } ?>





</div>
