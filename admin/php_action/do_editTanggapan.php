<?php
if (isset($_POST['editTanggapan'])) {
		$id_tanggapan = $_POST['id_tanggapan'];
		$tanggapan = $_POST['tanggapan'];
		$id_petugas = $_SESSION['id_petugas'];
		  $input = mysqli_query($connect, "UPDATE tanggapan 
		  SET tanggapan = '$tanggapan', tgl_tanggapan=CURRENT_TIMESTAMP, id_petugas='$id_petugas' WHERE id_tanggapan=$id_tanggapan")or DIE(mysqli_error($connect));

        if ($input == TRUE) {
            echo '<script>window.alert("Tanggapan berhasil diubah");
            window.location.href="javascript:history.go(-1)";</script>';
        exit; 
        } else {
        echo '<script>alert ("Tanggapan gagal diubah")</script>';
        }
		
	  }
?>