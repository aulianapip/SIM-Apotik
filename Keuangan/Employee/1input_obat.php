<!--FIXED REKA RACHMADI APRIANSYAH-->
<?php
  session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["login1"])) {
      header("location: http://localhost/apotik-keuangan/home.php");
      exit;
    }
      

    include 'db.php';
    $cari="SELECT max(kode_obat) as terbesar from obat";
    $cari2=mysqli_query($connect,$cari);
    $cari_terbesar=mysqli_fetch_array($cari2);
    $besar=substr($cari_terbesar['terbesar'], 1,3);

    $tambah=$besar+1;
    if($tambah<10){
      $id="B00".$tambah;
    }else if($tambah>10){
      $id="B0".$tambah;
    }else if($tambah>100){
      $id="B".$tambah;
    }

if (isset($_POST['kirim'])) {
    $kode_obat=$_POST['kode_obat'];
    $nama_obat=$_POST['nama_obat'];
    $kode_jenis=$_POST['kode_jenis'];
    $stok_obat=$_POST['stok_obat'];
    $harga_obat=$_POST['harga_obat'];
    $dosis_obat=$_POST['dosis_obat'];
    $tanggal_input=$_POST['tanggal_input'];
    $QuerySql = "INSERT INTO obat SET kode_obat='$kode_obat',nama_obat='$nama_obat',kode_jenis='$kode_jenis',stok_obat='$stok_obat',harga_obat='$harga_obat',dosis_obat='$dosis_obat',tanggal_input='$tanggal_input'";
      $SQL = mysqli_query($connect, $QuerySql);

    header("refresh:0");
  
}
 ?>
<!--M . Rafie Sultan Agam-->
<!DOCTYPE html>
<html>
<head>
	<title>Input Obat Baru</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "1navbar_input_obat.php";

 ?>
<table class="table is-fullwidth" >
<div class="container">
 <div class="row">
      <form class="from-horizontal" action="1input_obat.php" method="POST" role="form" >
    <div class="from-group">
        <label >Kode Obat :</label>
          <input type="text" name="kode_obat" class="form-control" value="<?php echo $id;  ?>" required >
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Nama Obat :</label>
          <input type="text" name="nama_obat" class="form-control" placeholder="" required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >JENIS OBAT:</label>
         <select class="form-control" name="kode_jenis">
            <option value="101">TABLET</option>
            <option value="102">SERBUK</option>
            <option value="103">PIL</option>
            <option value="104">KAPSUL</option>
            <option value="105">KAPLET</option>
            <option value="106">SYRUP</option>
            <option value="107">SALEP</option>
            <option value="108">TETES</option>
            <option value="109">SUNTIK</option>
        </select> 
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Golongan" >STOK OBAT :</label>
          <input type="number" name="stok_obat"  class="form-control" placeholder="" required>
    </div >
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Harga Obat :</label>
          <input type="text" name="harga_obat" class="form-control" placeholder="" required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Dosis Obat :</label>
          <input type="text" name="dosis_obat" class="form-control" placeholder="" required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >TANGGAL KADALUARSA :</label>
          <input type="date" name="tanggal_input"  class="form-control" required>
    </div>
    <br>
    <div class="form-group">
          <button id="kirim" name="kirim" value="kirim" class="btn btn-default btn-block">TAMBAH OBAT BARU</button>
        </div>
  </form>
    </div>
  </div>
</table>
</body>
</html>