<?php
if (isset($_POST['tambahPetugas'])) {
    $id_petugas = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    if ($password === $confirm_password) {
        $checkusername = mysqli_query($connect, "SELECT username FROM petugas WHERE username='$username' ");
        $checknik = mysqli_query($connect, "SELECT id_petugas FROM petugas WHERE id_petugas='$id_petugas' ");
        if (mysqli_num_rows($checkusername) > 0) {
          echo "<script>window.alert('Username sudah ada mohon coba lagi');
          window.location.href='petugas.php';</script>";
        } elseif (mysqli_num_rows($checknik) > 0) {
          echo "<script>window.alert('NIK sudah sudah terdaftar');
          window.location.href='petugas.php';</script>";
        } else {
          $result = mysqli_query($connect, "INSERT INTO petugas (id_petugas, nama_petugas, username, password, telp, level) VALUES('$id_petugas', '$nama_petugas', '$username', MD5('$passwordRegister'), '$telp','$level')");
          echo "<script>window.alert('Data Petugas berhasil ditambahkan');
          window.location.href='petugas.php';</script>";
        }
      } else {
        echo '<script>alert ("Password tidak cocok")</script>';
      }
    }

?>