<?php
require "config/config.php";
session_start();
if (isset($_SESSION['mailadres']) == true) {

    }


?>

<!DOCTYPE html>
<html>

<head>
    <title>Dopper kopen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/hoofd.css">
</head>

<body>

    <ul>
        <li><a href="hoofdpagina.php">Home</a></li>
        <li><a href="webshop.php">kopen</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a class="active" href="login/login2.php">Login</a></li>
        <li class="loginname"><?php echo 'Hallo ' . $_SESSION['mailadres']; ?></li>
    </ul>




</body>

</html>