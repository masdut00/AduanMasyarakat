<?php

require_once 'core.php';

$success = array();
$errors = array();

if(isset($_POST['tambahTanggapan'])) {

 $pengaduan = $_POST['pengaduan'];
  $tgl_tanggapan = $_POST['tgl_tanggapan'];
  $tanggapan = $_POST['tanggapan'];
  $id_petugas = $_POST['id_petugas'];

	$checkdata = mysqli_query($connect, "SELECT pengaduan FROM tanggapan WHERE pengaduan='$pengaduan' ");
  if (mysqli_num_rows($checkdata) > 0) {
    $errors[] = "Laporan sudah ditanggapi";
  }
	else {
		$sql = "INSERT INTO tanggapan (id_tanggapan, pengaduan, tgl_tanggapan, tanggapan , id_petugas) VALUES (null, '$pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')";

		if($connect->query($sql) === TRUE) {
			$success[] = "Successfully Added";
		} else {
		 	$errors[] = "Error while adding the members";
		}
	}

	$connect->close();

}
?>
