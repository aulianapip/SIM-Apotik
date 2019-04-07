<?php
  include 'db.php';
  $carisupp = $_POST['carisupp'];
  $QuerySql = "SELECT `nama_pemasok`,`kode_obat`,`jumlah_pasok`,`nomer_telepon_supp`,`kode_pasok`,`harga_beli`,`tanggal_pasok` FROM`supplier` WHERE nama_pemasok LIKE '%$carisupp%'";
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
       Menu Utama
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
      <a class="navbar-item" href="inputsupiler.php">
       Tambah Supplier
      </a>
  </div>
</nav>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col">Nama Pemasok</th>
      <th scope="col">Kode Obat</th>
      <th scope="col">Jumlah Pasok</th>
      <th scope="col">Nomer Telepon</th>
      <th scope="col">Kode Pasok</th>
      <th scope="col">Harga Beli</th>
      <th scope="col">Tanggal Pasok</th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				echo "<tr>
            <td>$key[nama_pemasok]</td>
            <td>$key[kode_obat]</td>
            <td>$key[jumlah_pasok]</td>
            <td>$key[nomer_telepon_supp]</td>
            <td>$key[kode_pasok]</td>
            <td>$key[harga_beli]</td>
            <td>$key[tanggal_pasok]</td>
        </tr>";
			}
		?>
</table>
</body>
</html

<?php }

else{
  header ("location: tidakterdapat.php");

}

?>