<?php
  include 'db.php'; // 2. untuk memasukan database nya
  $cari = $_POST['cari']; // 2. untuk variabel cari obat
  $QuerySql = "SELECT `nama_obat`,`harga`,`jenis`,`kode_obat` FROM `obat` WHERE nama_obat LIKE '%$cari%' "; // 2. query untuk mencari data obat berdasarkan nama obatnya berdasarkan database
  $SQL = mysqli_query($connect, $QuerySql);
      if(mysqli_num_rows($SQL)>0){
?>
<!--Mohamad rifky fajri 
    1700018239
    E
1. function cari obat ini berfungsi untuk mencari data obat dengan mencari berdasarkan nama obatnya nya -->
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
      </div>
</div>
</form>
</a>
</div>
</div>
</div>
</div>
</nav>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col">Nama Obat</th>
      <th scope="col">Harga Obat</th>
      <th scope="col">Jenis Obat</th>
      <th scope="col">Kode Obat</th>      
    </tr>
  </thead>
    <?php
      foreach ($SQL as $key) {
        echo "<tr>
            <td>$key[nama_obat]</td>
            <td>$key[harga]</td>
            <td>$key[jenis]</td>
            <td>$key[kode_obat]</td>            
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
