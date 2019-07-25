<!-- Reka Rachmadi 1700018237 !-->
<!-- Alwan Zaki 1700018259 !-->
<!-- Airla Ismail 1700018251 !-->
<!-- Fadhil Abigail Alvast 1700018252 !-->
<!-- Thobie Zatoni 1700018241 !-->
<!-- Nur Muthmainah 1700018276 !-->
<!-- Lussy Ika Sukmawati 1700018261 !-->
<!-- Febri 1600018078 !--> 
<!--no1. Stock Opname adalah kegiatan perhitungan secara fisik atas persediaan barang di gudang 
secara fisik atas persedian barang di gudang yang akan dijual.Pada fitur yang kami buat
kami menginputkan status kondisi barang yang berada ditoko, status antara lain adalah digudang rusak, hilang ,di pinjam , dan terjual. jika terjadi kesalahan input status maka dapat diubah dengan fitur edit, dan bila barang telah kembali atau di ganti atau telah di konfirmasi oleh pihak gudang dan kasir maka data opname dapat di hapus dengan fitur delete  -->
<!DOCTYPE html>

<html>
<head>
  <title>Tambah Opname</title><link rel="stylesheet" href="bulma.min.css">
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
          <a class="navbar-item" href="dataopname.php">
            Opname
          </a>
    
        </div>
      </div>
      
      

      <a class="navbar-item" href="tambah_opname.php">
       Tambah Opname
      </a>
  </div>
</div>
    </div>

    
  </div>

</nav>
  <?php 
    include "db.php";
    if (isset($_POST['tambah'])) {
      $query = "SELECT kode_obat from obat ";//mengambil data kode_obat dari tabel obat(reka)
      $cekobat = mysqli_query($connect,$query);
      $kode_obatB = $_POST['kode_obat'];
     

   ?>
<table class="table is-fullwidth" >
<div class="container">
 <div class="row">
  <form class="col s12" method="post" action="tambah_opname.php">
    <div class="row">
      <div class="control">
      <label>Kode Obat :</label>
       <select name="kode_obat">
        <?php 
          foreach($cekobat as $data){
            echo "<option value=$data[kode_obat]>$data[kode_obat]</option>";
          }
          
         ?>
       </select> 
      <br>
    </div>
  </div>
    <div class="row">
        <div class="control">
      <input type="submit" data-length="20" name="cek" value="Cek Barcode" placeholder="Cek Barcode">
      <br>
    </div></div>
    <div class="row">
        <div class="control">
      <input type="submit" data-length="20" name="refresh" value="Refresh" placeholder="Cek Barcode">
    </div>
    <br>
    <div class="row">
        <div class="control">
    
      <label>Kode Barcode :</label>
       <select name="kode_barcode">
        <?php 
          foreach($cekbarcode as $data){
            echo "<option value=$data[kode_barcode]>$data[kode_barcode]</option>";
          }
          
         ?>
       </select>
    </div></div>
    <br>
    <div class="row">
        <div class="control">
      <label>Status :</label>
      <input type="radio" name="status" value="HILANG">Hilang
      <input type="radio" name="status" value="RUSAK">Rusak
      <input type="radio" name="status" value="DIPINJAM">Dipinjam
    </div></div>
    <br>
    <div class="row">
        <div class="control">
      <label>Catatan :</label><br>
      <textarea rows="10" type="text" name="catatan"></textarea>
    </div></div>
    <br>
    <div class="row">
        <div class="control">
      <input type="submit" name="tambah" value="tambah">
    </div></div>

  
</form>
</table>
</body>
</html>