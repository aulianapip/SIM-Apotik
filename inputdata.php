<?php  
	if ($_POST){
		include 'conect.php';
		$ID = $_POST['ID'];
		$Nama = $_POST['Nama'];
		$JK = $_POST['JK'];
		$NoHP = $_POST['NoHP'];
		$Email = $_POST['Email'];
		$Alamat = $_POST['Alamat'];
		$Member = $_POST['Member'];

		$QuerySql = "INSERT INTO pelanggan VALUES('$ID','$Nama','$JK','$NoHP','$Email', '$Alamat','$Member')";
		$SQL = mysqli_query($connect,$QuerySql);

		echo " Input Berhasil <br>";
		echo "<a href='pelanggan.php'>Lihat Hasil</a> ";
	}


?>
<!DOCTYPE html>
<html>
<head>	
	<title>INPUT DATA PELANGGAN</title>
</head>
<body>
	<form method="post" action="inputdata.php"><center>
		<b><h1><center><font face="Bebas" size="">INPUT DATA</font></h1></b>
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
		<td><input class="form-control" type="text" name="JK" value=""></td></tr>
		<tr><td>NoHP</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="NoHP" value=""></td></tr>
		<tr><td>Email</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="Email" value=""></td></tr>
		<tr><td>Alamat</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="Alamat" value=""></td></tr>
		<tr><td>Member</td>
		<td> : </td>
		<td><select name="Member" value="">
			<option>Member</option>
			<option>Non Member</option>
		</select></td></tr>

	</table>
	<br>
	<button type="submit" class="btn btn-dark" >SEND</button>
	</center>
</form>
</body></html>
</body>
</html>
