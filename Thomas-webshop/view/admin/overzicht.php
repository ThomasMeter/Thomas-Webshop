<?php
    require "../../config/config.php";
    $result = mysqli_query($conn,"SELECT * FROM `user`");
?>
<!DOCTYPE html>
    <html>
        <head>
            <title> Retrive data</title>
            <link rel="stylesheet" href="../../assets/css/hoofd.css">
            <link rel="stylesheet" href="../../assets/css/klant.css">
        <ul>
            <li><a href="overzicht.php">admin overzicht</a></li>
            <li><a href="toevoegen.php">admin toevoegen</a></li>
            <li><a href="bewerken.php">admin bewerken</a></li>
            <li><a href="deleten.php">admin verwijderen</a></li>
        </ul>
    </head>
    <body>

<?php
    if (mysqli_num_rows($result) > 0) {
?>

  <table>
    <tr>
        <td class="lijnomtd">firstname</td>
        <td class="lijnomtd">middleName</td>
        <td class="lijnomtd">lastName </td>
        <td class="lijnomtd">birthDate</td>
        <td class="lijnomtd">e-mailadres</td>
        <td class="lijnomtd">password</td>
    </tr>
<?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
?>

    <tr>
        <td><?php echo $row["firstname"]; ?></td> 
        <td><?php echo $row["middleName"]; ?></td>
        <td><?php echo $row["lastName"] . "<br"; ?></td>
        <td><?php echo $row["birthDate"]; ?></td>
        <td><?php echo $row["e-mailadres"]; ?></td>
        <td><?php echo $row["password"]; ?></td>
    </tr>

<?php
    $i++;
    }
?>

</table>

<?php
    }   
    else{
        echo "No result found";
    }
?>

</body>
</html>