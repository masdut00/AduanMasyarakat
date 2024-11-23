<?php
require_once 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_tanggapan = $_GET ['id_tanggapan'];
    $id_pengaduan = $_GET ['id_pengaduan'];
    
    $hapus = mysqli_query($connect, "DELETE FROM tanggapan WHERE id_tanggapan=$id_tanggapan");

    $update = mysqli_query($connect, "UPDATE pengaduan SET status='0' WHERE id_pengaduan=$id_pengaduan");

    if ($hapus == TRUE && $update == TRUE) {
        echo '<script>window.alert("Tanggapa Berhasil Dihapus");
        window.location.href="javascript:history.go(-1)";</script>';
        header("Refresh:0");
        exit;
    } else {
        echo '<scrpt>window.alert("Tanggapan Gagal Dihapus")</script>';
    }
}

?>