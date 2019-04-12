

<!DOCTYPE html>
<html>
<head>
	<title>Hasil Pencarian Penjualan Data Obat</title>

</head>
<?php
  include 'conect.php';
  $ID = $_GET['ID'];
  $QuerySql = "SELECT * FROM pelanggan WHERE ID like '%$ID%'";
  $SQL = mysqli_query($connect, $QuerySql);
     
?>
<body>

<table border="1">
  <thead>
    <tr>
      <th>Tanggal Daftar</th>
      <th>ID</th>
      <th>Nama</th>
      <th>Jk</th>
      <th>NoHp</th>
      <th>Email</th>
      <th>Alamat</th>
    </tr>
  </thead>
    <?php
      foreach ($SQL as $Data) {
        echo "<tr>
            <td>$Data[tgl_daftar]</td>
            <td>$Data[ID]</td>
            <td>$Data[Nama]</td>
            <td>$Data[Jk]</td>
            <td>$Data[NoHp]</td>
            <td>$Data[Email]</td>
            <td>$Data[Alamat]</td>
        </tr>";
      }
    ?>
</table>
</body>
</html



