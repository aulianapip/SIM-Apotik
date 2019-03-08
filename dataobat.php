<?php
	include 'db.php';
	$QuerySql = "SELECT `nama_obat`,`harga_obat`,`kode_obat`,`nama_jenis`,`tanggal_kadaluarsa`,`bulan_kadaluarsa`,`tahun_kadaluarsa`,`Stok_Obat` FROM `obat`, `jenis_obat` WHERE jenis_obat.kode_jenis=obat.kode_jenis";
	$SQL = mysqli_query($connect, $QuerySql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
</head>
<body>

</body>
</html>
