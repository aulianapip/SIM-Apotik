<!-- REKA RACHMADI A-->
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include "assets/navbar.php";

	 ?>
	 <ul class="nav nav-tabs">
    <li class=""><a href="http://localhost/opname/cek_stok.php">CEK OBAT</a></li>
    <li class="active"><a href="">CEK OPNAME</a></li>
    </ul>
	<div class="container">
<section class="content-header">
  <h1>
    <i class="fa fa-sign-in icon-title"></i> OPNAME

    <a class="btn btn-primary btn-social pull-right" href="tambah_opname.php" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>
  	<table class="table table-hover">
		<tr><center>
			<th>NO</th>
			<th class="center">KODE OBAT</th>
			<th class="center">NAMA OBAT</th>
			<th class="center">STOK OBAT</th>
			<th class="center">STOK NYATA</th>
			<th class="center">SELSISIH</th>
			<th class="center">STATUS</th>
			<th class="center">CATATAN</th>
			<th class="center">TANGGAL INPUT</th>
			<th class="center">UPDATE</th>
			</center>
		</tr>
	<?php 
		include "koneksi/koneksi.php";

		$QuerySql = "SELECT tanggal,catatan,kode_opname,opname.kode_obat,obat.nama_obat as nama_obat,obat.Stok_Obat as Stok_Obat, obat.Stok_Obat-obat_kurang as selisih_obat,obat_kurang,status_obat FROM opname INNER JOIN obat WHERE opname.kode_obat=obat.kode_obat ";

		$tampil = mysqli_query($konek, $QuerySql);
		$no = 1;
		foreach ($tampil as $key) {
				if($key['status_obat'] != "SUKSES"){
					echo "<tr class=danger>
						<td>$no</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[Stok_Obat]</td>
						<td>$key[selisih_obat]</td>
						<td>$key[obat_kurang]</td>
						<td><strong>$key[status_obat]</strong></td>
						<td>$key[catatan]</td>
						<td>$key[tanggal]</td>
						<td><i><center><a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href=update_opname.php?kode_opname=$key[kode_opname]>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a><center></i></td>
					</tr>";
				}else if($key['status_obat'] == "SUKSES"){
					echo "<tr class=success>
						<td>$no</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[Stok_Obat]</td>
						<td>$key[selisih_obat]</td>
						<td>$key[obat_kurang]</td>
						<td><strong>$key[status_obat]</strong></td>
						<td>$key[catatan]</td>
						<td>$key[tanggal]</td>
						<td><i><center><a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href=update_opname.php?kode_obat=$key[kode_obat]>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a><center></i></td>
						</tr>";
				}
                $no++;	
				} 

	 ?>
	</table>
	</div>
</body>
</html>
