<!--AIRLA ISMAIL -->
<!--
  @changelog:
    Amanda Fahmidyna v 1.0.2 (Memperbaiki fitur)
    Airla Ismail v 1.0.1 (Membuat fitur)
-->
<?php
  session_start();

if (!isset($_SESSION["login1"])) {
        header("location: http://localhost/Keuangan/login.php");
      exit;
    }
  require_once ('database/deb.php');
  //Amanda Fahmidyna 1700018273
  $QuerySql = "SELECT *, year(tanggal) as tanggal,sum(jumlah) as jumlah_pasok,sum(harga*jumlah) AS total FROM jualbeli group by year(tanggal) ASC";//mengambil data berdasarkan tahun dari tabel jualbeli(pengeluaran)

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
      <th scope="col"><a href="s_pembelian_harga.php">JUMLAH BELI</a></th>
 
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th>
    </tr>
  </thead>
    <?php
      foreach ($SQL as $key) {
        echo "<tr>
            <td>Tahun $key[tanggal]</td>
            <td>$key[jumlah_pasok]</td>
            <td>$key[total]</td>
        </tr>";
                  
        }
    ?>
</table>
</body>
</html>