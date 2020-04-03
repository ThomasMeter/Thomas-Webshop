<?php

require "config/config.php";
session_start();
if (isset($_SESSION['mailadres']) == true) {

    }




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webshop</title>
    <link rel="stylesheet" href="assets/css/hoofd.css">
</head>

<body>
    <ul>

        <style>
            table {}
        </style>


        <li><a href="hoofdpagina.php">Home</a></li>
        <li><a href="webshop.php">kopen</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a class="active" href="login/login2.php">Login</a></li>
        <li class="loginname">

            <?php echo 'Welkom ' . $_SESSION['mailadres']; ?>


        </li>
    </ul>


    <div id="test">
        <?php
$sql = "SELECT * FROM `product` WHERE `category_id` = 'medisch' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<table>";
        echo "<div style='margin-top:50px; padding:10px; border-radius:10px;     box-shadow: 0px 4px 13px 5px rgba(0,0,0,0.5); margin-left:100px; width:200px; border-style: solid;' >
         NAAM : " . $row["name"].  "<br>" . "<br>" . "BESCHRIJVING: " . $row["description"] . "<br>" . "<br>" . "PRIJS: " . $row["price"]. "<br></div>";

    }
} else {
    echo "0 results";
}
echo "</table>";

mysqli_close($conn);
?>
    </div>
</body>

</html>