<?php
  include 'db.php'; 
  $carisupp = $_POST['carisupp'];
  $QuerySql = "SELECT `nama_pemasok`,`nomor_telepon`,`alamat`,`contact_person`,`kode_supplier` FROM`supplier` WHERE nama_pemasok LIKE '%$carisupp%'";
  $SQL = mysqli_query($connect, $QuerySql);
      if(mysqli_num_rows($SQL)>0){
?>
<!--Mohamad rifky fajri-->
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
      <th scope="col">Nama Pemasok</th>
      <th scope="col">Nomor Telepon</th>
      <th scope="col">Alamat</th>
      <th scope="col">Contact Person</th>
      <th scope="col">Kode Supplier</th>     
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
