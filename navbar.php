<!--WAIS ALQORNI-->
<!--1700018240-->

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
  <link rel="stylesheet" href="bulma.min.css"> <!--pemanggilan library css untuk mempercantik tampilan-->
</head>
<nav class="navbar is-success" role="navigation" aria-label="main navigation"> <!--fungsi untuk mempercantik tampilan navigasi bar di atas-->
  <div class="navbar-brand">
   

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div class="navbar-item has-dropdown is-hoverable"> <!--Untuk membuat daftar dari menu-->
        <a class="navbar-link">
          <img src="admin.png">  <!--mengubah latar pada navbar-->
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="http://localhost/apotik-keuangan/logout.php">
            Logout <!--Mempercantik tampilan pada logout-->
          </a>
        </div>
      </div>
        <div class="navbar-item has-dropdown is-hoverable"> 
        <a class="navbar-link">
          Keuangan <!--isi dari daftar-->
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="data_pembelian.php"> <!--Hyperlink ke bagian data pembelian-->
            Data Pembelian <!--isi dari daftar-->
          </a>
          <a class="navbar-item" href="data_penjualan.php"> <!--Hyperlink ke bagian data penjualan-->
            Data Penjualan <!--isi dari daftar-->
          </a>
          <a class="navbar-item" href="total_keuntungan.php"> <!--Hyperlink ke bagian total keuntungan-->
            Total Keuntungan <!--isi dari daftar-->
          </a>
                    </a>
          <a class="navbar-item" href="index.php"> <!--Hyperlink ke bagian cashflow-->
            Cash Flow <!--isi dari daftar-->
          </a>    
        </div>
      </div>
     
      </div>
      
  </div>
</div>
    </div>

    
  </div>

</nav>