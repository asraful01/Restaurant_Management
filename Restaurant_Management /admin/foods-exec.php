<?php
    //Start session
    session_start();
    
    //Include database connection details
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
    
    //Function to sanitize values received from the form. Prevents sqli injection
    function clean($link,$str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysqli_real_escape_string($link,$str);
    }
    
    //setup a directory where images will be saved 
    
    
    //Sanitize the POST values
    $name = clean($link,$_POST['name']);
    $description = clean($link,$_POST['description']);
    $price = clean($link,$_POST['price']);
    $category = clean($link,$_POST['category']);
    

    //Create INSERT query
    $qry = "INSERT INTO food_details(food_name, food_description, food_price, food_category) VALUES('$name','$description','$price','$category')";
    $result = @mysqli_query($link,$qry);
    
    //Check whether the query was successful or not
    if($result) {
            //Writes the photo to the server 
         $moved = move_uploaded_file($_FILES['photo']['tmp_name'], $target);
         
         if($moved) 
         {      
             //everything is okay
             echo "The photo ". basename( $_FILES['photo']['name']). " has been uploaded, and your information has been added to the directory"; 
         } else {  
             //Gives an error if its not okay 
             echo "Sorry, there was a problem uploading your photo. "  . $_FILES["photo"]["error"]; 
         }
        header("location: foods.php");
        exit();
    }else {
        die("Query failed " . mysqli_error());
    } 
 ?>
