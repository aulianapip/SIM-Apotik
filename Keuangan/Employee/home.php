<?php 
	session_start();

	if (!isset($_SESSION["login"]) && !isset($_SESSION["login1"])) {
			header("location: http://localhost/apotik-keuangan/home.php");
			exit;
	}
	include "navbar.php";
			
	
 ?>