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
	$QuerySql = "SELECT * FROM beli";
	$SQL = mysqli_query($connect, $QuerySql);
//Function Pencarian Data Tidak Ditemukan : jika obat dan suplier yang dicari tidak sesuai dengan yang ada di database, maka akan menampilkan pencarian tidak ditemukan --> Arindra Wahyu Candra UTS 1700018279
?>
<!--ARINDRA WAHYU  CANDRA KURNIAWAN  YANG BUAT INI -->
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Pembelian</title>
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
          
          <a class="navbar-item" href="dataobattanggal.php">
            Tanggal
          </a>
          <a class="navbar-item" href="dataobatnama.php">
            Nama
          </a>
          <a class="navbar-item" href="dataobatmurah.php">
            Harga Termurah
          </a>
          <a class="navbar-item" href="dataobatmahal.php">
            Harga Termahal
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
<h3 align="center">TIDAK TERDAPAT DATA</h3>
	<!--Menampilkan Tampilkan Pencarian yang tidak terdapat dalam pencarian obat maupun supplier  ARINDRA WAHYU  CANDRA K 1700018279 -->
</body>
</html>
