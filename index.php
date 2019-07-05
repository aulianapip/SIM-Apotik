<!-- @Changelog :
Wais Alqorny (Analisator)
Amanda Fahmidyna 1700018273 1.0.1 - latest version -->
<?php
require_once('database/deb.php');
// include "navbar_cashflow.php";

if (isset($_GET['filter']) and $_GET['filter'] != 'tanggal') {
	$filter = $_GET['filter'];

	switch ($filter) {
		case 'semua':
			$kueri = "SELECT * FROM penjualan order by tgl_penjualan asc";
			$query = "SELECT * FROM jualbeli";

			$sql_jb = mysqli_query($connect, $query);
			break;
		case 'hari':
		
			$query = "SELECT * FROM jualbeli where tanggal = curdate()";
			$kueri = "SELECT * FROM penjualan where tgl_penjualan=curdate()";
			// $sql_jb = mysqli_query($connect, $query);
			break;

			$query = "SELECT * FROM jualbeli where WEEK(tanggal) = WEEK(curdate())";
			$kueri = "SELECT * FROM penjualan where WEEK(tgl_penjualan) = WEEK(curdate())";

			// $sql_jb = mysqli_query($connect, $query);
			break;
		case 'bulan':
		
			$query = "SELECT * FROM jualbeli where month(tanggal) = month(curdate())";
			$kueri = "SELECT * FROM penjualan where month(tgl_penjualan) = month(curdate())";


			// $sql_jb = mysqli_query($connect, $query);
			break;
		case 'tahun':
		
			$query = "SELECT * FROM jualbeli where year(tanggal) = year(curdate())";
				$kueri = "SELECT * FROM penjualan where year(tgl_penjualan) = year(curdate())";
			// $sql_jb = mysqli_query($connect, $query);
			break;
	}
	$sql = mysqli_query($connect, $kueri);

	$q = "SELECT jumlah as kas from kasawal"; // query untuk menampilkan data pada tabel kasawal
	$sql3 = mysqli_query($connect, $q); //syntax untuk menyambungkan dengan database agar query dapat digunakan 
	$res = mysqli_fetch_object($sql3); //deklarasi res sebagai penampung agar variabel jumlah as kas dapat dikalkulasikan

	$sql_jb = mysqli_query($connect, $query);
	$modal = $res->kas; //pemindahan nilai 
	$kas = $modal;
} else {
	if (isset($_GET['tanggal_awal']) and isset($_GET['tanggal_akhir'])) { //untuk mengeksekusi bahwa variabel tanggal_awal dan tanggal_akhir bernilai true jika sudah diisi dan false jika kosong
		$awal = $_GET['tanggal_awal']; //deklarasi bahwa variabel awal = variabel tanggal_awal 
		$akhir = $_GET['tanggal_akhir']; //deklarasi akhir = tanggal_akhir 

		//aulia code test


		$q1 = "SELECT * FROM penjualan where tgl_penjualan between '$awal' and '$akhir' order by tgl_penjualan asc";
		$sql = mysqli_query($connect, $q1);

		//end of aulia code test

		$query = "SELECT * FROM jualbeli where tanggal between '$awal' and '$akhir'";
		$sql_jb = mysqli_query($connect, $query);


		$q = "SELECT jumlah as kas from kasawal"; // query untuk menampilkan data pada tabel kasawal
		$sql3 = mysqli_query($connect, $q); //syntax untuk menyambungkan dengan database agar query dapat digunakan 
		$res = mysqli_fetch_object($sql3); //deklarasi res sebagai penampung agar variabel jumlah as kas dapat dikalkulasikan
		$modal = $res->kas; //pemindahan nilai 
		$kas = $modal;
	} else {
		$q = "SELECT jumlah as kas from kasawal";
		$sql3 = mysqli_query($connect, $q);
		$res = mysqli_fetch_object($sql3);
		// echo var_dump($res);
		// die;
		$modal = $res->kas;
		$kas = $modal;


		//aulia code test

		$q1 = "SELECT * FROM penjualan where tgl_penjualan=curdate() order by tgl_penjualan asc";
		$sql = mysqli_query($connect, $q1);

		$query = "SELECT * FROM jualbeli where tanggal = curdate()";
		$sql_jb = mysqli_query($connect, $query);

		//end of code aulia

	}
}

$total_kredit = 0;
$total_debit = 0;

