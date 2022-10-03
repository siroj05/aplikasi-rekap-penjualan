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


            header("Location: home.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    
    <?php if(isset($error)){
        echo "
        <script>
        alert('Password atau Username Salah!');
        </script>"; 
    } ?>
    <div class="login">
        <h1>Login</h1>
        <form action="" class="needs-validation" method="post">
            <div class="form-group was-validated">
                <label for="nama" class="form-label">Username</label><br>
                <input type="text" class="form-control" name="nama" id="nama" required/><br>
                <label for="password" class="form-label"class="form-label" >Password</label><br>
                <input type="password" class="form-control" name="password" id="password" required/><br>
                <button type="submit" class="btn btn-success w-100" name="login" id="login">Login</button>
            </div>
            <!-- <a href="regis.php">Register</a> -->
        </form>

    </div>

</body>
</html>