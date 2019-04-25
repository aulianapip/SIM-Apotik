<!--AZ KHARISMA PRATAMA-->
<!--1700018272-->
<!--
Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
-->
<?php
	session_start();

if (!isset($_SESSION["login1"])) {//untuk login sebelum function
    	  header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
      
  
	include "connection/db.php"; //panggilan database 
	$QuerySql = "SELECT *,harga_obat*jumlah_terjual as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat";//untuk menampilkan hatga jual obat

	$SQL = mysqli_query($connect, $QuerySql); //untuk menghubungkan mysql database
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
<table class="table is-fullwidth" ><!--tabel untuk menampilkan data penjualan obat -->
  <thead>
    <tr>
      <th scope="col"><a href="s_penjualan_id.php"> ID PENJUALAN</a></th><!--menampilkan Id data penjualan -->
      <th scope="col"><a href="s_penjualan_tanggal.php">TANGGAL TERJUAL</a></th><!--menampilkan tanggal penjualan obat -->
      <th scope="col"><a href="s_penjualan_ko.php">KODE OBAT</a></th><!--menampilkan kode obat untuk penjualan -->
      <th scope="col"><a href="s_penjualan_nama.php">NAMA OBAT</a></th><!--menampilkan nama obat yang terjual -->
      <th scope="col"><a href="s_penjualan_harga.php">HARGA OBAT</a></th><!--menampilkan nama obat yang terjual -->
      <th scope="col"><a href="s_penjualan_jumlah.php">JUMLAH TERJUAL</a></th><!--menampilkan jumlah obat yang terjual -->
      <th scope="col"><a href="s_penjualan_total.php">HARGA TOTAL</a></th><!--menampilkan harga total obat yang terjual -->
    </tr>
  </thead>
		<?php
		//panggilan data atribut di php
			foreach ($SQL as $key) {
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
