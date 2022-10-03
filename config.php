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
    $username = stripslashes(htmlspecialchars($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $hasil = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($hasil)){
        echo "
            <script>
            alert('Username sudah digunakan!');
            </script>";
        return false;
    }

    if ($password !== $password2){
        echo "
            <script>
            alert('Password tidak sama!');
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);


    $query = "INSERT INTO admin VALUES ('', '$email', '$username', '$password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah_akun($data){
    
    global $conn;
    $kode = htmlspecialchars($data["kode"]);
    $data_akun = htmlspecialchars($data["data_akun"]);
    $nama_akun = htmlspecialchars($data["nama_akun"]);
    $harga_jual = htmlspecialchars($data["harga_jual"]);
    $harga_beli = htmlspecialchars($data["harga_beli"]);

    $query = "INSERT INTO data_akun VALUES ('', '$data_akun', '$nama_akun', $harga_jual, $harga_beli, '$kode')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM data_akun WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function hapus_jual($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM akun_terjual WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;
    $id = $data["id"];
    $kode = htmlspecialchars($data["kode"]);
    $data_akun = htmlspecialchars($data["data_akun"]);
    $nama_akun = htmlspecialchars($data["nama_akun"]);
    $harga_jual = htmlspecialchars($data["harga_jual"]);
    $harga_beli = htmlspecialchars($data["harga_beli"]);

    $query = "UPDATE data_akun SET data_akun = '$data_akun', nama_akun = '$nama_akun', harga_jual = $harga_jual, harga_beli = $harga_beli, kode = '$kode' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($data){
    $query = "SELECT * FROM data_akun WHERE data_akun LIKE '%$data%' OR nama_akun LIKE '%$data%' OR harga_jual LIKE '%$data%' OR harga_beli LIKE '%$data%' OR kode LIKE '%$data%'";
    return result($query);
}

function cari_sold($data){
    $query = "SELECT * FROM akun_terjual WHERE data_akun LIKE '%$data%' OR nama_akun LIKE '%$data%' OR harga_jual LIKE '%data%' OR harga_beli LIKE '%data%'";
    return result($query);
}

function total(){
    $data_harga = result("SELECT * FROM data_akun");
    $total = 0;
    $harga_beli = 0;
    foreach($data_harga as $jumlah){
        $total += $jumlah["harga_jual"];
        $harga_beli += $jumlah["harga_beli"];
    }
    echo $total - $harga_beli;
}

function total2(){
    $data_harga = result("SELECT * FROM akun_terjual");
    $total = 0;
    $harga_beli = 0;
    foreach($data_harga as $jumlah){
        $total += $jumlah["harga_jual"];
        $harga_beli += $jumlah["harga_beli"];
    }
    echo $total - $harga_beli;
}

function sold($data){

    global $conn;
    $kode = htmlspecialchars($data["kode"]);
    $data_akun = htmlspecialchars($data["data_akun"]);
    $nama_akun = htmlspecialchars($data["nama_akun"]);
    $harga_jual = htmlspecialchars($data["harga_jual"]);
    $harga_beli = htmlspecialchars($data["harga_beli"]);

    $query = "INSERT INTO akun_terjual VALUES ('', '$data_akun', '$nama_akun', $harga_jual, $harga_beli, '$kode')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>