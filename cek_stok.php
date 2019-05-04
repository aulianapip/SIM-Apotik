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
    <li class="active"><a href="">CEK OBAT</a></li>
    <li class=""><a href="http://localhost/opname/cek_opname.php">CEK OPNAME</a></li>
    </ul>
	<div class="container">
  	<table class="table table-hover">
		<tr>
			<th>NO</th>
			<th>KODE OBAT</th>
			<th>NAMA OBAT</th>
			<th>STOK OBAT</th>
		</tr>
	<?php 
		include "koneksi/koneksi.php";

		$QuerySql = "SELECT *FROM obat";

		$tampil = mysqli_query($konek, $QuerySql);
		$no = 1;
		foreach ($tampil as $key) {

				echo "<tr>
						<td>$no</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[Stok_Obat]</td>
				</tr>";
                $no++;	
				} 

	 ?>
	</table>
	</div>
</body>
</html>