<?php
require 'config.php';

session_start();

    if(isset($_SESSION["login"])){
        header("location: data_akun.php");
        exit;
    }

if (isset($_POST["login"])){

    $username = $_POST["nama"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    if(mysqli_num_rows($result)===1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            //set session

            $_SESSION["login"] = true;


            header("Location: data_akun.php");
            exit;
        };

    }
    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if(isset($error)){ ?>
        <p style="color: red;" >Password atau username salah!</p>
    <?php } ?>

        
    
    
    <form action="" method="post">
        <label for="nama">Username</label><br>
        <input type="text" name="nama" id="nama" required/><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required/><br>
        <button type="submit" name="login" id="login">Login</button>
    </form>
    <a href="regis.php">Register</a>
</body>
</html>