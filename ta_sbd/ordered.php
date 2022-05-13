<?php
require_once'header.html'
?>
<?php
// Create database connection using config file
include_once("config.php");
// Fetch data
$coffee = mysqli_query($mysqli, "SELECT * FROM coffee WHERE
is_order=1 ORDER BY id_coffee DESC");
$pastries = mysqli_query($mysqli, "SELECT * FROM pastries WHERE
is_order=1 ORDER BY id_pastries DESC");
$paket = mysqli_query($mysqli, "SELECT * FROM paket WHERE
is_order=1 ORDER BY kode_paket DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-
scale=1.0">

<title>TA SBD</title>

</head>
<body>
    <center>
<h1>CART</h1>
<h3>Handcrafted Espresso & Brewed Coffee</h3>
<table width='80%' border=1>
<tr>

<th>Coffee</th> <th>Price

</th> <th>Action</th>
</tr>
<?php
while($item = mysqli_fetch_array($coffee)) {
echo "<tr>";
echo "<td>".$item['nama_coffee']."</td>";
echo "<td>".$item['harga_coffee']."</td>";
echo "<td><a href='restoreordercoffee.php?id=$item[id_coffee]'>Restore</a></td></tr>";
}
?>
</table>
<h3>Pastries</h3>
<table width='80%' border=1>
<tr>

<th>Pastrie</th> <th>Price</th> <th>Action</th>
</tr>
<?php
while($item = mysqli_fetch_array($pastries)) {
echo "<tr>";
echo "<td>".$item['nama_pastries']."</td>";
echo "<td>".$item['harga_pastries']."</td>";

echo "<td><a href='restoreorderpastries.php?id=$item[id_pastries]'>Restore</a></td></tr>";
}
?>
</table>
<h3>Morning Pair</h3>
<table width='80%' border=1>
<tr>
<th>Package Name</th> <th>Coffee</th> <th>Pastries</th>

<th>Price</th> <th>Action</th>
</tr>
<?php
while($item = mysqli_fetch_assoc($paket)) 
{

echo "<tr>";
echo "<td>".$item['nama_paket']."</td>";
echo "<td>".$item['nama_coffee']."</td>";
echo "<td>".$item['nama_pastries']."</td>";
echo "<td>".$item['harga_paket']."</td>";

echo "<td><a href='restoreorderpaket.php?id=$item[kode_paket]'>Restore</a></td></tr>";
}
?>
</table>
<br>
<button><h3><a href="customers.php">Back to Menu</a></h3></button>
</center>