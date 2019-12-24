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
//retrive categories from the categories table
$result=mysqli_query($link,"SELECT * FROM categories")
or die("There are no records to display ... \n" . mysqli_error());
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Restaurants</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Administrator Control Panel</h1>
<a href="index.php">HOME |<a href="categories.php">Add-Restaurants</a> | <a href="foods.php">Add-Foods</a> |  <a href="logout.php">Logout</a>
</div>
<div id="container">
<table width="700" align="center">
<CAPTION><h3>ADD A NEW RESTAURANT</h3></CAPTION>
<form name="categoryForm" id="categoryForm" action="categories-exec.php" method="post" onsubmit="return categoriesValidate(this)">
<tr>
    <th>Name</th>
    <th>Loc. Coordinate 1</th>
    <th>Loc. Coordinate 2</th>
    <th>Hours</th>
    <th>Action(s)</th>
</tr>
<tr>
    <td><input type="text" name="name" class="textfield" /></td>
    <td><input type="number" name="name-loc1" class="textfield" /></td>
    <td><input type="number" name="name-loc2" class="textfield" /></td>
<td><textarea name="name2" class="textfield" rows="2" cols="15"></textarea></td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</form>
</table>
<hr>
<table width="700" align="center">
<CAPTION><h3>AVAILABLE Restaurants</h3></CAPTION>
<tr>
<th>Name</th>
<th>Locations</th>
<th>Hours</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['category_name']."</td>";

    echo "<td>". $row['category_location_1'].",". $row['category_location_2']."  </td>";
    echo "<td>". $row['time']."</td>";

  
echo '<td><a href="delete-category.php?id=' . $row['category_id'] . '">Remove Restaurant</a></td>';
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($link);
?>
</table>
<hr>
</div>
<div id="footer">
<div class="bottom_addr">&copy; 2019-Spring ASRAFUL FOOD. All Rights Reserved</div>
</div>
</div>
</body>
</html>
