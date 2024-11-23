<?php
    require_once 'db_connect.php';

    $id_pengaduan = $_GET['id'];
    $query =  mysqli_query($connect, "UPDATE pengaduan SET status='1' WHERE id_pengaduan=$id_pengaduan") or die(mysqli_error($connect));

    echo "<script>window.alert('Pengaduan batal diselesaikan')</script>";
    header("Refresh:0; url=../laporan.php");
    exit;
?>