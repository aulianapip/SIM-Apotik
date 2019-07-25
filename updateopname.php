 <!-- Nur Muthmainah 1700018276 !-->
 <!-- Fadhil Abigail Alvast 1700018252 !-->
 <!-- Reka Rachmadi 1700018237 !-->
 <!-- Alwan Zaki 1700018259 !-->
 <!-- Airla Ismail 1700018251 !-->
<!--uas no 1. Stock Opname adalah kegiatan perhitungan secara fisik atas persediaan barang di gudang 
secara fisik atas persedian barang di gudang yang akan dijual.Pada fitur yang kami buat
kami menginputkan status kondisi barang yang berada ditoko, status antara lain adalah digudang rusak, hilang ,di pinjam , dan terjual. jika terjadi kesalahan input status maka dapat diubah dengan fitur edit, dan bila barang telah kembali atau di ganti atau telah di konfirmasi oleh pihak gudang dan kasir maka data opname dapat di hapus dengan fitur delete  -->
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    include "koneksi.php";//Airla Ismail
    if (isset($_POST['kirim'])) { //mengambil data dari value 'kirim' 
       $kode_opname = $_POST['kode_opname'];//mengisi variabel $kode_opname dengan kode_opname dari tabel opname 
       $kode_obat = $_POST['kode_obat'];//mengisi variabel $kode_obat dengan kode_obat dari tabel opname 
       $hilang = $_POST['hilang'];//mengisi variabel $hilang menjadi hilang jika status obat diisi hilang 
       $rusak = $_POST['rusak'];//mengisi variabel $rusak menjadi rusak jika status obat diisi rusak 
       $dipinjam = $_POST['dipinjam'];//mengisi variabel $dipinjam menjadi dipinjam jika status obat diisi dipinjam
       $catatan = $_POST['catatan'];
       $tanggal = $_POST['tanggal'];//batas Airla Ismail
       
       //Alwan Zaki 1700018259
       if($rusak == 0 && $hilang == 0 && $dipinjam == 0 ){
         $status = "Sesuai";//jika barang yang rusak,hilang, dan dipinjam tidak ada maka status = sesuai jika tidak status = tidak sesuai
       }else{
         $status = "Belum Sesuai";
       }// batas pengerjaan zaki


   ?>
   <form class="from-horizontal" action="updateopname.php" method="POST" role="form" >
 <div class="form-group">
  <label for="pwd">KODE OPNAME</label>
  <input type="text" class="form-control" name="kode_opname" value = "<?php echo $row['kode_opname']; ?>">
 </div>
 <br>
 <div class="form-group">
  <label for="pwd">KODE obat</label>
  <input type="text" class="form-control" name="kode_obat" value = "<?php echo $row['kode_obat']; ?>">
 </div>
<br>
<div class="form-group">
  <label for="pwd">HILANG</label>
  <input type="text" class="form-control" name="hilang" value = "<?php echo $row['hilang']; ?>">
</div>
<div class="form-group">
  <label for="pwd">RUSAK</label>
  <input type="text" class="form-control" name="rusak" value = "<?php echo $row['rusak']; ?>">
</div>
<div class="form-group">
  <label for="pwd">DIPINJAM</label>
  <input type="text" class="form-control" name="dipinjam" value = "<?php echo $row['dipinjam']; ?>">
</div>
<br>
 <div class="form-group">
  <label for="comment">tanggal</label>
  <input class="form-control" name="tanggal" value = "<?php echo $row['tanggal']; ?>">
</div>
<br>
 <div class="form-group">
  <label for="comment">CATATAN</label>
  <input class="form-control" rows="5" name="catatan" value = "<?php echo $row['catatan']; ?>">
</div> 
<br>
    <div class="form-group">
          <button id="kirim" name="kirim" value="kirim" class="btn btn-default btn-block">Update</button>
</div>
   </form>
</body>
</html>