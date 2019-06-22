<!--AZ KHARISMA P-->
<?php
	session_start();

if (!isset($_SESSION["login1"])) {
    	  header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
      
  
	include "connection/db.php";
	$QuerySql = "SELECT *,obat.harga*jumlah as total FROM `jualbeli`, `obat` WHERE  jualbeli.kodeobat=obat.kode_obat and jualbeli.jenis='debit'";

	$SQL = mysqli_query($connect, $QuerySql); 
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_penjualan.php";
 ?>
<table class="table is-fullwidth" >
  <thead>
    <tr>
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
				echo "<tr>
						<td>IT$key[id]</td>
						<td>$key[tanggal]</td>
						<td>$key[kodeobat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[harga]</td>
						<td>$key[jumlah]</td>
						<td>$key[total]</td>
				</tr>";
                	
				}
		?>
</table>
</body>
</html>
