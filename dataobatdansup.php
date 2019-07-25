<!--Aditya Gusti Mandala Putra perbaiki query db.php-->
<!--Muhammad Afrizal, membuat file function dataobat.php-->
<!--Arindra Wahyu , menambahkan sorting stok obat terkecil dataobat.php--><!--1.  Pada kelompok gudang, kami telah membuat beberapa kelas yang mempunyai fungsi sebagai berikut:
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
  $QuerySql = "SELECT obat.kode_obat,obat.nama_obat,SUM(supplier.jumlah_pasok) AS stok1 FROM obat LEFT JOIN supplier on obat.kode_obat=supplier.kode_obat group by obat.kode_obat ASC ";
  //Function Sorting Stok Obat : dengan mengurutkan dengan query  dari yang terkecil sampai terbesar dari stok obat  --> Arindra Wahyu C. K 1700018279
  $SQL = mysqli_query($connect, $QuerySql); 
?> 
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
  <thead>
    <tr>
      <th scope="col">Nama Obat</th>
      
      <th scope="col">Kode Obat</th>
       
      <th scope="col">Stok</th>
      
    </tr>
  </thead>


    <?php
// Function Stok Obat Menipis : Menampilkan data obat Dengan Menandai Tabel dengan warna merah jika obat dibawah 15 stok agar menambah stok agar tidak kehabisan dengan kondisi Stok Obat dibawah 15 maka tabel baris akan diwarna merah dan Stok Obat diatas 15 maka tabel biasa --> Arindra Wahyu C.K 1700018279
      foreach ($SQL as $key) {
        echo "<tr>
            <td >$key[nama_obat]</td>
            <td >$key[kode_obat]</td> 
            <td >$key[stok1]</td>
            
        </tr>";
  
      }
    ?>
    <!--Arindra Wahyu , menandai obat yang stok menipis dataobat.php-->
</table>
</body>
</html>
