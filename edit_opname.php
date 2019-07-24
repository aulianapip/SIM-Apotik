<!-- Reka Rachmadi 1700018237 !-->
<!--uas no 1. Stock Opname adalah kegiatan perhitungan secara fisik atas persediaan barang di gudang 
secara fisik atas persedian barang di gudang yang akan dijual.Pada fitur yang kami buat
kami menginputkan status kondisi barang yang berada ditoko, status antara lain adalah digudang rusak, hilang ,di pinjam , dan terjual. jika terjadi kesalahan input status maka dapat diubah dengan fitur edit, dan bila barang telah kembali atau di ganti atau telah di konfirmasi oleh pihak gudang dan kasir maka data opname dapat di hapus dengan fitur delete  -->
<!DOCTYPE html>

<html>
<head>
  <title>Edit Opname</title>
</head>
<body>
  <?php 
       
    if (isset($_POST['tambah'])) {
      include 'db.php';//koneksi database
      $kode_barcode = $_POST['kode_barcode']; 
      $status = $_POST['status'];
      $catatan = $_POST['catatan'];
      $query = "UPDATE opname SET status='$status',catatan='$catatan' WHERE kode_barcode='$kode_barcode'";//update status opname dari form input 
      mysqli_query($connect, $query);
      header("location: dataopname.php");//di update ke file dataopname.php
    }else{

    }

   ?>
  <form method="post" action="edit_opname.php">
    <div>
      <input hidden type="text" name="kode_barcode" value=<?php echo $_GET['kode_barcode'];?>>
    </div>
    <div>
      <label>Status :</label>
      <input type="radio" name="status" value="HILANG">Hilang
      <input type="radio" name="status" value="RUSAK">Rusak
      <input type="radio" name="status" value="DIPINJAM">Dipinjam
    </div>
    <br>
    <div>
      <label>Catatan :</label><br>
      <textarea rows="10" type="text" name="catatan"></textarea>
    </div>
    <br>
    <div>
      <input type="submit" name="tambah" value="tambah">
    </div>
  </form>
</body>
</html>