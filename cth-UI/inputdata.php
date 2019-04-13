<?php  
include ('header.php');
	if ($_POST){
		include 'conect.php';
		
		$Nama = $_POST['Nama'];
		$Jk = $_POST['Jk'];
		$NoHP = $_POST['NoHP'];
		$Email = $_POST['Email'];
		$Alamat = $_POST['Alamat'];
		

		$QuerySql = "INSERT INTO pelanggan VALUES(now(),null,'$Nama','$Jk','$NoHP','$Email', '$Alamat')";
		$SQL = mysqli_query($connect,$QuerySql);

		echo "<script>alert('Input data baru sukses!!!');window.location='index.php'</script>";
	}


?>
<!DOCTYPE html>
<html>
<head>	
	<title>INPUT DATA PELANGGAN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="post" action="inputdata.php"><center>
		<b><h1><center><font face="Bebas" size="">INPUT DATA</font></h1></b>
		<br>
		<table>
		<tr><td>Nama</td>
			<td> : </td>
			<td><input class="form-control" type="text" placeholder="Nama" name="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')"></td></tr>
		<tr><td>JK</td>
		<td> : </td>
		<td><select name="Jk" >
			<option>Laki-Laki</option>
			<option>Perempuan</option></tr>
		<tr><td>NoHP</td>
			<td> : </td>
			<td><input class="form-control" type="text" placeholder="NoHP" name="NoHP" required oninvalid="this.setCustomValidity('NoHP tidak boleh kosong')" oninput="setCustomValidity('')"></td></tr>
		<tr><td>Email</td>
			<td> : </td>
			<td><input class="form-control" type="text" placeholder="email" name="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')"></td></tr>
				<!-- ditambah notifikasi pesan kosong oleh Alfian noor-->
		<tr><td>Alamat</td>
		<td> : </td>
		<td  width="500px" "col-xs-10"><input class="form-control" type="text" name="Alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"></td></tr>
	<table>
		<button a href="inputdata.php"><input type="submit" name="Kirim" value="Input" class="button" >
		</button>
	</table>
	</table>
	</center>
</form>
</body></html>
</body>
</html>
