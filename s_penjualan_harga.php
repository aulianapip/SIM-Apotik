<!--FADHIL ABIGAIL-->

<!--  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier
-->


<?php
	session_start(); // Untuk Memulai Eksekusi session pada server dan kemudian Menyimpannya pada browser dan posisinya 
					 // HARUS PALING DEPAN.

if (!isset($_SESSION["login1"])) {
    	  header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
      
  
	include "connection/db.php";
	$QuerySql = "SELECT *,harga_obat*jumlah_terjual as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat ORDER BY obat.harga_obat ASC "; // Query ini berisi fungsi untuk melakukan Pensortingan 																	berdasarkan Harga Termurah di tabel Penjualan.  

	$SQL = mysqli_query($connect, $QuerySql); // variabel SQL menampung berupa perintah pada variabel SQL ke server yang berada di Variabel Connect //
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="bulma.min.css"> <!-- Fungsi class ini digunakan untuk Pemanggilan CSS  -->
</head>
<body>
<?php 
  include "navbar/navbar_penjualan.php"; // Fungsi ini berguna untuk Pemanggilan Menu Navbar Menggunakan Pemanggilan lewaat php

 ?>
<table class="table is-fullwidth" > <!-- Fungsi class ini digunakan untuk Pemanggilan CSS pada Fungsi Pembuatan Tabel -->
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
						<td>$key[id_penjualan]</td>
						<td>$key[tanggal_terjual]</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[harga_obat]</td>
						<td>$key[jumlah_terjual]</td>
						<td>$key[total]</td>
					</tr>";
                	//buat menampilkan value id penjualan,tanggal penjualan,kode obat,nama obat,harga obat,jumlah terjual,dan total;
                	
				}
		?>
</table>
</body>
</html>
