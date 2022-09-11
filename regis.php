<?php
    require 'config.php';

    if(isset($_POST["submit"])){
        if(tambah($_POST)>0){
            echo "
            <script>
            alert('Akun Berhasil ditambahkan!');
            document.location.href = 'login.php';
            </script>";
        }else{
            echo " <script>
            alert('Akun Gagal ditambahkan!');
            </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="" method="post">
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required/><br>
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" required/><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required/><br>
        <button type="submit" name="submit" id="submit">Submit</button>
    </form>
    <a href="login.php">Login</a>
</body>
</html>