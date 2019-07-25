<!-- THOBIE ZATONI -->
<!-- 1700018241-->



<!-- Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
   -->

   <!--
  @changelog:
    Amanda Fahmidyna v 1.0.2 (Memperbaiki fitur)
    Tobi Zatoni v 1.0.1 (Membuat fitur)
-->

<?php
  session_start();

if (!isset($_SESSION["login1"])) {//jika login gagal maka kembali login.php
        header("location: http://localhost/Kkeuangan/login.php");//link untuk login.php
      exit;
    }
      
  //Amanda fahmidyna1700018273
  include "connection/db.php";
   $QuerySql = "SELECT penjualan.tgl_penjualan, sum(penjualan_detail.jumlah) as jumlah, sum(penjualan_detail.sub_total) as total from penjualan join penjualan_detail on penjualan.no_transaksi = penjualan_detail.no_transaksi  group by week(penjualan.tgl_penjualan) asc"; //menampilkan tanggal penjualan. jumlah penjualan, dan total harga penjualan dari tabel penjualan yang digabung dengan tabel penjualan_detail dikelompokkan berdasarkan mingguan

  $SQL = mysqli_query($connect, $QuerySql); //memanggil database
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Tampil Data Obat</title>
  <link rel="stylesheet" href="bulma.min.css"><!-- untuk connect ke CSS -->
</head>
<body>
<?php 
  include "navbar/navbar_penjualan.php";//ditampil kan di file navbar_pembelian.php
 ?>
 <div class="container">
  <table class="table is-fullwidth" ><!--untuk membuat tampilan berupa tabel -->
    <thead>
      <tr>
        <th scope="col">TANGGAL</th><!--isi tabel-->
        <th scope="col">JUMLAH TERJUAL</th><!--isi tabel-->
        <th scope="col">TOTAL PENJUALAN</th><!--isi tabel-->
      </tr>
    </thead>
      <?php foreach ($SQL as $data): ?> <!-- untuk mengonect kan query -->
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
