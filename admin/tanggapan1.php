<?php
require_once 'includes/header.php';
include_once 'php_action/do_tambahTanggapan.php';
include_once 'php_action/do_editTanggapan.php';

$id_pengaduan = $_GET['id'];
$query = mysqli_query($connect, "SELECT p.id_pengaduan, p.tgl_pengaduan, m.nama, p.isi_laporan, p.foto, p.status, t.id_tanggapan, t.tgl_tanggapan, t.tanggapan, pe.nama_petugas 
FROM pengaduan AS p LEFT JOIN tanggapan AS t ON p.id_pengaduan = t.id_pengaduan 
LEFT JOIN petugas AS pe ON t.id_petugas = pe.id_petugas
LEFT JOIN masyarakat AS m ON p.nik = m.nik
WHERE p.id_pengaduan=$id_pengaduan");

$data = mysqli_fetch_array($query);
?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Tanggapan</li>
    </ol>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-sticky-note"></i> Data Tanggapan
      </div>

      <!--modal edit-->
      <div class="modal fade" id="editTanggapan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form class="form-horizontal" action="" method="post">
              <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit fa-fw"></i>Edit Tanggapan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="id_tanggapan">ID Tanggapan</label>
                  <input type="text" class="form-control" id="id_tanggapan" name="id_tanggapan" placeholder="Masukkan id_tanggapan" value="<?php echo $data[6]; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="tanggapan">Isi Tanggapan</label>
                  <textarea class="form-control" id="tanggapan" name="tanggapan" rows="5" placeholder="Masukkan tanggapan yang ingin disampaikan" required><?php echo $data[8]; ?></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-dark" name="editTanggapan" autocomplete="off">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!--modal tambah-->
      <div class="modal fade" id="tambahTanggapan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form class="form-horizontal" action="" method="post">
              <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Tambah Tanggapan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="id_pengaduan" name="id_pengaduan" placeholder="Masukkan id_pengaduan" value="<?php echo $data[0]; ?>" readonly hidden>
                </div>
                <div class="form-group">
                  <label for="tanggapan">Isi Tanggapan</label>
                  <textarea class="form-control" id="tanggapan" name="tanggapan" rows="5" placeholder="Masukkan tanggapan yang ingin disampaikan" required><?php echo $data[8]; ?></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-dark" name="tambahTanggapan" autocomplete="off">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!--modal hapus-->
      <div class="modal fade" tabindex="-1" role="dialog" id="hapusTanggapan">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fa fa-fw fa-trash"></i> Hapus Tanggapan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Apakah tanggapan ini akan dihapus ?</p>
            </div>
            <div class="modal-footer confirmPesananFooter">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-fw fa-times"></i> Tutup</button>
              <?php echo '<a href="php_action/do_hapusTanggapan.php?id_tanggapan=' . $data[6] . '&&id_pengaduan=' . $data[0] . '" class="btn btn-outline-dark btn-delete"> <i class="fa fa-fw fa-check"></i> Iya</a>'; ?>
            </div>
          </div>
        </div>
      </div>

      <!--halaman tanggapan-->
      <div class="row">
        <div class="col-sm-6 col-md-7 col-lg-10 mx-auto">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
              <div class="float" style="padding-bottom:20px;">
                <div>
                  <a class="btn btn-info" href="laporan.php">Kembali</a>
                  <div class="float-right" style="padding-bottom:200px;" >
                    <button onclick="window.print()" class = "btn btn-outline-dark">PRINT</button>
                  </div>
                </div>

              </div>
              <div class="row mt-4">
                <div class="col-6">
                  <div class="form-group">
                    <label for="id_pengaduan">ID Pengaduan : <?php echo $data[0]; ?>
                      <?php
                      if ($data[5] == 1) {
                        echo "<span class='badge badge-info'>Sedang Diproses</span>";
                      } else if ($data[5] == 2) {
                        echo "<span class='badge badge-success'>Selesai Diproses</span>";
                      } else {
                        echo "<span class='badge badge-warning'>Belum Diproses</span>";
                      }
                      ?>
                    </label><br>
                    <label for="tgl_pengaduan">Tanggal Pengaduan : <?php echo $data[1]; ?></label><br>
                    <label for="nama_pelapor">Nama Pelapor : <?php echo $data[2]; ?></label><br>
                    <label for="isi_laporan">Isi Pengaduan</label>
                    <textarea class="form-control ml-2" id="isi_laporan" name="isi_laporan" rows="5" readonly><?php echo $data[3]; ?></textarea><br>
                    <label for="foto">Bukti Foto Pengaduan</label><br>
                    <img src="../images/pengaduan/<?php echo $data[4]; ?>" class="img-fluid rounded float-left d-block img-thumbnail" alt="Bukti Foto">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <div class="float-right">
                      <?php
                      if ($data[5] == 0) {
                        echo '<a class="btn btn-success"  data-toggle="modal" data-target="#tambahTanggapan"><i class="fa fa-plus"></i></a>';
                      } else {
                        echo '<a class="btn btn-warning"  data-toggle="modal" data-target="#editTanggapan"><i class="fa fa-edit"></i></a>';
                        echo ' <a class="btn btn-danger" data-toggle="modal" data-target="#hapusTanggapan"><i class="fa fa-trash"></i></a>';
                      }
                      ?>
                    </div>
                    <label for="id_pengaduan">ID Tanggapan : <?php echo $data[6]; ?></label><br>
                    <label for="tgl_pengaduan">Tanggal Tanggapan : <?php echo $data[7]; ?></label><br>
                    <label for="nama_petugas">Nama Petugas : <?php echo $data[9]; ?></label><br>
                    <label for="isi_laporan">Isi Tanggapan</label>
                    <textarea class="form-control ml-2" id="isi_laporan" name="isi_laporan" rows="5" readonly><?php echo $data[8]; ?></textarea><br>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
</div>
</div>
<?php require_once 'includes/footer.php'; ?>