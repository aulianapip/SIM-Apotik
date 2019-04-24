<!-- ALWAN ZAKI 1700018259 -->
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

if (!isset($_SESSION["login1"]))//jika login gagal, maka akan kembali ke login.php 
 	{
    	  header("location: http://localhost/apotik-keuangan/login.php");//link untuk login.php 
      exit;
    }
	include "connection/db.php";
	$QuerySql = "SELECT sum(harga_obat*jumlah_terjual) as total FROM `tabel_penjualan` , `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat";  //fungsi untuk memanggil total penjualan (harga_obat*jumlah_terjual) dari tabel penjualan dan obat, menggunakan relasi dari "tabel_penjualan.kode_obat=obat.kode_obat" 
	$QuerySql1 = "SELECT sum(harga_beli*jumlah_obat) AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat";
	//fungsi untuk memanggil total pembelian (harga_beli*jumlah_obat) dari tabel supplier dan obat, menggunakan relasi dari "supplier.kode_obat=obat.kode_obat" 
	$total_pembelian=0;
	$total_penjualan=0;
	$SQL = mysqli_query($connect, $QuerySql);//inisialisasi isi dari SQL
	$SQL1 = mysqli_query($connect, $QuerySql1);//inisialisasi isi dari SQL1
?> 
<!DOCTYPE html>
<html>
<head>
	<title>DATA KEUNTUNGAN</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_pembelian.php";
 ?>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col"><center>TOTAL KEUNTUNGAN</center></th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key)//inisialisasi SQL menjadi key 
			{
					$total_penjualan=$key["total"];//inisialisasi dari total penjualan
				}
			foreach ($SQL1 as $key)//inisalisasi SQL1 menjadi key 
			{
					$total_pembelian=$key["total"];//inisialisasi dari total pembelian
				}
				$hasil=$total_penjualan-$total_pembelian;//menghitung jumlah keuntungan(hasil) = (total penjualan - total pembelian)
				echo "<tr>
					<td>$hasil</td>  
				</tr>";//menampilkan hasil
		?>
</table>
</body>
</html>
