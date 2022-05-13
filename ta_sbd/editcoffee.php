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
        $result = mysqli_query($mysqli, "UPDATE coffee SET
        nama_coffee='$nama',harga_coffee='$harga' WHERE id_coffee=$id");
        // Redirect to homepage to display updated data in list
        header("Location: index.php");
    }

    // Display selected coffee based on id
    // Getting id from url
    $id = $_GET['id'];
    // Fetch data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM coffee WHERE id_coffee=$id");
    while($coffee = mysqli_fetch_array($result))
    {
    $nama = $coffee['nama_coffee'];
    $harga = $coffee['harga_coffee'];
    }
?>

<html>
    <head>
        <title>Edit coffee</title>
    </head>

    <body>
        <center>
        <br>
        <td><button><a href="index.php">Go to Home</a></button></td>
        <a href="index.php"><i class="fas fa-home fa-2x"></i></a>
        <br/><br/>
            <form name="update_coffee" method="post" action="editcoffee.php">
                <table border="0">
                <h2> EDIT COFFEE LIST</h2>
                <tr>
                    <td>Coffee Name</td>
                    <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
                </tr>

                <tr>
                    <td>Coffee Price</td>
                    <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
                </tr>
                    <tr>
                        <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                        <td><input type="submit" name="update" value="Update"></td>
                    </tr>
                </table>
            </form></center>
    </body>
</html>
