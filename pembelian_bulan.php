<!--AIRLA ISMAIL -->
<?php
  session_start();

if (!isset($_SESSION["login1"])) {
        header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
  include "connection/db.php";
  $QuerySql = "SELECT *,sum(jumlah_obat) as jumlah_obat,sum(harga_beli) as harga_beli,sum(harga_beli*jumlah_obat) AS total FROM `supplier`, `obat` WHERE supplier.kode_obat=obat.kode_obat GROUP BY month(tanggal_beli) ASC";

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
