 <!--AMANDA FAHMIDYNA 1700018273 (Pembuat fitur)
	Siti Barkah Pellu 1700018235 
	A.Z.Kharisma Pratama 1700018272 (Memperbaiki fitur)
	Vikri Ammar Kholis 1700018243 (Menambah fitur dan memperbaiki fitur)
	
 	 -->
 <?php 
require_once('database/deb.php'); //mengonecctkan ke data base
include "navbar_cashflow.php"; //ditampilkan dalam file navbar_cashflow.php



// Vikri Ammar Kholis 1700018243
$q = "SELECT sum(total_penjualan) as masuk from penjualan"; //menjumlah semua total penjualan sebagai masuk dari tabel penjualan
$sql = mysqli_query($connect,$q);
$q = "SELECT sum(jualbeli.jumlah*jualbeli.harga) AS keluar  FROM jualbeli WHERE jualbeli.jenis= 'kredit'"; //query menjumlah atribut jumlah dari tabel jual beli dikali kan jumah dari atribut harga di dalam tebel jual beli sebagai Keluar dari tabel jual beli di sortir berdasarkan jenis dengan pilihan  kredit dalam tebel jual beli
$sql1 = mysqli_query($connect,$q);
$q = "SELECT sum(jualbeli.jumlah*jualbeli.harga) AS Gaji  FROM jualbeli WHERE jualbeli.lainnya= 'Gaji Karyawan'";//query menjumlah atribut jumlah dari tabel jual beli dikali kan jumah dari atribut harga di dalam tebel jual beli sebagai GAJI dari tabel jual beli di sortir berdasarkan lainnya dengan pilihan Gajih Karyawan dalam tebel jual beli
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
 <link rel="stylesheet" href="bulma.min.css"> <!-- untuk connect ke CSS -->

	<title>laba</title>
</head>


<body>

	<table class="table"> <!--untuk membuat tampilan berupa tabel -->
<thead>
 <!--tabel cashflow-->
  <th>Pemasukan kotor</th> <!--isi tabel-->

 <th>Gaji Karyawan</th> <!--isi tabel-->

 <th>Pengeluaran</th> <!--isi tabel-->

 <th>Keuntungan</th> <!--isi tabel-->

 </thead>


<!--A.Z.KHARISMA PRATAMA 1700018272 -->
<?php
 foreach ($sql as $data) {} // untuk mengonect kan query

 foreach ($sql1 as $data1) {} // untuk mengonect kan query

 foreach ($sql2 as $data2) {} // untuk mengonect kan query
 ?>
 <tr class = "table-primary"> <!--untuk membuat tampilan tabel berwarna-->
 <td>
 <?php
 echo "Rp ". $data['masuk']; // untuk mengonect kan query sebagai masuk
 ?>
 </td>
 <td>
 <?php
 echo "Rp ". $data2['Gaji']; // untuk mengonect kan query sebagai gaji
 ?>
 </td>
 <td>
 <?php echo "Rp ". $data1['keluar']; // untuk mengonect kan query sebagai gaji
 ?>
 </td>
 <td>
 <?php
 echo  "Rp ". ($data ['masuk'] - $data2['Gaji'] - $data1['keluar']);//rumus //jika tidak maka tidak akan dikalikan
 ?>
 </td>
 
</body>
</html>