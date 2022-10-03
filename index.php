<?php
require 'config.php';

session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}

$data = result("SELECT * FROM data_akun");
$data2 = result("SELECT * FROM akun_terjual");

if(isset($_POST["cari"])){
  $data = cari($_POST["keyword"]);
}



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Akun</title>
  </head>
  <body>
    <h1 class="text-center mt-5" >Selamat Datang Tuan Muda Siroojuddin</h1>
    <h1 class="text-center mt-5" >Akun Genshin Impact</h1>
    <div class="container-md">

      <!-- -------NAVBAR-------- -->
      
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Akun</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="data_akun.php">Akun Ready</a></li>
            <li><a class="dropdown-item" href="akun_sold.php">Akun Sold</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
      <!-- ------end of navbar-------- -->

      <!-- content -->
      <!-- button -->

      <!-- <a href="tambah.php" class="btn btn-primary mb-2 mt-4">Tambah Akun</a> -->

      <!-- button -->


      <!-- form search -->
      <!-- <form action="" method="post">
        <div class="row g-3">
          <div class="col">
            <input type="text" name="keyword" size="80" class="form-control" class="" placeholder="Masukan Keyword..." autocomplete="off">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-primary" name="cari">Cari!</button>
          </div>
        </div>
         
      </form>
      form search -->
      <div class="row mt-4">
        <div class="col">
          <div class="card text-white bg-success mb-3 mt-3 text-center w-100" >
            <h5 class="card-header">Total Income</h5>
            <div class="card-body">
              <h1 class="card-title">Rp<?php total2(); ?></h1>
            </div>
          </div>

        </div>
        <div class="col">
        <div class="card text-white bg-warning mb-3 mt-3 text-center w-100" >
            <h5 class="card-header">Prakiraan Income</h5>
            <div class="card-body">
              <h1 class="card-title">Rp<?php total(); ?></h1>
            </div>
          </div>
        </div>
      </div>


      
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>