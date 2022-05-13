<?php
require_once'header.html'
?>
<?php
    // include database connection file
    include_once("config.php");

    // Fetch data
    $coffeeDel = mysqli_query($mysqli, "SELECT * FROM coffee WHERE is_delete=1 ORDER BY id_coffee DESC");
?>

<html>
    <head>
        <title>Banned Coffee list</title>
    </head>

    <body>
        <a href="index.php"><i class="fas fa-home fa-2x"></i></a>
        <br/><br/>

            <h3>Banned Coffee List</h3>
            <table width='80%' border=1>
                <tr>
                    <th>Coffee</th> <th>Price</th> <th>Action</th>
                </tr>
                
                <?php
                    while($item = mysqli_fetch_array($coffeeDel)) {
                    echo "<tr>";
                    echo "<td>".$item['nama_coffee']."</td>";
                    echo "<td>".$item['harga_coffee']."</td>";
                    echo "<td><a href='restorecoffee.php?id=$item[id_coffee]'>Restore</a></td></tr>";
                    }
                ?>
            </table>
            <a href="index.php">Back</a>
    </body>
</html>
