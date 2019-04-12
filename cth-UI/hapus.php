<?php
if ($_POST){
		include 'conect.php';
		$ID = $_POST['ID'];

		$QuerySql = "DELETE FROM pelanggan WHERE ID =('$ID') ";
		$SQL = mysqli_query($connect,$QuerySql);

		echo " DELETED SUKSES <br>";
		echo "<a href='pelanggan.php'>Lihat Hasil</a> ";
		
}?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1 align="center" class="h1">HAPUS DATA</h1>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
<center><form action="hapus.php" method="post">
			<label for="ID">ID : </label>
			<input type="text" name="ID" id="ID">
			<button class="btn btn-dark">DELETE</button>
</body>
</html>