
<?php
	include 'db.php'; //untuk memasukan databasenya
	$QuerySql = "SELECT * FROM `obat`, `jenis_obat` WHERE jenis_obat.kode_jenis=obat.kode_jenis ORDER BY `tanggal_input` ASC";
	$SQL = mysqli_query($connect, $QuerySql);
//query untuk menampilkan data obat berdasarkan tanggal inputnya, mengurutkan berdasarkan tanggal input dari awal obat yg masuk sampai obat yg terakhir di input
//Muhammad Afrizal / 1700018231
?>


<!--Muhammad Afrizal-->

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
        <a class="navbar-link"> Daftar Tabel </a>
        	<div class="navbar-dropdown">
          <a class="navbar-item" href="dataobat.php"> Obat </a>	
          <a class="navbar-item" href="datasupiler.php"> Supiler </a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> Sort By </a>

        <div class="navbar-dropdown">
          
          <a class="navbar-item" href="dataobattanggal.php"> Tanggal </a>
          <a class="navbar-item" href="dataobatnama.php"> Nama </a>
          <a class="navbar-item" href="dataobatmurah.php"> Harga Termurah </a>
          <a class="navbar-item" href="dataobatmahal.php"> Harga Termahal </a>
    
        </div>
      </div>


  <a class="navbar-item" href="inputobat.php"> Tambah Obat </a>
      <a class="navbar-item" href="inputsupiler.php"> Tambah Suppiler </a>
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
