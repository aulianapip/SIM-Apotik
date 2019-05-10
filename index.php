<?php
require_once('database/db.php');
include "navbar_cashflow.php";

if (isset($_GET['filter']) and $_GET['filter'] != 'tanggal' ) {
 $filter = $_GET['filter'];

 switch ($filter) {
 case 'semua':
 $q = "SELECT tabel_penjualan.tanggal_terjual as tanggal, tabel_penjualan.kode_obat as transaksi, tabel_penjualan.lain as trans, tabel_penjualan.jumlah_terjual as jumlah, tabel_penjualan.harga as harga, transaksi.jenis, obat.nama_obat as nama from tabel_penjualan join transaksi on tabel_penjualan.id_penjualan = transaksi.id_penjualan left join obat on obat.kode_obat = tabel_penjualan.kode_obat order by tabel_penjualan.tanggal_terjual asc";
 break;
 case 'hari':
 $q = "SELECT tabel_penjualan.tanggal_terjual as tanggal, tabel_penjualan.kode_obat as transaksi, tabel_penjualan.lain as trans, tabel_penjualan.jumlah_terjual as jumlah, tabel_penjualan.harga as harga, transaksi.jenis, obat.nama_obat as nama from tabel_penjualan join transaksi on tabel_penjualan.id_penjualan = transaksi.id_penjualan left join obat on obat.kode_obat = tabel_penjualan.kode_obat where tabel_penjualan.tanggal_terjual = curdate() order by tabel_penjualan.tanggal_terjual asc";
 break;
 case 'pekan':
 $q = "SELECT tabel_penjualan.tanggal_terjual as tanggal, tabel_penjualan.kode_obat as transaksi, tabel_penjualan.lain as trans, tabel_penjualan.jumlah_terjual as jumlah, tabel_penjualan.harga as harga, transaksi.jenis, obat.nama_obat as nama from tabel_penjualan join transaksi on tabel_penjualan.id_penjualan = transaksi.id_penjualan left join obat on obat.kode_obat = tabel_penjualan.kode_obat where WEEK(tabel_penjualan.tanggal_terjual) = WEEK(curdate()) order by tabel_penjualan.tanggal_terjual asc";
 break;
 case 'bulan':
 $q = "SELECT tabel_penjualan.tanggal_terjual as tanggal, tabel_penjualan.kode_obat as transaksi, tabel_penjualan.lain as trans, tabel_penjualan.jumlah_terjual as jumlah, tabel_penjualan.harga as harga, transaksi.jenis, obat.nama_obat as nama from tabel_penjualan join transaksi on tabel_penjualan.id_penjualan = transaksi.id_penjualan left join obat on obat.kode_obat = tabel_penjualan.kode_obat where month(tabel_penjualan.tanggal_terjual) = month(curdate()) order by tabel_penjualan.tanggal_terjual asc";
 break;
 case 'tahun':
 $q = "SELECT tabel_penjualan.tanggal_terjual as tanggal, tabel_penjualan.kode_obat as transaksi, tabel_penjualan.lain as trans, tabel_penjualan.jumlah_terjual as jumlah, tabel_penjualan.harga as harga, transaksi.jenis, obat.nama_obat as nama from tabel_penjualan join transaksi on tabel_penjualan.id_penjualan = transaksi.id_penjualan left join obat on obat.kode_obat = tabel_penjualan.kode_obat where year(tabel_penjualan.tanggal_terjual) = year(curdate()) order by tabel_penjualan.tanggal_terjual asc";
 break;
 }
 $sql = mysqli_query($connect, $q);

 $q = "SELECT jumlah as kas from kasawal"; // query untuk menampilkan data pada tabel kasawal
 $sql3 = mysqli_query($connect, $q); //syntax untuk menyambungkan dengan database agar query dapat digunakan 
 $res = mysqli_fetch_object($sql3); //deklarasi res sebagai penampung agar variabel jumlah as kas dapat dikalkulasikan
 $modal = $res->kas; //pemindahan nilai 
 $kas = $modal;
} else {
 if (isset($_GET['tanggal_awal']) and isset($_GET['tanggal_akhir'])) { //untuk mengeksekusi bahwa variabel tanggal_awal dan tanggal_akhir bernilai true jika sudah diisi dan false jika kosong
 $awal = $_GET['tanggal_awal']; //deklarasi bahwa variabel awal = variabel tanggal_awal 
 $akhir = $_GET['tanggal_akhir']; //deklarasi akhir = tanggal_akhir 
 $q = "SELECT tabel_penjualan.tanggal_terjual as tanggal, tabel_penjualan.kode_obat as transaksi, tabel_penjualan.lain as trans, tabel_penjualan.jumlah_terjual as jumlah, tabel_penjualan.harga as harga, transaksi.jenis, obat.nama_obat as nama from tabel_penjualan join transaksi on tabel_penjualan.id_penjualan = transaksi.id_penjualan left join obat on obat.kode_obat = tabel_penjualan.kode_obat where tabel_penjualan.tanggal_terjual between '$awal' and '$akhir' order by tabel_penjualan.tanggal_terjual asc"; // query untuk menampilkan data dalam database pada tabel tabel_penjualan,obat,dan transaksi
 $sql = mysqli_query($connect, $q); //syntax untuk menyambungkan dengan database agar oquery dapat digunakan


 $q = "SELECT jumlah as kas from kasawal"; // query untuk menampilkan data pada tabel kasawal
 $sql3 = mysqli_query($connect, $q); //syntax untuk menyambungkan dengan database agar query dapat digunakan 
 $res = mysqli_fetch_object($sql3); //deklarasi res sebagai penampung agar variabel jumlah as kas dapat dikalkulasikan
 $modal = $res->kas; //pemindahan nilai 
 $kas = $modal;
 } else {
 $q = "SELECT tabel_penjualan.tanggal_terjual as tanggal, tabel_penjualan.kode_obat as transaksi, tabel_penjualan.lain as trans, tabel_penjualan.jumlah_terjual as jumlah, tabel_penjualan.harga as harga, transaksi.jenis, obat.nama_obat as nama from tabel_penjualan join transaksi on tabel_penjualan.id_penjualan = transaksi.id_penjualan left join obat on obat.kode_obat = tabel_penjualan.kode_obat or tabel_penjualan.lain = NULL where tabel_penjualan.tanggal_terjual = curdate() order by tabel_penjualan.tanggal_terjual asc";
 $sql = mysqli_query($connect, $q);
 $q = "SELECT jumlah as kas from kasawal";
 $sql3 = mysqli_query($connect, $q);
 $res = mysqli_fetch_object($sql3);
 // echo var_dump($res);
 // die;
 $modal = $res->kas;
 $kas = $modal;
 }
}

