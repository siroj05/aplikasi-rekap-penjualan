<?php
    require 'config.php';
    session_start();

    if(!isset($_SESSION["login"])){
        header("location: login.php");
        exit;
    }
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
    }elseif(isset($_POST["laku"])){
        if(sold($_POST)>0){
            echo "
            <script>
            alert('Akun Terjual!');
            document.location.href = 'data_akun.php';
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
            <div class="input-group mb-3">
                <label class="input-group-text" for="kode">Kode</label>
                <select class="form-select" name="kode" id="kode">
                    <option value="<?= $ubah["kode"]; ?>"><?= $ubah["kode"]; ?></option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="B3">B3</option>
                    <option value="B4">B4</option>
                    <option value="B5">B5</option>
                    <option value="B6">B6</option>
                    <option value="B7">B7</option>
                    <option value="B8">B8</option>
                    <option value="B9">B9</option>
                    <option value="B10">B10</option>
                    <option value="B11">B11</option>
                    <option value="B12">B12</option>
                    <option value="B13">B13</option>
                    <option value="B14">B14</option>
                    <option value="B15">B15</option>
                    <option value="B16">B16</option>
                </select>
            </div>
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
            <div class="d-grid gap-2 col-6 mx-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#static">
                Simpan Perubahan
                </button>
        
                <!-- Modal -->
                <div class="modal fade" id="static" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Simpan Perubahan!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Anda yakin merevisi akun ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" class="btn btn-primary">Ya</button>
                    </div>
                    </div>
                </div>
                </div>

                <!-- <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button> -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Terjual
                </button>
        
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Akun terjual!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Anda yakin akun ini sudah terjual?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="laku" class="btn btn-success">Ya</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- <button type="submit" name="laku" class="btn btn-success">Terjual</button> -->
            </div>
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