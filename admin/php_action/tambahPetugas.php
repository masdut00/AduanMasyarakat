<?php
require_once 'db_connect.php';
if($_POST){
    $id_petugas = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    $cek = mysqli_query($connect, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'" );
    if (mysqli_num_rows($cek)>0){
        echo "<script> alert ('Maaf, id petugas sudah digunakan, coba dicek kembali');
        window.location.replace('../tambahPetugas.php')</script>";
    }
    else {
        $query = mysqli_query($connect, "INSERT INTO petugas (id_petugas, nama_petugas, username, password, telp,  level) VALUES ('$id_petugas', '$nama_petugas', '$username', MD5('$password'), '$telp', '$level')") OR DIE (mysqli_error($connect));
        if ($query){
            echo "<script> alert ('Data berhasil ditambahkan');
            window.location.replace('../petugas.php')</script>";
        }
        else {
            echo "<script> alert ('Error!');
            window.location.replace('../tambahPetugas.php')</script>";
}

    }
}

?>