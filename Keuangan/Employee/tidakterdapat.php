<?php
	session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["login1"])) {
      header("location: http://localhost/apotik-keuangan/home.php");
      exit;
    }
      

	include 'db.php';
	$QuerySql = "SELECT * FROM obat";
	$SQL = mysqli_query($connect, $QuerySql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Pembelian</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar_obat.php";
 ?>
<table class="table is-fullwidth" >
<h3 align="center">TIDAK TERDAPAT DATA</h3>
</body>
</html>