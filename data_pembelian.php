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
	include "connection/db.php";
	$QuerySql = "SELECT *,harga_beli*jumlah_obat AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat"; //untuk menampilkan jumlah harga beli obat

	$SQL = mysqli_query($connect, $QuerySql); //untuk menghubungkan dengan mysql databases
?> 
<!DOCTYPE html> 
<html>
<head>
	<title>DATA PEMBELIAN</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_pembelian.php";
 ?>
<table class="table is-fullwidth" > <!--untuk menampilkan tabel data pembelian-->
  <thead>
    <tr>
      <th scope="col"><a href="s_pembelian_supplier.php"> ID PEMBELIAN</a></th> <!--menampilkan Id supplay yang membeli -->
      <th scope="col"><a href="s_pembelian_tanggal.php">TANGGAL PEMBELIAN</a></th> <!--menampilkan tanggal kapan obatnya di beli -->
      <th scope="col"><a href="s_pembelian_ko.php">KODE OBAT</a></th><!--menampilkan kode obat yang dibeli-->
      <th scope="col"><a href="s_pembelian_nama.php">NAMA OBAT</a></th><!--menampilkan nama obat yang di beli-->
      <th scope="col"><a href="s_pembelian_harga.php">HARGA BELI</a></th><!--menampilkan harga yang di beli-->
      <th scope="col"><a href="s_pembelian_jumlah.php">JUMLAH PEMBELIAN</a></th><!--menampilkan jumlah berapa obat yang dibeli -->
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th><!--menampilkan harga keseluruhan yang di beli -->
      <th scope="col"><a href="s_pembelian_kadaluarsa.php">TANGGAL KADALUARSA</a></th> <!-- -->
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				echo "<tr>
						<td>$key[kode_supplier]</td>
						<td>$key[tanggal_beli]</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[harga_beli]</td>
						<td>$key[jumlah_obat]</td>
						<td>$key[total]</td>
						<td>$key[tanggal_kadaluarsa]</td>
				</tr>";
                	
				}
		?>
</table>
</body>
</html>
