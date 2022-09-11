<?php

$conn = mysqli_connect("localhost", "root", "", "fjb_genshin");

function result($query){
    global $conn;
    $hasil = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($hasil)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    
    global $conn;

    $email = $data["email"];
    $username = $data["username"];
    $password = $data["password"];

    $query = "INSERT INTO admin VALUES ('', '$email', '$username', '$password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_akun($data){
    
    global $conn;

    $data_akun = $data["data_akun"];
    $nama_akun = $data["nama_akun"];
    $harga_jual = $data["harga_jual"];
    $harga_beli = $data["harga_beli"];

    $query = "INSERT INTO data_akun VALUES ('', '$data_akun', '$nama_akun', '$harga_jual', '$harga_beli')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


?>