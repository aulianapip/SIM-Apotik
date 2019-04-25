<!-- THOBIE ZATONI -->
<!-- 1700018241-->

<!-- Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
   -->
<?php
	session_start();

if (!isset($_SESSION["login1"])) {//jika login gagal maka kembali login.php
    	  header("location: http://localhost/apotik-keuangan/login.php");//link untuk login.php
      exit;
    }
      
  
	include "connection/db.php";
	$QuerySql = "SELECT *,sum(jumlah_terjual) as jumlah_terjual,sum(harga_obat) as harga_obat,sum(harga_obat)*sum(jumlah_terjual) as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat GROUP BY  month(tanggal_terjual)";//fungsi untuk memanggil [total jumlah terjual , harga jual , harga obat berdasarkan bulan terjual

	$SQL = mysqli_query($connect, $QuerySql); //inisialisasi SQL
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
				</tr>";//menampilkan isi dari atribut - atribut di dalam tabel
                	
				}
		?>
</table>
</body>
</html>
