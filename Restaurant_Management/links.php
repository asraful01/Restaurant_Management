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
    
    //selecting all records from the food_details table. Return an error if there are no records in the table
    $result=mysqli_query($link,"SELECT * FROM categories ")
    or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
    ?>
<?php
    if(isset($_POST['Menu'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($link,$str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysqli_real_escape_string($link,$str);
        }
        //get category id
        $id = clean($link,$_POST['category']);
        
        //selecting all records from the food_details and categories tables based on category id. Return an error if there are no records in the table
        $result=mysqli_query($link,"SELECT * FROM food_details,categories WHERE food_category='$id' AND food_details.food_category=categories.category_id ")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
    }
    ?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Asraful Restaurant:Foods</title>
<script type="text/javascript" src="swf/swfobject.js"></script>
<link href="stylesheets/user_styles.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">
<script language="JavaScript" src="validation/user.js">
</script>
</head>
<body>
<div id="page">
<div id="menu"><ul>
<li><a href="index.php">Home</a></li>
<li><a href="links.php">Restaurants</a></li>
<li><a href="specialdeals.php">Search</a></li>

<li><a href="admin/index.php" target="_blank">Administrator</a></li>
</ul>
</div>
<div id="header">
<div id="logo"> <a href="index.php" class="blockLink"></a></div>
<div id="company_name">Asraful Restaurant</div>
</div>

<div id="center">


<table width="360" align="center">
<tr>




</select></td>
</tr>
</table>
</form>
<div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<table width="860" height="auto" style="text-align:center;">
<tr>

<th>Restaurant Name</th>
<th>Location</th>
<th>Time</th>
<th>Menu</th>


</tr>

<?php
    $count = mysqli_num_rows($result);
    if(isset($_POST['Menu']) && $count < 1){
    echo "<html><script language='JavaScript'>alert('There are no foods under the selected category at the moment. Please check back later.')</script></html>";
    }
    else{
        //loop through all table rows
        //$counter = 3;
       
        while ($row=mysqli_fetch_assoc($result)){
            $id = $row['category_id'];
            echo "<tr>";
            
            echo "<td>" . $row['category_name']."</td>";
            echo "<td>". $row['category_location_1'].",". $row['category_location_2']."  </td>";
            echo "<td>" . $row['time']."</td>";

            
            echo '<td><a target="_blank" href="menu.php?id='.$id.'" >Menu</a></td>';
            echo "</td>";
            echo "</tr>";
        }
    }
    mysqli_free_result($result);
    mysqli_close($link);
    ?>


</table>
</div>
</div>
<div id="footer">
<div class="bottom_menu"><a href="index.php">Home Page</a>  |  <a href="aboutus.php">About Us</a>  |  <a href="specialdeals.php">Search</a>  |  <a href="foodzone.php">Restaurant</a>|<br>
| <a href="admin/index.php" target="_blank">Administrator</a> |</div>

<div class="bottom_addr">&copy; Asraful Restaurant. All Rights Reserved</div>
</div>
</div>
</body>
</html>
