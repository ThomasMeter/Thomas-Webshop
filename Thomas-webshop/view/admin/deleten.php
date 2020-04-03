<?php
 $val = "";
 if( isset($_POST['characters']) ) {
   $val = $_POST['characters'];
 }

 require "../../config/config.php";


 $sql = "SELECT * FROM `user` WHERE firstname LIKE '" . $val . "%' ORDER BY firstname" ;    

 if ($result = $conn->query($sql)) {  
   $str = "<style='list-style-type:none; margin:0; padding:0; margin-top:60px'>";
   while ($row = $result->fetch_assoc()) {
     $str .= "<a href='deleten.php?id="  .  $row['id']  .  " '>delete</a><div style='border:1px solid black; margin:3px; padding:2px;'>" . $row['lastName'] . "</div></li>";
   }
    
   $str .= "</ul>";
   $result->free();
 }
 


if( isset($_GET['id'])){
    if( is_numeric($_GET['id']) && !empty($_GET['id']) ){       
        $id = $_GET['id'];
        $sql ="DELETE FROM `user` WHERE id='$id'";
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
    <link rel="stylesheet" href="../../assets/css/klant.css">
</head>
<body>
    <ul>
        <li><a href="overzicht.php">admin overzicht</a></li>
        <li><a href="toevoegen.php">admin toevoegen</a></li>
        <li><a href="bewerken.php">admin bewerken</a></li>
        <li><a href="deleten.php">admin verwijderen</a></li>
    </ul>

<body>
 <form action="" method="post">
   <label value="hoi" for="characters">Search database on:</label>

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