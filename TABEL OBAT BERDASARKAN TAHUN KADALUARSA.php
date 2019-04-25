<!--1. Fitur Analitik 
	Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik. 
	untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat. hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.
-->

<!--
	Cendani Wukir Asih - 1700018249 -
	-->

<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek");
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
				<th>No</th>
				<th>Nama Obat</th>
				<th>Tanggal Kadaluarsa</th>
				<th>Bulan Kadaluarsa</th>
				<th>Tahun Kadaluarsa</th>				
			</tr>
		</thead>
		<tbody>

			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"select * from obat ORDER BY `tahun_kadaluarsa` ASC");
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

	<?php
	$pilihan = $_POST['area'];// variabel pilihan untuk memilih grafik apa yang akan digunakan
	if (isset($_POST['submit'])) { 
		echo '<li>Lokasi: ' . $pilihan . '</li>';//fungsi untuk memanggil
	}?>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d'); //variabel untuk memanggil data grafiknya
		var myChart = new Chart(ctx, {
			type:"<?php echo $pilihan ?>",
						data: {

	
	//Funtion membuat grafik tahun Kadaluarsa 
	//Alya Masitha - 1700018236 -
				
				labels: ["2018", "2019", "2020"],//menampilkan tahun kadaluarsa pada sumbu x
				datasets: [{ // untuk menampilkan jumlah obat kadaluarsa berdasarkan tahun pada sumbu y
					label: '',
					data: [
					//Query data untuk menampilkan jumlah obat kadaluarsa pada tahun 2018
					<?php 
					$jumlah_1= mysqli_query($koneksi, "SELECT * from obat where  tahun_kadaluarsa='2018'");
					echo mysqli_num_rows($jumlah_1);
					?>,
					//Query data untuk menampilkan jumlah obat kadaluarsa pada tahun 2019
					<?php 
					$jumlah_2= mysqli_query($koneksi, "SELECT * from obat where  tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_2);
					?>,
					//Query data untuk menampilkan jumlah obat kadaluarsa pada tahun 2020
					<?php 
					$jumlah_3= mysqli_query($koneksi, "SELECT * from obat where  tahun_kadaluarsa='2020'");
					echo mysqli_num_rows($jumlah_3);
					?>
					
					],
					//untuk memberikan warna pada grafik
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					//untuk memberikan warna pada grafik
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1 //untuk menampilkan ketebalan pada garis
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