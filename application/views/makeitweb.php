<!doctype html>
<html>
    <head>
        <title>How to delete file with jQuery AJAX</title>
        
        <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>" type='text/javascript'></script>
        <script src="<?php echo base_url('assets/select2/dist/js/select2.min.js')?>" type='text/javascript'></script>

        <link href="<?php echo base_url('assets/select2/dist/css/select2.min.css')?>" rel='stylesheet' type='text/css'>
    </head>
    <body>
        
        <!-- Dropdown -->       
        <select id='' style='width: 200px;'>
            <option value='0'>-- Select User --</option>          
            <option value='1'>12 Yogesh singh</option>  
            <option value='2'>Sonarika Bhadoria</option>   
            <option value='3'>Anil Singh</option>        
            <option value='4'>Vishal Sahu</option>        
            <option value='5'>Mayank Patidar</option>        
            <option value='6'>Vijay Mourya</option>        
            <option value='7'>Rakesh sahu</option> 
        </select>   

        <input type='button' value='Seleted option' id='but_read'>

        <br/>
        <div id='result'></div>

        <!-- Script -->
        <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#selUser").select2();

            // Read selected option
            $('#but_read').click(function(){
                var username = $('#selUser option:selected').text();
                var userid = $('#selUser').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });
        });
        </script>
    </body>
</html>