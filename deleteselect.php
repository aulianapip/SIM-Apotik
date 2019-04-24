<?php 
include 'conect.php';
$ID = $_POST['pilih'];
$jumlah_dipilih = count($ID);

for($x=0; $x<$jumlah_dipilih; $x++){

	mysqli_query($connect,"DELETE FROM pelanggan WHERE ID ='$ID[$x]'");
 
}
 
header("location:selectdelete.php");
?>




