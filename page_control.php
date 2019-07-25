<?php

//Nama	: Harun Setiaji 
//Nim	: 1700018271
//Kelas	: E

//Kelas ini digunakan untuk mengakses control dari halaman yang akan diakses

if(!empty($_GET['open'])){$open=trim($_GET['open']);}else{$open="";}

//disini menggunakan method switch untuk mengakses ke file seperti home, index, penjualan, dsb
	switch($open)  
	{
		case '' : include 'index.php'; break;
		case 'home' : include 'home.php'; break;
		
		
		case 'penjualan' : include 'kasir/penjualan.php'; break;
		case 'setoran' : include 'kasir/setoran_kasir.php'; break;
		
		
		
		
		case 'logout' : include 'logout.php'; break;
		
		
	}


?>
