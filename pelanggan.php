<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data</title>
</head>

<?php  
	include 'conect.php';
	$QuerySql = "SELECT * FROM pelanggan";

	$SQL = mysqli_query($connect,$QuerySql);
	?>

<body>
<h1>TABEL PELANGGAN</h1>
<table border="1" class="table" >
	<thead class="thead-dark">
		<tr align="center"><td>ID</td>
			<td>Nama</td>
			<td>Jk</td>
			<td>NoHp</td>
			<td>Email</td>
			<td>Alamat</td>
			<td>Member</td>
			<td colspan="2">OPSI</td>
		</tr>
	</thead>
	<?php  
	foreach ($SQL as $Data) {
		echo "
		<tr>
		<td >$Data[ID]</td>
		<td >$Data[Nama]</td>
		<td >$Data[Jk]</td>
		<td >$Data[NoHp]</td>
		<td >$Data[Email]</td>
		<td >$Data[Alamat]</td>
		<td >$Data[Member]</td>
		<td ><a href='formedit.php?$Data[ID]'>Edit </a>
		<td ><a href='hapus.php?$Data[ID]'>Hapus </a>
		";
	}

	?>

	</tr>

</table><br>

<tr>

	<td><a href="inputdata.php"><input type="submit" name="Kirim" value="Input Data" class="button" ></td>

</tr>

</body>
</html>