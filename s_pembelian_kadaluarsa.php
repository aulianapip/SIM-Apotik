<!--Siti Barkah Pellu 1700018235 (Memperbaiki fitur)-->
<!--SAHLAN-->

<?php
	session_start();

if (!isset($_SESSION["login1"])) {//jika login gagal maka kembali login.php
    	  header("location: http://localhost/apotik-keuangan/login.php");//link untuk login.php
      exit;
    }
	include "connection/db.php";
	$QuerySql = "SELECT *,harga_beli*jumlah_obat AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat ORDER BY supplier.tanggal_kadaluarsa ASC ";

	$SQL = mysqli_query($connect, $QuerySql); //memanggil database
?> 
<!DOCTYPE html>
<html>
<head>
	<title>DATA PEMBELIAN</title>
	<link rel="stylesheet" href="bulma.min.css"><!-- untuk connect ke CSS -->
</head>
<body>
<?php 
  include "navbar/navbar_pembelian.php";//ditampil kan di file navbar_pembelian.php
 ?>
<table class="table is-fullwidth" ><!--untuk membuat tampilan berupa tabel -->
  <thead>
    <tr>
      <th scope="col"><a href="s_pembelian_supplier.php"> ID PEMBELIAN</a></th><!--isi tabel-->
      <th scope="col"><a href="s_pembelian_tanggal.php">TANGGAL PEMBELIAN</a></th><!--isi tabel-->
      <th scope="col"><a href="s_pembelian_ko.php">KODE OBAT</a></th><!--isi tabel-->
      <th scope="col"><a href="s_pembelian_nama.php">NAMA OBAT</a></th><!--isi tabel-->
      <th scope="col"><a href="s_pembelian_harga.php">HARGA BELI</a></th><!--isi tabel-->
      <th scope="col"><a href="s_pembelian_jumlah.php">JUMLAH PEMBELIAN</a></th><!--isi tabel-->
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th><!--isi tabel-->
      <th scope="col"><a href="s_pembelian_kadaluarsa.php">TANGGAL KADALUARSA</a></th><!--isi tabel-->
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) { // untuk mengonect kan query
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
