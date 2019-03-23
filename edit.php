<?php  
	if ($_POST){
		include 'conect.php';
		$ID = $_POST['ID'];
		$Nama = $_POST['Nama'];
		$JK = $_POST['JK'];
		$NoHP = $_POST['NoHP'];
		$Alamat = $_POST['Alamat'];
		$Email = $_POST['Email'];
		$Member = $_POST['Member'];

		$QuerySql = "UPDATE pelanggan SET ID='$ID', Nama='$Nama', JK='$JK', NoHP='$NoHP', Email='$Email', Alamat='$Alamat', Member='$Member' WHERE ID='$ID'";
		$SQL = mysqli_query($connect,$QuerySql);

		echo " Input Berhasil <br>";
		echo "<a href='pelanggan.php'>Lihat Hasil</a> ";
	}


?>
