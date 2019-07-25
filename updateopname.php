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

      //Fadhil Abigail Alvast
      $query =mysqli_query($koneksi,"SELECT * FROM opname WHERE kode_opname = '$kode_opname'");
      //memilih data yang akan diupdate berdasarkan kode opname
      $row = mysqli_fetch_array($query);

      $kurang_hilang = $row['hilang'];
      $kurang_hilang1=$kurang_hilang-$hilang;
      $kurang_dipinjam = $row['dipinjam'];
      $kurang_dipinjam1=$kurang_dipinjam-$dipinjam;
      $kurang_rusak = $row['rusak'];
      $kurang_rusak1=$kurang_rusak-$rusak;
      $totalopname = $kurang_rusak1 + $kurang_dipinjam1 + $kurang_hilang1 ;
      //batas pngerjaan fadhil abigail alvast

      //Reka Rachmadi Apriansyah - 1700018237
      //bagian awal
      $query1 =mysqli_query($koneksi,"SELECT * FROM pasok WHERE kode_obat = '$kode_obat' ");// Menampilkan tabel pasok semua artibut yang ditampilkan berdasarkan artibut kode_obat yang diisi ke var $query1
      $row1 = mysqli_fetch_array($query1); //memilih untuk ditampilkan berdasarkan artibut pada var $query1 yang diisikan ke var $row1
      $total_obat = $row1['jumlah_pasok']; //menampilkan artbut jumlah_pasok dan diisikan ke var $total_obat
      $total_obat=$total_obat-$totalopname; //var $total_obat di kurangi var $totalopname diisikan ke var $total_obat
      mysqli_query($koneksi,"UPDATE pasok SET jumlah_pasok='$total_obat' WHERE kode_obat='$kode_obat'");//update pasok pada artibut jumlah_pasok di update dengan var $total_obat berdasarkan kode_obat
      //batas akhir pengerjaan reka
      //NurMutmainnah
      mysqli_query($koneksi,"UPDATE opname SET kode_opname='$kode_opname', kode_obat='$kode_obat', hilang='$hilang', rusak='$rusak', dipinjam='$dipinjam', status='$status', catatan='$catatan', tanggal=curdate() WHERE kode_opname='$kode_opname'");//update data opname sesuai dengan value 'kirim' 
      header("location: dataopname.php");
    } else{
       include "koneksi.php";//koneksi database
     $opname =$_GET['kode_opname'];
     $query = mysqli_query($koneksi,"SELECT * FROM obat");
     $query2 = mysqli_query($koneksi,"SELECT * FROM opname WHERE kode_opname = $opname");//memilih kode opname dari tabel opname, sesuai kode opname yang dipilih untuk diupdate(Mail)
     $row = mysqli_fetch_array($query2);
     }//btas pengerjaan NurMutmainnah
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