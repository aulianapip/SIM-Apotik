<?php
  if($_POST){
    include 'db.php';
    $nama_pemasok=$_POST['nama_pemasok'];
    $kode_obat=$_POST['kode_obat'];
    $jumlah_pasok=$_POST['jumlah_pasok'];
    $nomer_telepon_supp=$_POST['nomer_telepon_supp'];
    $kode_pasok=$_POST['kode_pasok'];
    $harga_beli=$_POST['harga_beli'];
    $tanggal_pasok=$_POST['tanggal_pasok'];
    //memperbaiki query tambah supplier
    
   
    $QuerySql = " INSERT INTO supplier VALUES ('$nama_pemasok', '$kode_obat', '$jumlah_pasok', '$nomer_telepon_supp', '$kode_pasok', '$harga_beli', '$tanggal_pasok')";
    $SQL = mysqli_query($connect, $QuerySql);
	//Query ini untuk menambah data supplier baru ke tabel Supplier
      	//M. Rafie Sultan Agam 1700018282 
    }

  

?>
<!--M. Rafie Sultan Agam-->
<!--1.  Pada kelompok gudang, kami telah membuat beberapa kelas yang mempunyai fungsi sebagai berikut:
• Fungsi Sorting Nama Obat A-Z : fitur ini berfungsi mengurutkan nama obat sesuai alpabet dari awalan huruf A sampai awalan huruf Z.
• Fungsi Sorting Jenis Obat Kapsul : fitur ini berfungsi mensorting obat yang berjenis kapsul untuk di tampilkan.
• Fungsi Menampilkan seluruh data obat
• Fungsi Tanggal pasok obat
• Function Update Data Obat : Fitur ini berfungsi mengupdate perubahan yang telah kita tambah, Kurang, dan mengedit sesuai database
• Function Stok Obat Menipis : Fitur ini berfungsi menandai tabel obat yang stoknya telah menipis
• Function Pencarian  Data Tidak Ditemukan : fitur ini berfungsi  jika kita mencari obat atau supplier yang tidak ada didatabase
• Function Sorting Tanggal Supplier : fitur ini berfungsi mensorting obat dengan tanggal pemasok supplier yang telah memasok obat dari tanggal terdahulu
• Function Tambah Obat : fitur ini berfungsi untuk menambah data obat baru ke dalam tabel Obat
• Function Tambah Supllier : fitur ini berfungsi untuk menambah data supllier baru ke tabel Supllier
• Function Cari Obat : fitur ini berfungsi buat mencari data obat yang ada di tabel obat
• Fuction Cari Supplier : fitur ini berfungsi mncari data supplier yang ada di tabel supplier
• Function Sorting Nama Supplier A-Z : fitur ini berfungsi untuk mengurutkan nama supplier dari A-Z
• Function data suplier : fitur ini berfungsi untuk menampilkan data suplier sesuai database
• Function sorting obat mahal : fitur ini berfungsi untuk mengurutkan harga obat dari yang termahal
-->
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
  <input class="input" type="text" data-length="20" name="jumlah_pasok" placeholder="Jumlah Pasok">
          </div>
        </div>
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="nomer_telepon_supp" placeholder="Nomer telepon">
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
        <div class="row">
          <div class="control">
  <input class="input" type="text" data-length="20" name="tanggal_pasok" placeholder="Tanggal Pasok">
          </div>
        </div>                           
        <center><button class="button is-success" type="submit">Submit</button>
        <a href="datasupiler.php" class="button is-success">Lihat Hasil</a></center>
      </form>
    </div>
  </div>
</body>
</html>
