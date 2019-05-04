<?php  
 
	include 'conect.php'; //pemanggilan database
		
		$ID=$_GET['ID']; //method untuk mengamgil variabel ID
		$Nama= $_POST['Nama'];//method yang berfungsi untuk inisial yang akan menyimpan value
		$jeniskelamin = $_POST['Jk'];//method yang berfungsi untuk inisial yang akan menyimpan value
		$NoHP= $_POST['NoHP'];//method yang berfungsi untuk inisial yang akan menyimpan value
		$Email = $_POST['Email'];//method yang berfungsi untuk inisial yang akan menyimpan value
		$Alamat = $_POST['Alamat'];//method yang berfungsi untuk inisial yang akan menyimpan value
		

	$q1 = "UPDATE pelanggan SET Nama='$Nama',Jk='$jeniskelamin', NoHP='$NoHP', Email='$Email', Alamat='$Alamat' WHERE ID ='$ID'";
		//query update berguna untuk mengedit atau mengupudate ke dalam data pelanggan.
		//line 1-13 dibuat rizka arnanda s 170001248
		$SQL = mysqli_query($connect,$q1); //query ini berfungsi untuk memanggil fungsi conect untuk memberikan akses ke database dan inisialisasi dari querysql
		echo "berhasil !"; //perintah php yang akan menampilkan deskripsi script alert
		header("location:index.php?pesan=Edit");//jika berhasil maka akan membuka ke jendela lokasi file index.php
	

?>
