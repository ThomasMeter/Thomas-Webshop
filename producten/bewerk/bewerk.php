<?php
require "../../config/config.php";
$conn = mysqli_query($conn,"SELECT * FROM product");
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
<table>
<tr>
<td>name</td>
<td>description</td>
<td>category_id</td>
<td>price</td>
<td>color</td>
<td>weight</td>
<td>active</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($conn)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo $row["category_id"]; ?></td>
<td><?php echo $row["price"]; ?></td>
<td><?php echo $row["color"]; ?></td>
<td><?php echo $row["weight"]; ?></td>
<td><?php echo $row["active"]; ?></td>
<td><a href="bewerk2.php?name=<?php echo $row["name"]; ?>">Update</a></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>