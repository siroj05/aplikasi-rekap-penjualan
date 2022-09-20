<?php
    require 'config.php';
    $id = $_GET["id"];
    
    $ubah = result("SELECT * FROM data_akun WHERE id = $id")[0];

    if(isset($_POST["submit"])){
        if(edit($_POST)>0){
            echo "
            <script>
            alert('Akun Berhasil Diubah!');
            document.location.href = 'data_akun.php';
            </script>";
        }else{
            echo " <script>
            alert('Gagal! Berubah');
            </script>";
        }
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

    <title>Edit Data Akun</title>
  </head>
  <body>
    <div class="container-md">
        <h1 class="text-center mt-5" >Edit Data Akun</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $ubah["id"] ?>">
            <div class="mb-3">
                <label for="data_akun" class="form-label">Data Akun</label>
                <input type="text" class="form-control" id="data_akun" name="data_akun" placeholder="Username & Password Akun" value="<?= $ubah["data_akun"]; ?>" required/>
            </div>
            <div class="mb-3">
                <label for="nama_akun" class="form-label">Nama Akun</label>
                <input type="text" class="form-control" id="nama_akun" name="nama_akun" value="<?= $ubah["nama_akun"]; ?>" required/>
            </div>
            <div class="mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="<?= $ubah["harga_jual"]; ?>" required/>
            </div>
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="<?= $ubah["harga_beli"]; ?>" required/>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Ganti</button>
        </form>
        
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