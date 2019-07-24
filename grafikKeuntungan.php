<!DOCTYPE html>
<html>
<!-- Baharuddin Izha Al Sya'na
	1700018257
	E -->
<head>
	<title>GRAFIK Opname</title>
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

		<h1><center>GRAFIK KEUNTUNGAN PENJUALAN </center></h1>


<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek");//koneksi ke data base
?>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>
<center>
<div class="row">
    <div class="col s4 ">
      <div class="card ">
        <div class="card-content black-text">
          <center><i class="medium material-icons"></i><span class="card-title"><b>Keuntungan Harian</b></span>
          	<a href="GrafikKeuntunganberdasarkanTanggal.php" class="waves-effect waves-light btn-small">Keuntungan Harian</a>
        </div>
        <div class="card-action">
          	</div>
      </div>
    </div>

    <div class="row">
    <div class="col s4 ">
      <div class="card ">
        <div class="card-content black-text">
          <center><i class="medium material-icons"></i><span class="card-title"><b>Keuntungan Bulanan</b></span>
          	 <a href="GrafikKeuntunganberdasarkanbulan.php" class="waves-effect waves-light btn-small">Keuntungan Bulanan</a>
        </div>
        <div class="card-action">
          	</div>
      </div>
    </div>

    <div class="row">
    <div class="col s4 ">
      <div class="card ">
        <div class="card-content black-text">
          <center><i class="medium material-icons"></i><span class="card-title"><b>Keuntungan Tahunan</b></span>
          	 <a href="GrafikKeuntunganberdasarkanTahun.php" class="waves-effect waves-light btn-small">Keuntungan Tahunan</a>
        </div>
        <div class="card-action">
          	</div>
      </div>
    </div>
  </div>
  </div>
  </div>

	<table border="1"><!-- Menampilkan Tabel -->
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Obat</th>
				<th>Kode Obat</th>
				<th>Harga Beli</th>
				<th>Harga Jual</th>
				<th>Keuntungan</th>
				<th>Tanggal</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"SELECT obat.nama_obat as nama, pasok.kode_obat as kode, pasok.harga_beli as harga_beli ,penjualan_detail.harga as harga_jual, penjualan_detail.harga-pasok.harga_beli as keuntungan, penjualan.tgl_penjualan as tanggal_jual FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat GROUP BY pasok.kode_obat");//Menampilkan Grafik Keuntungan
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
					$tanggal_jual= mysqli_query($koneksi, "SELECT penjualan.tgl_penjualan as tanggal_jual FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat GROUP BY pasok.kode_obat");//Menampilkan Tanggal Jual
				while ($b = mysqli_fetch_array($tanggal_jual)) { echo '"' . $b['tanggal_jual'] . '",';} ?>
					],
				datasets: [{
					label: '',
					data: [<?php $keuntungan = mysqli_query($koneksi, "SELECT penjualan_detail.harga-pasok.harga_beli as keuntungan FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat GROUP BY pasok.kode_obat");//Menampilkan Keuntungan
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