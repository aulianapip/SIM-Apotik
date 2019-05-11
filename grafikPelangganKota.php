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

		<h1><center>GRAFIK PELANGGAN BERDASARKAN KOTA</center></h1>


<?php
$koneksi = mysqli_connect("localhost", "root", "", "crm");
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
			$data = mysqli_query($koneksi,"select * from pelanggan");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['tgl_daftar']; ?></td>
					<td><?php echo $d['ID']; ?></td>
					<td><?php echo $d['Nama']; ?></td>
					<td><?php echo $d['Jk']; ?></td>
					<td><?php echo $d['NoHp']; ?></td>
					<td><?php echo $d['Email']; ?></td>
					<td><?php echo $d['Alamat']; ?></td>
					
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
				labels: ["jogja", "Lombok", "Wonosari", "Serang", "Purworejo"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_1= mysqli_query($koneksi, "SELECT * from pelanggan where  Alamat='jogja'");
					echo mysqli_num_rows($jumlah_1);
					?>,
					<?php 
					$jumlah_2= mysqli_query($koneksi, "SELECT * from pelanggan where Alamat='Lombok'");
					echo mysqli_num_rows($jumlah_2);
					?>,
					<?php 
					$jumlah_3= mysqli_query($koneksi, "SELECT * from pelanggan where Alamat='Magelang'");
					echo mysqli_num_rows($jumlah_3);
					?>,
					<?php 
					$jumlah_5= mysqli_query($koneksi, "SELECT * from pelanggan where Alamat='Purworejo'");
					echo mysqli_num_rows($jumlah_5);
					?>,
					<?php 
					$jumlah_6= mysqli_query($koneksi, "SELECT * from pelanggan where Alamat='Serang'");
					echo mysqli_num_rows($jumlah_6);
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