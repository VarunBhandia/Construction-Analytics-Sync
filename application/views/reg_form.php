<html>
<head>
<title>Codeigniter Form Dropdown</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>acript/script.js"></script>
</head>
<body>
<div class="main">
<div id="content">
<h2>Form Dropdown In Codelgniter</h2><br/>
<div id="message"></div>
<hr>
<?php
echo "<h3>Single Selection Dropdown</h3>";
echo form_open('form/data_submitted');
$options = array(
'Computer Science Engineering' => 'Computer Science Engineering',
'Electronics and Comm. Engineering' => 'Electronics and Comm. Engineering',
'Mechanical Engineering' => 'Mechanical Engineering',
'Civil Engineering' => 'Civil Engineering',
);
echo "<div class='drop_pos'>";
echo form_dropdown('Department', $options, 'Computer Science Engineering', 'class="dropdown_box1"');
if (isset($result)) {
$db_value = array();

foreach ($result as $value) {
$db_value[] = $value;
}
$single_sel = $db_value[0];
//Converting string to array
$mul_selection = unserialize($db_value[1]);
}
if (isset($single_sel)) {
echo "<p><b>You have selected :</b>&nbsp;&nbsp;";
echo "<ul>";
echo "<li>" . $single_sel . "</li>";
}
echo "</p>";
echo "</ul>";
echo "</div>";
echo "<hr/>";
?>
<?php
echo "<h3>Multiple Selection Dropdown</h3>";
$options = array(
'C' => 'C',
'C++' => 'C++',
'ORACLE' => 'Oracle',
'JAVA' => 'Java',
'DATABASE' => 'Database',
'PHP' => 'Php'
);
$selected = array('C', 'ORACLE');
echo "<div class='drop_pos'>";
echo "<p><font color='red'><b>Note:</b></font>&nbsp;&nbsp;<b>To Select Multiple Options Press<br/> ctrl+left click</b></p>";
echo form_dropdown('Technical_skills[]', $options, $selected, 'class="dropdown_box2"');
if (isset($mul_selection)) {
echo "<p><b>You have selected :</b>";
echo "<ul>";
foreach ($mul_selection as $value) {
echo "<li>" . $value . "</li>";
}
}
echo "</ul>";
echo "</p>";
echo "</div>";
?>
<div id="form_button">
<?php echo form_submit('submit', 'submit', 'class="submit"'); ?>
</div>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>