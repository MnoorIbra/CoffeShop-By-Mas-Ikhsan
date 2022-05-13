<?php
require_once'header.html'
?>
<?php
// Create database connection using config file
include_once("config.php");


// Fetch data
$coffee = mysqli_query($mysqli, "SELECT * FROM coffee WHERE
is_delete=0 ORDER BY id_coffee DESC");
$pastries = mysqli_query($mysqli, "SELECT * FROM pastries WHERE
is_delete=0 ORDER BY id_pastries DESC");
$paket = mysqli_query($mysqli, "SELECT A.kode_paket, A.nama_paket,
A.harga_paket, B.nama_coffee, C.nama_pastries from paket A INNER
JOIN coffee B ON A.id_coffee = B.id_coffee INNER JOIN pastries C
ON A.id_pastries = C.id_pastries");

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
<h1>Ikhsan's Coffee Shop</h1>
<h3>Handcrafted Espresso & Brewed Coffee</h3>
<table width='80%' border=1 class="gridtable">
<button><a href="addCoffee.php">Add Coffee</a></button>
<tr>

<th>Coffee</th> <th>Price

</th> <th>Action</th>
</tr>
<?php
while($item = mysqli_fetch_array($coffee)) {
echo "<tr>";
echo "<td>".$item['nama_coffee']."</td>";
echo "<td>".$item['harga_coffee']."</td>";
echo "<td><button><a href='editcoffee.php?id=$item[id_coffee]'>Edit</a></button>
| <button><a
href='deletecoffee.php?id=$item[id_coffee]'>Delete</a></button></td></tr>";
}
?>
</table>
<button><a href="deletedcoffee.php">Restore Coffee</a></button>
<h3>Pastries</h3>
<table width='80%' border=1>
<button><a href="addpastries.php">Add Pastries</a></button>
<tr>

<th>Pastrie</th> <th>Price</th> <th>Action</th>
</tr>
<?php
while($item = mysqli_fetch_array($pastries)) {
echo "<tr>";
echo "<td>".$item['nama_pastries']."</td>";
echo "<td>".$item['harga_pastries']."</td>";

echo "<td><button><a href='editpastries.php?id=$item[id_pastries]'>Edit</a></button> | 
<button><a href='deletepastries.php?id=$item[id_pastries]'>Delete</a></button></td></tr>";
}
?>
</table>
<button><a href="deletedpastries.php">Restore Pastries</a></button>
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

echo "<td><button><a href='deletePaket.php?id=$item[kode_paket]'>Delete</a></button></td></tr>";
}
?>
</table>

<h3><button><h3><a href="logout.php">Logout</a></h3></button>
</center>

<?php
require_once ('footer.html')
?>