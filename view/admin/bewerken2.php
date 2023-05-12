<?php
require "../../config/config.php";

if(isset($_POST['submit'])) {
  
    $mysqli  = ("UPDATE user set id = firstname='" . $_POST['firstname'] . "'
    , middleName='" . $_POST['middleName'] . "', lastName='" . $_POST['lastName'] . "' 
    ,birthDate='" . $_POST['birthDate'] .  "' , e-mailadres='" . $_POST['e-mailadres'] . "' password='" . $_POST['password'] . "' WHERE firstname='" . $_POST['firstname'] . "'");
    $result = mysqli_query($conn, $mysqli) or die('Cannot update data in database. '.mysqli_error($conn));
   

}
    $result = mysqli_query($conn,"SELECT * FROM `user` WHERE firstname='" . $_GET['firstname'] . "'");
    $row= mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product updaten</title>
    <link rel="stylesheet" href="../../assets/css/hoofd.css">
</head>
<body>

<ul>
    <li><a href="overzicht.php">admin overzicht</a></li>
    <li><a href="toevoegen.php">admin toevoegen</a></li>
    <li><a href="bewerken.php">admin bewerken</a></li>
    <li><a href="deleten.php">admin verwijderen</a></li>
</ul>
<body>
<form method="POST" action="">
name: <br>
<input type="text" name="firstname" class="txtField" value="<?php echo $row['firstname']; ?>">
<br>
description: <br>

<input type="text" name="middleName" class="txtField" value="<?php echo $row['middleName']; ?>">
<br>
category_id :<br>
<input type="text" name="lastName" class="txtField" value="<?php echo $row['lastName']; ?>">
<br>
price:<br>
<input type="text" name="birthDate" class="txtField" value="<?php echo $row['birthDate']; ?>">
<br>
color:<br>
<input type="text" name="e-mailadres" class="txtField" value="<?php echo $row['e-mailadres']; ?>">
<br>
weight:<br>
<input type="text" name="password" class="txtField" value="<?php echo $row['password']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>