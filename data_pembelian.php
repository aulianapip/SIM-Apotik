<!--AIRLA ISMAIL -->
<?php
  session_start();

if (!isset($_SESSION["login1"])) {
        header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
  require_once ('database/deb.php');
  $QuerySql = "SELECT pasok.tanggal_pasok as tanggal,pasok.jumlah_pasok, pasok.harga_beli,sum(pasok.harga_beli*pasok.jumlah_pasok) AS total,pasok.kode_obat as kode,obat.nama_obat as nama FROM pasok,obat where pasok.kode_obat=obat.kode_obat group by pasok.kode_obat";

  $SQL = mysqli_query($connect, $QuerySql); 
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
      <th scope="col"><a href="s_pembelian_tanggal.php">WAKTU PEMBELIAN</a></th>
            <th scope="col"><a href="s_pembelian_tanggal.php">KODE OBAT</a></th>
                  <th scope="col"><a href="s_pembelian_tanggal.php">NAMA OBAT</a></th>
      <th scope="col"><a href="s_pembelian_harga.php">HARGA BELI</a></th>
      <th scope="col"><a href="s_pembelian_jumlah.php">JUMLAH PEMBELIAN</a></th>
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th>
    </tr>
  </thead>
    <?php
      foreach ($SQL as $key) {
        echo "<tr>
            <td> $key[tanggal]</td>
              <td> $key[kode]</td>
                <td> $key[nama]</td>
            <td>$key[harga_beli]</td>
            <td>$key[jumlah_pasok]</td>
            <td>$key[total]</td>
        </tr>";
                  
        }
    ?>
</table>
</body>
</html>
