<!-- 1. Fitur CRM atau disebut pelanggan. fitur ini digunakan untuk menginputkan data member yang akan digunakan di bagian kasir. jika pelanggan tersebut adalah member maka akan di kenakan diskon. -->
 
<!-- 
fitur ini dikerjakan oleh Herni Sartika Manalu 1700018285

 -->
<?php

		include 'conect.php'; //untuk menyambungkan ke database yang sudah dibuat dengan nama folder conect.php
				
include('function.php');
		$ID = $_GET['ID']; //untuk mendapatkan id pada database yang sudah ada di dalamnya
		hapus($ID,$connect);
		header("location:index.php?pesan=Hapus");//ketika data sudah terhapus, maka tampilan akan merefresh ke dalam tampilan awal yaitu index
		

?>
