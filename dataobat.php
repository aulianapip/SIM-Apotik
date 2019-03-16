<?php
	include 'db.php';
	$QuerySql = "SELECT `nama_obat`,`harga_obat`,`kode_obat`,`nama_jenis`,`tanggal_kadaluarsa`,`bulan_kadaluarsa`,`tahun_kadaluarsa`,`Stok_Obat` FROM `obat`, `jenis_obat` WHERE jenis_obat.kode_jenis=obat.kode_jenis";
	$SQL = mysqli_query($connect, $QuerySql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
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
      <a class="navbar-item">
        <form action="cariobat.php" method="post">
        <div class="control">
          <input class="input" type="text" placeholder="CARI OBAT" name="cari"> 
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
      <th scope="col">Kode Obat</th>
      <th scope="col">Jenis Obat</th>
      <th scope="col">Tanngal Kadaluarsa</th>
      <th scope="col">Bulan Kadaluarsa</th>
      <th scope="col">Tahun Kadaluarsa</th>
      <th scope="col">Stok Obat</th>
  
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				echo "<tr>
						<td>$key[nama_obat]</td>
						<td>$key[harga_obat]</td>
						<td>$key[kode_obat]</td>
						<td>$key[nama_jenis]</td>
						<td>$key[tanggal_kadaluarsa]</td>
						<td>$key[bulan_kadaluarsa]</td>
						<td>$key[tahun_kadaluarsa]</td>
						<td>$key[Stok_Obat]</td>
						
				</tr>";
			}
		?>
</table>
</body>
</html>
