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
	session_start();

if (!isset($_SESSION["login1"])) { // status login menggunakan session
    	  header("location: http://localhost/apotik-keuangan/login.php"); //pemanggilan login.php nya
      exit;
    }
      
  
	include "connection/db.php"; // mengkonek kan ke database

	$cari = $_POST['cari'];
	$QuerySql = "SELECT *,harga_obat*jumlah_terjual as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat AND obat.nama_obat LIKE '%$cari%'"; //untuk mengambil data harga obat,jumlah terjual, total, tabel penjualan, serta obat

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
      <th scope="col"><a href="s_penjualan_id.php"> ID PENJUALAN</a></th>
      <th scope="col"><a href="s_penjualan_tanggal.php">TANGGAL TERJUAL</a></th>
      <th scope="col"><a href="s_penjualan_ko.php">KODE OBAT</a></th>
      <th scope="col"><a href="s_penjualan_nama.php">NAMA OBAT</a></th>
      <th scope="col"><a href="s_penjualan_harga.php">HARGA OBAT</a></th>
      <th scope="col"><a href="s_penjualan_jumlah.php">JUMLAH TERJUAL</a></th>
      <th scope="col"><a href="s_penjualan_total.php">HARGA TOTAL</a></th>
    </tr>
  </thead> <!-- head tabel dari = id penjualan, tanggal terjual, kode obat, nama obat, harga obat, jumlah terjual, harga total -->
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
				</tr>"; // menampilkan data (id penjualan, tanggal terjual, kode obat, nama obat, harga obat, jumlah terjual, total)
                	
				}
		?>
</table>
</body>
</html>
