<!-- 1. Fitur CRM atau disebut pelanggan. fitur ini digunakan untuk menginputkan data member yang akan digunakan di bagian kasir. jika pelanggan tersebut adalah member maka akan di kenakan diskon. -->
<!-- fitur ini dikerjakan oleh rizka arnanda s 170001248
	 di modifikasi query edit pelanggan oleh adelia f z 170001281
	 menambahkan script css oleh Carto Ardiyanto 1700018283 
	script validasi input ditambahkan oleh Alfian Noor 1700018233
	-->
<?php
	include "library/import.php";//Pemanggilan folder css,bootsrap dengan nama file import.php
//
?>
<html>
<head>	
	<title>Edit User Data</title><!--Membuat judul -->
</head>
<?php
	include('header.php');//pemanggilan untuk bagian header dengan nama file header.php

	$connect = new mysqli("localhost", "root", "", "sim-apotek-pos-test");//untuk menghubungkan ke database

	$ID=$_GET["ID"];//method untuk Menampilkan variabel
	$edit="SELECT ID,Nama,Jk,NoHP,Email,Alamat FROM pelanggan where ID='$ID'";//perintah untuk menampilkan data
	foreach (mysqli_query($connect,$edit) as $a){	//merupakan sintak untuk perulangan menampilkan data pelanggan
	
?>
<link rel="stylesheet" type="text/css" href="style.css"> <!-- untuk memanggil script css-->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--mengatur layout lintas-perangkat dengan sendirinya -->

<body>
	<form method="POST" action="edit.php?ID=<?php echo $a['ID'];?>"><center> <!-- untuk mengirimkan nilai dari value yang akan dimasukan, dan action disini berguna sebagai navigator atau ketika tombol submit di klik maka si action ini akan di proses di file edit.php  -->
		<b><h1><center><font face="Bebas" size="">EDIT DATA</font></h1></b><!-- menampilkan judul edit data di center -->
		<br>
		<table width="45%" ><!-- ukuran tabel -->
		<tr>
			 <td><label for="kode_obat">ID</label>
     			 <input type="text" disabled class="form-control" id="kode_obat" name="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" value="<?php echo $a['ID']; ?>" oninput="setCustomValidity('')"></td>
     			 <!-- type disini memakai text dengan nama class untuk css form-control. dan id disini akan memanggil value yang sudah di inisialisasi sebelumnya. required oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "ID tidak boleh kosong dan jika oninput maka tidak akan keluar alert" -->
		</tr>
		<tr>
			 <td><label for="kode_obat">Nama</label>
     			 <input type="text" class="form-control" id="kode_obat" name="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" value="<?php echo $a['Nama']; ?>" oninput="setCustomValidity('')"></td>
     			 <!-- type disini memakai text dengan nama class untuk css form-control. dan id disini akan memanggil value yang sudah di inisialisasi sebelumnya. required oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "nama tidak boleh kosong dan jika oninput maka tidak akan keluar alert" -->
		</tr>
		<tr>
			  <td><label for="status" name="Jk">Jenis Kelamin</label>
			  	<!-- label tersebut untuk control yang memiliki id name status, dan name disini berguna untuk inisialisasi untuk proses selanjutnya -->
  				<select name="Jk" class="form-control" id="Jk">
  				  	 <option >Laki-Laki</option>
   					 <option >Perempuan</option>
 				 </select></td>
		</tr>
		<tr>
			<td><label for="kode_obat">Nomor Handphone</label>
     			 <input type="text" class="form-control" id="Nama Obat" name="NoHP" value="<?php echo $a['NoHP'];?>" required oninvalid="this.setCustomValidity('Nomor Handphone tidak boleh kosong')" oninput="setCustomValidity('')"></td>
     			 <!-- type disini memakai text dengan nama class untuk css form-control. dan id disini akan memanggil value yang sudah di inisialisasi sebelumnya. required oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "nomor handphone tidak boleh kosong dan jika oninput maka tidak akan keluar alert" -->
		</tr>
		
		<tr>
			<td><label for="harga_obat">Email</label>
     		<input type="text" class="form-control" id="harga obat" value="<?php echo $a['Email'];?>" name="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')"></td>
     		<!-- type disini memakai text dengan nama class untuk css form-control. dan id disini akan memanggil value yang sudah di inisialisasi sebelumnya. required oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "Email tidak boleh kosong dan jika oninput maka tidak akan keluar alert" -->
		</tr>
		<tr>
			<td><label for="harga_obat">Alamat</label>
     		<textarea class="form-control" rows="5" id="Alamat" name="Alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $a['Alamat'];?></textarea><!-- karena alamat disini membutuhkan inputan yang panjang maka digunakan textarea, required oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "nama tidak boleh kosong" dan jika oninput maka tidak akan keluar alertrequired oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "alamat tidak boleh kosong" dan jika oninput maka tidak akan keluar alert -->
		</tr>

	</table><br>
		
	<table>
		<button a href="inputdata.php"><input type="submit" name="Kirim" value="Edit" class="button" ><!-- tombol input dengan type submit dan value=kirim -->
	</button>
	</table>
	</center>
</form>
<?php 

}

 ?>

</body></html>
