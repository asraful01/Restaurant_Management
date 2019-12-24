<?php
//Start session
session_start();

//Include database connection details
require_once('connection/config.php');

//Connect to mysqli server
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$link) {
    die('Failed to connect to server: ' . mysqli_error());
}

//Select database
$db = mysqli_select_db($link, DB_DATABASE);
if (!$db) {
    die("Unable to select database");
}

//Function to sanitize values received from the form. Prevents sqli injection
function clean($link, $str)
{
    $str = @trim($str);
    if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysqli_real_escape_string($link, $str);
}

//Sanitize the POST values
$name = clean($link, $_POST['name']);
$name_loc1 = clean($link, $_POST['name-loc1']);
$name_loc2 = clean($link, $_POST['name-loc2']);
$name2 = clean($link, $_POST['name2']);


//Create INSERT query
$qry = "INSERT INTO categories(category_name,category_location_1,category_location_2,time) VALUES('$name','$name_loc1','$name_loc2','$name2')";
$result = @mysqli_query($link, $qry);

//Check whether the query was successful or not
if ($result) {
    header("location: categories.php");
    exit();
} else {
    die("Query failed " . mysqli_error($link));
}
?>
