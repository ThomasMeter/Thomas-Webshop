<?php

require "config/config.php";
  
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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registreren</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>




<form method="POST"><br>
  <div class="form-group">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-6">
          <h1>Registreren</h1>
          <input type="text" name="firstName" class="form-control" id="fname" placeholder="Voornaam*" required />
          <input type="text" name="middleName" class="form-control" placeholder="Tussenvoegsel" />
          <input type="text" name="lastName" class="form-control" placeholder="Achternaam*" required /><br>
          <input type="text" name="phone" class="form-control" placeholder="Telefoonnummer*" required /><br>
          <input type="text" name="street" class="form-control" placeholder="Straat*" required />
          <input type="text" name="houseNumber" class="form-control" placeholder="Huisnummer*" required />
          <input type="text" name="houseNumber_addon" class="form-control" placeholder="Huisnummer_extra" /><br>
          <input type="text" name="zipCode" class="form-control" placeholder="Postcode*" required />
          <input type="text" name="city" class="form-control" placeholder="Stad*" required /><br>
          <input type="text" name="newsletter_subscription" class="form-control" placeholder="Nieuwsletter_sub*"
            required /><br>

          <label for="email">E-mailadres</label><br>
          <input type="email" name="mailadres" id="email" class="form-control" placeholder="E-mailadres" required /><br>
          <label for="passwd">Wachtwoord</label><br>
          <input type="password" name="password" id="passwd" class="form-control" placeholder="Wachtwoord"
            required /><br>
          <input type="submit" name="submit" class="btn btn-info" value="Registreren" /><br><br>
          <p>Heeft u nou al een account? </p>
          <a href="login/login2.php" class="btn btn-info">Login</a>

          <a href="admin.php" class="btn btn-info">admin panel</a>
        </div>
      </div>
    </div>
  </div>
</form>

</div>


</html>