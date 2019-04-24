<!--REKA RACHMADI APRIANSYAH-->
<!--
Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
-->

<?php
  session_start();// untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser dan posisinya
                  // harus paling depan.
if (!isset($_SESSION["login1"])) {//Jika belum melakukan login makan akan dilempar ke header
      header("location: http://localhost/apotik-keuangan/home.php");//di header ini adalah link untuk kembali ke home
      exit; //keluar
    }
    include 'connection/db.php'; //sebagai database yang akan dipake
  $QuerySql = "SELECT *,sum(jumlah_obat) as jumlah_obat,sum(harga_beli) as harga_beli,sum(harga_beli*jumlah_obat) AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat GROUP BY week(tanggal_beli) ASC";//Variabel QuerySql menampung query untuk menampilkan jumlah_obat yang telah di jumlahkan yang diberi nama inisial jumlah_obat,harga_beli yang telah di jumlahkan yang diberi nama inisial harga_beli, mengalikan harga_beli dengan jumlah_beli kemudiandi jumlahkan dan diberi nama inisial total , kemudian di shorting berdasakan tanggal_beli mingguan

  $SQL = mysqli_query($connect, $QuerySql); //variabel cari2 ini menampung berupa perintah query pada variabel cari ke server yang berada di variabel connect
?> 
<!DOCTYPE html>
<html>
<head>
  <title>DATA PEMBELIAN</title>
  <link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_pembelian.php";
 ?>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col"><a href="s_pembelian_tanggal.php">TANGGAL PEMBELIAN</a></th>
      <th scope="col"><a href="s_pembelian_harga.php">HARGA BELI</a></th>
      <th scope="col"><a href="s_pembelian_jumlah.php">JUMLAH PEMBELIAN</a></th>
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th>
    </tr>
  </thead>
    <?php
      foreach ($SQL as $key) {//melakukan fungsi looping untuk menampilkan tanggal_beli,harga beli,jumlah_obat dan total
        echo "<tr>
            <td>$key[tanggal_beli]</td>
            <td>$key[harga_beli]</td>
            <td>$key[jumlah_obat]</td>
            <td>$key[total]</td>
        </tr>";
                  
        }
    ?>
</table>
</body>
</html>
