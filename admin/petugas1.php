<?php require_once 'includes/header.php'; ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Petugas</li>
    </ol>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Data Petugas</div>
        
      <div class="card-body">
      <div class="float-right" style="padding-bottom:20px;">
          <button class="btn btn-outline-dark" data-toggle="modal" data-target="#petugas"> <i class="fa fa-plus fa-fw"></i>Tambah Petugas</button>
      </div>
      <form class="form-inline" method="get" action="petugas.php">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" name="cari" required>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
      </form>

      <!--div tabel-->
        <div class="table-responsive">
            <?php 
              if (isset($_GET['search'])) {
                $cari = $_GET['cari'];
                echo "<h2>Hasil pencarian dari ".$cari." </h2>";
              }
            ?>
            <br>
          <table class="table table-bordered" id="LaporanTable" width="100%" cellspacing="0">
          <thead>
                  <tr>
                    
                    <td>ID Petugas</td>
                    <td>Nama Petugas</td>
                    <td>Username</td>
                    <td>Telepon</td>
                    <td>Level</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if (isset($_GET['search'])) {
                      $cari = $_GET['cari'];
                      $result = mysqli_query($connect,
                      "SELECT * FROM petugas 
                       WHERE id_petugas LIKE '%".$cari."%' OR
                       nama_petugas LIKE '%".$cari."%' OR
                       username LIKE '%".$cari."%' OR
                       telp LIKE '%".$cari."%' OR
                       level LIKE '%".$cari."%'
                      ORDER BY id_petugas ASC");
                    }
                    else {
                      $result = mysqli_query($connect,
                      "SELECT * FROM petugas ORDER BY id_petugas ASC");
                    }
                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                          
                          <td><?=$row[0]?></td> <!--id_petugas-->
                          <td><?=$row[1]?></td> <!--nama_petugas-->
                          <td><?=$row[2]?></td> <!--username-->
                          <td><?=$row[4]?></td> <!--telepon-->
                          <td><?=$row[5]?></td> <!--level-->
                          <td>
                            <button class="btn btn-outline-dark" data-toggle="modal" data-target="#editPetugas"> <i class="fa fa-pencil-square-o"></i>Tambah Petugas</button>
                            <a class="btn btn-outline-danger" href="php_action/hapusPetugas.php?id=<?=$row[0]?>" onclick="return confirm('Apakah anda yakin menghapus data dengan nama <?=$row[1]?>')">Hapus</a>
                          </td> 
                        </tr>
                        <?php
                      }
                    }
                    else {
                      ?>
                      <tr>
                        <td colspan="11" class="text-center"><h3>Tidak ada data</h3></td>
                      </tr>
                      <?php
                    }
                   ?>
                </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

  </div>

  <!--modal tambah-->
  <div class="modal fade" id="petugas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="php_action/tambahPetugas.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Tambah Petugas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="id_petugas" placeholder="ID Petugas" autocomplete="off" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="nama_petugas" placeholder="Nama" autocomplete="off" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
          </div>
          <div class="row">
				    <div class="col-sm-6">
					    <input name="passwordRegister" type="password" class="form-control" id="passwordRegister" placeholder="Password" required>
				    </div>
				    <div class="col-sm-6">
					    <input name="confirm_passwordRegister" type="password" class="form-control" id="confirm_passwordRegister" placeholder="Confirm Password" required>
				    </div>
			    </div>
          <br>
          <div class="form-group">
            <input type="text" class="form-control" name="telp" placeholder="Telepon" autocomplete="off" required>
          </div>
          <div class="form-group">
            <select class="custom-select" name="level" required>
                <option value="" selected disabled>Level</option>
                <option value="1">Admin</option>
                <option value="2">Petugas</option>
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-dark" name="tambahPetugas" autocomplete="off">Simpan</button>
        </div>
      </form>
    </div>
  </div>
 </div>

 <!-- Modal edit petugas -->

<?php
$id = $_GET['id'];
$result = mysqli_query ($connect, "SELECT * FROM petugas WHERE id_petugas = '$id'");
$row = mysqli_fetch_array($result);
?>

 <div class="modal fade" id="editPetugas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="php_action/editPetugas.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Edit Petugas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="jenis_tiket" placeholder="Jenis Tiket" autocomplete="off" required>
          </div>
          <div class="form-group">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp.</div>
              </div>
              <input type="text" class="form-control" id="inlineFormInputGroup" name="harga_tiket" placeholder="Harga Tiket" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="stock_tiket" placeholder="Stock Ticket" autocomplete="off" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-dark" name="addTicket" autocomplete="off">Save changes</button>
        </div>
      </form>
    </div>
  </div>
 </div>


<?php require_once 'includes/footer.php'; ?>
