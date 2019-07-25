<?php  
 
	include 'conect.php'; //pemanggilan database
	include('function.php');
		$ID=$_GET['ID']; //method untuk mengamgil variabel ID
		$Nama= $_POST['Nama'];//method yang berfungsi untuk inisial yang akan menyimpan value
		$jeniskelamin = $_POST['Jk'];//method yang berfungsi untuk inisial yang akan menyimpan value
		$NoHP= $_POST['NoHP'];//method yang berfungsi untuk inisial yang akan menyimpan value
		$Email = $_POST['Email'];//method yang berfungsi untuk inisial yang akan menyimpan value
		$Alamat = $_POST['Alamat'];//method yang berfungsi untuk inisial yang akan menyimpan value
		
		update($ID,$Nama,$jeniskelamin,$NoHP,$Email,$Alamat,$connect);
		echo "berhasil !"; //perintah php yang akan menampilkan deskripsi script alert
		header("location:index.php?pesan=Edit");//jika berhasil maka akan membuka ke jendela lokasi file index.php
	

?>