?>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="bulma.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
						<a href="laporan keuntungan.php" class="btn btn-danger float-right " style="margin-top: 33px">Laporan</a>
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
				<table id="myTable" class="table">
					<thead>
						<!--tabel cashflow-->
						<th>Tanggal</th>
						<th>Transaksi</th>
						<th>Jumlah</th>
						<th>Debit</th>
						<th>Kredit</th>
						<th>Subtotal</th>
						<!-- <th>Saldo</th> -->
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
							<!-- <td>
								<?php $total = $kas; ?>
							</td> -->
						</tr>
						<?php
						// foreach ($sql_jb as $jb) {
						// 	$result[] = $jb;
						// }
						if ($sql_jb) {
							foreach ($sql_jb as $jb) {
								?>
								<tr>
									<td><?= $jb['tanggal']; ?></td>
									<td><?= ($jb['kodeobat']) ? $jb['kodeobat'] : $jb['lainnya']; ?></td>
									<td><?= $jb['jumlah']; ?></td>
									<td> - </td>
									<td>Rp <?= $jb['harga'] ?></td>
									<td>Rp <?= $jb['harga'] * $jb['jumlah'] ?></td>
									<?php $total_kredit += $jb['harga'] * $jb['jumlah'] ?>
								</tr>
							<?php
						}
					}


					foreach ($sql as $data) {

						if (array_key_exists('no_transaksi', $data)) {
							$no_transaksi = $data['no_transaksi'];

							$qw = "SELECT * FROM penjualan_detail where no_transaksi='$no_transaksi'";
							$sql_qw = mysqli_query($connect, $qw);;

							foreach ($sql_qw as $data_qw) {
								// print_r($data_qw);
								// die;

								$kode_obat = $data_qw['kode_obat'];

								$q_obat = "SELECT * FROM obat where kode_obat='$kode_obat'";
								$sql_obat = mysqli_query($connect, $q_obat);

								foreach ($sql_obat as $data_obat) {

									?>
										<tr>
											<td>
												<?php echo $data['tgl_penjualan'];
												?>
											</td>
											<td>
												<?php
												if ($data['jenis'] == 'debit') // apabila jenis transaksinya debit

													echo $data_obat['nama_obat']; // maka transaksi akan diambil dari data obat


												else if ($data_obat['jenis'] == 'kredit') { //apabila jenis transaksi kredit

													echo $data['trans']; //maka akan diambil dari data transaksi lain
													echo $data_obat['nama_obat']; //dan diambil dari data suplier(pembelian obat)
												}
												?>
											</td>

											<td>
												<?php echo $data_qw['jumlah'];
												?>
											</td>
											<td>
												<?php
												if ($data['jenis'] == "debit") //jika jenis debit
													echo "Rp " . $data_qw['harga']; //maka jumlah akan dikalikan harga barang
												else
													echo '0'; //jika tidak maka tidak akan dikalikan
												?>
											</td>
											<td>
												<?php
												if ($data['jenis'] == "kredit")
													echo "Rp " . $data['hargaa'];
												else
													echo '-';
												?>
											</td>
											<td><?php
													if ($data['jenis'] == "kredit") {
														echo "Rp " . $data_qw['jumlah'] * $data_qw['harga'];
													} else {
														echo "Rp " . $data_qw['jumlah'] * $data_qw['harga'];
													}

													?></td>
											<td>
												<?php //agar jumlah kas bisa bertambah secara otomatis apabila jenis transaksi debitdan berkurang otomatis apabila jenis transaksi kredit
												if ($data['jenis'] == "debit") {
													$total_debit += $data_qw['harga'] * $data_qw['jumlah'];
												} //menampilkan hasil kalkulasi di atas. sisa saldonya
												?>
											</td>
										</tr>
									<?php

								}
							}
						}
					}

					?>

					</tbody>
				</table>
			</div>
			<div class="col-1"></div>
		</div>
		<div class="row">
			<div class="col-lg-10 mx-auto">
				<div class="card container">
					<div class="card-title">
						Total Kas
					</div>
					<div class="card-body">
						<table class="table table-hover">
							<thead>
								<tr class="table-primary">
									<th class="text-left">KAS Awal</th>
									<td class="text-right"><?= $kas; ?></td>
								</tr>
								<tr class="table-danger">
									<th class="text-left">Total Kredit</th>
									<td class="text-right"><?= $total_kredit; ?></td>
								</tr>
								<tr class="table-info">
									<th class="text-left">Total Debit</th>
									<td class="text-right"><?= $total_debit; ?></td>
								</tr>
								<tr class="table-success">
									<th class="text-left">KAS Sekarang</th>
									<td class="text-right"><?= $kas + $total_debit - $total_kredit; ?></td>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
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
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script>

</body>

</html>
