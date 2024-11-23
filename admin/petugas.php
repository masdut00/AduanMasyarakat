<?php require_once 'includes/header.php';
include_once 'php_action/do_tambahPetugas.php';
include_once 'php_action/do_editPetugas.php';
include_once 'php_action/do_hapusPetugas.php';
 ?>

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
        <i class="fa fa-table"></i> Data Petugas
      </div>

      <div class="card-body">
        <div class="float-right" style="padding-bottom:20px;">
          <button class="btn btn-outline-dark" data-toggle="modal" data-target="#tambahPetugas"> <i class="fa fa-plus fa-fw"></i>Tambah Petugas</button>
        </div>  

        <!--div tabel-->
        <div class="table-responsive">

          <br>
          <table class="table table-bordered" id="petugas" width="100%" cellspacing="0">
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
                $query = mysqli_query(
                  $connect,
                  "SELECT * FROM petugas ORDER BY id_petugas ASC"
                );
              
              if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_array($query)) {
              ?>
                  <tr>

                    <td><?= $row[0] ?></td> <!--id_petugas-->
                    <td><?= $row[1] ?></td> <!--nama_petugas-->
                    <td><?= $row[2] ?></td> <!--username-->
                    <td><?= $row[4] ?></td> <!--telepon-->
                    <td><?= $row[5] ?></td> <!--level-->
                    <td>
                      <button data-toggle="modal" data-target="#editPetugas"
                      data-id_petugas="<?= $row[0] ?>"
                      data-nama_petugas="<?= $row[1] ?>"
                      data-username="<?= $row[2] ?>"
                      data-telp="<?= $row[4] ?>"
                      data-password="<?= $row[3] ?>"
                      data-level="<?= $row[5] ?>"
                      onclick="formEdit(this);" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i></button>
                      <button data-toggle="modal" data-target="#deletePetugas"
                      data-id_petugas="<?= $row[0] ?>"
                      data-nama_petugas="<?= $row[1] ?>"
                      onclick="formDelete(this);" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></button>
                    </td>
                  </tr>
                <?php
                }
              } else {
                ?>
                <tr>
                  <td colspan="11" class="text-center">
                    <h3>Tidak ada data</h3>
                  </td>
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
  <div class="modal fade" id="tambahPetugas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" action="petugas.php" method="post">
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
                <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
              </div>
              <div class="col-sm-6">
                <input name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
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

    <!--modal edit-->
    <div class="modal fade" id="editPetugas" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" action="petugas.php" method="post">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-pencil-square-o"></i>Edit Petugas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" name="id_petugas" id="id_petugas" readonly autocomplete="off" autofocus>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="nama_petugas" placeholder="Nama" id="nama_petugas" required autocomplete="off" autofocus>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" id="username" autocomplete="off" required autofocus>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <input name="password" type="password" class="form-control" id="password" placeholder="Password" required autofocus>
                </div>
                <div class="col-sm-6">
                  <input name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                </div>
              </div>
              <br>
              <div class="form-group">
                <input type="text" class="form-control" name="telp" id="telp" placeholder="Telepon" autocomplete="off" required>
              </div>
              <div class="form-group">
                <select class="custom-select" name="level" id="level" required>
                  <option value="" selected disabled>Level</option>
                  <option value="1">Admin</option>
                  <option value="2">Petugas</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-dark" name="editPetugas" autocomplete="off">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <!--modal hapus-->
  <div class="modal fade" role="dialog" tabindex="-1" id="deletePetugas" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">              
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
            ID Petugas :<input type="text" class="form-control" id="id_petugas" readonly>
            </div>
            <div class="col-sm-6">
            Nama Petugas :<input type="text" class="form-control" id="nama_petugas" readonly>
            </div>
          </div>
          <h2>Apakah anda yakin untuk menghapus data tersebut?</h2>
          <form action="petugas.php" method="POST" id="deleteForm">
            <input type="hidden" id="id_petugas" name="id_petugas">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
          <button type="submit" name="delete" class="btn btn-danger">Yakin</button>
        </div>
        </form>
    </div>
    </div>
  </div>

  <!--script mengisi form-->
  <script type="text/javascript">
    function formEdit(item) {
      var id_petugas = $(item).data('id_petugas');
      var nama_petugas = $(item).data('nama_petugas');
      var username = $(item).data('username');
      var telp = $(item).data('telp');
      var password = $(item).data('password');
      var level = $(item).data('level');

      // mengisi ke form
      $('#editPetugas .form-group #id_petugas').val(id_petugas);
      $('#editPetugas .form-group #nama_petugas').val(nama_petugas);
      $('#editPetugas .form-group #username').val(username);
      $('#editPetugas .form-group #telp').val(telp);
      $('#editPetugas .form-group #password').val(password);
      $('#editPetugas .form-group #level').val(level);
    }

    function formDelete(item) {
      var id_petugas = $(item).data('id_petugas');
      var nama_petugas = $(item).data('nama_petugas');

      // mengisi ke form
      $('#deletePetugas #id_petugas').val(id_petugas);
      $('#deletePetugas #nama_petugas').val(nama_petugas);
    }
  </script>
  
  <?php require_once 'includes/footer.php'; ?>