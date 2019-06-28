<!DOCTYPE html>
<html>
<head>
  <title>Tambah Opname</title>
</head>
<body>
  <?php 
    include "db.php";
    if (isset($_POST['cek'])) {
      $query = "SELECT kode_obat from obat ";
      $cekobat = mysqli_query($connect,$query);
      $barcode = "SELECT kode_barcode from barcode ORDER BY nomor_pasok ASC";
      $cekbarcode = mysqli_query($connect,$barcode);
    }elseif (isset($_POST['refresh'])) {
      header("location: tambah_opname.php");
    }else{
      $query = "SELECT kode_obat from obat ";
      $cekobat = mysqli_query($connect,$query);
    }

   ?>
  <form method="post" action="tambah_opname.php">
    <div>
      <label>Kode Obat :</label>
       <select name="kode_obat">
        <?php 
          foreach ($cekobat as $data){
            echo "<option value=$data[kode_obat]>$data[kode_obat]</option>";
          }
          
         ?>
       </select> 
      <br>
      <input type="submit" name="cek" value="Cek Barcode">
      <br>
      <input type="submit" name="refresh" value="Refresh">
    </div>
    <br>
    <div>
      <label>Kode Barcode :</label>
       <select name="kode_barcode">
        <?php 
          foreach ($cekbarcode as $data){
            echo "<option value=$data[kode_barcode]>$data[kode_barcode]</option>";
          }
          
         ?>
       </select>
    </div>
    <br>
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