<!DOCTYPE html>
<html>
<head>
	<title>Hapus Banyak Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<h1>Data Pelanggan</h1>
	<form action="deleteselect.php" method="post">		
		<table border="1">
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
		<a href="pelaggan.php"><input type="image" width="2%" src="k.png" name="Refresh" class="button"></a>
		
	</form>
 
</body>
</html>