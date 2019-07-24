<!DOCTYPE html>
<html>

<head>
	<title>GRAFIK PELANGGAN BERDASARKAN KOTA</title> 
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

		<h1><center>GRAFIK PELANGGAN BERDASARKAN KOTA</center></h1><!-- Menampilkan judul pada grafik pelanggan-->


<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek");//Menyambungkan ke database
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
				<th>Tgl_daftar</th>
				<th>ID</th>
				<th>Nama Pelanggan</th>
				<th>JK</th>
				<th>No HP</th>
				<th>Email</th>
				<th>Alamat</th>
				
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"select * from pelanggan");//Menampilkan data pada tabel keterangan yang ada dibawah grafik
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['tgl_daftar'];//untuk memanggil tanggal daftar pada tabel keterangan?></td>
					<td><?php echo $d['ID'];//untuk memanggil ID pelanggan pada tabel keterangan?></td>
					<td><?php echo $d['Nama'];//untuk memanggil Nama pada tabel keterangan?></td>
					<td><?php echo $d['Jk'];//untuk memanggil Jenis kelamin pada tabel keterangan?></td>
					<td><?php echo $d['NoHp'];//untuk memanggil No Hp pada tabel keterangan?></td>
					<td><?php echo $d['Email'];//untuk memanggil Email pada tabel keterangan?></td>
					<td><?php echo $d['Alamat'];//untuk memanggil Alamat pada tabel keterangan?></td>
					
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');//Memanggil fungsi grafik 
		var myChart = new Chart(ctx, {
			type: 'bar',//Menggunakan tipe grafik dengan tipe bar
			data: {
				labels: [<?php 
					$alamat= mysqli_query($koneksi, "SELECT alamat from pelanggan GROUP BY ALAMAt");
				while ($b = mysqli_fetch_array($alamat)) { echo '"' . $b['alamat'] . '",';} ?>
					],//menampilkan jumlah alamat pada grafik
				datasets: [{
					label: '',
					data: [<?php $kota = mysqli_query($koneksi, "SELECT COUNT(alamat) as jumlah_alamat FROM pelanggan GROUP BY Alamat");
while ($p = mysqli_fetch_array($kota)) { echo '"' . $p['jumlah_alamat'] . '",';}?>],//menampilkan jumlah kota pada grafik
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