<!--SITTI BARKAH PELLU-->
	<!--
Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
-->
<?php
	session_start(); //agar bisa login

if (!isset($_SESSION["login1"])) { //pengkondisian jika data bernilai true dan false
    	  header("location: http://localhost/apotik-keuangan/login.php"); //pemanggilan untuk menampilkan database login
      exit;
    }
	include "connection/db.php";//pemanggilan database yang ada didalam folder database dengan file db.php
	$QuerySql = "SELECT *,harga_beli*jumlah_obat AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat ORDER BY supplier.tanggal_beli ASC "; //buat memanggil fungsi query untuk mengurutkan table penjualan berdasarkan pembelian tanggal

	$SQL = mysqli_query($connect, $QuerySql); //pemnggilan database agar bisa ditampilkan
?> 
<!DOCTYPE html>
<html>
<head>
	<title>DATA PEMBELIAN</title>
	<link rel="stylesheet" href="bulma.min.css"><!--proses untuk memanggil CSS-->
</head>
<body>
<?php 
  include "navbar/navbar_pembelian.php";//memanggil database navbar pembelian
 ?>
<table class="table is-fullwidth" ><!--untuk menampilkan tabel data pembelian-->
  <thead>
    <tr>
      <th scope="col"><a href="s_pembelian_supplier.php"> ID PEMBELIAN</a></th>
      <th scope="col"><a href="s_pembelian_tanggal.php">TANGGAL PEMBELIAN</a></th>
      <th scope="col"><a href="s_pembelian_ko.php">KODE OBAT</a></th>
      <th scope="col"><a href="s_pembelian_nama.php">NAMA OBAT</a></th>
      <th scope="col"><a href="s_pembelian_harga.php">HARGA BELI</a></th>
      <th scope="col"><a href="s_pembelian_jumlah.php">JUMLAH PEMBELIAN</a></th>
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th>
      <th scope="col"><a href="s_pembelian_kadaluarsa.php">TANGGAL KADALUARSA</a></th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) { //perulangan pemanggilan pada database pembelian
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