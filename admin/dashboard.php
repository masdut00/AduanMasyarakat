<?php require_once 'includes/header.php';
include_once 'php_action/fetchDashboard.php';
 ?>
<link rel="icon" type="image/png" href="../assets/toa.jpg" /> 
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
    <div class=" col-sm-12 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-comments"></i>
            </div>
            <div class="mr-5"><?php echo $jumlahLaporan; ?> Total Laporan</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="laporan.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-4 col-sm-4 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-commenting"></i>
            </div>
            <div class="mr-5"><?php echo $jumlahBelum; ?> Laporan Belum Ditanggapi</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="laporan.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-4 col-sm-4 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-commenting"></i>
            </div>
            <div class="mr-5"><?php echo $jumlahBooking; ?> Laporan Sedang Diproses</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="laporan.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-4 col-sm-4 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-commenting"></i>
            </div>
            <div class="mr-5"><?php echo $jumlahBooked; ?> Laporan Sudah Ditanggapi</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="laporan.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
      
    
      <!-- Example Bar Chart Card-->
     
        <!-- Card Columns Example Social Feed-->
  </div>

<?php require_once 'includes/footer.php'; ?>