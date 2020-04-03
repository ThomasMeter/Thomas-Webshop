<?php
    require "../config/config.php";  
    require "login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Inloggen</title>
</head>

<body>

    <div class="form-group">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <article>
                        <div id="blokLinks"></div>
                        <form method="POST" class="formInlog">
                            <h1>Inloggen</h1>
                            <br><br>
                            Email addres <br>
                            <input type="text" name="mailadres" id="mailadres" class="form-control"
                                placeholder="Email addres" size="20" required autofocus>
                            <label for="inputEmail"></label>
                            <br><br>
                            Wachtwoord <br>
                            <input type="password" name="password" id="inputPassword" class="form-control"
                                placeholder="Wachtwoord" size="20" required>
                            <label for="inputPassword"></label><br>
                            <button type="submit" class="btn btn-info" name="login">Inloggen</button>
                            <br><br>
                            Geen account?
                            <br><br>
                            <a class="btn btn-info" href="../index.php">Registeren</a></p>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>
</body>