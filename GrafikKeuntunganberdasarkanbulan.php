<!DOCTYPE html>
<html>

<head>
	<title>GRAFIK KEUNTUNGAN PENJUALAN BERDASARKAN BULAN</title>
	<script type="text/javascript" src="Chart.js/Chart.js"></script>
    <link rel="stylesheet" href="materialize.min.css">
</head>
<body>
<!--Nama : Baharuddin Izha Al Sya'na
Nim  : 1700018257-->
<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">&nbsp;ANALITIK</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right">
      	<li><a href="index.php">Menu</a></li>
        <li><a href="grafikKeuntungan.php">Back</a></li>
      </ul>
    </div>
  </nav>

		<h1><center>GRAFIK KEUNTUNGAN PENJUALAN BERDASARKAN BULAN</center></h1>


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
				<th>Nama Obat</th>
				<th>Kode Obat</th>
				<th>Harga Beli</th>
				<th>Harga Jual</th>
				<th>Keuntungan</th>
				<th>Bulan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"SELECT obat.nama_obat as nama, pasok.kode_obat as kode, pasok.harga_beli as harga_beli ,penjualan_detail.harga as harga_jual, penjualan_detail.harga-pasok.harga_beli as keuntungan, MONTH(tgl_penjualan) as tanggal_jual FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat GROUP BY pasok.kode_obat");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['kode']; ?></td>
					<td><?php echo $d['harga_beli']; ?></td>
					<td><?php echo $d['harga_jual']; ?></td>
					<td><?php echo $d['keuntungan']; ?></td>
					<td><?php echo $d['tanggal_jual']; ?></td>				
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
					$tanggal_jual= mysqli_query($koneksi, "SELECT MONTH(tgl_penjualan) as tanggal_jual FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat GROUP BY pasok.kode_obat");
				while ($b = mysqli_fetch_array($tanggal_jual)) { echo '"' . $b['tanggal_jual'] . '",';} ?>
					],
				datasets: [{
					label: '',
					data: [<?php $keuntungan = mysqli_query($koneksi, "SELECT penjualan_detail.harga-pasok.harga_beli as keuntungan FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat GROUP BY pasok.kode_obat");
					while ($p = mysqli_fetch_array($keuntungan)) { echo '"' . $p['keuntungan'] . '",';}?>],
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