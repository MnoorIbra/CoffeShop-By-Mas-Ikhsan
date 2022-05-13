<?php
require_once'header.html'
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-
scale=1.0">

<title>Add coffee</title>
</head>
<body><center>
<br>
<button><a href="index.php">Go to Home</a></button>
<br/><br/>
<h2>ADD COFFEE</h2>
<form action="addcoffee.php" method="post" name="form1">
<table width="25%" border="0">
<tr>
<td>Nama coffee</td>
<td><input type="text" name="nama"></td>
</tr>
<tr>
<td>Harga</td>
<td><input type="text" name="harga"></td>
</tr>
<tr>
<td></td>

<td><input type="submit" name="Submit"

value="Add"></td>
</tr>
</table>
</form></center>
<?php

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
$nama = $_POST['nama'];
$harga = $_POST['harga'];
// include database connection file
include_once("config.php");
// Insert user data into table

$result = mysqli_query($mysqli, "INSERT INTO

coffee(nama_coffee,harga_coffee) VALUES('$nama','$harga')");

// Show message when user added

echo "Berhasil menambahkan coffee <a

href='index.php'>dashboard</a>";
}
?>
</body>
</html>