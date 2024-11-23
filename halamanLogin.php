<?php
require_once 'php_action/db_connect.php';
include_once 'php_action/do_login.php';
include_once 'php_action/do_register.php';
include_once 'php_action/do_kirimLaporan.php';

if (isset($_SESSION['nik'])) {
	echo "<script>alert('Eitss, ente sudah login. Silahkan logout dulu lah'); window.location.replace('index.php')</script>";
  }
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
	<link rel="icon" href="assets/toa.jpg">
	<link rel="stylesheet" href="assets/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/public/css/animate.min.css">
	<link rel="stylesheet" href="assets/public/css/et-line-font.css">
	<link rel="stylesheet" href="assets/public/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/public/css/vegas.min.css">
	<link rel="stylesheet" href="assets/public/css/style.css">

	<link href='https://fonts.googleapis.com/css?family=Rajdhani:400,500,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet">


</head>

<body>

	<!-- preloader section -->
	<section class="preloader">
		<div class="sk-circle">
			<div class="sk-circle1 sk-child"></div>
			<div class="sk-circle2 sk-child"></div>
			<div class="sk-circle3 sk-child"></div>
			<div class="sk-circle4 sk-child"></div>
			<div class="sk-circle5 sk-child"></div>
			<div class="sk-circle6 sk-child"></div>
			<div class="sk-circle7 sk-child"></div>
			<div class="sk-circle8 sk-child"></div>
			<div class="sk-circle9 sk-child"></div>
			<div class="sk-circle10 sk-child"></div>
			<div class="sk-circle11 sk-child"></div>
			<div class="sk-circle12 sk-child"></div>
		</div>
	</section>

	<?php

	if (isset($_SESSION['nik'])) {
		echo '

		<div class="userlogname">
			</span> ' . $_SESSION['nama'] . ' </span>
		</div>
		<div class="nameuser">
		<button type="button" class="btn btn-lg btn-default  userLogin" name="button"><img src="images/avatar.png" style="height: 20px;"><span style="userLoginUsername"></span> ' . $_SESSION['nama'] . ' </span></button>
		</div>
		<br>
		<div class="user">
			<a href="#" data-toggle="modal" data-target="#logout" class="btn btn-lg btn-default userLogin">Logout</a>
		</div>
		';
	} else {
	// 	echo '
	// 	<div class="user">
	// 		<a href="#" data-toggle="modal" data-target="#login" class="btn btn-lg btn-default userLogin">Login</a>
	// 	</div><br>
	// 	<div class="user">
	// 		<a href="#" data-toggle="modal" data-target="#register" class="btn btn-lg btn-default userLogin">Mendaftar</a>
	// 	</div>
	// ';
	}

	?>

	<!-- home section -->
	<section id="home">
		<div class="container">
			<div class="row">

				<div class="col-md-offset-2 col-md-8 col-sm-12">
					<div class="home-thumb">
						<h1 class="wow fadeInUp" data-wow-delay="0.4s">Selamat Datang Di layanan Pengaduan Masyarakat </h1>
						<h3 class="wow fadeInUp" data-wow-delay="0.6s">Kami akan <strong>Selalu Bersedia</strong> untuk membantu <strong>kapanpun</strong> dan dimanapun.</h3>
						<?php
						if (isset($_SESSION['nik'])) {
						?>
							<a href="#contact" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" data-wow-delay="0.8s">Buat Laporan</a>
							<a href="lapor1.php" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" data-wow-delay="0.8s">Lihat Laporan</a>
							<a href="tanggap1.php" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" data-wow-delay="0.8s">Lihat Tanggapan</a>
						<?php
						} else {
							echo '<a href="#" data-toggle="modal" data-target="#login" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" data-wow-delay="0.8s">Login untuk Melapor</a>
							<a href="#" data-toggle="modal" data-target="#register" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" data-wow-delay="0.8s">Mendaftar untuk Melapor</a>';
						}
						?>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- about section -->
	<section id="about">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-sm-12">
					<img src="images/banner.jpg" class="img-responsive wow fadeInUp" alt="Java Jazz Festival">
				</div>

				<div class="col-md-6 col-sm-12">
					<div class="about-thumb">
						<div class="section-title">
							<h1 class="wow fadeIn" data-wow-delay="0.2s">Laporin Yuk</h1>
							<h3 class="wow fadeInUp" data-wow-delay="0.4s">Indonesia buka suara, kita semua pasti bisa.</h3>
						</div>
						<div class="wow fadeInUp" data-wow-delay="0.6s">
							<p>Lapokan masalah apa saja yang sedang terjadi. Laporan yang kami terima akan segera kami proses demi kenyamanan kita semua. Mari aspirasikan suara masyarakat agar indonesia semakin maju.
								<br>
								<br>
							Dengan aplikasi ini, kita menampung berbagai macam laporan yang sedang terjadi di masyarakat, seperti, Banjir, Kebakaran, Pohon tumbang, Jalan berlubang, Dll.
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Person section -->
	<section id="feature">
		<div class="container">
			<div class="row">

				<svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="svgcolor-light">
					<path d="M0 0 L50 100 L100 0 Z"></path>
				</svg>

				<div class="col-md-4 col-sm-6">
					<div class="media wow fadeInUp" data-wow-delay="0.4s">
						<div class="media-object media-left">
							<i class="icon icon-laptop"></i>
						</div>
						<div class="media-body">
							<h2 class="media-heading">Cepat tanggap</h2>
							<p>Laporan yang masuk akan segera kami tanggapi demi kenyamanan masyarakat.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-6">
					<div class="media wow fadeInUp" data-wow-delay="0.8s">
						<div class="media-object media-left">
							<i class="icon icon-refresh"></i>
						</div>
						<div class="media-body">
							<h2 class="media-heading">Respon Cepat</h2>
							<p>Kami memiliki petugas yang sigap ketika ada laporan masuk, sehingga bisa cepat mengatasi masalah yang ada.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-8">
					<div class="media wow fadeInUp" data-wow-delay="1.2s">
						<div class="media-object media-left">
							<i class="icon icon-chat"></i>
						</div>
						<div class="media-body">
							<h2 class="media-heading">Admin 24 Jam</h2>
							<p>Kami bekerja 24 jam non stop untuk menerima laporan dari masyarakat.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<?php
	if (isset($_SESSION['nik'])) {
	?>
		<!-- pengaduan section -->
		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8 col-sm-12">
						<div class="section-title">
							<h1 class="wow fadeInUp" data-wow-delay="0.3s">Form Pengaduan Masyarakat</h1>
							<p class="wow fadeInUp" data-wow-delay="0.6s">Yang kamu mau, akan kami kuruti. Tapi maaf kami tidak bisa menuruti semua yang kamu mau.</p>
						</div>
						<div class="contact-form wow fadeInUp" data-wow-delay="1.0s">
							<form id="contact-form" method="post" action="index.php" enctype="multipart/form-data">

								<div class="col-md-6 col-sm-6">
									<label for="foto">Bukti Foto</label>
									<input name="foto" type="file" placeholder="Upload Foto" accept="image/*" required>
								</div>

								<div class="col-md-12 col-sm-12">
									<textarea name="isi_laporan" class="form-control" placeholder="Apa yang ingin Anda laporkan?" rows="6" required></textarea>
								</div>
								<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
									<input name="btnMessages" type="submit" class="form-control submit" id="submit" value="KIRIM LAPORAN">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php
	}
	?>
	<!-- footer section -->
	<!-- <footer>
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
	</footer> -->
	<?php include_once 'include/footer.php'; ?>

	<!-- Login Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h2 class="modal-title">Login</h2>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<input name="usernameLogin" type="text" class="login__input" id="usernameLogin" placeholder="Username">
					<input name="passwordLogin" type="password" class="login__input" id="passwordLogin" placeholder="Password">		
					<input name="loginBtn" type="submit" class="login__submit" id="loginBtn" value="Login">
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
					<input name="nikRegister" type="text" class="login__input" id="nikRegister" placeholder="NIK Anda" maxlength="16" required>
					<input name="namaRegister" type="text" class="login__input" id="namaRegister" placeholder="Nama Anda" required>
					<input name="usernameRegister" type="text" class="login__input" id="usernameRegister" placeholder="Username" required>
					<div class="row">
						<div class="col-sm-6">
							<input name="passwordRegister" type="password" class="login__input" id="passwordRegister" placeholder="Password" required>
						</div>
						<div class="col-sm-6">
							<input name="confirm_passwordRegister" type="password" class="login__input" id="confirm_passwordRegister" placeholder="Confirm Password" required>
						</div>
					</div>
					<input name="telpRegister" type="text" class="login__input" id="telpRegister" placeholder="(021)12345678" maxlength="13" required>
					<input name="registerBtn" type="submit" class="login__submit" id="registerBtn" value="Mendaftar">
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

</body>

</html>