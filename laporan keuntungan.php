 <!--AMANDA FAHMIDYNA 1700018273
	Siti Barkah Pellu 1700018235
	Vikri Ammar Kholis 1700018243
	aris padang
 	 -->
 <?php 
require_once('database/deb.php');
include "navbar_cashflow.php";




$q = "SELECT sum(total_penjualan) as masuk from penjualan";
$sql = mysqli_query($connect,$q);
$q = "SELECT sum(jualbeli.jumlah*jualbeli.harga) AS keluar  FROM jualbeli WHERE jualbeli.jenis= 'kredit'";
$sql1 = mysqli_query($connect,$q);
$q = "SELECT sum(jualbeli.jumlah*jualbeli.harga) AS Gaji  FROM jualbeli WHERE jualbeli.lainnya= 'Gaji Karyawan'";
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
  <th>Pemasukan kotor</th>

 <th>Gaji Karyawan</th>

 <th>Pengeluaran</th>

 <th>Keuntungan</th>

 </thead>


<?php
 foreach ($sql as $data) {}

 foreach ($sql1 as $data1) {}

 foreach ($sql2 as $data2) {}
 ?>
 <tr class = "table-primary">
 <td>
 <?php
 echo "Rp ". $data['masuk'];
 ?>
 </td>
 <td>
 <?php
 echo "Rp ". $data2['Gaji'];
 ?>
 </td>
 <td>
 <?php echo "Rp ". $data1['keluar'];
 ?>
 </td>
 <td>
 <?php
 echo  "Rp ". ($data ['masuk'] - $data2['Gaji'] - $data1['keluar']); //jika tidak maka tidak akan dikalikan
 ?>
 </td>
 
</body>
</html>