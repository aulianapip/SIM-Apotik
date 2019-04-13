<?php
	include "library/import.php";

?>
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
<html>
<head>

	
</head>

<body><center><div class=jumbotron><h1>INPUT DATA PELANGGAN</h1></div><br>
	<br>
	<form method="post" action="inputdata.php">
	<table width="45%" >
		<tr>
			 <td><label for="kode_obat">Nama</label>
     			 <input type="text" class="form-control" id="kode_obat" name="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')"></td>
		</tr>
		<tr>
			  <td><label for="status" name="Jk">Jenis Kelamin</label>
  				<select name="jenis_obat" class="form-control" id="jenis_obat">
  				  	 <option value="1">Laki-Laki</option>
   					 <option value="2">Perempuan</option>
   					 
    				 
 				 </select></td>
		</tr>
		<tr>
			<td><label for="kode_obat">Nomor Handphone</label>
     			 <input type="text" class="form-control" id="Nama Obat" name="NoHP" required oninvalid="this.setCustomValidity('Nomor Handphone tidak boleh kosong')" oninput="setCustomValidity('')"></td>
		</tr>
		
		<tr>
			<td><label for="harga_obat">Email</label>
     		<input type="text" class="form-control" id="harga obat" name="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')"></td>
		</tr>
		<tr>
			<td><label for="harga_obat">Alamat</label>
     		<textarea class="form-control" rows="5" id="Alamat" name="Alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
		</tr>

	</table><br>
	<CENTER><input type="submit" class="btn btn-primary" value="KIRIM"></CENTER>
	</form>
	</center>


</body>
</html>
