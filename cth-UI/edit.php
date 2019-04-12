<?php  

	include 'conect.php';
		
		$ID=$_GET['ID'];
		$Nama= $_POST['Nama'];
		$jeniskelamin = $_POST['jeniskelamin'];
		$NoHP= $_POST['NoHP'];
		$Alamat = $_POST['Alamat'];
		$Email = $_POST['Email'];

	$q1 = "UPDATE pelanggan SET Nama='$Nama',Jk='$jeniskelamin', NoHP='$NoHP', Email='$Email', Alamat='$Alamat' WHERE ID ='$ID'";
		

		$SQL = mysqli_query($connect,$q1);
		echo "berhasil !";
		header("location:index.php?pesan=Edit");
	

?>
