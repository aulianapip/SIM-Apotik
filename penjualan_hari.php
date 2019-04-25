<!--LUSSY IKA-->
<!--1700018261-->
<!--
Penjelasan class Nomer UTS 1 :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
-->
<?php
	session_start();//untuk memulai eksekusi session pada server dan menyimpan pada browser

if (!isset($_SESSION["login1"])) { //jika belum melakukan login akan di lempar ke header
    	  header("location: http://localhost/apotik-keuangan/login.php");//link untuk kembali ke home
      exit;//keluar
    }
      
	include "connection/db.php"; // untuk mengkoneksikan ke database
	//fungsi menampilkan penjualan obat berdasarkan hari yang diurutkan berdasarkan abjad
	$QuerySql = "SELECT *,harga_obat*jumlah_terjual as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat ORDER BY day(tanggal_terjual) ASC";

	$SQL = mysqli_query($connect, $QuerySql); // untuk menghubungkan mysql database
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
      <th scope="col">TANGGAL</th>
      <th scope="col">HARGA OBAT</th>
      <th scope="col">JUMLAH TERJUAL</th>
      <th scope="col">TOTAL PENJUALAN</th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				echo "<tr>
						<td>$key[tanggal_terjual]</td>
						<td>$key[harga_obat]</td>
						<td>$key[jumlah_terjual]</td>
						<td>$key[total]</td>
				</tr>";
                	
				}
		?>
</table>
</body>
</html>
