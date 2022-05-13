<?php
require_once'header.html'
?>
<?php
    // include database connection file
    include_once("config.php");

    // Fetch data
    $pastriesDel = mysqli_query($mysqli, "SELECT * FROM pastries WHERE is_delete=1 ORDER BY id_pastries DESC");
?>

<html>
    <head>
        <title>Pastries Banned List</title>
    </head>

    <body>
        <a href="index.php"><i class="fas fa-home fa-2x"></i></a>
        <br/><br/>

            <h3>Pastries Banned List</h3>
            <table width='80%' border=1>
                <tr>
                    <th>Pastries</th> <th>Price</th> <th>Action</th>
                </tr>
                
                <?php
                    while($item = mysqli_fetch_array($pastriesDel)) {
                    echo "<tr>";
                    echo "<td>".$item['nama_pastries']."</td>";
                    echo "<td>".$item['harga_pastries']."</td>";
                    echo "<td><a href='restorepastries.php?id=$item[id_pastries]'>Restore</a></td></tr>";
                    }
                ?>
            </table>
            <a href="index.php">Back</a>
    </body>
</html>
