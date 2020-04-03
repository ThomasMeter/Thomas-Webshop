<?php

require "../config/config.php";  

// // overzicht.php
// $sql = 'SELECT * FROM producten';

// //producten_toevoegen.php
// // Hieronder wordt 1 lange string gemaakt over meerdere regels
// $sql = 'INSERT INTO producten (titel, prijs) VALUES("'.$titel.'",
//         "'.$prijs.'")';

// // pers_change.php
// // Hier worden korte strings aan elkaar geplakt met punt-is (.=)
// $sql = 'UPDATE producten SET titel = "'.$titel.'", WHERE id_product = '.$id;

// // pers_delete.php
// $sql = 'DELETE FROM producten WHERE id = '.$id;
if(isset($_POST['submit'])){
$name = $conn->real_escape_string($_POST['name']);
$description = $conn->real_escape_string($_POST['description']);
$category_id = $conn->real_escape_string($_POST['category_id']);
$price = $conn->real_escape_string($_POST['price']);
$color = $conn->real_escape_string($_POST['color']);
$weight = $conn->real_escape_string($_POST['weight']);




// Adds to database 
$sql = "INSERT INTO `product` (`name`, `description`, `category_id`, `price`, `color`, `weight`) 
    VALUES('$name','$description','$category_id','$price','$color','$weight')";

if ($conn->query($sql) === TRUE) {
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product toevoegen</title>
    <link rel="stylesheet" href="../assets/css/hoofd.css">
 

</head>
<body>

<ul>
  <li><a href="products.php">Product toevoegen</a></li>
  <li><a href="bewerk/bewerk.php">Product bewerken</a></li>
  <li><a href="delete/delete.php">Product verwijderen</a></li>
  <li><a href="webshop.php">Webshop</a></li>
</ul>


<br><br>
<form method="post">
  <tr>
    <td>Product Name</td> 
    <td><label>
        <input type="text" name="name"/>
    </label></td>
  </tr>
  <br>
  <br>  
  <tr>
    <td>description</td>
    <td><label>
        <textarea name="description"   size="64" ></textarea>
    </label></td>
  </tr>
  <br>
  <tr>
    <td>category_id</td>
    <td><label>
        <input type="text" name="category_id"   size="64" />
    </label></td>
  </tr>  
  <br>
  <tr>
    <td>price</td>
    <td><label>
        <input type="text" name="price"  size="64" />
    </label></td>
  </tr>
  <br>
  <tr>
    <td>color</td>
    <td><label>
        <input type="text" name="color"   size="64" />
    </label></td>
  </tr>
  <br>
  <tr>
    <td>weight</td>
    <td><label>
        <input type="text" name="weight"   size="64" />
    </label></td>
  </tr>
  <tr>
    


  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="submit" />
    </label></td>
  </tr>
</table>
</form>
    
</body>
</html>