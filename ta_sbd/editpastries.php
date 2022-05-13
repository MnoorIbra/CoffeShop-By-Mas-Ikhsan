<?php
require_once'header.html'
?>
<?php
    // include database connection file
    include_once("config.php");
    // Check if form is submitted for data update, then redirect to homepage after update
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nama=$_POST['nama'];
        $harga=$_POST['harga'];
        // update data
        $result = mysqli_query($mysqli, "UPDATE pastries SET
        nama_pastries='$nama',harga_pastries='$harga' WHERE id_pastries=$id");
        // Redirect to homepage to display updated data in list
        header("Location: index.php");
    }

    // Display selected pastries based on id
    // Getting id from url
    $id = $_GET['id'];
    // Fetch data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM pastries WHERE id_pastries=$id");
    while($pastries = mysqli_fetch_array($result))
    {
    $nama = $pastries['nama_pastries'];
    $harga = $pastries['harga_pastries'];
    }
?>

<html>
    <head>
        <title>Edit pastrie</title>
    </head>

    <body>
    <center>
        <br>
        <td><button><a href="index.php">Go to Home</a></button></td>
        <a href="index.php"><i class="fas fa-home fa-2x"></i></a>
        <br/><br/>
            <form name="update_pastries" method="post" action="editpastries.php">
                <table border="0">
                <h2> EDIT PASTRIE LIST</h2>
                <tr>
                    <td>Nama pastries</td>
                    <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
                </tr>

                <tr>
                    <td>Harga pastries</td>
                    <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
                </tr>
                    <tr>
                        <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                        <td><input type="submit" name="update" value="Update"></td>
                    </tr>
                </table>
            </form>
    </body></center>
</html>
