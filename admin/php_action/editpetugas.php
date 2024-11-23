<div class="modal fade" id="tambahPetugas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="petugas.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Add Categoriess</h5>
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
          <button type="submit" class="btn btn-outline-dark" name="addTicket" autocomplete="off">Simpan</button>
        </div>
      </form>
    </div>
  </div>
 </div>