<?php
require_once 'php_action/db_connect.php';
include_once 'php_action/do_login.php';
include_once 'php_action/do_register.php';
include_once 'php_action/do_kirimLaporan.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Pengaduan Masyarakat</title>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <!-- stylesheets css -->
  <link rel="stylesheet" href="assets/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/public/css/animate.min.css">
  <link rel="stylesheet" href="assets/public/css/et-line-font.css">
  <link rel="stylesheet" href="assets/public/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/public/css/vegas.min.css">
  <link rel="stylesheet" href="assets/public/css/style.css">
  <link rel="icon" type="image/png" href="assets/toa.jpg" /> 

  <link href="assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">


  <link href='https://fonts.googleapis.com/css?family=Rajdhani:400,500,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet">

</head>

<body>

  <?php

    if (empty($_SESSION['nik'])) {
      header('location:index.php');
    }
  

  // if (isset($_SESSION['nik'])) {
  //   echo '
	// 	<div class="user">
	// 		<button type="button" class="btn btn-lg btn-default  userLogin" name="button">Hallo ☻ <span style="userLoginUsername"></span> ' . $_SESSION['nama'] . ' </span></button>
	// 	</div><br>
	// 	<div class="user">
	// 		<a href="#" data-toggle="modal" data-target="#logout" class="btn btn-lg btn-default userLogin">Logout</a>
	// 	</div>
	// 	';
  // } else {
  //   echo '
	// 	<div class="user">
	// 		<a href="#" data-toggle="modal" data-target="#login" class="btn btn-lg btn-default userLogin">Login</a>
	// 	</div><br>
	// 	<div class="user">
	// 		<a href="#" data-toggle="modal" data-target="#register" class="btn btn-lg btn-default userLogin">Mendaftar</a>
	// 	</div>
	// ';
  // }

  ?>

  <!-- tabel tanggap section -->
  <section id="contact">
    <div class="container">
      <a href="index.php">rhthargr</a>
      <div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-12">
          <div class="section-title">
            <h1 class="wow fadeInUp" data-wow-delay="0.3s">Halo <?php echo $_SESSION['nama'] ?></h1>
            <h3 class="wow fadeInUp" data-wow-delay="0.6s">Berikut tanggapan dari laporan Anda.</h3>
          </div>
          <div class="contact-form wow fadeInUp" data-wow-delay="1.0s">
            <form class="form-inline" method="get" action="">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" name="cari" required>
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
            </form>
            <?php
            if (isset($_GET['search'])) {
              $cari = $_GET['cari'];
              echo "<p>Hasil pencarian dari " . $cari . " </p>";
            }
            ?>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td>Tanggal Pengaduan</td>
                    <td>Isi Laporan</td>
                    <td>Foto</td>
                    <td>Tanggal Tnggapan</td>
                    <td>Isi Tnggapan</td>
                    <td>ID Petugas</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nik = $_SESSION['nik'];
                  if (isset($_GET['search'])) {
                    $cari = $_GET['cari'];
                    $result = mysqli_query(
                      $connect,
                      "SELECT * FROM pengaduan
                       WHERE nik = $nik OR id_pengaduan LIKE '%" . $cari . "%' OR
                       tgl_pengaduan LIKE '%" . $cari . "%'  OR
                       isi_laporan LIKE '%" . $cari . "%' OR
                       status LIKE '%" . $cari . "%'
                      "
                    );
                  } else {
                    $result = mysqli_query(
                      $connect,
                      "SELECT DATE(p.tgl_pengaduan), p.isi_laporan, p.foto, t.tgl_tanggapan, t.tanggapan, t.id_petugas
                      FROM pengaduan AS p INNER JOIN tanggapan AS t ON p.id_pengaduan=t.id_pengaduan WHERE p.nik=$nik"
                    );
                  }
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                  ?>
                      <tr>
                        <td><?= $row[0] ?></td> <!--tgl_pengaduan-->
                        <td><?= $row[1] ?></td> <!--isi_laporan-->
                        <td><?= $row[2] ?></td> <!--foto-->
                        <td><?= $row[3] ?></td> <!--tgl_tanggapan-->
                        <td><?= $row[4] ?></td> <!--tanggapan-->
                        <td><?= $row[5] ?></td> <!--id_petugas-->
                      </tr>
                    <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="11" class="text-center">
                        <h3>Mohon maaf laporan Anda belum kami tanggapi.</h3>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <footer>
    <div class="container">
      <div class="row">
        <svg class="svgcolor-light" preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0 L50 100 L100 0 Z"></path>
        </svg>
        <div class="col-md-4 col-sm-6">
          <h2>java jazz</h2>
          <div class="wow fadeInUp" data-wow-delay="0.3s">
            <p class="text-justify">Sebuah konser besar besaran, tapi tidak melebih lebihkan. Dapat ditonton oleh orang yang tuli, dan dapat didengar dengan orang buta. Berlaku untuk semua kalangan, baik muda maupun yang tidak dapat diperkerikan seperti apa mudanya.<br> Jangan lupa untuk senang.</p>
            <p class="copyright-text">Copyright &copy; 2018 <br>
              Modified by <a rel="nofollow" href="" target="_parent">Tukang Koding</a></p>
          </div>
        </div>
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-4 col-sm-5">
          <h2>Location</h2>
          <p class="wow fadeInUp" data-wow-delay="0.6s">
            Berada, dalam peredaran manusia<br>
            Masih bisa dihirup aromanya lewat hidung, dan mudah dilihat dengan mata.<br>
            Indonesia.
          </p>
          <ul class="social-icon">
            <li><a href="#" class="fa fa-facebook wow bounceIn" data-wow-delay="0.9s"></a></li>
            <li><a href="#" class="fa fa-twitter wow bounceIn" data-wow-delay="1.2s"></a></li>
            <li><a href="#" class="fa fa-behance wow bounceIn" data-wow-delay="1.4s"></a></li>
            <li><a href="#" class="fa fa-dribbble wow bounceIn" data-wow-delay="1.6s"></a></li>
          </ul>
        </div>

      </div>
    </div>
  </footer>

  <!-- Login Modal -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content modal-popup">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h2 class="modal-title">Login</h2>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <input name="usernameLogin" type="text" class="form-control" id="usernameLogin" placeholder="Username">
          <input name="passwordLogin" type="password" class="form-control" id="passwordLogin" placeholder="Password">
          <input name="loginBtn" type="submit" class="form-control" id="loginBtn" value="Login">
        </form>
      </div>
    </div>
  </div>

  <!-- Register Modal -->
  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content modal-popup">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h2 class="modal-title">Mendaftar</h2>
        </div>
        <form action="index.php" method="post">
          <input name="nikRegister" type="text" class="form-control" id="nikRegister" placeholder="NIK Anda" maxlength="16" required>
          <input name="namaRegister" type="text" class="form-control" id="namaRegister" placeholder="Nama Anda" required>
          <input name="usernameRegister" type="text" class="form-control" id="usernameRegister" placeholder="Username" required>
          <div class="row">
            <div class="col-sm-6">
              <input name="passwordRegister" type="password" class="form-control" id="passwordRegister" placeholder="Password" required>
            </div>
            <div class="col-sm-6">
              <input name="confirm_passwordRegister" type="password" class="form-control" id="confirm_passwordRegister" placeholder="Confirm Password" required>
            </div>
          </div>
          <input name="telpRegister" type="text" class="form-control" id="telpRegister" placeholder="(021)12345678" maxlength="13" required>
          <input name="registerBtn" type="submit" class="form-control" onclick="return ValidatePassword()" id="registerBtn" value="Mendaftar">
        </form>
      </div>
    </div>
  </div>



  <!-- Logout Modal-->
  <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content modal-popup">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h2 class="modal-title">Apakah anda yakin ?</h2>
        </div>
        <form action="#" method="post">
          <a class="btn btn-default" href="logout.php">Iya</a>
          <a class="btn btn-default" href="#" data-dismiss="modal" aria-label="Close">Tidak</a>
        </form>
      </div>
    </div>
  </div>


  <!-- Back top -->
  <a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>

  <!-- javscript js -->
  <script src="assets/public/js/jquery.js"></script>
  <script src="assets/public/js/bootstrap.min.js"></script>

  <script src="assets/public/js/vegas.min.js"></script>

  <script src="assets/public/js/wow.min.js"></script>
  <script src="assets/public/js/smoothscroll.js"></script>
  <script src="assets/public/js/custom.js"></script>
  <script>
    //Search fitur datatables
    $(document).ready(function() {
      $('#laporan').DataTable();
    });
  </script>

  <script src="assets/datatables/jquery.dataTables.js"></script>
  <script src="assets/datatables/dataTables.bootstrap4.js"></script>

</body>

</html>