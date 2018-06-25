<?php $username = $this->session->userdata('username'); ?>
<!DOCTYPE html>  
 <html>  
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
             <div class="ModuleTile"></div>
         </div>
         <div class="col-md-2">
             <div class="ModuleTile"></div>
         </div>
         <div class="col-md-2">
             <div class="ModuleTile"></div>
         </div>
         <div class="col-md-2">
             <div class="ModuleTile"></div>
         </div>
         <div class="col-md-2">
             <div class="ModuleTile"></div>
         </div>
         <div class="col-md-2">
             <div class="ModuleTile"></div>
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

