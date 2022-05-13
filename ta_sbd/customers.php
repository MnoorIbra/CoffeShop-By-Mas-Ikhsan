<?php
require_once'header.html'
?>
<?php
// Create database connection using config file
include_once("config.php");
require 'function.php';

// Fetch data
$paket = mysqli_query($mysqli, "SELECT A.kode_paket, A.nama_paket,
A.harga_paket, B.nama_coffee, C.nama_pastries from paket A INNER
JOIN coffee B ON A.id_coffee = B.id_coffee INNER JOIN pastries C
ON A.id_pastries = C.id_pastries");

$table_name1 = 'coffee';

if(isset($_GET['search1'])){
    $key = $_GET['search1'];
    $query = "SELECT * FROM $table_name1 WHERE nama_coffee LIKE '%$key%'";
    $result = mysqli_query($config, $query);				
  } else{
    $query = "SELECT * FROM $table_name1";
		$result = mysqli_query($config, $query);	
	}

$table_name2 = 'pastries';

if(isset($_GET['search2'])){
    $key2 = $_GET['search2'];
    $query2 = "SELECT * FROM $table_name2 WHERE nama_pastries LIKE '%$key2%'";
    $result2 = mysqli_query($config, $query2);				
  } else{
    $query2 = "SELECT * FROM $table_name2";
		$result2 = mysqli_query($config, $query2);	
	}

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
<body><center>
<h1>Ikhsan's Coffee Shop</h1>
<h3>Handcrafted Espresso & Brewed Coffee</h3>
<form class="d-flex mt-3" action="customers.php" method="get">
      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="search1"size="177">
      <button class="btn btn-success" type="submit">Search</button>
</form>
<table width='80%' border=1>
<tr>

<th>Coffee</th> <th>Price

</th> <th>Action</th>
</tr>
<?php

while($item = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$item['nama_coffee']."</td>";
echo "<td>".$item['harga_coffee']."</td>";
echo "<td><button><a href='ordercoffee.php?id=$item[id_coffee]'>Add to cart</a></button></td></tr>";
}
?>
</table>
<h3>Pastries</h3>
<form class="d-flex mt-3" action="customers.php" method="get">
      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="search2" size="177">
      <button class="btn btn-success" type="submit">Search</button>
</form>
<table width='80%' border=1>
<tr>

<th>Pastrie</th> <th>Price</th> <th>Action</th>
</tr>
<?php
while($item = mysqli_fetch_array($result2)) {
echo "<tr>";
echo "<td>".$item['nama_pastries']."</td>";
echo "<td>".$item['harga_pastries']."</td>";

echo "<td><button><a href='orderpastries.php?id=$item[id_pastries]'>Add to cart</a></button></td></tr>";
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

echo "<td><button><a href='orderpaket.php?id=$item[kode_paket]'>Add to cart</a></button></td></tr>";
}
?>
</table>
<br>
<button><h3><a href="ordered.php">CART</a></h3></button>
<button><h3><a href="logout.php">LOGOUT</a></h3></button>
</center>
