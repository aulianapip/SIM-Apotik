<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    include "koneksi.php";
    if (isset($_POST['kirim'])) {
      $kode_opname = $_POST['kode_opname'];
      $kode_obat = $_POST['kode_obat'];
      $hilang = $_POST['hilang'];
      $rusak = $_POST['rusak'];
      $dipinjam = $_POST['dipinjam'];
      if($rusak == 0 && $hilang == 0 && $dipinjam == 0 ){
        $status = "Sesuai";
      }else{
        $status = "Belum Sesuai";
      }
      $catatan = $_POST['catatan'];
      $tanggal = $_POST['tanggal'];

      $query =mysqli_query($koneksi,"SELECT * FROM opname WHERE kode_opname = '$kode_opname'");
      $row = mysqli_fetch_array($query);

      $kurang_hilang = $row['hilang'];
      $kurang_hilang1=$kurang_hilang-$hilang;
      $kurang_dipinjam = $row['dipinjam'];
      $kurang_dipinjam1=$kurang_dipinjam-$dipinjam;
      $kurang_rusak = $row['rusak'];
      $kurang_rusak1=$kurang_rusak-$rusak;
      $totalopname = $kurang_rusak1 + $kurang_dipinjam1 + $kurang_hilang1 ;

      $query1 =mysqli_query($koneksi,"SELECT * FROM pasok WHERE kode_obat = '$kode_obat' ");
      $row1 = mysqli_fetch_array($query1);

      $total_obat = $row1['jumlah_pasok'];
      $total_obat=$total_obat-$totalopname;
      mysqli_query($koneksi,"UPDATE pasok SET jumlah_pasok='$total_obat' WHERE kode_obat='$kode_obat'");

      mysqli_query($koneksi,"UPDATE opname SET kode_opname='$kode_opname', kode_obat='$kode_obat', hilang='$hilang', rusak='$rusak', dipinjam='$dipinjam', status='$status', catatan='$catatan', tanggal=curdate() WHERE kode_opname='$kode_opname'");
      header("location: dataopname.php");
    }else{
      include "koneksi.php";
    $opname =$_GET['kode_opname'];
    $query = mysqli_query($koneksi,"SELECT * FROM obat");
    $query2 = mysqli_query($koneksi,"SELECT * FROM opname WHERE kode_opname = $opname");
    $row = mysqli_fetch_array($query2);
    }
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