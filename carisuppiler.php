<?php
  include 'db.php'; // untuk memasukan database nya
  $carisupp = $_POST['carisupp']; // untuk variabel cari supplier
  $QuerySql = "SELECT `nama_pemasok`,`nomor_telepon`,`alamat`,`contact_person`,`kode_supplier` FROM`supplier` WHERE nama_pemasok LIKE '%$carisupp%'"; // query mencari data supplier berdasarkan nama misal kita mencari nama supplier abadi maka muncul supplier yang namanya ada nama abadi nya
  $SQL = mysqli_query($connect, $QuerySql); // untuk menkoneksi kan query dengan databasenya
      if(mysqli_num_rows($SQL)>0){
?>
<!--Mohamad rifky fajri 
    1700018239
    E
1. function cari supplier ini berfungsi untuk mencari data supplier dengan mencari berdasarkan nama supplier nya -->
<!DOCTYPE html>
<html>
<head>
	<title>Hasil Pencarian Data Obat</title>
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
</nav>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col">Nama Pemasok</th> <!--menampilkan nama pemasok-->
      <th scope="col">Nomor Telepon</th> <!--menampilkan nomer telepon-->
      <th scope="col">Alamat</th> <!--menampilkan alamat-->
      <th scope="col">Contact Person</th> <!--menampilkan contact person-->
      <th scope="col">Kode Supplier</th> <!--menampilkan kode supplier--> 
    </tr>
  </thead>
    <?php
      foreach ($SQL as $key) {
        echo "<tr>
            <td>$key[nama_pemasok]</td>
            <td>$key[nomor_telepon]</td>
            <td>$key[alamat]</td>
            <td>$key[contact_person]</td>
            <td>$key[kode_supplier]</td>            
        </tr>";
	}	
     ?>
</table>
</body>
</html
<?php

}else{
  header ("location: tidakterdapat.php");
}
?>
