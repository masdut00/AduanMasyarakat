<?php
if (isset($_POST['editMasyarakat'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $telp = $_POST['telp'];

		$query = mysqli_query($connect, "UPDATE masyarakat SET 
        nik = '$nik',
        nama = '$nama',
        username = '$username',
        password = MD5('$password'),
        telp = '$telp' WHERE nik = '$nik'") or die (mysqli_error($connect));

        if ($query == TRUE) {
            echo '<script>window.alert("Data Petugas berhasil di ubah")
            window.location.href="masyarakat.php";</script>';
            exit;
        }
        else {
            echo '<script>window.alert("Error!")
            window.location.href="masyarakat.php";</script>';
        }
		
	  }
?>