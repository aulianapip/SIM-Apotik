<!--1. Fitur Analitik 
	Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik. 
	untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat. hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.
-->

<!--
	Cendani Wukir Asih - 1700018249 -
	-->
<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek");
error_reporting(0); 
	$pilihan = $_POST['area'];// variabel pilihan untuk memilih grafik apa yang akan digunakan
	if (isset($_POST['submit'])) { 
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script type="text/javascript" src="Chart.js/Chart.js"></script>
<link rel="stylesheet" href="materialize.min.css">
 
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">&nbsp;ANALITIK</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right">
        <li><a href="index.php">Back</a></li>
      </ul>
    </div>
  </nav>
		<h1><center>TABEL OBAT BERDASARKAN TAHUN KADALUARSA</center></h1>


	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>
	<!--
	Funtion membuat pilihan grafik tahun Kadaluarsa 
	Cendani Wukir Asih - 1700018249 -
	-->
	<form action="" method="post">  <!-- metode yang digunakan --->
		<label>PILIHAN CHART</label>
		<div class="input-field col s12" > 
			<select class="browser-default" name="area">
				<?php $options = array('pie', 'bar', 'line'); //pilihan grafiknya
				foreach ($options as $area) { //untuk perulangan
					$selected = @$_POST['area'] == $area ? ' selected="selected"' : '';				//menampilkan pilihan yang sudah dipilih 
					echo '<option value="' . $area . '"' . $selected . '>' . $area . '</option>';
				}?>
			</select>
            
		</div>
        <input class="waves-effect waves-light btn-small" type="submit" name="submit" value="Simpan"/>		<!-- untuk menyimpan apa yang sudah dipilih --->
	</form>
    <br>
    <center><a href="bulankadaluarsa.php" class="waves-effect waves-light btn-small">Berdasarkan Bulan</a></center>
	<table border="1">
		<thead>
			<tr>
				<th>KodeObat</th>
				<th>jumlah pasok</th>
				<th>tanggal pasok</th>
				<th>Tahun Kadaluarsa</th>
						
			</tr>
		</thead>
		<tbody>

			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"SELECT kode_obat,jumlah_pasok,tanggal_pasok,YEAR(tanggal_kadaluarsa) as TahunKadaluarsa FROM pasok");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					
					<td><?php echo $d['kode_obat']; ?></td>
					<td><?php echo $d['jumlah_pasok']; ?></td>
					<td><?php echo $d['tanggal_pasok']; ?></td>
					<td><?php echo $d['TahunKadaluarsa']; ?></td>
					
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: '<?php echo $pilihan ?>',
			data: {
				labels: [<?php 
					$TahunKadaluarsa= mysqli_query($koneksi, "SELECT YEAR(tanggal_kadaluarsa) as TahunKadaluarsa from pasok");
				while ($b = mysqli_fetch_array($TahunKadaluarsa)) { echo '"' . $b['TahunKadaluarsa'] . '",';} ?>
					],
				datasets: [{
					label: '',
					data: [<?php $jumlah_pasok = mysqli_query($koneksi, "SELECT jumlah_pasok from pasok");
while ($p = mysqli_fetch_array($jumlah_pasok)) { echo '"' . $p['jumlah_pasok'] . '",';}?>],
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