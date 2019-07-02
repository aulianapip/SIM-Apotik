<?php
session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["login1"])) {
      header("location: http://localhost/apotik-keuangan/home.php");
      exit;
    }
      


	include 'db.php';
	$QuerySql = "SELECT * FROM `obat`, `jenis_obat` WHERE jenis_obat.kode_jenis=obat.kode_jenis ORDER BY `harga_obat` DESC";
	$SQL = mysqli_query($connect, $QuerySql);
?>

<!--Gifari Nanda-->

<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "1navbar_obat.php";
 ?>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col">Nama Obat</th>
      <th scope="col">Harga Obat</th>
      <th scope="col">Kode Obat</th>
      <th scope="col">Jenis Obat</th>
      <!--th scope="col">Tanggal Kadaluarsa</th>   <!--mohamad rifky fajri perbaiki tabel tanggal kadaluarsa-->
      <!--th scope="col">Bulan Kadaluarsa</th>
      <th scope="col">Tahun Kadaluarsa</th-->
      <th scope="col">Stok Obat</th>
      <th scope="col">Tanggal</th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				echo "<tr>
						<td>$key[nama_obat]</td>
						<td>$key[harga_obat]</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_jenis]</td>
						<td>$key[Stok_Obat]</td>
						<td>$key[tanggal_input]</td>
				</tr>";
			}
		?>
</table>
</body>
</html>