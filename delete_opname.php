<!-- Thobie Zatoni 1700018236 !-->
 <?php
include 'db.php';//Menghubungkan ke file yang bersambung dengan database

// menyimpan data id kedalam variabel
$kode_barcode   = $_GET['kode_barcode'];
// query SQL untuk insert data
$query="DELETE from opname where kode_barcode='$kode_barcode'";//queri untuk menghapus data opname
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location: dataopname.php");
?>