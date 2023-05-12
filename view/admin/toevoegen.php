<?php

require "../../config/config.php";
  
if ( mysqli_connect_errno() ) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}   

if(isset($_POST['submit'])){
  if(!empty($_POST['firstname']) && !empty($_POST['lastName'])){
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $middleName =$conn->real_escape_string($_POST['middleName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $birthDate = $conn->real_escape_string($_POST['birthDate']);
    $mailadres = $conn->real_escape_string($_POST['e-mailadres']);
    $password = $conn->real_escape_string($_POST['password']);
    


    $hash = password_hash($password , PASSWORD_DEFAULT);

    $sql = "INSERT INTO `user`(`firstname`, `middleName`, `lastName`,`birthDate`,`e-mailadres`,`password`)
            VALUES ('$firstname','$middleName', '$lastName' ,'$birthDate','$mailadres','$hash')";

    if ($conn->query($sql) === TRUE) {
  
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); 
}

} 

?>


<!doctype html>
<html>
<head>  
    <title> admin toevoegen </title>

        <link rel="stylesheet" href="../../assets/css/hoofd.css">
       
        <ul>
            <li><a href="overzicht.php">admin overzicht</a></li>
            <li><a href="toevoegen.php">admin toevoegen</a></li>
            <li><a href="bewerken.php">admin bewerken</a></li>
            <li><a href="deleten.php">admin verwijderen</a></li>
        </ul>
</head>

<h1>admin toevoegen</h1><br>
    <form method="POST">
        <input type="text" name="firstname" id="fname" placeholder="firstname*" required />
        <input type="text" name="middleName"   placeholder="middleName*" />
        <input type="text" name="lastName"     placeholder="lastName*" required /><br>
        <input type="text" name="birthDate"        placeholder="birthDate*" required /><br>
        <input type="text" name="e-mailadres"       placeholder="e-mailadres*" required /><br>
        <input type="password" name="password"  placeholder="password*" required /><br>
        <input type="submit" name="submit" value="Klant aanmelden" />
    </form>
</html>