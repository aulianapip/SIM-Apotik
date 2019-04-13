<?php
	include 'db.php';
	$QuerySql = "SELECT `nama_obat`,`harga_obat`,`kode_obat`,`dosis_obat`,`nama_jenis`,`tanggal_kadaluarsa`,`bulan_kadaluarsa`,`tahun_kadaluarsa`,`Stok_Obat` FROM `obat`, `jenis_obat` WHERE jenis_obat.kode_jenis=obat.kode_jenis";
	$SQL = mysqli_query($connect, $QuerySql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="materialize.min.css">
</head>
<body>
<nav class="nav-extended">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="active"><a href="">Analitik</a></li>
      </ul>
      <a href="" class="brand-logo">SIM-Apotek</a>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a class="active" href="">Obat</a></li>
        <li class="tab"><a href="">Pelanggan</a></li>
        <li class="tab"><a href="">Supplier</a></li>
      </ul>
    </div>
</nav>
<table class="striped">
  <thead>
    <tr>

    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				echo "<tr>

				</tr>";
			}
		?>
</table>
</body>
</html>