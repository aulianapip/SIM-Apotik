<?php
  if($_POST){
    include 'db.php';
    $kode_pasok=$_POST['kode_pasok'];
    $kode_obat=$_POST['kode_obat'];
    $kode_supplier=$_POST['kode_supplier'];
    $jumlah_pasok=$_POST['jumlah_pasok'];
    $harga_beli=$_POST['harga_beli'];
    $tanggal_pasok=$_POST['tanggal_pasok'];
    $tanggal_kadaluarsa=$_POST['tanggal_kadaluarsa'];

    $QuerySql = "INSERT INTO pasok VALUES ('$kode_pasok', '$kode_obat', '$kode_supplier','$jumlah_pasok','$harga_beli','$tanggal_pasok','$tanggal_kadaluarsa')";
    mysqli_query($connect, $QuerySql);

    for ($i=1; $i <=$jumlah_pasok ; $i++) {
        $status = "DI GUDANG";
        $kode_barcode = $kode_obat.$tanggal_pasok.$i;
        $QuerySql2 = "INSERT INTO barcode VALUES ('$kode_pasok','$kode_obat','$kode_barcode','$tanggal_pasok','$i','$status')";
        mysqli_query($connect, $QuerySql2);
    }

  }

?>
<!--Aditya Gusti Mandala Putra-->
<!DOCTYPE html>
<html>
<head>
	<title>Input Pasok Obat</title>
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
      <form class="col s12" method="post" action="inputpasokobat.php">
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="kode_pasok" placeholder="Kode Pasok">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="kode_obat" placeholder="Kode Obat">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text"data-length="20" name="kode_supplier" placeholder="Kode Supplier">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="jumlah_pasok" placeholder="Jumlah Pasok">
          </div>
        </div>
                  <div class="control">
  <input class="input" type="text" data-length="20" name="harga_beli" placeholder="Harga Beli">
          </div>
        </div>  
      <div class="control">
  <input class="input" type="text" data-length="20" name="tanggal_pasok" placeholder="Tanggal Pasok">
          </div>
                <div class="control">
  <input class="input" type="text" data-length="20" name="tanggal_kadaluarsa" placeholder="Tanggal Kadaluarsa">
          </div>
        </div>                               
        <center><button class="button is-success" type="submit">Submit</button>
        <a href="datapasok.php" class="button is-success">Lihat Hasil</a>
        <a href="databarcode.php" class="button is-success">Lihat Hasil Barcode</a></center>
      </form>
    </div>
  </div>
</body>
</html>