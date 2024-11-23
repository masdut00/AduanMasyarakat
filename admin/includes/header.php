<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/core.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pengaduan Masyarakat | Admin Panel</title>
    <!-- Bootstrap core CSS-->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../assets/custom/custom.css" rel="stylesheet">
    <link href="../assets/custom/fpdf.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../assets/toa.jpg" /> 
  </head>
  <body class="fixed-nav sticky-footer bg-dark">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="dashboard.php">Pengaduan Masyarakat | <?php echo $_SESSION['username']; ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
      if ($_SESSION['level'] == 1) {
				 	?>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="dashboard.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
            <a class="nav-link" href="laporan.php">
              <i class="fa fa-fw fa-comments"></i>
              <span class="nav-link-text">Laporan</span>
            </a>
          </li>
          <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tanggapan">
            <a class="nav-link" href="tanggapan.php">
              <i class="fa fa-fw fa-pencil-square-o"></i>
              <span class="nav-link-text">Tanggapan</span>
            </a>
          </li> -->
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Masyarakat">
            <a class="nav-link" href="masyarakat.php">
              <i class="fa fa-fw fa-users"></i>
              <span class="nav-link-text">Masyarakat</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Petugas">
            <a class="nav-link" href="petugas.php">
              <i class="fa fa-fw fa-user-circle"></i>
              <span class="nav-link-text">Petugas</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#logout">
              <i class="fa fa-fw fa-sign-out"></i>Logout</a>
          </li>
        </ul>
      </div>
      <?php
      }
      if ($_SESSION['level'] == 2) {
				 	?>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="dashboard.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
            <a class="nav-link" href="laporan.php">
              <i class="fa fa-fw fa-comments"></i>
              <span class="nav-link-text">Laporan</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tanggapan">
            <a class="nav-link" href="tanggapan.php">
              <i class="fa fa-fw fa-pencil-square-o"></i>
              <span class="nav-link-text">Tanggapan</span>
            </a>
          </li>
          <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Masyarakat">
            <a class="nav-link" href="masyarakat.php">
              <i class="fa fa-fw fa-users"></i>
              <span class="nav-link-text">Masyarakat</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Petugas">
            <a class="nav-link" href="petugas.php">
              <i class="fa fa-fw fa-user-circle"></i>
              <span class="nav-link-text">Petugas</span>
            </a>
          </li> -->
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#logout">
              <i class="fa fa-fw fa-sign-out"></i>Logout</a>
          </li>
        </ul>
      </div>
      <?php
				 }
				 ?>
    </nav>

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
