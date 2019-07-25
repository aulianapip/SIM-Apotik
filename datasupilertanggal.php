<!--PRPL UAS ARINDRA WAHYU CANDRA Function data supplier tanggal berfungsi untuk mensorting data supplier dari tanngal pemasokan -->
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
<?php
	include 'db.php';
	$QuerySql = "SELECT * FROM `Supplier` ORDER BY `tanggal_pasok` ASC";
	$SQL = mysqli_query($connect, $QuerySql);
//Function Sorting Tanggal Supplier : Men-Sorting datasuplier sesuai dengan database dengan mengurutkan tanggal pasok obat yang telah memasok obat dari awal --> Arindra Wahyu C.K 17000018279
?>

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
			
	}?>
</table>
</body>
</html>
