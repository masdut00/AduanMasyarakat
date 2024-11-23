<?php
require_once 'db_connect.php';
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_pengaduan = $_GET['id'];
    $query = mysqli_query($connect, "UPDATE pengaduan 
		  SET status = '2' WHERE id_pengaduan=$id_pengaduan")or DIE(mysqli_error($connect));

    echo "<script>window.alert('Pengaduan berhasil diselesaikan');";
    header("Refresh:0; url=../laporan.php");
    exit; 
}
?>