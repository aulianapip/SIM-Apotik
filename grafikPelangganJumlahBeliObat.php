<!DOCTYPE html>
<html>

<head>
	<title>GRAFIK STOCK DARI KESELURUHAN SUPPLIER</title>
	<script type="text/javascript" src="Chart.js/Chart.js"></script>
    <link rel="stylesheet" href="materialize.min.css">
</head>
<body>
<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">&nbsp;ANALITIK</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right">
      	<li><a href="index.php">Menu</a></li>
        <li><a href="index.php">Back</a></li>
      </ul>
    </div>
  </nav>

		<h1><center>GRAFIK PELANGGAN BERDASARKAN JUMLAH BELI OBAT</center></h1>


<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek-fix");
?>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan</th>
				<th>ID</th>
				<th>Jumlah Beli Obat</th>
				
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"SELECT pelanggan.nama as nama, pelanggan.ID as id, COUNT(penjualan.no_transaksi) as jumlah_beli_obat FROM penjualan_detail, penjualan, pelanggan, obat where pelanggan.ID=penjualan.id_pelanggan and obat.kode_obat=penjualan_detail.kode_obat and penjualan.no_transaksi=penjualan_detail.no_transaksi GROUP BY pelanggan.nama ORDER BY pelanggan.id");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['id']; ?></td>
					<td><?php echo $d['jumlah_beli_obat']; ?></td>					
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [<?php 
					$nama= mysqli_query($koneksi, "SELECT pelanggan.nama as nama FROM penjualan_detail, penjualan, pelanggan, obat where pelanggan.ID=penjualan.id_pelanggan and obat.kode_obat=penjualan_detail.kode_obat and penjualan.no_transaksi=penjualan_detail.no_transaksi GROUP BY pelanggan.nama ORDER BY pelanggan.id");
				while ($b = mysqli_fetch_array($nama)) { echo '"' . $b['nama'] . '",';} ?>
					],
				datasets: [{
					label: '',
					data: [<?php $jumlah_beli_obat  = mysqli_query($koneksi, "SELECT COUNT(penjualan.no_transaksi) as jumlah_beli_obat FROM penjualan_detail, penjualan, pelanggan, obat where pelanggan.ID=penjualan.id_pelanggan and obat.kode_obat=penjualan_detail.kode_obat and penjualan.no_transaksi=penjualan_detail.no_transaksi GROUP BY pelanggan.nama ORDER BY pelanggan.id");
while ($p = mysqli_fetch_array($jumlah_beli_obat)) { echo '"' . $p['jumlah_beli_obat'] . '",';}?>],
                            backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>