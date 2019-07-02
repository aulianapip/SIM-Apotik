<!--ALWAN ZAKI-->
<!--Vikri Ammar-->
<!--A.Z Kharisma-->
<!--Leonka Pellu-->
<?php
	session_start();

if (!isset($_SESSION["login1"])) {
    	  header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
	include "connection/db.php";
	$QuerySql = "SELECT sum(harga_obat*jumlah_terjual) as total FROM `tabel_penjualan` , `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat";  
	$QuerySql1 = "SELECT sum(harga_beli*jumlah_obat) AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat";
	$total_pembelian=0;
	$total_penjualan=0;
	$SQL = mysqli_query($connect, $QuerySql);
	$SQL1 = mysqli_query($connect, $QuerySql1); 
?> 
<!DOCTYPE html>
<html>
<head>
	<title>DATA KEUNTUNGAN PENJUALAN</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_pembelian.php";
 ?>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col"><center>TOTAL KEUNTUNGAN</center></th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
					$total_penjualan=$key["total"];
				}
			foreach ($SQL1 as $key) {
					$total_pembelian=$key["total"];
				}
				$hasil=$total_penjualan-$total_pembelian;
				echo "<tr>
					<td>$hasil</td>
				</tr>";
		?>
</table>
</body>
</html>
