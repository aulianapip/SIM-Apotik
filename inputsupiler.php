<?php
  if($_POST){
    include 'db.php';
    $nama_pemasok=$_POST['nama_pemasok'];
    $nomor_telepon=$_POST['nomor_telepon'];
    $alamat=$_POST['alamat'];
    $contact_person=$_POST['contact_person'];
    $kode_supplier=$_POST['kode_supplier'];
    //memperbaiki query tambah supplier
    
   
    $QuerySql = " INSERT INTO supplier VALUES ('$nama_pemasok', '$nomor_telepon', '$alamat', '$contact_person', '$kode_supplier')";
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
  <input class="input" type="text" data-length="20" name="nomor_telepon" placeholder="Nomor Telepon">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="alamat" placeholder="Alamat">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="contact_person" placeholder="Contact Person">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="kode_supplier" placeholder="Kode Suppiler">
          </div>
        </div>                         
        <center><button class="button is-success" type="submit">Submit</button>
        <a href="datasupiler.php" class="button is-success">Lihat Hasil</a></center>
      </form>
    </div>
  </div>
</body>
</html>
