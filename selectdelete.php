<!-- 1. Fitur CRM atau disebut pelanggan. fitur ini digunakan untuk menginputkan data member yang akan digunakan di bagian kasir. jika pelanggan tersebut adalah member maka akan di kenakan diskon. -->

<!-- 
fitur ini dikerjakan oleh Herni Sartika Manalu 1700018285
ui dimodifikasi oleh Carto Ardiyanto 1700018283
 -->

<!DOCTYPE html>
<?php
	include "library/import.php";//Pemanggilan folder css,bootsrap dengan nama file import.php

?>
<html>
<head>
	<title>Hapus Banyak Data</title><!--Membuat judul -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.btn-primary.active, .btn-primary:active, .open>.dropdown-toggle.btn-primary {
    color: black;
    background-color: pink;
    background-image: none;
    border-color: #ddd;
}
.header {
  overflow: hidden;
  background-color: pink;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active [type=submit]:hover {
  background-color: pink;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
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
    <a class="active" href="index.php">Home</a>
    <a href="inputdata.php">Input Data</a>
</div>
<br><br><br><br>
	<form action="deleteselect.php" method="post"> <!--untuk memproses pengahpusan multiple data  dengan folder deleteselect -->		
		<table border="1" class="table">/
			<tr>
			<td>Tanggal Terdaftar</td> <!--Membuat tabel untuk menampilkan data yang ada pada database -->
			<td>ID</td> 
			<td>Nama</td>
			<td>Jk</td>
			<td>NoHp</td>
			<td>Email</td>
			<td>Alamat</td>
			<td colspan="2">OPSI</td>
			</tr>
			<?php 
			include "conect.php"; //untuk menyambungkan ke database yang sudah dibuat dengan nama folder conect.php
			$QuerySql = "SELECT * FROM pelanggan"; //semua data dari database tabel pelanggan dipanggil
			$Data = mysqli_query($connect, $QuerySql);//merupakan perintah untuk menjalankan sintaks yang ada di querySql
		 
			while($d = mysqli_fetch_array($Data)){ //data dimasukkan kedalam array untuk di proses
			?>
			<tr>
				<td><?php echo $d['tgl_daftar']; ?></td> <!--Menampilkan data dengan tabel sesuai dengan data yang ada pada database, line 109-114 berupa data yang dipanggil dalam bentuk array ID,nama,Jenis kelamin,no handphone, email, dan alamat member -->
				<td><?php echo $d['ID']; ?></td>	
				<td><?php echo $d['Nama']; ?></td>
				<td><?php echo $d['Jk']; ?></td>	
				<td><?php echo $d['NoHp']; ?></td>	
				<td><?php echo $d['Email']; ?></td>
				<td><?php echo $d['Alamat']; ?></td>				
				<td><input type="checkbox" name="pilih[]" value="<?php echo $d['ID']; ?>"></td>	 <!-- checkbox yang nantinya id member akan ditampilkan untuk bahan pengiriman kepada deleteselect.php -->
			</tr>
			<?php } ?>
		</table>
		<input type="submit" name="hapus" value="Hapus" onclick="return confirm('Yakin mau hapus data?');"> <!--akan diproses melalui file deleteselect.php dan di kirim untuk proses multiple delete -->
		<a href="index.php"><input type="image" width="20%" src="refresh.png" name="Refresh" class="button"></a> <!-- untuk memproses pengembalian kepada index.php -->
		
	</form>
 
</body>
</html>