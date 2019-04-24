<!DOCTYPE html>
<?php
	include "library/import.php";

?>
<html>
<head>
	<title>Hapus Banyak Data</title>
	<link rel="stylesheet" type="text/css" href="style.css"> <--! untuk link css-->
	<style>
* {box-sizing: border-box;}


<!-- Mengatur Layout Dengan CSS -->
<!-- untuk bagian UI dikerjakan Aditiya Aziz Saputra 1700018264 dan Alfian Noor 1700018233 -->


body { 
  margin: 0;  <!-- untuk batas mengaplikasikan jarak tepi pada suatu elemen -->
  font-family: Arial, Helvetica, sans-serif; <!-- untuk jenis huruf -->
}
.btn-primary.active, .btn-primary:active, .open>.dropdown-toggle.btn-primary {
    color: black;
    background-color: pink;
    background-image: none; <!-- untuk menentukan waran back ground -->
    border-color: #ddd; <!-- untuk warna pebatas-->
}
<!-- ini merupakan fungsi dan query membuat bagian Navbar -->
.header {
  overflow: hidden;
  background-color: pink;
  padding: 20px 10px;
}

.header a {	  <!-- fungsi untuk bagian header tampilan-->
  float: left;
  color: black; <!-- untuk bagian  warna : hitam-->
  text-align: center; <!-- untuk perataan texs : tengah -->
  padding: 12px;    
  text-decoration: none; <!-- untuk teks-dekorasi : tidak ada-->
  font-size: 18px;  <!-- untuk ukuran huruf-->
  line-height: 25px;  <!-- garis tinggi-->
  border-radius: 4px;	<!-- batas-rasius-->
}


.header a.logo { <!-- fungsi untuk bagian header logo -->
  font-size: 25px;  <!-- untuk ukuran-huruf -->
  font-weight: bold; <!-- untuk berat huruf :; tebal-->
}

.header a:hover { <!-- untuk efek tombol di dalam header  -->
  background-color: #ddd;	<--! warna bagian back ground -->
  color: black;
}

.header a.active [type=submit]:hover {
  background-color: pink; <!-- fungsi untuk pengaturan warna back ground -->
}

.header-right { <!-- fungsi mengatur header bagian kanan-->
  float: right;
}

@media screen and (max-width: 500px) {  <!-- Max-width digunakan untuk membatasi sebuah halaman apakah halaman tersebut memiliki lebar tertentu sesuai yang sudah diatur sebelumnya -->
  .header a {
    float: none;
    display: block;
    text-align: left; <!-- untuk perataan texs bagian kiri-->
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>

<body>

	<div class="header">
  <a href="#default" class="logo">CRM APOTEK</a>
  <div class="header-right"> 
    <a class="active" href="index.php">Home</a> <!-- sebuah elemen class yang menuju ke link index.php-->
    <a href="inputdata.php">Input Data</a> <!-- fungsi untuk menuju ke link inputdata.php-->
</div>
<br><br><br><br>
	<form action="deleteselect.php" method="post">		
		<table border="1" class="table">
			<tr>
			<td>Tanggal Terdaftar</td> 
			<td>ID</td>
			<td>Nama</td>
			<td>Jk</td>
			<td>NoHp</td>
			<td>Email</td>
			<td>Alamat</td>
			<td colspan="2">OPSI</td>
			</tr>
			<?php 
			include "conect.php";
			$QuerySql = "SELECT * FROM pelanggan";
			$Data = mysqli_query($connect, $QuerySql);
		
			while($d = mysqli_fetch_array($Data)){
			?>
			<tr>
				<td><?php echo $d['tgl_daftar']; ?></td>
				<td><?php echo $d['ID']; ?></td>	
				<td><?php echo $d['Nama']; ?></td>
				<td><?php echo $d['Jk']; ?></td>	
				<td><?php echo $d['NoHp']; ?></td>	
				<td><?php echo $d['Email']; ?></td>
				<td><?php echo $d['Alamat']; ?></td>				
				<td><input type="checkbox" name="pilih[]" value="<?php echo $d['ID']; ?>"></td>		
			</tr>
			<?php } ?>
		</table>
		<input type="submit" name="hapus" value="Hapus">
		<a href="index.php"><input type="image" width="20%" src="refresh.png" name="Refresh" class="button"></a>
		
	</form>
 
</body>
</html>