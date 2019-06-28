<!DOCTYPE html>
<html>
<head>
  <title>Tambah Opname</title>
</head>
<body>
  <?php 
    include "db.php";
    if (isset($_POST['tambah'])) {
      //TAMPIL DI FORM INPUT
      $query = "SELECT kode_obat from obat ";
      $cekobat = mysqli_query($connect,$query);
      $kode_obatB = $_POST['kode_obat'];
      $barcode = "SELECT kode_barcode from barcode WHERE kode_obat = '$kode_obatB' ORDER BY nomor_pasok ASC";
      $cekbarcode = mysqli_query($connect,$barcode);
      //AMBIL DATA DI FORM INPUT
      $kode_barcode = $_POST['kode_barcode'];
      $status = $_POST['status'];
      $catatan = $_POST['catatan'];
      //Tambah Opname
      $tambah_opname = "INSERT INTO opname VALUES ('$kode_barcode','$status','$catatan',curdate())";
      mysqli_query($connect,$tambah_opname);
      //Update Barcode
      $update_barcode = "UPDATE barcode SET status='$status' WHERE kode_barcode='$kode_barcode'";
      mysqli_query($connect,$update_barcode);
      //Update Pasok
      $barcode1 = "SELECT kode_pasok FROM barcode WHERE kode_barcode='$kode_barcode'";
      $barcode2 = mysqli_query($connect,$barcode1);
      $bar1 = mysqli_fetch_array($barcode2);
      $kode_pasok = $bar1['kode_pasok'];
      $pas1 = "SELECT jumlah_pasok FROM pasok where kode_pasok='$kode_pasok'";
      $pas2 = mysqli_query($connect,$pas1);
      $hehe = mysqli_fetch_array($pas2);
      if ($status != "DI GUDANG") {
        $jumlah_pasok= $hehe['jumlah_pasok']-1;
        $update_p = "UPDATE pasok SET jumlah_pasok='$jumlah_pasok' WHERE kode_pasok='$kode_pasok'";
        mysqli_query($connect,$update_p);
      }
       header("location: dataopname.php");
    }elseif (isset($_POST['cek'])) {
      $query = "SELECT kode_obat from obat ";
      $cekobat = mysqli_query($connect,$query);
      $kode_obatB = $_POST['kode_obat'];
      $barcode = "SELECT kode_barcode from barcode WHERE kode_obat = '$kode_obatB' ORDER BY nomor_pasok ASC";
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