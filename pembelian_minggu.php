<!--AIRLA ISMAIL -->
<?php
  session_start();

if (!isset($_SESSION["login1"])) {
        header("location: http://localhost/apotik-keuangan/login.php");
      exit;
    }
  require_once ('database/deb.php');
  $QuerySql = "SELECT *,tanggal_pasok as tanggal,sum(jumlah_pasok) as jumlah_pasok,sum(harga_beli*jumlah_pasok) AS total FROM pasok group by week(tanggal_pasok) ASC";

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
      <th scope="col"><a href="s_pembelian_tanggal.php">TANGGAL/MINGGU</a></th>
      <th scope="col"><a href="s_pembelian_harga.php">JUMLAH BELI</a></th>
 
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th>
    </tr>
  </thead>
    <?php
      foreach ($SQL as $key) {
        echo "<tr>
            <td> $key[tanggal]</td>
            <td>$key[jumlah_pasok]</td>
            <td>$key[total]</td>
        </tr>";
                  
        }
    ?>
</table>
</body>
</html>
