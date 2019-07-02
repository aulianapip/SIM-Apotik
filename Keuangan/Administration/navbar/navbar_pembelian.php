<!-- VIKRI AMMAR KHOLIS-->
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
      <a class="navbar-item" href="data_pembelian.php">Data Pembelian</a>
      <a class="navbar-item" href="pembelian_obat.php">Beli Obat</a>
       <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Total Pembelian Berdasarkan Periode
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="http://localhost/Keuangan/Administration/pembelian_hari.php">
            Hari
          </a>
          <a class="navbar-item" href="http://localhost/Keuangan/Administration/pembelian_minggu.php">
            Minggu
          </a>
          <a class="navbar-item" href="http://localhost/Keuangan/Administration/pembelian_bulan.php">
            Bulan
          </a>
          <a class="navbar-item" href="http://localhost/Keuangan/Administration/pembelian_tahun.php">
            Tahun
          </a>
        </div>
      </div>

    <a class="navbar-item">
        <form action="http://localhost/Keuangan/Administration/pembelian_cari.php" method="post">
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