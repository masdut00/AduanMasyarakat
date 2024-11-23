<?php
if(isset($_POST['delete'])) {
    $id_petugas = $_POST['id_petugas'];

    $query = mysqli_query($connect, "DELETE FROM petugas WHERE id_petugas = '$id_petugas'");

    if($query) {
        $_SESSION['success'] = 'Data berhasil dihapus';
        echo '<script>window.alert("Data Petugas Berhasil Dihapus");
        window.location.href="petugas.php";</script>';
    } else {
        $_SESSION['error'] = 'Gagal Hapus Data';
    }
}

?>