<!--AZ KHARISMA P-->
<!--
  @changelog:
    Amanda Fahmidyna v 1.0.4 (Memperbaiki fitur)
    Az kharisma v 1.0.1 (Membuat fitur)
    Fadli Muhammad Oei 1.0.3 (1600018057) (Memperbaiki Fitur)
    Sahlan 1.0.2 (Memperbaiki fitur)
-->

<?php
	session_start();

if (!isset($_SESSION["login1"])) {
    	  header("location: http://localhost/Keuangan/login.php");
      exit;
    }
      
  //Amanda Fahmidyna 1700018273
	include "connection/db.php";
	$QuerySql = "SELECT * from penjualan order by tgl_penjualan";//menampilkan seluruh data dari tabel penjualan berdasarkan tanggal penjualan

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
    <tr><!-- Az kharisma v 1.0.1 (Membuat fitur)
    Fadli Muhammad Oei 1.0.3 (1600018057) (Memperbaiki Fitur)
    Sahlan 1.0.2 (Memperbaiki fitur)-->
      <th scope="col"><a href="s_penjualan_id.php"> ID PENJUALAN</a></th>
      <th scope="col"><a href="s_penjualan_tanggal.php">TANGGAL TERJUAL</a></th>
      <th scope="col"><a href="s_penjualan_ko.php">KODE OBAT</a></th>
      <th scope="col"><a href="s_penjualan_nama.php">NAMA OBAT</a></th>
      <th scope="col"><a href="s_penjualan_harga.php">HARGA OBAT</a></th>
      <th scope="col"><a href="s_penjualan_jumlah.php">JUMLAH TERJUAL</a></th>
      <th scope="col"><a href="s_penjualan_total.php">HARGA TOTAL</a></th>
    </tr>
  </thead>
		<?php
foreach ($SQL as $data) {

						$no_transaksi = $data['no_transaksi'];
						$qw = "SELECT *, sum(jumlah) as jumlah FROM penjualan_detail where no_transaksi='$no_transaksi'";
						$sql_qw = mysqli_query($connect, $qw);

						foreach ($sql_qw as $data_qw) {
					
							$kode_obat = $data_qw['kode_obat'];

							$q_obat = "SELECT * FROM obat where kode_obat='$kode_obat'";
							$sql_obat = mysqli_query($connect, $q_obat);

							foreach ($sql_obat as $data_obat) {

								?>
									<tr>
										<td> <?php echo $data['id'] ?></td>
										<td>
										<?php
										if($data['jenis']=="debit")
											 echo $data['tgl_penjualan'];
										
											?>
										</td>
										<td><?php echo $data_qw['kode_obat'] ?></td>
										<td>
											<?php
											if ($data['jenis'] == 'debit') // apabila jenis transaksinya debit

												echo $data_obat['nama_obat']; // maka transaksi akan diambil dari data obat
									
											?>
										</td>

										<td>
											<?php 
											if($data['jenis']=="debit")
											echo "Rp" . $data_qw['harga'];
										
											?>
										</td>
										<td>
											<?php
											if ($data['jenis'] == "debit") //jika jenis debit
												echo $data_qw['jumlah']; //maka jumlah akan dikalikan harga barang
											
											else
												echo '0'; //jika tidak maka tidak akan dikalikan
											?>
										</td>
									
										<td><?php
												if ($data['jenis'] == "debit") {
													echo "Rp " . $data_qw['jumlah'] * $data_qw['harga'];
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
