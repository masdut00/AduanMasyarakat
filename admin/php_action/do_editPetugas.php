<?php
if (isset($_POST['editPetugas'])) {
    $id_petugas = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];

		$query = mysqli_query($connect, "UPDATE petugas SET 
        id_petugas = '$id_petugas',
        nama_petugas = '$nama_petugas',
        username = '$username',
        password = MD5('$password'),
        telp = '$telp',
        level = '$level' WHERE id_petugas = '$id_petugas'") or die (mysqli_error($connect));

        if ($query == TRUE) {
            echo '<script>window.alert("Data Petugas berhasil di ubah")
            window.location.href="petugas.php";</script>';
            exit;
        }
        else {
            echo '<script>window.alert("Error!")
            window.location.href="petugas.php";</script>';
        }
		
	  }
?>