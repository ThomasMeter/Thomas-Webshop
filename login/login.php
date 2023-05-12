<?php
session_start();
if(isset($_POST['login'])){

    if(isset($_POST['mailadres']) && trim($_POST['mailadres']) !== "") {
        $mailadres = $_POST['mailadres'];
    }
    else {
        echo $errors[] = "Vul een email in";
    }
    if(isset($_POST['password']) && trim($_POST['password']) !== "") {
        $password = $_POST['password'];
    }
    else {
        echo $errors[] = "Vul een wachtwoord in";  
    }


    $mailadres = $conn->real_escape_string($_POST['mailadres']);
    $password = $conn->real_escape_string($_POST['password']);

    $result = $conn->query('SELECT * FROM `klanten` WHERE mailadres="' . $mailadres . '";');
    if(mysqli_num_rows($result)==1){
        while ($admin = $result->fetch_assoc()){
            if (password_verify($password, $admin['password'])) {
                $_SESSION['mailadres']=$mailadres;
                header('Location: ../hoofdpagina.php');
                // Success! if given password and hash match other wise it will return false.
            } else {
                echo"Wachtwoord is fout";
            }
        }

    }
    else
        echo "email is fout";
}
?>
