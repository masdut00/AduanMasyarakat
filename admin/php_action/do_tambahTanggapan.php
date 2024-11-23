<?php
if (isset($_POST['tambahTanggapan'])) {
    $id_petugas = $_SESSION['id_petugas'];
    $tanggapan = $_POST['tanggapan'];
    $id_pengaduan = $_POST['id_pengaduan'];

    $input = mysqli_query($connect, "INSERT INTO tanggapan (id_tanggapan, id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES (NULL, '$id_pengaduan', CURRENT_TIMESTAMP,'$tanggapan', '$id_petugas')");

    $update = mysqli_query($connect, "UPDATE pengaduan SET status='1' WHERE id_pengaduan = $id_pengaduan") OR DIE (mysqli_error($connect));

    if ($input == TRUE && $update == TRUE) {
        echo '<script>window.alert("Tanggapan Berhasil Ditambahkan");
        window.location.href="javascript:history.go(-1)";</script>';
        exit;
    } else {
        echo '<script>window.alert("Tanggapan Gagal Terkirim")</scipt>';
    }
}

?>