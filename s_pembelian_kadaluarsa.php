<!--M. SAHLAN RABUL-->
<!--1600018056-->
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

if (!isset($_SESSION["login1"])) { //untuk login sebelum fuction
    	  header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
	include "connection/db.php";
	$QuerySql = "SELECT *,harga_beli*jumlah_obat AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat ORDER BY supplier.tanggal_kadaluarsa ASC "; //function mensorting  tanggal kadarluarsa obat

	$SQL = mysqli_query($connect, $QuerySql); //untuk mengconnect dengan mysql databases
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
<table class="table is-fullwidth" > <!--menampilkan tabel data pembelian-->
  <thead>
    <tr>
      <th scope="col"><a href="s_pembelian_supplier.php"> ID PEMBELIAN</a></th> <!--untuk menampilkan id supplier -->
      <th scope="col"><a href="s_pembelian_tanggal.php">TANGGAL PEMBELIAN</a></th> <!--untuk menampilkan tanggal pembelian -->
      <th scope="col"><a href="s_pembelian_ko.php">KODE OBAT</a></th> <!--untuk menampilkan kede obat -->
      <th scope="col"><a href="s_pembelian_nama.php">NAMA OBAT</a></th> <!-- untuk menampilkan nama obat -->
      <th scope="col"><a href="s_pembelian_harga.php">HARGA BELI</a></th> <!-- untuk menampilkan harga beli -->
      <th scope="col"><a href="s_pembelian_jumlah.php">JUMLAH PEMBELIAN</a></th> <!--untuk menampilkan jumlah pembelian -->
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th> <!--untuk menampilkan harga total pembelian -->
      <th scope="col"><a href="s_pembelian_kadaluarsa.php">TANGGAL KADALUARSA</a></th> <!--untuk menampilkan tanggal kadarluarsa -->
    </tr>
  </thead>
		<?php
		//untuk pemanggil atribut php
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
