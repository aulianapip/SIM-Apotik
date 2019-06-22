<!-- THOBIE ZATONI -->
<!-- 1700018241-->

<!-- Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
   -->
<?php
  session_start();

if (!isset($_SESSION["login1"])) {//jika login gagal maka kembali login.php
        header("location: http://localhost/apotik-keuangan/login.php");//link untuk login.php
      exit;
    }
      
  
  include "connection/db.php";
  $QuerySql = "SELECT *,month(tanggal) as bulan, year(tanggal) as tahun, sum(jumlah) as jumlah,sum(obat.harga) as harga_obat,sum(obat.harga)*sum(jumlah) as total FROM `jualbeli`, `obat` WHERE jualbeli.kodeobat=obat.kode_obat and jualbeli.jenis='debit' group by month(tanggal)";//fungsi untuk memanggil [total jumlah terjual , harga jual , harga obat berdasarkan bulan terjual

  $SQL = mysqli_query($connect, $QuerySql); //inisialisasi SQL
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Tampil Data Obat</title>
  <link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_penjualan.php";
 ?>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col">WAKTU PEMBELIAN</th>
      <th scope="col">JUMLAH TERJUAL</th>
      <th scope="col">TOTAL PENJUALAN</th>
    </tr>
  </thead>
    <?php
      foreach ($SQL as $key) {
        echo "<tr>
            <td>BULAN $key[bulan] - $key[tahun]</td>
            <td>$key[jumlah]</td>
            <td>$key[total]</td>
        </tr>";//menampilkan isi dari atribut - atribut di dalam tabel
                  
        }
    ?>
</table>
</body>
</html>
