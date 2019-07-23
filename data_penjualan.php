<!--Fadli muhammad oei-->
<!--1600018057-->
<?php
	session_start();

if (!isset($_SESSION["login1"])) { // status login menggunakan session, jika login gagal maka kembali ke login.php
    	  header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
      
  
	include "connection/db.php"; // mengkonek kan ke database
	$QuerySql = "SELECT *,harga_obat*jumlah_terjual as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat"; //fungsi untuk mengambil harga obat, jumlah terjual, total dari tabel penjualan

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
		//untuk memanggil data atribut di PHP
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
