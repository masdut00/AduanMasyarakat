<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Menu</title>
</head>
<body onload="window.print();">
<div class="table-responsive">
<table class="table table-bordered nowrap" id="laporan" width="100%" cellspacing="0">
						<thead>
							<tr>
								<td>Tanggal</td>
								<td>Nama</td>
								<td>Isi Laporan</td>
								<td>foto</td>
								<td>Status</td>
								<td>Beri Tanggapan</td>
							</tr>
						</thead>
					    <tbody>
					     <?php
					     $result = mysqli_query(
					     	$connect,
					     	"SELECT p.id_pengaduan, DATE(p.tgl_pengaduan), m.nama, p.isi_laporan, p.foto, p.status FROM pengaduan AS p INNER JOIN masyarakat as m ON p.nik=m.nik ORDER BY p.tgl_pengaduan DESC"
					     );

					     if (mysqli_num_rows($result)>0){
					     	while ($row = mysqli_fetch_array ($result)) {
					        ?>
					        <tr>
					        	<td><?= $row[1] ?></td> <!--tgl pengaduan-->
					        	<td><?= $row[2] ?></td> <!--nama-->
					        	<td><?= $row[3] ?></td><!--isi_laporan-->
					        	<td><?= $row[4] ?></td> <!--foto-->
					        	<td><!--status-->
                      <?php
                      if ($row[5] == 1) {
                        echo "<span class='badge badge-info'>Sedang Diproses</span>";
                      } else if ($row[5] == 2) {
                        echo "<span class='badge badge-success'>Selesai Diproses</span>";
                      } else {
                        echo "<span class='badge badge-warning'>Belum Diproses</span>";
                      }
                      ?>
                    </td>
					        	<td class="text-center">
                      <?php
                      if ($row[5] == 1) {
                        echo '<a href="tanggapan1.php?id=' . $row['0'] . '" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>
                           '; ?>
                        <a href="php_action/do_selesaiPengaduan.php?id=<?php echo $row[0] ?>" type="button" class="btn btn-success" onclick="return confirm('Apakah yakin pengaduan sudah diselesaikan?');"><i class="fa fa-check"></i></a>
                      <?php
                      } else if ($row[5] == 2) {
                        echo '<a href="tanggapan1.php?id=' . $row['0'] . '" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>
                           '; ?>
                        <a href="php_action/do_batalPengaduan.php?id=<?php echo $row[0] ?>" type="button" class="btn btn-danger" onclick="return confirm('Apakah yakin pengaduan batal diselesaikan?');"><i class="fa fa-ban"></i></a>
                      <?php
                      } else {
                        echo '<a href="tanggapan1.php?id=' . $row['0'] . '" type="button" class="btn btn-info"><i class="fa fa-eye"></i></a>
                         ';
                      }
                      ?>
                    </td>
					        	</tr>
					        	<?php
					            }
					          } else {
					          	?>
					          	<tr>
					          		<td colspan="11" class="text-center">
					          			<h3>Tidak ada data pengaduan</h3>
					          		</td>
					          	  </tr>
					          	<?php
					          	}
					          	?>

					          </tbody>
					        </table>
	</div>
</body>
</html>