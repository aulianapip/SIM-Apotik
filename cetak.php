<html>
<head>
	<title>CETAK PRINT DATA MEMBER APOTEK UAD </title>
</head>
<body>
 
	<center>
 
		<h2>DATA MEMBER DAPAT PROMO</h2>
		<h4>CETAK DATA MEMBER</h4>
 
	</center>
 
	<table border="1" class="table"><!--Membuat tabel untuk menampilkan data yang ada pada database -->
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
			include "conect.php";//untuk menyambungkan ke database yang sudah dibuat dengan nama folder conect.php
			$QuerySql = "SELECT * FROM pelanggan"; //semua data dari database tabel pelanggan dipanggil
			$Data = mysqli_query($connect, $QuerySql);//merupakan perintah untuk menjalankan sintaks yang ada di querySql
		
			while($d = mysqli_fetch_array($Data)){//data dimasukkan kedalam array untuk di proses
			?>
			<tr>
				<td><?php echo $d['tgl_daftar']; ?></td><!--Menampilkan data dengan tabel sesuai dengan data yang ada pada database -->
				<td><?php echo $d['ID']; ?></td>	<!-- menampilkan data ID --><!-- menampilkan data ID -->
				<td><?php echo $d['Nama']; ?></td><!-- menampilkan data Nama -->
				<td><?php echo $d['Jk']; ?></td>	<!-- menampilkan data Jenis Kelamin -->
				<td><?php echo $d['NoHp']; ?></td>	<!-- menampilkan data NO hp -->
				<td><?php echo $d['Email']; ?></td><!-- menampilkan data Email -->
				<td><?php echo $d['Alamat']; ?></td>	<!-- menampilkan data Alamat -->			
				<td><input type="checkbox" name="pilih[]" value="<?php echo $d['ID']; ?>"></td>		<!-- pilih disini akan di proses kedalam deleteselect untuk di hapus -->
				<script>
				window.print();
				</script>


			</tr>
			<?php } ?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>