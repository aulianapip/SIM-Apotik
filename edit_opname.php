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
      include 'db.php';//memanggil db.php untuk di panggil variabel $connect
      $kode_barcode = $_POST['kode_barcode']; //variabel $kode_barcode menampung data dari form input dari html dan dipanggil dengan $_POST['kode_barcode']
      $status = $_POST['status']; //variabel $status menampung data dari form input dari html dan dipanggil dengan $_POST['status']
      $catatan = $_POST['catatan']; //variabel $catatan menampung data dari form input dari html dan dipanggil dengan $_POST['status']
      $query = "UPDATE opname SET status='$status',catatan='$catatan' WHERE kode_barcode='$kode_barcode'";//update pada tabel opname dengan artbut yang di edit status di isi dengan var $status, catatan diisi dengan var $catatan dimana pada barisan kode_barcode yang diisi var $kode_barcode
      mysqli_query($connect, $query);//update data dari php ke database
      header("location: dataopname.php");//dilempar/masuk ke dataopname.php
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