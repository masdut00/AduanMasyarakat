<?php
if(isset($_POST['delete'])) {
    $nik = $_POST['nik'];

    $query = mysqli_query($connect, "DELETE FROM masyarakat WHERE nik = '$nik'");

    if($query) {
        $_SESSION['success'] = 'Data berhasil dihapus';
        echo '<script>window.alert("Data Masyarakat Berhasil Dihapus");
        window.location.href="Masyarakat.php";</script>';
    } else {
        $_SESSION['error'] = 'Gagal Hapus Data';
    }
}

?>