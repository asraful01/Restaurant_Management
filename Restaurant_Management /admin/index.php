<?php
	require_once('auth.php');
?>
<?php
//checking connection and connecting to a database
require_once('connection/config.php');
//Connect to mysqli server
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	//Select database
	$db = mysqli_select_db($link,DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
    
    //define default value for flag
    $flag_1 = 1;
    ?>
   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Index</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Administrator Control Panel</h1>
 <a href="index.php">HOME |<a href="categories.php">Add-Restaurants</a> | <a href="foods.php">Add-Foods</a>  | <a href="logout.php">Logout</a>
</div>
<div>
<p style="color: #000000;font-size:30; text-align: justify; padding: 10px; vertical-align: top;"> <Strong>This is the admin page. Click on the Add-Restaurants to add a new restaurant. Click on the Add food to add foods to the restaurants.</strong> </p>
</div>

<div id="footer">
<div class="bottom_addr">&copy; 2019-Spring ASRAFUL FOOD. All Rights Reserved</div>
</div>
</div>
</body>
</html>
