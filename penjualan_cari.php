<!--Siti Barkah Pellu 1700018235(Menambahkan dan memperbaiki fitur)-->
<!--LUSSY IKA-->

<?php
	session_start();

if (!isset($_SESSION["login1"])) {//jika login gagal maka kembali login.php
    	  header("location: http://localhost/apotik-keuangan/login.php");//link untuk login.php
      exit;
    }
      
  
	include "connection/db.php";

	$cari = $_POST['cari'];
	$QuerySql = "SELECT *,harga_obat*jumlah_terjual as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat AND obat.nama_obat LIKE '%$cari%'"; //fungsi untuk menampilkan tabel hraga_obat, jumlah terjual dari tabel penjualan obat

	$SQL = mysqli_query($connect, $QuerySql); //memanggil database
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="bulma.min.css"><!-- untuk connect ke CSS -->
</head>
<body>
<?php 
  include "navbar/navbar_penjualan.php";//ditampil kan di file navbar_pembelian.php
 ?>
<table class="table is-fullwidth" > <!--untuk membuat tampilan berupa tabel -->
  <thead>
    <tr>
      <th scope="col"><a href="s_penjualan_id.php"> ID PENJUALAN</a></th> <!--isi tabel-->
      <th scope="col"><a href="s_penjualan_tanggal.php">TANGGAL TERJUAL</a></th> <!--isi tabel-->
      <th scope="col"><a href="s_penjualan_ko.php">KODE OBAT</a></th> <!--isi tabel-->
      <th scope="col"><a href="s_penjualan_nama.php">NAMA OBAT</a></th> <!--isi tabel-->
      <th scope="col"><a href="s_penjualan_harga.php">HARGA OBAT</a></th> <!--isi tabel-->
      <th scope="col"><a href="s_penjualan_jumlah.php">JUMLAH TERJUAL</a></th> <!--isi tabel-->
      <th scope="col"><a href="s_penjualan_total.php">HARGA TOTAL</a></th> <!--isi tabel-->
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {// untuk mengonect kan query
				echo "<tr>
						<td>$key[id_penjualan]</td>
						<td>$key[tanggal_terjual]</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_obat]</td>
						<td>$key[harga_obat]</td>
						<td>$key[jumlah_terjual]</td>
						<td>$key[total]</td>
				</tr>";//menampilkan isi dari atribut - atribut di dalam tabel
                  
                	
				}
		?>
</table>
</body>
</html>
