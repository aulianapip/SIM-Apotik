<!--FIXED REKA RACHMADI APRIANSYAH-->
<!--
Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
-->

<?php
  session_start(); // untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser dan posisinya
                  // harus paling depan.
if (!isset($_SESSION["login1"])) {//Jika belum melakukan login makan akan dilempar ke header
      header("location: http://localhost/apotik-keuangan/home.php");//di header ini adalah link untuk kembali ke home
      exit; //keluar
    }
      
    include 'connection/db.php'; //sebagai database yang akan dipake

    $cari="SELECT max(kode_supplier) as terbesar from supplier"; //variabel cari ini menampung query berisi untuk menampilkan
                                                                // data terbesar dari kolom kode supplier pada tabel supplier
    $cari2=mysqli_query($connect,$cari);//variabel cari2 ini menampung berupa perintah query pada variabel cari ke server yang berada di variabel connect  
    $cari_terbesar=mysqli_fetch_array($cari2);//variabel cari_terbesar ini menampung data terbesar
    $besar=substr($cari_terbesar['terbesar'], 1,3); //di variabel besar ini memotong nilai string yang telah di potong
                                                    //dan diambil nilai numberic dimasukan ke var besar 
    $tambah=$besar+1;//fungsi increment 
    if($tambah<10){// jika var tambah kurang dari 10 maka
      $id="R00".$tambah;//var id di isi dengan nilai string "R00" dan dibelakang nilai string ada tambahan nilai yang
                        //yang berasal dari var tambah
    }else if($tambah>10){//jika var tambah lebih dari 10 maka
      $id="R0".$tambah;//var id di isi dengan nilai string "R" dan dibelakang nilai string ada tambahan nilai yang
                        //yang berasal dari var tambah
    }else if($tambah>100){//jika var tambah lebih dari 100 maka
      $id="R".$tambah;//var id di isi dengan nilai string "R" dan dibelakang nilai string ada tambahan nilai yang
                        //yang berasal dari var tambah
    }

if (isset($_POST['kirim'])) {//Jika variabel _post kirim memiliki nilai maka
    $kode_supplier=$_POST['kode_supplier']; //var _post kode_supplier bernilai integer pada html dimasukan ke var kode_supplier
    $jumlah_obat=$_POST['jumlah_obat'];//var _post jumlah_obat bernilai integer pada html dimasukan ke var jumlah_obat
    $kode_obat=$_POST['kode_obat'];//var _post kode_obat bernilai integer pada html dimasukan ke var kode_obat
    $harga_beli=$_POST['harga_beli'];//var _post harga_beli bernilai integer pada html dimasukan ke var harga_beli
    $tanggal_kadaluarsa=$_POST['tanggal_kadaluarsa'];//var _post tanggal_kadaluarsa bernilai integer pada html dimasukan ke var tanggal_kadaluarsa
    $QuerySql = "INSERT INTO supplier SET kode_obat='$kode_obat',jumlah_obat='$jumlah_obat',kode_supplier='$kode_supplier',harga_beli='$harga_beli',tanggal_beli=curdate(),tanggal_kadaluarsa='$tanggal_kadaluarsa'";//variabel QuerySql ini menampung query tentang pembelian obat pada tabel supplier di isi berdasarkan variabel yang telah di inputkan di atas.
      mysqli_query($connect, $QuerySql);//perintah query pada variabel cari ke server yang berada di variabel connect
      +  
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Input Obat Baru</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_beli.php";

 ?>
<table class="table is-fullwidth" >
<div class="container">
 <div class="row">
      <form class="from-horizontal" action="pembelian_obat.php" method="POST" role="form" >
    <div class="from-group">
        <label >Kode Supplier :</label>
          <input type="text" name="kode_supplier" class="form-control" value="<?php echo $id;  ?>" required >
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Kode Obat :</label>
          <input type="text" name="kode_obat" class="form-control" placeholder="" required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Golongan" >Jumlah Obat :</label>
          <input type="number" name="jumlah_obat"  class="form-control" placeholder="" required>
    </div >
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Harga Beli :</label>
          <input type="text" name="harga_beli" class="form-control" placeholder="" required>
    </div>
    <br>
    <div class="from-group">
        <label for="Kode Obat" >Tanggal Kadaluarsa :</label>
          <input type="date" name="tanggal_kadaluarsa"  class="form-control" required>
    </div>
    <br>
    <div class="form-group">
          <button id="kirim" name="kirim" value="kirim" class="btn btn-default btn-block">BELI OBAT</button>
        </div>
  </form>
    </div>
  </div>
</table>
</body>
</html>