<?php  
	if ($_POST){
		include 'conect.php';
		$ID = $_POST['ID'];
		$Nama = $_POST['Nama'];
		$JK = $_POST['Jk'];
		$NoHP = $_POST['NoHP'];
		$Alamat = $_POST['Alamat'];
		$Email = $_POST['Email'];

		$QuerySql = "UPDATE pelanggan SET ID='$ID', Nama='$Nama', JK='$JK', NoHP='$NoHP', Email='$Email', Alamat='$Alamat' WHERE ID='$ID' ";
		$SQL = mysqli_query($connect,$QuerySql);

		echo " Edit Berhasil <br>";
		echo "<a href='pelanggan.php'>Lihat Hasil</a> ";
	}
?>
<!DOCTYPE html>
<html>
<head>	
	<title>EDIT DATA PELANGGAN</title>
</head>
<body>
	<form method="post" action="formedit.php"><center>
		<b><h1><center><font face="Bebas" size="">EDIT DATA PELANGGAN</font></h1></b>
		<br>
		<table>
		<tr><td>ID</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="ID" value=""></td></tr>
		<tr><td>Nama</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="Nama" value=""></td></tr>
		<tr><td>JK</td>
		<td> : </td>
		<td><select name="Jk" >
			<option>Laki-Laki</option>
			<option>Perempuan</option></tr>
		<tr><td>NoHP</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="NoHP" value=""></td></tr>
		<tr><td>Email</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="Email" value=""></td></tr>
		<tr><td>Alamat</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="Alamat" value=""></td></tr>
	
	</table>
	<br>
	<button type="submit"  class="btn btn-dark" >SEND</button>
	</center>
</form>
</body></html>
</body>
</html>

