
<html>
<head>	
	<title>Edit User Data</title>
</head>
<?php
	include('header.php');

	$connect = new mysqli("localhost", "root", "", "sim-apotek-pos-test");

	$ID=$_GET["ID"];
	$edit="SELECT ID,Nama,Jk,NoHP,Email,Alamat FROM pelanggan where ID='$ID'";
	foreach (mysqli_query($connect,$edit) as $a){	
	
?>
<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
	<form method="POST" action="edit.php?ID=<?php echo $a['ID'];?>"><center>
		<b><h1><center><font face="Bebas" size="">EDIT DATA</font></h1></b>
		<br>
		<table>
		<TR>
			<TD>ID</TD>
			<td>:</td>
			<td><input type="text" name="ID" disabled value="<?php echo $a['ID']; ?>" /></td>
		</TR>
		<tr><td>Nama</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="Nama" value="<?php echo $a['Nama']; ?>"></td></tr>
		<tr><td>JK</td>
		<td> : </td>
		<td><select name="jeniskelamin" >
			<option value="1">Laki-Laki</option>
			<option value="2">Perempuan</option></td>
		</tr>
		<tr><td>NoHP</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="NoHP" value="<?php echo $a['NoHP'];?>"></td></tr>
		<tr><td>Email</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="Email" value="<?php echo $a['Email'];?>"></td></tr>
		<tr><td>Alamat</td>
		<td> : </td>
		<td><input class="form-control" type="text" name="Alamat" value="<?php echo $a['Alamat'];?>"></td></tr>
		

	</table>
	<table>
		<button a href="inputdata.php"><input type="submit" name="Kirim" value="Edit" class="button" >
	</button>
	</table>
	</center>
</form>
<?php 

}

 ?>

</body></html>
