<?php

require 'config.php';

$id = $_GET["id"];

if(hapus($id)>0){
    echo "
    <script>
    alert('Akun Berhasil Dihapus!');
    document.location.href = 'data_akun.php';
    </script>";
}else{
    echo "
    <script>
    alert('Akun Gagal Dihapus!');
    document.location.href = 'data_akun.php';
    </script>";
}












?>