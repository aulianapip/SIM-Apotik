<!--
//Nama : Zulfikar Ulya Zen
//Nim : 1700018230
//Kelas : E

1. Fitur Analitik 
	Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik.
	untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat.
	hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.
-->

<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek"); //Memanggil database yang telah kita buat
error_reporting(0); //untuk menghilangkan notif error pada program
$pilihan = $_POST['area1'];
    $urutan = $_POST['area2'];//membuat area nama
    if (isset($_POST['submit'])) { // untuk mensubmite post area
    }
    ?>
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

		<h1><center>GRAFIK PELANGGAN BERDASARKAN JUMLAH BELI</center></h1>


<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek");
?>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<form action="" method="post">
    	<!--Alya Masitha 1700018236-->
        <label>Pilih Chart</label>
		<div class="input-field col s12" > 
			<select class="browser-default" name="area1">
				<?php $options3 = array('pie', 'bar', 'line'); //pilihan grafiknya
				foreach ($options3 as $area3) { //untuk perulangan
					$selected = @$_POST['area3'] == $area3 ? ' selected3="selected3"' : '';				//menampilkan pilihan yang sudah dipilih 
					echo '<option value="' . $area3 . '"' . $selected3 . '>' . $area3 . '</option>';
				}?>
			</select>
		</div>
		<label>Pilih Urutan</label>
		<div class="input-field col s12" > 
			<select class="browser-default" name="area2">
				<?php $options4 = array('ASC', 'DESC'); //pilihan grafiknya
				foreach ($options4 as $area4) { //untuk perulangan
					$selected = @$_POST['area4'] == $area4 ? ' selected4="selected4"' : '';				//menampilkan pilihan yang sudah dipilih 
					echo '<option value="' . $area4 . '"' . $selected4 . '>' . $area4 . '</option>';
				}?>
			</select>
		</div>
        <div class="row">
            <input class="waves-effect waves-light btn-small" type="submit" name="submit" value="oke"/>
        </div>
    </form>

	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan</th>
				<th>ID</th>
				<th>Total Penjualan</th>
				
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"SELECT pelanggan.nama AS nama, pelanggan.ID as id ,SUM(penjualan.total_penjualan) as total_penjualan FROM penjualan, pelanggan where pelanggan.ID=penjualan.id_pelanggan GROUP BY pelanggan.ID ORDER BY SUM(penjualan.total_penjualan) $urutan");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['id']; ?></td>
					<td><?php echo $d['total_penjualan']; ?></td>					
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
					$nama= mysqli_query($koneksi, "SELECT pelanggan.nama AS nama FROM penjualan, pelanggan where pelanggan.ID=penjualan.id_pelanggan GROUP BY pelanggan.ID ORDER BY SUM(penjualan.total_penjualan) $urutan");
				while ($b = mysqli_fetch_array($nama)) { echo '"' . $b['nama'] . '",';} ?>
					],
				datasets: [{
					label: '',
					data: [<?php $total_penjualan = mysqli_query($koneksi, "SELECT SUM(penjualan.total_penjualan) as total_penjualan FROM penjualan, pelanggan where pelanggan.ID=penjualan.id_pelanggan GROUP BY pelanggan.ID ORDER BY SUM(penjualan.total_penjualan) $urutan");
while ($p = mysqli_fetch_array($total_penjualan)) { echo '"' . $p['total_penjualan'] . '",';}?>],
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