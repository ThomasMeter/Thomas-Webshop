<?php
require "../../config/config.php";

if(isset($_POST['submit'])) {
  
    $mysqli  = ("UPDATE product set id = name='" . $_POST['name'] . "'
    , description='" . $_POST['description'] . "', category_id='" . $_POST['category_id'] . "' 
    ,price='" . $_POST['price'] .  "' , color='" . $_POST['color'] . "' WHERE name='" . $_POST['name'] . "'");
    $result = mysqli_query($conn, $mysqli) or die('Cannot update data in database. '.mysqli_error($conn));
   

}
$result = mysqli_query($conn,"SELECT * FROM product WHERE name='" . $_GET['name'] . "'");
$row= mysqli_fetch_array($result);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product updaten</title>
    <link rel="stylesheet" href="../../assets/css/hoofd.css">
</head>
<body>

<ul>
  <li><a href="../products.php">Product toevoegen</a></li>
  <li><a href="bewerk.php">Product bewerken</a></li>
  <li><a href="../delete/delete.php">Product verwijderen</a></li>
  <li><a href="webshop.php">Webshop</a></li>
</ul>
<body>
<form method="POST" action="">
name: <br>
<input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
<br>
description: <br>

<?php echo '<textarea name="description">', $row['description'];?></textarea>
<br>
category_id :<br>
<input type="text" name="category_id" class="txtField" value="<?php echo $row['category_id']; ?>">
<br>
price:<br>
<input type="text" name="price" class="txtField" value="<?php echo $row['price']; ?>">
<br>
color:<br>
<input type="text" name="color" class="txtField" value="<?php echo $row['color']; ?>">
<br>
weight:<br>
<input type="text" name="weight" class="txtField" value="<?php echo $row['weight']; ?>">
<br>
active:
<input type="text" name="active" class="txtField" value="<?php echo $row['active']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>