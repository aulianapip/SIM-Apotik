<?php
	include "library/import.php";

?>
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
		<table width="45%" >
		<tr>
			 <td><label for="kode_obat">ID</label>
     			 <input type="text" disabled class="form-control" id="kode_obat" name="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" value="<?php echo $a['ID']; ?>" oninput="setCustomValidity('')"></td>
		</tr>
		<tr>
			 <td><label for="kode_obat">Nama</label>
     			 <input type="text" class="form-control" id="kode_obat" name="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" value="<?php echo $a['Nama']; ?>" oninput="setCustomValidity('')"></td>
		</tr>
		<tr>
			  <td><label for="status" name="Jk">Jenis Kelamin</label>
  				<select name="Jk" class="form-control" id="Jk">
  				  	 <option >Laki-Laki</option>
   					 <option >Perempuan</option>
 				 </select></td>
		</tr>
		<tr>
			<td><label for="kode_obat">Nomor Handphone</label>
     			 <input type="text" class="form-control" id="Nama Obat" name="NoHP" value="<?php echo $a['NoHP'];?>" required oninvalid="this.setCustomValidity('Nomor Handphone tidak boleh kosong')" oninput="setCustomValidity('')"></td>
		</tr>
		
		<tr>
			<td><label for="harga_obat">Email</label>
     		<input type="text" class="form-control" id="harga obat" value="<?php echo $a['Email'];?>" name="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')"></td>
		</tr>
		<tr>
			<td><label for="harga_obat">Alamat</label>
     		<textarea class="form-control" rows="5" id="Alamat" name="Alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $a['Alamat'];?></textarea>
		</tr>

	</table><br>
		
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
