<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Webslesson | <?php echo $title; ?></title>  
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
<!--===============================================================================================-->
 </head>  
 <body>  
      <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url(); ?>images/img-01.png" alt="IMG">
				</div>  
           <form method="post" action="<?php echo base_url(); ?>main/login_validation" class="login100-form validate-form">  <span class="login100-form-title">
						Construction Analytics
					</span>
                <div class="wrap-input100 validate-input">  
                     <input type="text" name="username" class="input100" placeholder="Username" /> 
                    <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
<!--                     <span class="text-danger"><?php echo form_error('username'); ?></span>                 -->
                </div>  
                <div class="wrap-input100 validate-input">  
                     <input type="password" name="password" class="input100" placeholder="Password" />  
<!--                     <span class="text-danger"><?php echo form_error('password'); ?></span>  -->
                    						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>

                </div>  
                <div class="container-login100-form-btn">  
                     <input type="submit" name="insert" value="Login" class="btn btn-info" class="login100-form-btn" />  
                     <?php  
    echo '<label class="text-danger">'.$this->session->flashdata ("error").'</label>';  ?>
                </div>  
           </form>  
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

