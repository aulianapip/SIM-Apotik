<!--
UAS PRPL
NAMA : M. Rafie Sultan Agam
NIM : 1700018282
KELAS : E

1. inputsupiler.php fitur ini berfungsi sebagai fitur untuk menambahkan data obat terbaru yang sebelumnya belum terdaftar atau terdata pada database Apotek.

2. dibawah ini merupakan source connect database.-->
<?php
  if($_POST){
    include 'db.php';//post berfungsi ketika kita menginputkan  / mengisi form maka data yang diisi akan masuk ke dalam data base. dan akan di tampilkan pada data obat yang sudah di kasih deklarasi GET
    $nama_obat=$_POST['nama_obat'];//inisialisasi nama obat
    $harga=$_POST['harga'];//inisialisasi harga obat
    $jenis=$_POST['jenis'];//inisialisasi jenis obat
    $kode_obat=$_POST['kode_obat'];//inisialisasi kode obat

    $QuerySql = "INSERT INTO obat VALUES ('$nama_obat', '$harga', '$jenis','$kode_obat')";//setelah kita isi form maka selanjutnya data tadi akan di masukan pada tabel input supplier
      $SQL = mysqli_query($connect, $QuerySql);

  }

?>
<!--M . Rafie Sultan Agam-->
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
            Supplier
          </a>
          
        </div>
      </div>
     <a class="navbar-item" href="inputobat.php">
       Tambah Obat
      </a>
                  <a class="navbar-item" href="inputpasokobat.php">
       Pasok Obat
      </a>
      <a class="navbar-item" href="inputsupiler.php">
       Tambah Supplier
      </a>
      
  </div>
</div>
    </div>

    
  </div> 
</nav>
<table class="table is-fullwidth" >
<div class="container">
 <div class="row">
      <form class="col s12" method="post" action="inputobat.php">
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="nama_obat" placeholder="Nama Obat">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="harga" placeholder="Harga Obat">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text"data-length="20" name="jenis" placeholder="Jenis Obat">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="kode_obat" placeholder="Kode Obat">
          </div>
        </div>                              
        <center><button class="button is-success" type="submit">Submit</button>
        <a href="dataobat.php" class="button is-success">Lihat Hasil</a></center>
      </form>
    </div>
  </div>
</body>
</html>
