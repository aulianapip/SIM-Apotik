<?php
session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["login1"])) {
      header("location: http://localhost/apotik-keuangan/home.php");
      exit;
    }
      
  
  include 'db.php';
  $cari = $_POST['cari'];
  $QuerySql = "SELECT `nama_obat`,`harga_obat`,`kode_obat`,`dosis_obat`,`nama_jenis`,`Stok_Obat`,`tanggal_input` FROM `obat`, `jenis_obat` WHERE nama_obat LIKE '%$cari%' AND jenis_obat.kode_jenis=obat.kode_jenis";
  $SQL = mysqli_query($connect, $QuerySql);
      if(mysqli_num_rows($SQL)>0){
?>
<!--Mohamad rifky fajri-->
<!DOCTYPE html>
<html>
<head>
	<title>Hasil Pencarian Data Obat</title>
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
      <th scope="col">Dosis Obat</th>
      <th scope="col">Kode Jenis</th>
      <th scope="col">Stok Obat</th>
      <th scope="col">Kadaluarsa</th>
      <th scope="col">Edit Data</th>
      <th scope="col">Hapus Data</th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				echo "<tr>
						<td>$key[nama_obat]</td>
						<td>$key[harga_obat]</td>
						<td>$key[kode_obat]</td>
						<td>$key[dosis_obat]</td>
						<td>$key[nama_jenis]</td>
						<td>$key[Stok_Obat]</td>
            <td>$key[tanggal_input]</td>
            <td><a href='1edit_obat.php?kode_obat=$key[kode_obat]'>Edit</a></td>
            <td><a href='1hapus_obat.php?kode_obat=$key[kode_obat]'>Hapus</a></td>
				</tr>";
			}
		?>
</table>
</body>
</html

<?php }

else{
  header ("location: tidakterdapat.php");

}

?>