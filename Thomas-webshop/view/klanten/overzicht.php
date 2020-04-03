<?php
    require "../../config/config.php";
    $result = mysqli_query($conn,"SELECT * FROM `klanten`");
?>
<!DOCTYPE html>
    <html>
        <head>
            <title> Retrive data</title>
            <link rel="stylesheet" href="../../assets/css/hoofd.css">
            <link rel="stylesheet" href="../../assets/css/klant.css">
        <ul>
            <li><a href="klanttoevoegen.php">klant toevoegen</a></li>
            <li><a href="klantbewerken.php">klant bewerken</a></li>
            <li><a href="klantdeleten.php">klant verwijderen</a></li>
            <li><a href="webshop.php">Webshop</a></li>
        </ul>
    </head>
    <body>

<?php
    if (mysqli_num_rows($result) > 0) {
?>

  <table>
    <tr>
        <td class="lijnomtd">First Name</td>
        <td class="lijnomtd">middleName</td>
        <td class="lijnomtd">lastName </td>
        <td class="lijnomtd">street</td>
        <td class="lijnomtd">houseNumber</td>
        <td class="lijnomtd">houseNumber_addon</td>
        <td class="lijnomtd">zipCode</td>
        <td class="lijnomtd">city</td>
        <td class="lijnomtd">phone</td>
        <td class="lijnomtd">mailadres</td>
        <td class="lijnomtd">password</td>
        <td class="lijnomtd">newsletter_subscription</td>
    </tr>
<?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
?>

    <tr>
        <td><?php echo $row["firstName"]; ?></td> 
        <td><?php echo $row["middleName"]; ?></td>
        <td><?php echo $row["lastName"] . "<br"; ?></td>
        <td><?php echo $row["street"]; ?></td>
        <td><?php echo $row["houseNumber"]; ?></td>
        <td><?php echo $row["houseNumber_addon"]; ?></td>
        <td><?php echo $row["zipCode"]; ?></td>
        <td><?php echo $row["city"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
        <td><?php echo $row["mailadres"]; ?></td>
        <td><?php echo $row["password"]; ?></td>
        <td><?php echo $row["newsletter_subscription"]; ?></td>
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