<?php
	//checking connection and connecting to a database
	require_once('connection/config.php');
	//Connect to mymysqli server
	$link = mymysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mymysqli_error());
	}
	
	//Select database
	$db = mymysqli_select_db($link,DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
 
 //Function to sanitize values received from the form. Prevents mysqli injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mymysqli_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$OldPassword = clean($_POST['opassword']);
	$NewPassword = clean($_POST['npassword']);
	$ConfirmNewPassword = clean($_POST['cpassword']);
	
     // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
         // get id value
         $id = $_GET['id'];
         
         // update the entry
         $result = mymysqli_query("UPDATE pizza_admin SET Password='$NewPassword' WHERE Admin_ID='$id' AND Password='$OldPassword'")
         or die("The admin does not exist ... \n". mymysqli_error());
         
         // redirect back to the member profile
         header("Location: profile.php");
     }
     else
     // if id isn't set, give an error
     {
        die("Password changing failed ..." . mymysqli_error());
     }
 
?>