?>
<html lang="en">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="bulma.min.css">
 <title>Cashflow Statement</title>
</head>

<body>
 <div class="container-fluid">
 <div class="container py-4">
 <form action="index.php" method="get" onsubmit="return isValid()">
 <!-- action akan menuju ke index php apabila filter dijalankan -->
 <div class="row">
 <!-- mengiputkan data dengan tipe data date dengan nama variabel awal untuk eksekusi nilai true atau false -->
 <div class="col-3 mb-3">
 <div class="form-group">
 <label for="awal">Tanggal Awal</label>
 <input type="date" class="form-control" id="awal" name="tanggal_awal">
 </div>
 </div>
 <!-- mengiputkan data dengan tipe data date dengan nama variabel akhir untuk eksekusi nilai true atau false -->
 <div class="col-3 mb-3">
 <div class="form-group">
 <label for="akhir">Tanggal Akhir</label>
 <input type="date" class="form-control" id="akhir" name="tanggal_akhir">
 </div>
 </div>
 <div class="col-2 mb-3">
 <label for="filter">Filter Tampilan</label>
 <select name="filter" id="filter" class="form-control">
 <option value="hari">Harian</option>
 <option value="tanggal">Tanggal</option>
 <option value="pekan">Mingguan</option>
 <option value="bulan">Bulanan</option>
 <option value="tahun">Tahunan</option>
 </select>
 </div>
 <div class="col-4 mb-3">
 <a href="index.php?filter=semua" class="btn btn-success float-right mx-3" style="margin-top: 33px">Semua</a>
 <!--ketika button semua diklik maka akan dialihkan ke halaman index.php dengan menampilkan semua hari aruskas(default page)-->
 <button type="submit" class="btn btn-primary float-right" style="margin-top: 33px"> Cari berdasarkan filter</button>
 <!--ketika form filter sudah diisi danmengklik button tersebutmaka akan terfilter -->
 </div>
 </div>
 </form>
 </div>
 <div class="row">
 <div class="col-1"></div>
 <div class="col-10">
 <table class="table">
 <thead>
 <!--tabel cashflow-->
 <th>Tanggal</th>
 <th>Transaksi</th>
 <th>Jumlah</th>
 <th>Debit</th>
 <th>Kredit</th>
 <th>Subtotal</th>
 <th>Saldo</th>
 </thead>
 <tbody>
 <tr>
 <td>
 #
 </td>
 <td>
 Saldo Awal
 </td>
 <td>-</td>
 <td>-</td>
 <td>-</td>
 <td>-</td>
 <td>
 <?php echo "Rp " . $kas;
 ?>
 </td>
 </tr>
 <?php
 foreach ($sql as $data) {
 ?>
 <tr>
 <td>
 <?php echo $data['tanggal'];
 ?>
 </td>
 <td>
 <?php
 if ($data['jenis'] == 'debit') // apabila jenis transaksinya debit

 echo $data['nama']; // maka transaksi akan diambil dari data obat


 else if ($data['jenis'] == 'kredit') { //apabila jenis transaksi kredit

 echo $data['trans']; //maka akan diambil dari data transaksi lain
 echo $data['nama']; //dan diambil dari data suplier(pembelian obat)
 }
 ?>
 </td>

 <td>
 <?php echo $data['jumlah'];
 ?>
 </td>
 <td>
 <?php
 if ($data['jenis'] == "debit") //jika jenis debit
 echo "Rp " . $data['harga']; //maka jumlah akan dikalikan harga barang
 else
 echo '0'; //jika tidak maka tidak akan dikalikan
 ?>
 </td>
 <td>
 <?php
 if ($data['jenis'] == "kredit")
 echo "Rp " . $data['harga'];
 else
 echo '0';
 ?>
 </td>
 <td><?php
 echo "Rp " . $data['jumlah'] * $data['harga'];
 ?></td>
 <td>
 <?php //agar jumlah kas bisa bertambah secara otomatis apabila jenis transaksi debitdan berkurang otomatis apabila jenis transaksi kredit
 if ($data['jenis'] == "debit") {
 $kas += $data['harga'] * $data['jumlah'];
 } else {
 $kas -= $data['harga'] * $data['jumlah'];
 }

 echo "Rp " . $kas; //menampilkan hasil kalkulasi di atas. sisa saldonya
 ?>
 </td>
 </tr>
 <?php } ?>
 </tbody>
 </table>
 </div>
 <div class="col-1"></div>
 </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <script>
 let awal = document.getElementById('awal'); //pendeklarasian awal untuk variabel awal 
 let akhir = document.getElementById('akhir'); //deklarasi akhir untuk variabel akhir
 let ngefilter = document.getElementById('filter');

 const isValid = () => { //data filter bersifat valid dan bernilai true karena terisi
 if (ngefilter.value == "all") {
 if (awal.value == '' || akhir.value == '') { //jika filter kosong
 Swal.fire('Oops!', 'Kolom filter tidak boleh ada yang kosong!', 'warning'); //menampilkan warning dengan tulisan di samping
 return false; //karena data kosong maka bernilai false
 }
 }

 return true; //jika tidak kosong maka truw
 }
 </script>


 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
 </script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
 </script>
</body>

</html>