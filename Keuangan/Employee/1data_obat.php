<?php
	session_start();

if (!isset($_SESSION["login"]) && !isset($_SESSION["login1"])) {
    	  header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
      
  
	include 'db.php';
	$QuerySql = "SELECT * FROM `obat`, `jenis_obat` WHERE jenis_obat.kode_jenis=obat.kode_jenis";
	$SQL = mysqli_query($connect, $QuerySql); 
?> <!--Aditya Gusti Mandala Putra perbaiki query db.php-->
<!--Muhammad Afrizal, membuat file function dataobat.php-->
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "1navbar_obat.php";
 ?>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col">Nama Obat</th>
      <th scope="col">Harga Obat</th>
      <th scope="col">Kode Obat</th>
      <th scope="col">Jenis Obat</th>
      <!--th scope="col">Tanggal Kadaluarsa</th>   <!--mohamad rifky fajri perbaiki tabel tanggal kadaluarsa-->
      <!--th scope="col">Bulan Kadaluarsa</th>
      <th scope="col">Tahun Kadaluarsa</th-->
      <th scope="col">Stok Obat</th>
      <th scope="col">Tanggal</th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				if($key['Stok_Obat']<20){
				echo "<tr>
						<td><font color=#FF0000>$key[nama_obat]</font></td>
						<td><font color=#FF0000>$key[harga_obat]</font></td>
						<td><font color=#FF0000>$key[kode_obat]</font></td>
						<td><font color=#FF0000>$key[nama_jenis]</font></td>
						<td><font color=#FF0000>$key[Stok_Obat]</font></td>
						<td><font color=#FF0000>$key[tanggal_input]</font></td>
				</tr>";
				}else{
				echo "<tr>
						<td>$key[nama_obat]</td>
						<td>$key[harga_obat]</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_jenis]</td>
						<td>$key[Stok_Obat]</td>
						<td>$key[tanggal_input]</td>
				</tr>";
                	}
				}
		?>
</table>
</body>
</html>
