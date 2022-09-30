<?php
session_start();

if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
require 'config.php';

$id = $_GET["id"];

if(hapus_jual($id)>0){
    echo "
    <script>
    alert('Akun Berhasil Dihapus!');
    document.location.href = 'akun_sold.php';
    </script>";
}else{
    echo "
    <script>
    alert('Akun Gagal Dihapus!');
    document.location.href = 'akun_sold.php';
    </script>";
}












?>