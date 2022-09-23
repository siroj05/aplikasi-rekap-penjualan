<?php
require 'config.php';

session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}

$data = result("SELECT * FROM data_akun");

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
    <div class="container-md">
      
      
      <a href="logout.php">Logout!</a>
      <h1 class="text-center" >Data Akun</h1>
      
      <a href="tambah.php" class="btn btn-primary mb-2">Tambah Akun</a>
      <form action="" method="post">
        <input type="text" name="keyword" size="80" placeholder="Masukan Keyword..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>  
      </form>
      <table class="table table-success table-striped mt-2" border="4">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Data akun</th>
            <th scope="col">Nama akun</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php $i=1; ?>
          <?php foreach($data as $akun): ?>
              <tr>
                  <td class="fw-bold"><?php echo $i ?></td>
                  <td><?= $akun["data_akun"]; ?></td>
                  <td><?= $akun["nama_akun"]; ?></td>
                  <td><?= $akun["harga_jual"]; ?></td>
                  <td><?= $akun["harga_beli"]; ?></td>
                  <td><a href="edit.php?id=<?= $akun["id"]; ?>" class="btn btn-warning">Edit</a><a href="hapus.php?id=<?= $akun["id"]; ?>" class="btn btn-danger" 
                  onclick="return confirm('Anda Yakin Data Dihapus?');">Hapus</a></td>
              </tr>
          <?php $i++; ?>
          <?php endforeach; ?>    
           </tbody>
        </table>
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