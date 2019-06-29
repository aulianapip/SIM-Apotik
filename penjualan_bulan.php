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
        header("location: http://localhost/Kkeuangan/login.php");//link untuk login.php
      exit;
    }
      
  
  include "connection/db.php";
  $QuerySql = "select penjualan.tgl_penjualan, sum(penjualan_detail.jumlah) as jumlah, sum(penjualan_detail.sub_total) as total from penjualan join penjualan_detail on penjualan.no_transaksi = penjualan_detail.no_transaksi  group by year(penjualan.tgl_penjualan) asc";

  $SQL = mysqli_query($connect, $QuerySql); 
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
<div class="container">
  <table class="table is-fullwidth" >
    <thead>
      <tr>
        <th scope="col">TANGGAL</th>
        <th scope="col">JUMLAH TERJUAL</th>
        <th scope="col">TOTAL PENJUALAN</th>
      </tr>
    </thead>
      <?php foreach ($SQL as $data): ?>
        <tr>
          <td><?= $data['tgl_penjualan']; ?></td>
          <td><?= $data['jumlah']; ?></td>
          <td><?= $data['total']; ?></td>
        </tr>
      <?php endforeach; ?>
  </table>
 </div>
</body>
</html>
