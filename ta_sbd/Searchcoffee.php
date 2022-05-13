<?php
// Create database connection using config file
include_once("config.php");
// Fetch data
$coffee = mysqli_query($mysqli, "SELECT * FROM coffee WHERE nama_coffee LIKE '%%' LIMIT 1,5 ");

?>
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
echo "<td><a href='ordercoffee.php?id=$item[id_coffee]'>Add to cart</a></td></tr>";
}
?>
</table>