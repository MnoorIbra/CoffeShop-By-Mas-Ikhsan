<?php
require_once'header.html'
?>
<?php
include_once("config.php");
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <center>
            <br>
            <br>
            <br>
         
        <h1>Login Page</h1>
        <br>
        <form method="POST" class="login-email">
            <label>Username:</label>
            <input type="text" name="fusername"><br>
            <br>
            <label>Password:</label>
            <input type="password" name="fpassword"><br>
            <br>
            <button type="submit" name="fmasuk">Login</button>
            <button ><a href="customers.php">Sign in as a guest</a></button>
        </form>
        <?php
        if (isset($_POST['fmasuk'])){
            $username = $_POST['fusername'];
            $password = $_POST['fpassword'];
            $qry = mysqli_query($mysqli,"SELECT * FROM login WHERE username = '$username' AND password = md5('$password')");
            $cek = mysqli_num_rows($qry);
            if($cek==1){
                session_start();
                $_SESSION['userweb']=$username;
                header("location: index.php");
                exit;
            }
            else{
                echo "Maaf username atau password tidak dikenali";
            }
        }

        ?>
        </center>
    </body>
</html>