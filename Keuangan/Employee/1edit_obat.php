<!--ARINDRA WAHYU CANDRA -->
<?php
  session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["login1"])) {
      header("location: http://localhost/apotik-keuangan/home.php");
      exit;
    }
      
    include 'db.php';

      if (isset($_POST['kirim'])) {
      $kode_obat = $_POST['kode_obat'];

      $obat = "select * FROM obat where kode_obat='$kode_obat'" ;
      $obat1= mysqli_query($connect,$obat);
      $row    = mysqli_fetch_array($obat1);
    $kode_obat=$_POST['kode_obat'];
    $nama_obat=$_POST['nama_obat'];
    $kode_jenis=$_POST['kode_jenis'];
    $stok_obat=$_POST['Stok_Obat'];
    $harga_obat=$_POST['harga_obat'];
    $dosis_obat=$_POST['dosis_obat'];
    $tanggal_input=$_POST['tanggal_input'];
    
    $QuerySql = "UPDATE obat SET nama_obat='$nama_obat',kode_jenis='$kode_jenis',stok_obat='$stok_obat',harga_obat='$harga_obat',dosis_obat='$dosis_obat',tanggal_input='$tanggal_input' where kode_obat='$kode_obat1' ";
      $SQL = mysqli_query($connect, $QuerySql);

      header("location: http://localhost/apotik-keuangan/Employee/1data_obat.php");
  
    }else if (!isset($_POST['kirim'])) {
      $kode_obat = $_GET['kode_obat'];
      $obat = mysqli_query($connect, "select * FROM obat where kode_obat='$kode_obat'");
      $row    = mysqli_fetch_array($obat);
    }
?>


<!--ARINDRA WAHYU CANDRA -->

<!DOCTYPE html>
<html>
<head>
  <title>Tampil Data Obat</title>
  <link rel="stylesheet" href="bulma.min.css">
  <link rel="stylesheet" type="text/css" href="edit.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<?php 
  include "1navbar_input_obat.php";
 ?>
<table class="table is-fullwidth" >
<div class="container">
 <div class="row">
      <form class="from-horizontal" action="1edit_obat.php" method="POST" role="form" >
    
    <div class="from-group">
        <label >Kode Obat :</label>
          <input type="text" name="kode_obat" class="form-control" value="<?php echo $row['kode_obat'] ?>" disabled required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Nama Obat :</label>
          <input type="text" name="nama_obat" class="form-control" value="<?php echo $row['nama_obat'] ?>" required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >JENIS OBAT:</label>
         <select class="form-control" name="kode_jenis" >
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
          <input type="text" name="Stok_Obat"  class="form-control" value="<?php echo $row['Stok_Obat'] ?>" required>
    </div >
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Harga Obat :</label>
          <input type="text" name="harga_obat" class="form-control" value="<?php echo $row['harga_obat'] ?>" required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Dosis Obat :</label>
          <input type="text" name="dosis_obat" class="form-control" value="<?php echo $row['dosis_obat'] ?>" required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >TANGGAL KADALUARSA :</label>
          <input type="date" name="tanggal_input"  class="form-control" value="<?php echo $row['tanggal_input'] ?>" required>
    </div>
    <br>
    <div class="form-group">
          <button id="kirim" name="kirim" value="kirim" class="btn btn-default btn-block">TAMBAH OBAT BARU</button>
        </div>            
      </form>
    </div>
  </div>
</body>
</html>