<?php
require 'config.php';

session_start();

if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}

// $data = result("SELECT * FROM data_akun");

$jumlahperhalaman = 8;
$jumlahdata = count(result("SELECT * FROM data_akun"));
$jumlahHalaman = ceil($jumlahdata/$jumlahperhalaman);
$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahperhalaman * $halamanaktif) - $jumlahperhalaman;

$data = result("SELECT * FROM data_akun LIMIT $awalData, $jumlahperhalaman");

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
    <h1 class="text-center mt-5" >Akun Genshin Impact</h1>
    <div class="container-md">

      <!-- -------NAVBAR-------- -->
      
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link " href="home.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Akun</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Akun Ready</a></li>
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

      <a href="tambah.php" class="btn btn-primary mb-2 mt-4">Tambah Akun</a>

      <!-- button -->


      <!-- form search -->
      <form action="" method="post">
        <div class="row g-3">
          <div class="col">
            <input type="text" name="keyword" size="80" class="form-control" class="" placeholder="Masukan Keyword..." autocomplete="off">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-primary" name="cari">Cari!</button>
          </div>
        </div>
      </form>
      <!-- form search -->

      

      <table class="table table-success table-striped mt-2">
        <thead>
          <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Seller</th>
            <th scope="col">Kode</th>
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
              <tr class="text-center">
                  <input type="hidden" name="id" value="<?= $akun["id"] ?>">
                  <td class="fw-bold"><?php echo $i ?></td>
                  <td ><a href="<?= $akun["seller"]; ?>" target="blank"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                  </svg></i></a></td>
                  <td><?= $akun["kode"]; ?></td>
                  <td><?= $akun["data_akun"]; ?></td>
                  <td><?= $akun["nama_akun"]; ?></td>
                  <td><?= $akun["harga_jual"]; ?></td>
                  <td><?= $akun["harga_beli"]; ?></td>
                  <td>
                  <a href="edit.php?id=<?= $akun["id"]; ?>" class="btn btn-warning btn-sm">Revisi</a>
                  <a href="hapus.php?id=<?= $akun["id"]; ?>" class="btn btn-danger btn-sm" 
                  onclick="return confirm('Anda Yakin Data Dihapus?');">Hapus</a></td>
              </tr>
          <?php $i++; ?>
          <?php endforeach; ?>    
           </tbody>
        </table>

      
      <!-- Pagination -->
      <nav aria-label="...">
        <ul class="pagination pagination-sm justify-content-center">
      <?php for($i=1;$i<=$jumlahHalaman;$i++){ ?>
        <?php if($i == $halamanaktif): ?>
            <li class="page-item active" aria-current="page">
              <span class="page-link"><?= $i; ?></span>
            </li>
        <?php else: ?>
            <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
        <?php endif; ?>
      <?php } ?>
        </ul>
      </nav>
      <!--End Pagination -->
        
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