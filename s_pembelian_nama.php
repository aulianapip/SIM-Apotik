<!--Fadli Muhammad Oei -->
<!--1600018057-->
<!-- Keuangan -->
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

if (!isset($_SESSION["login1"])) { //login sebelum masuk
    	  header("location: http://localhost/apotik-keuangan/login.php");  //lokasi http nya
      exit;
    }
	include "connection/db.php"; //untuk pemanggilan database nya
	$QuerySql = "SELECT *,harga_beli*jumlah_obat AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat ORDER BY obat.nama_obat ASC "; //tentukan jumlah dari harga beli, jumlah obanya

	$SQL = mysqli_query($connect, $QuerySql);  //untuk menghubungkan ke database nya
?> 
<!DOCTYPE html>
<html>
<head>
	<title>DATA PEMBELIAN</title> <!-- Data pembelian dari keuangan) -->
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_pembelian.php";
 ?>
<table class="table is-fullwidth" > <!-- Menampilkan Tabel -->
  <thead>
    <tr>
      <th scope="col"><a href="s_pembelian_supplier.php"> ID PEMBELIAN</a></th>  <!-- fungsi untuk menampilkan id pembelian nya-->
      <th scope="col"><a href="s_pembelian_tanggal.php">TANGGAL PEMBELIAN</a></th> <!-- untuk menempilkan tanggal pembelian -->
      <th scope="col"><a href="s_pembelian_ko.php">KODE OBAT</a></th> <!-- fungsi untuk menampilkan kode obat -->
      <th scope="col"><a href="s_pembelian_nama.php">NAMA OBAT</a></th> <!-- tampilkan nama obatnya -->
      <th scope="col"><a href="s_pembelian_harga.php">HARGA BELI</a></th> <!-- tampilkan harga beli nya -->
      <th scope="col"><a href="s_pembelian_jumlah.php">JUMLAH PEMBELIAN</a></th> <!-- tampilkan jumlah pembelian -->
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th> <!-- fungsi untuk menampilkan harga total -->
      <th scope="col"><a href="s_pembelian_kadaluarsa.php">TANGGAL KADALUARSA</a></th> <!-- fungsi untuk menampilkan tangggal kadaluarsa -->
    </tr>
  </thead>
		<?php 
		// memanggil database nya yaitu : kode suplier, tanggal beli, kode obat, nama obat, harga beli, jumlah obat, total, dan tanggal kadaluarsa.
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
