<!--ARINDRA WAHYU CANDRA KURNIAWAN -->
<?php
    include 'db.php';
    $kode_obat = $_GET['kode_obat'];
      $obat = mysqli_query($connect, "select * from obat where kode_obat='$kode_obat'");
      $row    = mysqli_fetch_array($obat);
?>


<!--ARINDRA WAHYU CANDRA -->

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
       Menu Utama
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Daftar Tabel
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="dataapoteker.php">
            Apoteker
          </a>
          <a class="navbar-item" href="databeli.php">
            Penjualan
          </a>
          <a class="navbar-item" href="datakadaluarsa.php">
            Kadarluarsa
          </a>
          <a class="navbar-item" href="datakeuntungan.php">
            Keuntungan
          </a>
          <a class="navbar-item" href="dataobat.php">
            Obat
          </a>
          <a class="navbar-item" href="datapelanggan.php">
            Pelanggan
          </a>
          <a class="navbar-item" href="datastok.php">
            Pembelian
          </a>
          
        </div>
      </div>
  <a class="navbar-item" href="inputobat.php">
       Masukan Data
      </a>
      
  </div>
</div>
    </div>

    
  </div> 
</nav>
<div class="container">
 <div class="row">
      <form class="col s12" method="post" action="updateobat.php">
        <div class="row">
<div class="control">
          <input class="input" type="text" data-length="20" name="nama_obat" value="<?php echo $row['nama_obat'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="harga_obat" value="<?php echo $row['harga_obat'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="kode_obat" value="<?php echo $row['kode_obat'] ?>" readonly>
          </div>
        </div>
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="dosis_obat" value="<?php echo $row['dosis_obat'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="kode_jenis" value="<?php echo $row['kode_jenis'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="tanggal_kadaluarsa" value="<?php echo $row['tanggal_kadaluarsa'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="bulan_kadaluarsa" value="<?php echo $row['bulan_kadaluarsa'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="tahun_kadaluarsa" value="<?php echo $row['tahun_kadaluarsa'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="control">
          <input class="input" type="text" data-length="20" name="Stok_Obat" id="Stok_Obat" value="<?php echo $row['Stok_Obat'] ?>">
          </div>
        </div>             
         <script>
function myFunction() {
  var nilai = document.getElementById("Stok_Obat").value;
  if (nilai<15){
       alert("STOK OBAT MENIPIS MOHON UNTUK MENAMBAH STOK");
  }
  
 
}
</script>

        <center><button onclick="myFunction()" class="button is-success" type="submit">Submit</button>

        <a href="dataobat.php" class="button is-success">Lihat Hasil</a></center>                   
        
      </form>
    </div>
  </div>
</body>
</html>
