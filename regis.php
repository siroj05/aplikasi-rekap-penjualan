<?php
    require 'config.php';

    session_start();

    if(isset($_SESSION["login"])){
        header("location: data_akun.php");
        exit;
    }
    
    if(isset($_POST["submit"])){
        if(strlen($_POST['username']) < 3 || strlen($_POST['password']) < 3){
            echo "
            <script>
            alert('Username atau password kurang panjang!!!');
            </script>";
        }
        else{
            if(tambah($_POST)>0){
                echo "
               <script>
               alert('User baru Berhasil ditambahkan!');
               document.location.href = 'login.php';
               </script>";
           }else{
            echo " <script>
               alert('User Gagal ditambahkan!');
               </script>";
           }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="login">

        <h1>Register</h1>
        <form action="" class="needs-validation" method="post">
            <div class="form-group was-validated">  
                <label for="email" class="form-label" >Email</label>
                <input type="email" class="form-control" name="email" id="email" required/>
                <div class="invalid-feedback">
                    Please enter your email address
                </div>
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" required/>
                <div class="invalid-feedback">
                    Please enter your Username
                </div>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required/>
                <div class="invalid-feedback">
                    Please enter your Password
                </div>   
                <label for="password2" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password2" id="password2" required/>
                <div class="invalid-feedback">
                    Please Confirm your Password
                </div>  
                <button class="btn btn-success w-100" type="submit" name="submit" id="submit">Submit</button>
                <a href="login.php">Login</a>
            </div>
        </form>
    </div>
    
</body>
</html>