<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<script language="JavaScript">
	function selectAll(source) {
		checkboxes = document.getElementsByName('site[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	}
</script>
<form action="">
    <input type="checkbox" id="selectall" onClick="selectAll(this)" />Select All<br>
    <div class="row">

    <?php 
    foreach($groups as $row)
    {  echo '<div class="col-md-3">';
        echo '<input type="checkbox" class="group1" name="site[]" value="'.$row->sid.'">('.$row->sid.') '.$row->sname;
     echo '</div>';
    }
    ?>
</div>
  <input type="submit" value="Submit">
</form>
    </body>
</html>