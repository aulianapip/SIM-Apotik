<!DOCTYPE html>
<html>

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

		<h1><center>GRAFIK Opname</center></h1>


<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek");
?>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<table border="1">
		<thead>
			<tr>
				<th>status</th>
				<th>jumlah</th>
				
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"SELECT status,COUNT(status) as jumlah FROM `opname`GROUP BY status");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					
					<td><?php echo $d['status']; ?></td>
					<td><?php echo $d['jumlah']; ?></td>
									
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [<?php 
					$status= mysqli_query($koneksi, "SELECT status FROM `opname`GROUP BY status");
				while ($b = mysqli_fetch_array($status)) { echo '"' . $b['status'] . '",';} ?>
					],
				datasets: [{
					label: '',
					data: [<?php $jumlah = mysqli_query($koneksi, "SELECT COUNT(status) as jumlah FROM `opname`GROUP BY status");
while ($p = mysqli_fetch_array($jumlah)) { echo '"' . $p['jumlah'] . '",';}?>],
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