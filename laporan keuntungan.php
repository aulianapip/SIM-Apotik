 <!--AMANDA FAHMIDYNA 1700018273 -->
 <?php 
require_once('database/db.php');
include "navbar_cashflow.php";


$q = "SELECT sum(tabel_penjualan.subotal) AS keluar  FROM transaksi,tabel_penjualan WHERE transaksi.id_penjualan=tabel_penjualan.id_penjualan AND transaksi.jenis= 'kredit'";
$sql = mysqli_query($connect,$q);
$q = "SELECT sum(tabel_penjualan.subotal) AS masuk  FROM transaksi,tabel_penjualan WHERE transaksi.id_penjualan=tabel_penjualan.id_penjualan AND transaksi.jenis= 'debit'";
$sql1 = mysqli_query($connect,$q);

$q="SELECT jumlah  from kasawal";
$sql2 = mysqli_query($connect,$q);

 ?>

<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="bulma.min.css">

	<title>laba</title>
</head>


<body>
	<table class="table">
<thead>
 <!--tabel cashflow-->
 <th>Total Pemasukan</th>

 <th>Total Pengeluaran</th>

 <th>Pendapatan Bersih</th>

 <th>Keuntungan</th>
 </thead>


<?php
 foreach ($sql as $data) {}

 foreach ($sql2 as $data2) {}

 foreach ($sql1 as $data1) {}
 ?>
 <tr>
 <td>
 <?php echo $data1['masuk'];
 ?>
 </td>
 <td>
 <?php echo $data['keluar'];
 ?>
 </td>
 <td>
 <?php
 echo $data1 ['masuk'] - $data['keluar']; //jika tidak maka tidak akan dikalikan
 ?>
 </td>
 <td>
 <?php
 echo ($data1 ['masuk'] - $data['keluar'])-$data2['jumlah'];
 ?>
 </td>
</table>
</body>
</html>