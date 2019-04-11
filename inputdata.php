<?php  
	if ($_POST){
		include 'conect.php';
		
		$Nama = $_POST['Nama'];
		$Jk = $_POST['Jk'];
		$NoHP = $_POST['NoHP'];
		$Email = $_POST['Email'];
		$Alamat = $_POST['Alamat'];
		

		$QuerySql = "INSERT INTO pelanggan VALUES(now(),null,'$Nama','$Jk','$NoHP','$Email', '$Alamat')";
		$SQL = mysqli_query($connect,$QuerySql);

		echo " Input Berhasil <br>";
		header("location:pelanggan.php");
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
		<td><textarea name="Alamat" ></textarea></td></tr>
	
	</table>
	<br>
	<button type="submit" class="btn btn-dark" >SEND</button>
	</center>
</form>
</body></html>
</body>
</html>
