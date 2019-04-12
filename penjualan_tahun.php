<!--FEBRI-->
<?php
	session_start();

if (!isset($_SESSION["login1"])) {
    	  header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
      
  
	include "connection/db.php";
	$QuerySql = "SELECT *,sum(harga_obat*jumlah_terjual) as total FROM `tabel_penjualan`, `obat` WHERE tabel_penjualan.kode_obat=obat.kode_obat GROUP BY  year(tanggal_terjual)";

	$SQL = mysqli_query($connect, $QuerySql); 
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
