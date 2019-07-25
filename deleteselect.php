<!-- 1. Fitur CRM atau disebut pelanggan. fitur ini digunakan untuk menginputkan data member yang akan digunakan di bagian kasir. jika pelanggan tersebut adalah member maka akan di kenakan diskon. -->
  
<!-- 
fitur ini dikerjakan oleh Herni Sartika Manalu 1700018285

 -->

<?php 
include 'conect.php';
include('function.php');//untuk menyambungkan ke database yang sudah dibuat dengan nama folder conect.php
$ID = $_POST['pilih']; //untuk memanggil saat multiple delete dipilih dengan opsi, mana saja data yang akan di delete
$jumlah_dipilih = count($ID); 
//dan ketika opsi telah di panggil, maka akan di proses dengan perulangan sesuai dengan opsi yang kita pilih

for($x=0; $x<$jumlah_dipilih; $x++){

	hapus_ceklis($ID,$connect);
}
 
header("location:selectdelete.php"); // setelah berhasil di delete, maka akan kembali atau refresh ke layar selectdelete.php  untuk mendelete data.
?>




