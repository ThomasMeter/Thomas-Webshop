<?php

require "../../config/config.php";
  
if ( mysqli_connect_errno() ) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}   

if(isset($_POST['submit'])){
  if(!empty($_POST['firstName']) && !empty($_POST['lastName'])){
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $middleName =$conn->real_escape_string($_POST['middleName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $street = $conn->real_escape_string($_POST['street']);
    $houseNumber = $conn->real_escape_string($_POST['houseNumber']);
    $houseNumber_addon = $conn->real_escape_string($_POST['houseNumber_addon']);
    $zipCode = $conn->real_escape_string($_POST['zipCode']);
    $city = $conn->real_escape_string($_POST['city']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $mailadres = $conn->real_escape_string($_POST['mailadres']);
    $password = $conn->real_escape_string($_POST['password']);
    $newsletter_subscription = $conn->real_escape_string($_POST['newsletter_subscription']);
    $password = $conn->real_escape_string($_POST['password']);


    $hash = password_hash($password , PASSWORD_DEFAULT);

    $sql = "INSERT INTO `klanten`(`firstName`, `middleName`, `lastName`,`street`,`houseNumber`,`houseNumber_addon`, `zipCode`,
     `city`,`phone`,`mailadres`,`password`,`newsletter_subscription`)
            VALUES ('$firstName','$middleName', '$lastName' ,'$street','$houseNumber','$houseNumber_addon', '$zipCode',
     '$city','$phone','$mailadres','$hash','$newsletter_subscription')";

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
    <title> klant toevoegen </title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
        <link rel="stylesheet" href="../../assets/css/hoofd.css">
        <link rel="stylesheet" href="../../assets/css/klant.css">
        <ul>
            <li><a href="klanttoevoegen.php">klant toevoegen</a></li>
            <li><a href="klantbewerken.php">klant bewerken</a></li>
            <li><a href="klantdeleten.php">klant verwijderen</a></li>
            <li><a href="webshop.php">Webshop</a></li>
            <li><a href="../../admin.php">admin</a></li>
        </ul>
</head>
<div class="login-page">

  <div class="form" >
  <h1>Klant toevoegen</h1><br>
  <form  method="POST">
 <input type="text" name="firstName" id="fname" placeholder="Voornaam*" required />
 <input type="text" name="middleName"   placeholder="Tussenvoegsel*" />
 <input type="text" name="lastName"     placeholder="Achternaam*" required /><br>
 <input type="text" name="phone"        placeholder="Telefoonnummer*" required /><br>
 <input type="text" name="street"       placeholder="Straat*" required /><br>
 <input type="text" name="houseNumber"  placeholder="Huisnummer*" required /><br>
 <input type="text" name="houseNumber_addon" placeholder="Huisnummer_extra"  /><br>
 <input type="text" name="zipCode"       placeholder="Postcode*" required /><br>
 <input type="text" name="city"          placeholder="Stad*" required /><br>
 <input type="text" name="newsletter_subscription" placeholder="Nieuwsletter_sub" required /><br>

 <label for="email">E-mailadres</label>
 <input type="email" name="mailadres" id="email" placeholder="E-mailadres" required /><br>
 <label for="passwd">Wachtwoord</label>
 <input type="password" name="password" id="passwd" placeholder="Wachtwoord" required /><br>
 <input type="submit" name="submit" value="Klant aanmelden" />


</form>
    </form>
  </div>
</div>

</html>