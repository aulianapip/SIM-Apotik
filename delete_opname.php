 <!-- Alwan Zaki 1700018259 !-->
 <!--no1. Stock Opname adalah kegiatan perhitungan secara fisik atas persediaan barang di gudang 
secara fisik atas persedian barang di gudang yang akan dijual.Pada fitur yang kami buat
kami menginputkan status kondisi barang yang berada ditoko, status antara lain adalah digudang rusak, hilang ,di pinjam , dan terjual. jika terjadi kesalahan input status maka dapat diubah dengan fitur edit, dan bila barang telah kembali atau di ganti atau telah di konfirmasi oleh pihak gudang dan kasir maka data opname dapat di hapus dengan fitur delete  -->
 <?php
include 'db.php';
// menyimpan data id kedalam variabel
$kode_barcode   = $_GET['kode_barcode'];
// query SQL untuk insert data
$query="DELETE from opname where kode_barcode='$kode_barcode'";//queri untuk menghapus data opname
mysqli_query($connect, $query);
// mengalihkan ke halaman index.php
header("location: dataopname.php");
?>