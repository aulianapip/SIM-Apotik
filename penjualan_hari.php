<!-- THOBIE ZATONI -->
<!-- 1700018241-->

<!-- Penjelasan class :
  Dalam keuangan kami membuat beberapa function seperti cashflow, data pembelian,
  data penjualan, dan total keuntungan. cashflow gambaran mengenai jumlah uang yang masuk dan keluar. 
  data pembelian hanya menampilkan data pembelian barang dari suplier. 
  data penjualan gambaran informasi data-data penjualan yang dihasilkan dari penjualan kasir.
  total keuntungan menampilkan keuntungan dari harga jual tiap barang dikurangi harga beli dari suplier.
   -->
   <!--
  @changelog:
    Amanda Fahmidyna v 1.0.2 (Memperbaiki fitur)
    Tobi Zatoni v 1.0.1 (Membuat fitur)
-->

<?php
	session_start();

if (!isset($_SESSION["login1"])) {//jika login gagal maka kembali login.php
    	  header("location: http://localhost/Kkeuangan/login.php");//link untuk login.php
      exit;
    }
      
  
	include "connection/db.php";
	 $QuerySql = "SELECT *, sum(total_penjualan) as total from penjualan group by day(tgl_penjualan) ";

  $SQL = mysqli_query($connect, $QuerySql); 
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<?php 
  include "navbar/navbar_penjualan.php";
 ?>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col">TANGGAL</th>
      <th scope="col">JUMLAH TERJUAL</th>
      <th scope="col">TOTAL PENJUALAN</th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $data) {

            $no_transaksi = $data['no_transaksi'];
            $qw = "SELECT *,sum(jumlah) as jml FROM penjualan_detail where no_transaksi='$no_transaksi'";
            $sql_qw = mysqli_query($connect, $qw);

            foreach ($sql_qw as $data_qw) {
          
              $kode_obat = $data_qw['kode_obat'];

              $q_obat = "SELECT * FROM obat where kode_obat='$kode_obat'";
              $sql_obat = mysqli_query($connect, $q_obat);

              foreach ($sql_obat as $data_obat) {

                ?>
                  <tr>
                      <td>
                      <?php 
                      
                      echo $data['tgl_penjualan'];
                    
                      ?>
                    </td>
                    <td>
                      <?php 
                      if($data['jenis']=="debit")
                      echo $data_qw['jml'];
                    
                      ?>
                    </td>
                  
                    <td>
                      <?php
                        if ($data['jenis'] == "debit") {
                          echo "Rp " . $data['total'];
                        } 

                        ?></td>
                  </tr>
                <?php

              }
            }
          } 
		?>
</table>
</body>
</html>
