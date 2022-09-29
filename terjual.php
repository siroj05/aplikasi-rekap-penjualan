<?php
session_start();

if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
require 'config.php';

$data = $_GET["id"];

if(sold($data)>0){
    
    echo "
    <script>
    alert('Akun Berhasil Terjual!');
    document.location.href = 'data_akun.php';
    </script>";
}else{
    echo "
    <script>
    alert('Akun Gagal Terjual!');
    document.location.href = 'data_akun.php';
    </script>";
}












?>