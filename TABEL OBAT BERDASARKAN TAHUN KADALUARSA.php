<!--1. Fitur Analitik 
	Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik. untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat. hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.
-->

<!-- Nama : Alya Masitha   -1700018236- -->
<?php
$connect = mysqli_connect("localhost", "root", "", "sim-apotek");//Memanggil database yang telah kita buat

?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="Chart.js/Chart.js"></script>
    <link rel="stylesheet" href="materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">&nbsp;ANALITIK</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right">
        <li><a href="index.php">Menu</a></li>
        <li><a href="TABEL OBAT BERDASARKAN TAHUN KADALUARSA.php">Back</a></li>
      </ul>
    </div>
  </nav>
 
	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>

		<h1><center>Grafik Obat Berdasarkan Tahun Kadaluarsa</center></h1>
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Tanggal Kadaluarsa</th>
				<th>Bulan Kadaluarsa</th>
				<th>Tahun Kadaluarsa</th>				
			</tr>
		</thead>
		<tbody>

			<?php
			//untuk menampilkan data tabel yang ada di bawah grafik 
			$no = 1;
			$data = mysqli_query($connect,"select * from obat ORDER BY `tahun_kadaluarsa` ASC");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama_obat']; ?></td>
					<td><?php echo $d['tanggal_kadaluarsa']; ?></td>
					<td><?php echo $d['bulan_kadaluarsa']; ?></td>
					<td><?php echo $d['tahun_kadaluarsa']; ?></td>
					
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',//untuk menampilkan grafik
			data: {
				labels: ["2018", "2019", "2020"],//menampilkan tahun kadaluarsa pada sumbu x
				datasets: [{ // untuk menampilkan jumlah obat kadaluarsa berdasarkan tahun pada sumbu y
					label: '',
					data: [
					<?php 
					$jumlah_1= mysqli_query($connect, "SELECT * from obat where  tahun_kadaluarsa='2018'");
					echo mysqli_num_rows($jumlah_1);
					?>,
					//Query data untuk menampilkan jumlah obat kadaluarsa pada tahun 2019
					<?php 
					$jumlah_2= mysqli_query($connect, "SELECT * from obat where  tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_2);
					?>,
					//Query data untuk menampilkan jumlah obat kadaluarsa pada tahun 2020
					<?php 
					$jumlah_3= mysqli_query($connect, "SELECT * from obat where  tahun_kadaluarsa='2020'");
					echo mysqli_num_rows($jumlah_3);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
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