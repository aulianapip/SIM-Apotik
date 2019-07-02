<head>
  <title>Tampil Data Obat</title>
  <link rel="stylesheet" href="bulma.min.css">
</head>
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
      <a class="navbar-item" href="home.php">Kembali</a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> Mengurutkan Berdasarkan </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="1short_nama_obat.php">Nama</a>
          <a class="navbar-item" href="1short_obat_termahal.php">Harga Termahal</a>
          <a class="navbar-item" href="1short_obat_termurah.php">Harga Termurah</a>
          <a class="navbar-item" href="1short_kadaluarsa_obat.php">Tanggal</a>
        </div>
      </div>
  <a class="navbar-item" href="1input_obat.php">
       Tambah Obat Baru
   </a>    
    <a class="navbar-item">
        <form action="1cari_obat.php" method="post">
        <div class="control">
          <input class="input" type="text" placeholder="Cari Obat" name="cari"> 
        </div>
        </form>
  </a>
  </div>
</div>
    </div>

    
  </div>

</nav>