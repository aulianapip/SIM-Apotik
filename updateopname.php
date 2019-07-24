
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