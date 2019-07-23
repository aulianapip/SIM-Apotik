<!--Fadli muhammad oei-->
<!--1600018057-->
<!-- Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
   -->
<?php
	session_start();// untuk melakukan aktifitas yang berhubungan dengan interaksi user pada sebuah web server php.

if (!isset($_SESSION["login1"])) { // status login menggunakan session, jika login gagal maka kembali ke login.php
    	  header("location: http://localhost/apotik-keuangan/login.php"); //pemanggilan login.php nya
      exit;
    }
      
  
	include "connection/db.php";
	$QuerySql = "SELECT *,sum(harga_obat) as harga_obat,harga_obat*jumlah_terjual as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat GROUP BY  week(tanggal_terjual)"; //fungsi untuk mengambil jumlah harga obat, harga obat, jumlah terjual, total dari tabel penjualan berdasarkan minggu

	$SQL = mysqli_query($connect, $QuerySql); //menghubungkan ke database, serta mengambil data berdasarkan query
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title> <!-- title bar -->
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
  </thead> <!-- head tabel dari = tanggal, harga obat, jumlah terjual, total penjualan -->
		<?php
			foreach ($SQL as $key) {
				echo "<tr>
						<td>$key[tanggal_terjual]</td>
						<td>$key[harga_obat]</td>
						<td>$key[jumlah_terjual]</td>
						<td>$key[total]</td>
				</tr>";//untuk menampilkan isi dari atribut di dalam tabel yaitu (tanggal terjual, harga obat, jumlah terjual, total)
                	
				}
		?>
</table>
</body>
</html>
