<?php
if (isset($_POST['btnMessages'])) {

  $nikPengaduan = $_SESSION['nik'];
  $isi_laporan = $_POST['isi_laporan'];
  $filename = $_FILES["foto"]["name"];
	$tempname = $_FILES["foto"]["tmp_name"];
	$folder = "images/pengaduan/" . $filename;
  

  $sqlMessage = "INSERT INTO pengaduan(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, status)
                 VALUES(NULL, CURRENT_TIMESTAMP, '$nikPengaduan', '$isi_laporan', '$filename', '0')";
  $queryMessage = $connect->query($sqlMessage);

  if (move_uploaded_file($tempname, $folder)) {
    if ($queryMessage == TRUE) {
      echo '<script>alert ("Laporan Berhasil Terkirim")</script>';
    } else {
      echo '<script>alert ("Laporan Gagal Terkirim")</script>';
    }
  } else {
    echo "<script>window.alert('Laporan Gagal Terkirim')";
  }
  
}
