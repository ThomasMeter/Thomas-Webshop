<?php
 $val = "";
 if( isset($_POST['characters']) ) {
   $val = $_POST['characters'];
 }

 require "../../config/config.php";


 $sql = "SELECT * FROM `product` WHERE name LIKE '" . $val . "%' ORDER BY name" ;    

 if ($result = $conn->query($sql)) {  
   $str = " <style='list-style-type:none; margin:0; padding:0; margin-top:60px'>";
   while ($row = $result->fetch_assoc()) {
     $str .= "<a href='delete.php?id="  .  $row['id']  .  " '>delete</a><div style='border:1px solid black; margin:3px; padding:2px;'>" . $row['name'] . " " . $row['price'] . "</div></li>";
   }
    
   $str .= "</ul>";
   $result->free();
 }
 


if( isset($_GET['id'])){
    if( is_numeric($_GET['id']) && !empty($_GET['id']) ){       
        $id = $_GET['id'];
        $sql ="DELETE FROM `product` WHERE id='$id'";
        if ( $conn->query($sql)) {
            echo "user was deleleted";
        }
    }
}

$conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product verwijderen</title>
    <link rel="stylesheet" href="../../assets/css/hoofd.css">
</head>
<body>

<ul>
  <li><a href="../products.php">Product toevoegen</a></li>
  <li><a href="../bewerk/bewerk.php">Product bewerken</a></li>
  <li><a href="../delete/delete.php">Product verwijderen</a></li>
  <li><a href="webshop.php">Webshop</a></li>
</ul>

<body>
 <form action="" method="post">
   <label value="hoi" for="characters">Zoek in database voor product :</label>

   <div id="txtbijdelete">
        Klik 2 keer om te deleten
   </div>

   <input type="text" id="characters" name="characters" onfocus="onFormFocus(this)" oninput="onFormFocus()" value="<?php echo $val;?>" autofocus />
 </form>
 <script>
   function onFormFocus(element) {
     element.selectionStart = element.selectionEnd = element.value.length;
   }
   function onFormInput() {
     document.forms[0].submit();
   }
 </script>
 <div><?php echo $str; ?></div>
</body>
</html>