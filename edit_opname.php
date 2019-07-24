<!DOCTYPE html>
<html>
<head>
  <title>Edit Opname</title>
</head>
<body>
  <?php 
       
    if (isset($_POST['tambah'])) {
      include 'db.php';
      $kode_barcode = $_POST['kode_barcode']; 
      $status = $_POST['status'];
      $catatan = $_POST['catatan'];
      $query = "UPDATE opname SET status='$status',catatan='$catatan' WHERE kode_barcode='$kode_barcode'";
      mysqli_query($connect, $query);
      header("location: dataopname.php"); 
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