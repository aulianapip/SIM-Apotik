<?php
  session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["login1"])) {
      header("location: http://localhost/apotik-keuangan/home.php");
      exit;
    }
      
  if($_POST){
    include 'db.php';
    $nama_pemasok=$_POST['nama_pemasok'];
    $kode_obat=$_POST['kode_obat'];
    $jumlah_pasok=$_POST['jumlah_pasok'];
    $nomer_telepon_supp=$_POST['nomer_telepon_supp'];
    $kode_pasok=$_POST['kode_pasok'];
    $harga_beli=$_POST['harga_beli'];
    
    
   
    $QuerySql = " INSERT INTO Supplier VALUES ('$nama_pemasok', '$kode_obat', '$jumlah_pasok', '$nomer_telepon_supp', '$kode_pasok', ' $harga_beli')";
      $SQL = mysqli_query($connect, $QuerySql);
    }

  

?>
<!--M. Rafie Sultan Agam-->
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<nav class="navbar is-success" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
   

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="login.html">
    <img src="logut.png"></img>
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Daftar Tabel
        </a>

        <div class="navbar-dropdown">
          
          <a class="navbar-item" href="dataobat.php">
            Obat
          </a>
          
          <a class="navbar-item" href="datasupiler.php">
            Supiler
          </a>
          
        </div>
      </div>
  <a class="navbar-item" href="inputobat.php">
       Tambah Obat
      </a>
      <a class="navbar-item" href="inputsupiler.php">
       Tambah Suppiler
      </a>
      
  </div>
</div>
    </div>

    
  </div> 
</nav>
<table class="table is-fullwidth" >
<div class="container">
 <div class="row">
      <form class="col s12" method="post" action="inputsupiler.php">
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="nama_pemasok" placeholder="Nama pemasok">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="kode_obat" placeholder="Kode Obat">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text"data-length="20" name="jumlah_pasok" placeholder="Jumlah Pasok">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text"data-length="20" name="nomer_telepon_supp" placeholder="Nomer telepon">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="kode_pasok" placeholder="Kode Pasok">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="harga_beli" placeholder="Harga Beli">
          </div>
        </div>
      
          </div>
        </div>                              
        <center><button class="button is-success" type="submit">Submit</button>
        <a href="datasupiler.php" class="button is-success">Lihat Hasil</a></center>
      </form>
    </div>
  </div>
</body>
</html>