<?php
if (isset($_POST['banNik'])) {
    // Pastikan koneksi ke database
    include 'do_connect.php'; // Sesuaikan dengan file koneksi Anda

    // Mendapatkan NIK dari form
    $nik = $_POST['nik'];

    // Query update status aktif di tabel masyarakat
    $query = mysqli_query($connect, "UPDATE masyarakat SET active = '1' WHERE nik = '$nik'") 
        or die(mysqli_error($connect));

    if ($query) {
        echo '<script>
                alert("Data berhasil diubah");
                window.location.href="masyarakat.php";
              </script>';
    } else {
        echo '<script>
                alert("Error!");
                window.location.href="masyarakat.php";
              </script>';
    }
}
?>
