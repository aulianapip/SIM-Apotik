<?php

		include 'conect.php';
		$ID = $_GET['ID'];
		$QuerySql = "DELETE FROM pelanggan WHERE ID='$ID' ";
		$SQL = mysqli_query($connect,$QuerySql);
		header("location:pelanggan.php");
		

?>

