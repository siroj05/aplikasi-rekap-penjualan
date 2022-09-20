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

    $email = htmlspecialchars($data["email"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);

    $query = "INSERT INTO admin VALUES ('', '$email', '$username', '$password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_akun($data){
    
    global $conn;

    $data_akun = htmlspecialchars($data["data_akun"]);
    $nama_akun = htmlspecialchars($data["nama_akun"]);
    $harga_jual = htmlspecialchars($data["harga_jual"]);
    $harga_beli = htmlspecialchars($data["harga_beli"]);

    $query = "INSERT INTO data_akun VALUES ('', '$data_akun', '$nama_akun', $harga_jual, $harga_beli)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM data_akun WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    $id = $data["id"];
    $data_akun = htmlspecialchars($data["data_akun"]);
    $nama_akun = htmlspecialchars($data["nama_akun"]);
    $harga_jual = htmlspecialchars($data["harga_jual"]);
    $harga_beli = htmlspecialchars($data["harga_beli"]);

    $query = "UPDATE data_akun SET data_akun = '$data_akun', nama_akun = '$nama_akun', harga_jual = $harga_jual, harga_beli = $harga_beli WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>