<!-- VIKRI AMMAR KHOLIS-->
<!--
Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
-->
<head>
  <title>Tampil Data Obat</title>
  <link rel="stylesheet" href="bulma.min.css"><!--Untuk Connect ke File CSS-->
</head>
<nav class="navbar is-success" role="navigation" aria-label="main navigation"><!-- untuk membentuk wadah navbar-->
  <div class="navbar-brand">
   

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample"><!-- Menamplkan menu navbar-->
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="home.php">Kembali</a> <!-- untuk connect ke file HOME.php-->
      <a class="navbar-item" href="data_penjualan.php">Data Penjualan</a><!-- untuk connect ke file data_penjualan.php-->
       <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Total Penjualan Berdasarkan Periode
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="http://localhost/apotik-keuangan/Administration/penjualan_hari.php"><!-- untuk connect ke penjualan berdasarkan hari-->
            Hari
          </a>
          <a class="navbar-item" href="http://localhost/apotik-keuangan/Administration/penjualan_minggu.php"><!-- untuk connect ke penjualan berdasarkan Minggu-->
            Minggu
          </a>
          <a class="navbar-item" href="http://localhost/apotik-keuangan/Administration/penjualan_bulan.php"><!-- untuk connect ke penjualaan berdasarkan Bulan-->
            Bulan
          </a>
          <a class="navbar-item" href="http://localhost/apotik-keuangan/Administration/penjualan_tahun.php"><!-- untuk connect ke penjualan berdasarkan Tahun-->
            Tahun
          </a>
        </div>
      </div>

    <a class="navbar-item">
        <form action="http://localhost/apotik-keuangan/Administration/penjualan_cari.php" method="post"><!-- untuk Kolom Pencarian-->
        <div class="control">
          <input class="input" type="text" placeholder="Cari Obat" name="cari"> <!-- untuk form inputan-->
        </div>
        </form>
  </a>
  </div>
</div>
    </div>

    
  </div>

</nav>