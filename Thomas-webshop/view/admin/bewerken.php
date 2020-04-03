<?php
require "../../config/config.php";
$conn = mysqli_query($conn,"SELECT * FROM `user`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product updaten</title>
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

    <table>
<tr>
<td>firstname</td>
<td>middleName</td>
<td>lastName</td>
<td>birthDate</td>
<td>e-mailadres</td>
<td>password</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($conn)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["middleName"]; ?></td>
<td><?php echo $row["lastName"]; ?></td>
<td><?php echo $row["birthDate"]; ?></td>
<td><?php echo $row["e-mailadres"]; ?></td>
<td><?php echo $row["password"]; ?></td>
<td><a href="bewerken2.php?name=<?php echo $row["lastName"]; ?>">Update</a></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>