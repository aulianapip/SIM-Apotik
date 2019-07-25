<!--
UAS PRPRL
NAMA : Aditya Gusti Mandala Putra
NIM : 1700018256
KELAS : E

1. kapsul.php fitur ini berfungsi sebagai menampilkan jenis obat kapsul. obat yang berjenis kapsul pada database akan di tampilkan ketika kita pilih fitur ini pada tampilan.
-->

<?php
<--ADITYA GUSTI MANDALA PUTRA YANG BUAT-->
	include 'db.php';
	$QuerySql = "SELECT*FROM obat inner join jenis_obat on jenis_obat.kode_jenis=obat.kode_jenis where jenis_obat.nama_jenis='Kapsul'"; <--2. query di samping sebagai operasi untuk mencari obat yang berjenis kapsul pada tabel obat-->
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
            Supplier
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Filter
        </a>
    <div class="navbar-dropdown">
          <a class="navbar-item" href="dataobattanggal.php">
            Tanggal Pasok
          </a>
          <a class="navbar-item" href="dataobatnama.php">
            Nama A-Z <!--Perbaiki redaksi Oleh Putra-->
          </a>
          <a class="navbar-item" href="dataobatnamaz-a.php">
            Nama Z-A <!--Penambahan Oleh Putra-->
          </a>
          <a class="navbar-item" href="dataobatmurah.php">
            Harga Termurah
          </a>
          <a class="navbar-item" href="dataobatmahal.php">
            Harga Termahal
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Jenis
        </a>
        <div class="navbar-dropdown">
<a class="navbar-item" href="kaplet.php">
            Kaplet
          </a>
          <a class="navbar-item" href="kapsul.php">
            Kapsul
          </a>
          <a class="navbar-item" href="pil.php">
            Pil
          </a>
          <a class="navbar-item" href="salep.php">
            Salep
          </a>
          <a class="navbar-item" href="serbuk.php">
            Serbuk
          </a>
          <a class="navbar-item" href="suntik.php">
            suntik
          </a>
          <a class="navbar-item" href="syrup.php">
            Sirup
          </a>
          <a class="navbar-item" href="tablet.php">
            Tablet
          </a>
          <a class="navbar-item" href="tetes.php">
            Tetes
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
      <th scope="col">Kadaluarsa Obat</th>
      <th scope="col">Stok Obat</th>
    </tr>
  </thead>
    <?php
      foreach ($SQL as $key) {
        if($key['Stok_Obat']<15){
        echo "<tr>
            <td bgcolor=red>$key[nama_obat]</td><--2. Menampilkan tabel nama obat-->
            <td bgcolor=red>$key[harga_obat]</td><--2. Menampilkan tabel harga obat-->
            <td bgcolor=red>$key[kode_obat]</td><--2. Menampilkan tabel kode obat-->
            <td bgcolor=red>$key[nama_jenis]</td><--2. Menampilkan tabel jenis obat-->
            <td bgcolor=red>$key[kadaluarsa_obat]</td><--2. Menampilkan tabel kapan kadaluarsa obat-->
            <td bgcolor=red>$key[Stok_Obat]</td><--2. Menampilkan tabel stok obat yang tersedia-->
        </tr>";
      }
      else{
        echo "<tr>
            <td>$key[nama_obat]</td><--2. Menampilkan obat pada tabel nama obat-->
            <td>$key[harga_obat]</td><--2. Menampilkan harga yang tertera pada obat di tabel harga obat-->
            <td>$key[kode_obat]</td><--2. Menampilkan kode obat di tabel kode obat-->
            <td>$key[nama_jenis]</td><--2. Menampilkan jenis obat pada tabel jenis obat-->
            <td>$key[kadaluarsa_obat]</td><--2. Menampilkan tanggal kadaluarsa obat tabel kapan kadaluarsa obat-->
            <td>$key[Stok_Obat]</td><--2. Menampilkan jumlahh stok obat di tabel stok obat yang tersedia-->            
        </tr>";
      }
      }
    ?>
</table>
</body>
</html>
