<!--FIXED REKA RACHMADI APRIANSYAH-->
<?php
  session_start();
if (!isset($_SESSION["login1"])) {
      header("location: http://localhost/apotik-keuangan/home.php");
      exit;
    }
      
    include 'connection/db.php';
    $cari="SELECT max(kode_supplier) as terbesar from supplier";
    $cari2=mysqli_query($connect,$cari);
    $cari_terbesar=mysqli_fetch_array($cari2);
    $besar=substr($cari_terbesar['terbesar'], 1,3);

    $tambah=$besar+1;
    if($tambah<10){
      $id="R00".$tambah;
    }else if($tambah>10){
      $id="R0".$tambah;
    }else if($tambah>100){
      $id="R".$tambah;
    }

if (isset($_POST['kirim'])) {
    $kode_supplier=$_POST['kode_supplier'];
    $jumlah_obat=$_POST['jumlah_obat'];
    $kode_obat=$_POST['kode_obat'];
    $harga_beli=$_POST['harga_beli'];
    $tanggal_kadaluarsa=$_POST['tanggal_kadaluarsa'];
    $QuerySql = "INSERT INTO supplier SET kode_obat='$kode_obat',jumlah_obat='$jumlah_obat',kode_supplier='$kode_supplier',harga_beli='$harga_beli',tanggal_beli=curdate(),tanggal_kadaluarsa='$tanggal_kadaluarsa'";
      mysqli_query($connect, $QuerySql);
  
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Input Obat Baru</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_beli.php";

 ?>
<table class="table is-fullwidth" >
<div class="container">
 <div class="row">
      <form class="from-horizontal" action="pembelian_obat.php" method="POST" role="form" >
    <div class="from-group">
        <label >Kode Supplier :</label>
          <input type="text" name="kode_supplier" class="form-control" value="<?php echo $id;  ?>" required >
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Kode Obat :</label>
          <input type="text" name="kode_obat" class="form-control" placeholder="" required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Golongan" >Jumlah Obat :</label>
          <input type="number" name="jumlah_obat"  class="form-control" placeholder="" required>
    </div >
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Harga Beli :</label>
          <input type="text" name="harga_beli" class="form-control" placeholder="" required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Tanggal Kadaluarsa :</label>
          <input type="date" name="tanggal_kadaluarsa"  class="form-control" required>
    </div>
    <br>
    <div class="form-group">
          <button id="kirim" name="kirim" value="kirim" class="btn btn-default btn-block">BELI OBAT</button>
        </div>
  </form>
    </div>
  </div>
</table>
</body>
</html>