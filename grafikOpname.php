<!--1. Fitur Analitik 
	Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik.
	untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat.
	hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.
-->
<?php
//Nama : Yoga firza Sabbihisma
//Nim : 1700018253
//Kelas : E
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
	<script type="text/javascript" src="Chart.js/Chart.js"></script>
    <link rel="stylesheet" href="materialize.min.css">
</head>
<body>
<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">&nbsp;ANALITIK</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right">
      	<li><a href="index.php">Menu</a></li><!--untuk kembali ke menu-->
        <li><a href="index.php">Back</a></li><!--untuk kembali ke pilihan sebelumnya-->
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
    
<!--Nama : Yoga firza Sabbihisma
Nim : 1700018253
Kelas : E -->
     <center>
    <h3>GRAFIK OPNAME
        <?php 
            echo ' URUTAN'. ' '.$urutan.'';
         ?>
         </h3></center>
    <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>
    <form action="" method="post">
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


<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek");
?>

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
			$data = mysqli_query($koneksi,"SELECT status,COUNT(status) as jumlah FROM `opname`GROUP BY status ORDER BY COUNT(status)  $urutan ");  //Query untuk menampilkan dan menjumlahkan status  dari opname bedasarkan status secara update - Yoga Firza Sabbihisma
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					
					<td><?php echo $d['status']; //untuk menampilkan status?></td>
					<td><?php echo $d['jumlah']; //untuk menampilkan jumlah?></td>
									
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart">
	<script>

		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: '<?php echo $pilihan ?>',
			data: {
				labels: [<?php 
					$status= mysqli_query($koneksi, "SELECT status FROM `opname`GROUP BY status ORDER BY COUNT(status) $urutan ");//Memanggil Status  -Yoga Firza Sabbihisma -1700018253-
				while ($b = mysqli_fetch_array($status)) { echo '"' . $b['status'] . '",';} ?>
					],
				datasets: [{
					label: '',
					data: [<?php $jumlah = mysqli_query($koneksi, "SELECT COUNT(status) as jumlah FROM `opname`GROUP BY status ORDER BY COUNT(status) $urutan");//Memanggil Jumlah Status  -Yoga Firza Sabbihisma -1700018253-
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
	</canvas>
	</div>
</body>
</html>