<?php

if (isset($_POST['registerBtn'])) {
  $nikRegister = $_POST['nikRegister'];
  $namaRegister = $_POST['namaRegister'];
  $usernameRegister = $_POST['usernameRegister'];
  $passwordRegister = $_POST['passwordRegister'];
  $confirm_passwordRegister = $_POST['confirm_passwordRegister'];
  $telpRegister = $_POST['telpRegister'];

  if ($passwordRegister === $confirm_passwordRegister) {
    $checkusername = mysqli_query($connect, "SELECT username FROM masyarakat WHERE username='$usernameRegister' ");
    $checknik = mysqli_query($connect, "SELECT nik FROM masyarakat WHERE nik='$nikRegister' ");
    if (mysqli_num_rows($checkusername) > 0) {
      echo "<script>window.alert('Username sudah ada mohon coba lagi');
      window.location.href='index.php';</script>";
    } elseif (mysqli_num_rows($checknik) > 0) {
      echo "<script>window.alert('NIK sudah sudah terdaftar');
      window.location.href='index.php';</script>";
    } else {
      $result = mysqli_query($connect, "INSERT INTO masyarakat (nik, nama, username, password, telp) VALUES('$nikRegister', '$namaRegister', '$usernameRegister', MD5('$passwordRegister'), '$telpRegister')");
      echo "<script>window.alert('Kamu berhasil terdaftar');
      window.location.href='index.php';</script>";
    }
  } else {
    echo '<script>alert ("Password tidak cocok")</script>';
  }
}
