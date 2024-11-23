<?php
require_once 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET ['id'];
    
    $hapus= mysqli_query($connect, "DELETE FROM petugas WHERE id_petugas=$id");

    if ($query) {
        echo "<script>alert('Data berhasil di hapus')
        window.location.replace('../petugas.php')</script>";
    }
    else {
        echo "<script>alert('Error!')
        window.location.replace('../petugas.php')</script>";
    }
}

?>