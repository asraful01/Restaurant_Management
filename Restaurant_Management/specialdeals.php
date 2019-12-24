<?php
    //checking connection and connecting to a database
    require_once('connection/config.php');
    //Connect to mysql server
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if(!$link) {
        die('Failed to connect to server: ' . mysqli_error());
    }
    
    //Select database
    $db = mysqli_select_db($link,DB_DATABASE);
    if(!$db) {
        die("Unable to select database");
    }
    
    //retrieve questions from the questions table
    //$questions=mysqli_query($link,"SELECT * FROM questions")
    //or die("Something is wrong ... \n" . mysqli_error());
    ?>

<?php
    //setting-up a remember me cookie
    if (isset($_POST['Submit'])){
        //setting up a remember me cookie
        if($_POST['remember']) {
            $year = time() + 31536000;
            setcookie('remember_me', $_POST['login'], $year);
        }
        else if(!$_POST['remember']) {
            if(isset($_COOKIE['remember_me'])) {
                $past = time() - 100;
                setcookie(remember_me, gone, $past);
            }
        }
    }
    ?>
<?php
    $output = '';
    // collect
    if (isset($_POST['search'])) {
        $searchq = $_POST['search'];
        $searchq = preg_replace("#^[1-8](,[1-8])*$#i","",$searchq);
        $arr = explode(',', $searchq);
        $loc1 = 0;
        $loc2 = 0;
        if(!empty($arr)){
            $loc1 = $arr[0];
            $loc2 = $arr[0];
        }
        $query = mysqli_query($link,"SELECT category_name,category_location_1,category_location_2 FROM categories WHERE category_location_1<='$loc1' AND category_location_2<='$loc2' ORDER BY category_location_1 asc, category_location_2 asc") or die("Could not search.");
        $count = mysqli_num_rows($query);
        if($count == 0) {
            $output = 'No results found.';
        } else {
            $output .= '<div><ul>';
            while($row = mysqli_fetch_assoc($query)) {
                $itemname = $row['category_name'];
                $description = $row['category_location_1'] . ",". $row['category_location_2'];
               
                $output .= '<li>';
                $output .= '<div>'.$itemname.' -------- '.$description.'</div>';
            }
            $output .= '</ul></div>';
        }
    }
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Asraful KITCHEN:Home</title>
<link href="stylesheets/user_styles.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">
<script language="JavaScript" src="validation/user.js">
</script>
</head>
<body>
<style>
.center input[type=text] {
    float: center;
padding: 6px;
border: box;
    margin-top: 8px;
    margin-right:8px;
    font-size: 17px;
    border-color:black;
}
.center input[type=submit] {
    float: center;
padding: 6px;
border: relative;
    margin-top: 8px;
    margin-right:8px;
    font-size: 17px;
    border-color:black;
}

</style>
<div id="page">
<div id="menu"><ul>
<li><a href="index.php">Home</a></li>
<li><a href="links.php">Restaurants</a></li>
<li><a href="specialdeals.php">Search</a></li>
<li><a href="admin/index.php" target="_blank">Administrator</a></li>
</ul>
</div>
<div id="center">
<div class="center">
<h2><center>Search For Location!</center></h2>
<form action="" method="post">
<input type="text" name="search" placeholder="Search locations...">
<input type="submit" value="Search" />
</form>
</div>

<?php
    echo $output;
    ?>


</div>



<hr>
</div>
<div id="footer">
<div class="bottom_menu"><a href="index.php">Home Page</a>  |  <a href="aboutus.php">About Us</a>  |  <a href="specialdeals.php">Search</a>  |  <a href="foodzone.php">Restaurant</a>|<br>
| <a href="admin/index.php" target="_blank">Administrator</a> |</div>

<div class="bottom_addr">&copy; Asraful Restaurant. All Rights Reserved</div>
</div>
</div>
</body>
</html>
