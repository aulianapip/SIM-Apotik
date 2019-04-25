<!--FEBRI SUSENO-->
<!--1600018078-->
<!-- Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
   -->
<?php
	session_start();// untuk melakukan aktifitas yang berhubungan dengan interaksi user pada sebuah web server php.

if (!isset($_SESSION["login1"])) { //jika login gagal maka kembali ke login.php
    	  header("location: http://localhost/apotik-keuangan/login.php");//link untuk login
      exit;
    }
      
  
	include "connection/db.php";
	$QuerySql = "SELECT *,sum(harga_obat*jumlah_terjual) as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat GROUP BY  year(tanggal_terjual)";//fungsi untuk menampilkan jumlah obat berdsarkan tahun

	$SQL = mysqli_query($connect, $QuerySql);//untuk menghubungkan mysql  
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
      <th scope="col">TOTAL PENJUALAN</th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				echo "<tr>
						<td>$key[tanggal_terjual]</td>
						<td>$key[total]</td>
				</tr>";
                	
				}
		?>
</table>
</body>
</html>
