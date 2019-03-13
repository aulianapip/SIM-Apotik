<?php

if(!empty($_GET['open'])){$open=trim($_GET['open']);}else{$open="";}


	switch($open)  
	{
		case '' : include 'index.php'; break;
		case 'home' : include 'home.php'; break;
		
		
		case 'penjualan' : include 'kasir/penjualan.php'; break;
		case 'setoran' : include 'kasir/setoran_kasir.php'; break;
		
		
		
		
		case 'logout' : include 'logout.php'; break;
		
		
	}


?>
