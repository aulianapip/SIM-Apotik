<!-- AMANDA FAHMIDHYNA -->
<?php 
	session_start();

	if (isset($_SESSION["login1"])) {
			include "navbar.php";
			exit;
	}else if (!isset($_SESSION["login1"])) {
			header("location: http://localhost/apotik-keuangan/home.php");
			exit;
		}
			
	
 ?>