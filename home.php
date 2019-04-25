<!-- AMANDA FAHMIDHYNA
	1700018273
	E -->
	<!--
Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
-->
<?php 
	session_start();//syntax agar bisa login

	if (isset($_SESSION["login1"])) {//jika login berhasil
			include "navbar.php";//maka akan masuk ke fitur dalam keuangan
			exit;
	}else if (!isset($_SESSION["login1"])) {//jika tidak berhasil
			header("location: http://localhost/apotik-keuangan/home.php");//akan dialihkan lagi ke halaman login
			exit;
		}
			
	
 ?>