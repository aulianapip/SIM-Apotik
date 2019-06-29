 <?php
include 'db.php';
// menyimpan data id kedalam variabel
$kode_barcode   = $_GET['kode_barcode'];
// query SQL untuk insert data
$query="DELETE from opname where kode_barcode='$kode_barcode'";
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location: dataopname.php");
?>