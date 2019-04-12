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
<table>
	<tr>
		<td><a href="selectdelete.php">Select</a></td>
	</tr>
</table>
<table border="1" class="table" >
	<thead class="thead-dark">
		<tr align="center">
			<td>Tanggal Terdaftar</td>
			<td>ID</td>
			<td>Nama</td>
			<td>Jk</td>
			<td>NoHp</td>
			<td>Email</td>
			<td>Alamat</td>
			<td colspan="2">OPSI</td>
			 <li class="tab"><form action="PELANGGAN.php" method="post">
        <div class="input-field">
          <input id="search" type="search" placeholder="CARI DATA" name="cari"> 
          <label class="label-icon" for="search"><i class="material-icons"></i></label>
        </div>
        </form>
      </li>
	</tr>
	

	</thead>
	<?php  
	foreach ($SQL as $Data) {
		echo "
		<tr>
		<td> $Data[tgl_daftar]</td>
		<td >$Data[ID]</td>
		<td >$Data[Nama]</td>
		<td >$Data[Jk]</td>
		<td >$Data[NoHp]</td>
		<td >$Data[Email]</td>
		<td >$Data[Alamat]</td>
		<td ><a href='editt.php?ID=$Data[ID]'>Edit</a>
		<td ><a href='hapus.php?ID=$Data[ID]'>Hapus</a></td>
		";
	}

	?>

	</tr>

</table><br>

<tr>

	<td><a href="inputdata.php"><input type="submit" name="Kirim" value="Input Data" class="button" ></td>

</tr>

</body>
