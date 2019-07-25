<!--AIRLA ISMAIL -->
<!--
  @changelog:
    Amanda Fahmidyna v 1.0.2 (Memperbaiki fitur)
    Airla Ismail v 1.0.1 (Membuat fitur)
    okzatul revanka (memperbaiki fitur)
-->
<?php
  session_start();

if (!isset($_SESSION["login1"])) {
        header("location: http://localhost/Keuangan/login.php");
      exit;
    }
  require_once ('database/deb.php');
  //Amanda Fahidyna 1700018273 (Perbaikan Fitur)

  $QuerySql = "SELECT *,month(tanggal) as bulan,year(tanggal) as tahun,sum(jumlah) as jumlah_pasok,sum(harga*jumlah) AS total FROM jualbeli group by month(tanggal) ASC"; //mengambil data berdasarkan bulan dari tabel jualbeli(pengeluaran)

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
 
      <th scope="col"><a href="s_pembelian_total.php">JUMLAH HARGA</a></th>
    </tr>
  </thead>
    <?php 

      foreach ($SQL as $key) {//pengoutputan 
        echo "<tr> 
            <td>Bulan $key[bulan] - $key[tahun]</td>
            <td>$key[jumlah_pasok]</td>
            <td>$key[total]</td>
        </tr>";
        }
    ?>
</table>
</body>
</html>
