<?php
if(isset($_POST['delete'])) {
    $id_pengaduan = $_POST['id_pengaduan'];

    $query = mysqli_query($connect, "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");

    if($query) {
        $_SESSION['success'] = 'Laporan berhasil dihapus';
        echo '<script>window.alert("Laporan Berhasil Dihapus");
        window.location.href="lapor1.php";</script>';
    } else {
        $_SESSION['error'] = 'Gagal Hapus Laporan';
    }
}

?>