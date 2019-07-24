<!--ALWAN ZAKI-->
<!--Vikri Ammar Kholis 1700018243 (Menambah fitur dan memperbaiki fitur)-->
<!--A.Z Kharisma-->
<!--Leonka Pellu-->
<?php
	session_start();

if (!isset($_SESSION["login1"])) {
    	  header("location: http://localhost/apotik-keuangan/login.php"); //mengonectkan ke pada file login.php
      exit;
    }
	include "connection/db.php"; // mengonectkan ke database
	$QuerySql = "SELECT sum(harga_obat*jumlah_terjual) as total FROM `tabel_penjualan` , `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat";  //query menjumlah tabel harga obat dan mengkali kan dengan jumlah tabel jumlah terjual sebagai total dari tabel penjualan dan obat di sortir berdasarkan tabel penjualan.kode obat=obat.kode obat 
	$QuerySql1 = "SELECT sum(harga_beli*jumlah_obat) AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat";//query menjumlah tabel harga obat dan mengkali kan dengan jumlah tabel jumlah terjual sebagai total dari tabel penjualan dan obat di sortir berdasarkan tabel penjualan.kode obat=obat.kode obat 
	$total_pembelian=0;
	$total_penjualan=0;
	$SQL = mysqli_query($connect, $QuerySql);
	$SQL1 = mysqli_query($connect, $QuerySql1); 
?> 
<!DOCTYPE html>
<html>
<head>
	<title>DATA KEUNTUNGAN PENJUALAN</title>
	<link rel="stylesheet" href="bulma.min.css"><!--untuk mengconnect kan ke css -->
</head>
<body>
<?php 
  include "navbar/navbar_pembelian.php"; //ditampil kan di file navbar_pembelian.php
 ?>
<table class="table is-fullwidth" > <!--untuk membuat tampilan tabel -->
  <thead>
    <tr>
      <th scope="col"><center>TOTAL KEUNTUNGAN</center></th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
					$total_penjualan=$key["total"]; //mengconnect kan dengan queery 1 di atas 
				}
			foreach ($SQL1 as $key) {
					$total_pembelian=$key["total"]; //mengconnect kan dengan queery 2 di atas 
				}
				$hasil=$total_penjualan-$total_pembelian; //rumus
				echo "<tr>
					<td>$hasil</td>
				</tr>";
		?>
</table>
</body>
</html>
