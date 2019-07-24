<!DOCTYPE html>
<html>
<!--Cendani Wukir Asih- 1700018249-->
<head>
	<title>GRAFIK PELANGGAN BERDASARKAN JENIS KELAMIN</title>
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
		<h1><center>GRAFIK PELANGGAN BERDASARKAN JENIS KELAMIN</center></h1> <!--menampilkan judul grafik-->


<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek"); //memanggil database yang telah kita buat
?>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<table border="1">
		<thead>
			<tr>
				<th>Tanggal Daftar</th>
				<th>ID</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>No HP</th>
				<th>Email</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"select * from pelanggan"); //menampilkan data pelanggan pada tabel yang ada dibawah grafik
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $d['tgl_daftar']; //untuk memanggil tanggal daftar pada tabel yang ada di tabel ?></td>
					<td><?php echo $d['ID']; //untuk memanggil id pada tabel yang ada di tabel ?></td>
					<td><?php echo $d['Nama']; //untuk memanggil nama pada tabel yang ada di tabel  ?></td>
					<td><?php echo $d['Jk']; //untuk memanggil jenis kelamin pada tabel yang ada di tabel?></td>
					<td><?php echo $d['NoHp']; //untuk memanggil nomor hp pada tabel yang ada di tabel ?></td>
					<td><?php echo $d['Email']; //untuk memanggil email pada tabel yang ada di tabel ?></td>
					<td><?php echo $d['Alamat']; //untuk memanggil alamat pada tabel yang ada di tabel ?></td>
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
				labels: ["Laki-Laki", "Perempuan"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_LakiLaki = mysqli_query($koneksi,"select Jk from pelanggan where Jk='Laki-Laki' ");
					echo mysqli_num_rows($jumlah_LakiLaki); //menampilkan grafik jumlah jenis kelamin laki-laki
					?>, 
					<?php 
					$jumlah_Perempuan = mysqli_query($koneksi,"select * from pelanggan where Jk='Perempuan'");
					echo mysqli_num_rows($jumlah_Perempuan); //menampilkan grafik jumlah jenis kelamin perempuan
					?>
					],
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