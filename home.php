<!-- AMANDA FAHMIDHYNA 
	170001823 -->
<?php 
	session_start();

	if (isset($_SESSION["login1"])) {
			include "navbar.php";//jika login berhasil maka akan muncul navbar menu
			exit;
	}else if (!isset($_SESSION["login1"])) {
			header("location: http://localhost/apotik-keuangan/home.php");//jika saat login gagal maka akan tetap di home awal dan dimintai login lagi
			exit;
		}
			
	
 ?>