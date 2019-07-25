<!--ALDIANSYAH DARMAWAN-->
<?php
	session_start();

if (!isset($_SESSION["login1"])) {
    	  header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
      
  
	include "connection/db.php";
	$QuerySql = "SELECT *,harga_obat*jumlah_terjual as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat ORDER BY tabel_penjualan.id_penjualan ASC ";

	$SQL = mysqli_query($connect, $QuerySql); 
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="bulma.min.css"> <!-- Memanggil file css-->
</head>
<body>
<?php 
  include "navbar/navbar_penjualan.php";
 ?>
<table class="table is-fullwidth" >
  <thead>
    <tr><!-- Menampilkan atribut id tanggal kodeobat nama obat harga jumlah dan harga total-->
      <th scope="col"><a href="s_penjualan_id.php"> ID PENJUALAN</a></th>
      <th scope="col"><a href="s_penjualan_tanggal.php">TANGGAL TERJUAL</a></th>
      <th scope="col"><a href="s_penjualan_ko.php">KODE OBAT</a></th>
      <th scope="col"><a href="s_penjualan_nama.php">NAMA OBAT</a></th>
      <th scope="col"><a href="s_penjualan_harga.php">HARGA OBAT</a></th>
      <th scope="col"><a href="s_penjualan_jumlah.php">JUMLAH TERJUAL</a></th>
      <th scope="col"><a href="s_penjualan_total.php">HARGA TOTAL</a></th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
					##Memanggil value yang ada
				echo "<tr>
						<td>$key[id_penjualan]</td>
						<td>$key[tanggal_terjual]</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[harga_obat]</td>
						<td>$key[jumlah_terjual]</td>
						<td>$key[total]</td>
				</tr>";
                	
				}
		?>
</table>
</body>
</html>
