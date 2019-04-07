<?php
	include 'db.php';
	$QuerySql = "SELECT * FROM `Supplier` ORDER BY `tanggal_pasok` ASC";
	$SQL = mysqli_query($connect, $QuerySql);
?>
<!--Arindra wahyu-->

<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Supplier</title>
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

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Sort By
        </a>

        <div class="navbar-dropdown">
          
          <a class="navbar-item" href="datasupilertanggal.php">
            Tanggal
          </a>
          <a class="navbar-item" href="datasupilernama.php">
            Nama
          </a>
        </div>
      </div>


  <a class="navbar-item" href="inputobat.php">
       Tambah Obat
      </a>
       <a class="navbar-item" href="inputsupiler.php">
       Tambah Suppiler
      </a>
      <a class="navbar-item">
        <form action="carisuppiler.php" method="post">
        <div class="control">
          <input class="input" type="text" placeholder="CARI SUPPILER" name="carisupp"> 
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
      <th scope="col">Nama Pemasok</th>
      <th scope="col">Kode Obat</th>
      <th scope="col">Jumlah Pemasok</th>
      <th scope="col">Nomor Telepon</th>
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
</html>