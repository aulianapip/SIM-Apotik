<!--AIRLA ISMAIL -->
<!--Amanda fahmdiyna -->

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
  $QuerySql = "SELECT * from jualbeli";

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
               <th scope="col"><a href="s_pembelian_tanggal.php">LAINNYA</a></th>
      <th scope="col"><a href="s_pembelian_harga.php">HARGA BELI</a></th>
      <th scope="col"><a href="s_pembelian_jumlah.php">JUMLAH PEMBELIAN</a></th>
      <th scope="col"><a href="s_pembelian_total.php">HARGA TOTAL</a></th>
    </tr>
  </thead>
    <?php
      foreach ($SQL as $key) {
        echo "<tr>
            <td> $key[tanggal]</td>
              <td> $key[kodeobat] </td>
             <td> $key[lainnya]</td>
            <td>$key[harga]</td>
            <td>$key[jumlah]</td>
            <td>$key[harga] </td>
        </tr>";
                  
        }
    ?>
</table>
</body>
</html>
