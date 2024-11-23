<?php

if (isset($_POST['editLapor'])) {
    $nik = $_SESSION['nik'];
    $id_pengaduan = $_POST['id_pengaduan'];
    $isi_laporan = $_POST['isi_laporan'];

		$query = mysqli_query($connect, "UPDATE pengaduan SET 
        isi_laporan = '$isi_laporan', tgl_pengaduan=CURRENT_TIMESTAMP, nik='$nik'
        WHERE id_pengaduan=$id_pengaduan") or die (mysqli_error($connect));

        if ($query == TRUE) {
            echo '<script>window.alert("Laporan berhasil di ubah")
            window.location.href="lapor1.php";</script>';
            exit;
        }
        else {
            echo '<script>window.alert("Error!")
            window.location.href="lapor1.php";</script>';
        }
		
	  }
?>