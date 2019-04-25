<!--AIRLA ISMAIL -->
<!--1700018251-->
<!--
Penjelasan class Nomer UTS 1 :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
-->
<?php
  session_start();//untuk memulai eksekusi session pada server dan menyimpan pada browser

if (!isset($_SESSION["login1"])) {//jika belum melakukan login akan di lempar ke header
        header("location: http://localhost/apotik-keuangan/login.php");//link untuk kembali ke home
      exit;//keluar
    }
  include "connection/db.php";
  //Nomer 2 UTS Function menampilkan pembelian data obat berdasarkan bulan yang diurutkan berdasarkan abjad dan yang di klompokan berdasarkan bulan
  $QuerySql = "SELECT *,sum(jumlah_obat) as jumlah_obat,sum(harga_beli) as harga_beli,sum(harga_beli*jumlah_obat) AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat GROUP BY month(tanggal_beli) ASC";

  $SQL = mysqli_query($connect, $QuerySql); // untuk menghubungkan mysql database
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
      foreach ($SQL as $key) {
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
