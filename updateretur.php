<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    include "koneksi.php";
    if (isset($_POST['kirim'])) {
      $kode_opname = $_POST['kode_retur'];
      $kode_obat = $_POST['kode_obat'];

      $rusak = $_POST['rusak'];
      
      $catatan = $_POST['catatan'];
      $tanggal = $_POST['tanggal'];

      $query =mysqli_query($koneksi,"SELECT * FROM retur WHERE kode_retur = '$kode_retur'");
      $row = mysqli_fetch_array($query);

      
      $kurang_rusak = $row['rusak'];
      $kurang_rusak1=$kurang_rusak-$rusak;
      $totalretur = $kurang_rusak1 ;

      $query1 =mysqli_query($koneksi,"SELECT * FROM pasok WHERE kode_obat = '$kode_obat' ");
      $row1 = mysqli_fetch_array($query1);

      $total_obat = $row1['jumlah_pasok'];
      $total_obat=$total_obat-$totalopname;
      mysqli_query($koneksi,"UPDATE pasok SET jumlah_pasok='$total_obat' WHERE kode_obat='$kode_obat'");

      mysqli_query($koneksi,"UPDATE retur SET kode_retur='$kode_retur', kode_obat='$kode_obat',  rusak='$rusak', catatan='$catatan', tanggal=curdate() WHERE kode_retur='$kode_retur'");
      header("location: dataretur.php");
    }else{
      include "koneksi.php";
    $opname =$_GET['kode_retur'];
    $query = mysqli_query($koneksi,"SELECT * FROM obat");
    $query2 = mysqli_query($koneksi,"SELECT * FROM retur WHERE kode_retur = $retur");
    $row = mysqli_fetch_array($query2);
    }
   ?>
   <form class="from-horizontal" action="updateretur.php" method="POST" role="form" >
 <div class="form-group">
  <label for="pwd">Kode Retur</label>
  <input type="text" class="form-control" name="kode_retur" value = "<?php echo $row['kode_retur']; ?>">
 </div>
 <br>
 <div class="form-group">
  <label for="pwd">Kode obat</label>
  <input type="text" class="form-control" name="kode_obat" value = "<?php echo $row['kode_obat']; ?>">
 </div>
<br>

<div class="form-group">
  <label for="pwd">RUSAK</label>
  <input type="text" class="form-control" name="rusak" value = "<?php echo $row['rusak']; ?>">
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