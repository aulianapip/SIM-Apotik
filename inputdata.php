<!-- 1. Fitur CRM atau disebut pelanggan. fitur ini digunakan untuk menginputkan data member yang akan digunakan di bagian kasir. jika pelanggan tersebut adalah member maka akan di kenakan diskon. -->
 
<!-- 
fitur ini dikerjakan oleh adelia fitriawati z 1700018281
query dan ui dimodifikasi oleh Carto Ardiyanto 1700018283
validasi dikerjakan oleh Alfian Noor
 -->
<?php
	include "library/import.php"; //Pemanggilan link untuk css,bootsrap dengan file name bernama import.php
	//requiere_once("function.php");
	
?>
<?php  
include ('header.php'); //pemanggilan untuk bagian header dengan nama file header.php
			include ('conect.php');
		include('function.php');
	if ($_POST){ //method untuk mengirimkan data langsung ke action untuk di tampung, dan jika kita memasukan nilai value dia tidak akan langsung di tampilkan
	 //untuk menghubungkan ke database

		$Nama = $_POST['Nama']; //sintaks yang berfungsi untuk sebagai inisial yang akan menyimpan nilai atau value
		$Jk = $_POST['Jk']; //sintaks yang berfungsi untuk sebagai inisial yang akan menyimpan nilai atau value
		$NoHP = $_POST['NoHP']; //sintaks yang berfungsi untuk sebagai inisial yang akan menyimpan nilai atau value
		$Email = $_POST['Email']; //sintaks yang berfungsi untuk sebagai inisial yang akan menyimpan nilai atau value
		$Alamat = $_POST['Alamat']; //sintaks yang berfungsi untuk sebagai inisial yang akan menyimpan nilai atau value
	
		input($Nama,$Jk,$NoHP,$Email,$Alamat,$connect);

		echo "<script>alert('Input data baru sukses!!!');window.location='index.php'</script>"; //perintah php yang akan menampilkan deskripsi script alert, dan jika berhasil maka akan membuka ke jendela lokasi file index.php
	}
?>
<html>
<head>

	
</head>

<body><center><div class=jumbotron><h1>INPUT DATA PELANGGAN</h1></div><br> <!-- untuk memberikan judul dengan nama input data pelanggan -->
	<br>
	<form method="post" action="inputdata.php"> <!-- untuk mengirimkan nilai dari value yang akan dimasukan, dan action disini berguna sebagai navigator atau ketika tombol submit di klik maka si action ini akan di proses di file inputdata.php  -->
	<table width="45%" > <!-- ukuran tabel dengan lebar 45% -->
		<tr>
			 <td><label for="kode_obat">Nama</label>
     			 <input type="text" class="form-control" id="kode_obat" name="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')"></td> <!-- type disini memakai text dengan nama class untuk css form-control. dan id disini akan memanggil value yang sudah di inisialisasi sebelumnya. required oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "nama tidak boleh kosong dan jika oninput maka tidak akan keluar alert" -->
		</tr>
		<tr>
			  <td><label for="status" name="Jk">Jenis Kelamin</label><!-- label tersebut untuk control yang memiliki id name status, dan name disini berguna untuk inisialisasi untuk proses selanjutnya -->
  				<select name="Jk" class="form-control" id="Jk"> <!-- name digunakan untuk inisialisasi agar tidak terdapat duplikat. untuk id sendiri digunakan untuk tag/objek biasanya digunakan untuk css  -->
  				  	 <option value="1">Laki-Laki</option> <!-- nilai yang akan diberikan berupa 1 -->
   					 <option value="2">Perempuan</option><!-- nilai yang diberikan berupa 2 -->
   					 	 
 				 </select></td>
		</tr>
		<tr>
			<td><label for="NoHP">Nomor Handphone</label> <!-- label tersebut untuk control yang memiliki id name NOHP -->
     			 <input type="text" class="form-control" id="NoHP" name="NoHP" required oninvalid="this.setCustomValidity('Nomor Handphone tidak boleh kosong')" oninput="setCustomValidity('')"></td> <!-- type disini memakai text dengan nama class untuk css form-control. dan id disini akan memanggil value yang sudah di inisialisasi sebelumnya yaitu id No.HP. required oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "nomer handpone tidak boleh kosong dan jika oninput maka tidak akan keluar alert" --> 
		</tr>
		
		<tr>
			<td><label for="Email">Email</label> <!-- label tersebut untuk control yang memiliki id name email -->
     		<input type="text" class="form-control" id="Email" name="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')"></td>
		</tr> <!-- type disini memakai text dengan nama class untuk css form-control. dan id disini akan memanggil value yang sudah di inisialisasi sebelumnya yaitu id=email. dan name digunakan untuk inisialisasi. required oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "nama tidak boleh kosong" dan jika oninput maka tidak akan keluar alert -->
		<tr>
			<td><label for="Alamat">Alamat</label> <!-- label tersebut untuk control yang memiliki id name alamat -->
     		<textarea class="form-control" rows="5" id="Alamat" name="Alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"></textarea> <!-- karena alamat disini membutuhkan inputan yang panjang maka digunakan textarea, dengan ketentuan class form contol untuk inisialisasi class css. dengan row 5. id digunakan untuk memanggil value yang sudah di inisialisasi sebelumnya yaitu id=email. dan name digunakan untuk inisialisasi. required oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "nama tidak boleh kosong" dan jika oninput maka tidak akan keluar alertrequired oninvalid disini adalah alert yang jika kita tidak mengisi kolom tersebut maka akan muncul alert yang mengatakan "nama tidak boleh kosong" dan jika oninput maka tidak akan keluar alert -->
		</tr>

	</table><br>
	<CENTER><input type="submit" class="btn btn-primary" value="KIRIM"></CENTER> <!-- tombol input dengan type submit dan value=kirim -->
	</form>
	</center>


</body>
</html>
