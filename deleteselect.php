<!-- 1. Fitur CRM atau disebut pelanggan. fitur ini digunakan untuk menginputkan data member yang akan digunakan di bagian kasir. jika pelanggan tersebut adalah member maka akan di kenakan diskon. -->

<!-- 
fitur ini dikerjakan oleh Herni Sartika Manalu 1700018285

 -->

<?php 
include 'conect.php'; //untuk menyambungkan ke database yang sudah dibuat dengan nama folder conect.php
$ID = $_POST['pilih']; //untuk memanggil saat multiple delete dipilih dengan opsi, mana saja data yang akan di delete
$jumlah_dipilih = count($ID); 
//dan ketika opsi telah di panggil, maka akan di proses dengan perulangan sesuai dengan opsi yang kita pilih

for($x=0; $x<$jumlah_dipilih; $x++){

	mysqli_query($connect,"DELETE FROM pelanggan WHERE ID ='$ID[$x]'"); //disini, kodingan akan memproses dalam mendelete data yang telah kita pilih untuk didelete
 
}
 
header("location:selectdelete.php"); // setelah berhasil di delete, maka akan kembali atau refresh ke folder awal untul mendelete data.
?>




