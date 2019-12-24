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
<div id="page">
  <div id="menu"><ul>
  <li><a href="index.php">Home</a></li>

  <li><a href="links.php">Restaurants</a></li>

<li><a href="specialdeals.php">Search</a></li>

    <li><a href="admin/index.php" target="_blank">Administrator</a></li>
  </ul>
  </div>
<div id="header" class="stretchX">
    <div id="logo"> <a href="index.php" class="blockLink"></a></div>
    <div id="company_name">Asraful Restaurant</div>
</div>
<div id="center">
  <h1><center>Welcome To Asraful Restaurant!</center></h1>
      <div class="body_text">
  Click on the <strong>Restaurant</strong> to see the available Restaurants and their <strong>menu</strong>.
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
