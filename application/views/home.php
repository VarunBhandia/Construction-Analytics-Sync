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
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     USER
                 </div>
             </div>
                 </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>site" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     SITE
                 </div>
             </div>
             </a>
         </div>
             
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>unit" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Units

                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>category" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Category
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>material" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Materials
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>index.php/vendor" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Vendors
                 </div>
             </div>
             </a>
         </div>
     </div>
          
     <div class="row padding1">
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>material_rqst" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Material Request
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>po" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Purchase Order
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>rtv" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Return To Vendor
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>cp" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Cash Purchase
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>grn" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Goods Received
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>vbill" target="_blank">
             <div class="ModuleTile">
                <div class="ModuleHeading">
                Vendor Bills 
                 </div>
             </div>
            </a>
    </div>        
         
          
     <div class="row padding1">
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                    Terms and Conditions
                 </div>
                </div>
                </a>
            </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>mo" target="_blank"> 
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Move Order
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>office" target="_blank">
            <div class="ModuleTile">
                 <div class="ModuleHeading">
                     New Offices
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>subcont" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Sub-Contractors
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>transporter" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Transporters
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>workorder" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Work Order
                 </div>
             </div>
             </a>
         </div>
     </div>
          
     <div class="row padding1">
         <div class="col-md-2">
            <a href="<?php echo base_url(); ?>workitem" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Work Items
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="#" target="_blank">
                
                         <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Work Order
                 </div>
             </div>
             </a>
         </div>
         <div class="col-md-2">
            <a href="#" target="_blank">
            <a href="<?php echo base_url(); ?>consumption" target="_blank">
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Consumption
                 </div>
             </div>
             </a>
             </a></div>
         <div class="col-md-2">
                       <a href="#" target="_blank">

            
             <div class="ModuleTile">
                 <div class="ModuleHeading">
                     Reporting
                 </div>
             </div>
             </a>
         </div>
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

