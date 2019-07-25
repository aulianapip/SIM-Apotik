<?php

// Nama  : Alya Masitha
// NIM   : 1700018236
// Kelas : E

/*1. Fitur Analitik 
    Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik. untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat. hasil analisa tersebut juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.*/

$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek"); //Memanggil database yang telah kita buat
error_reporting(0); //untuk menghilangkan notif error pada program
    $pilihan = $_POST['area3'];
    $urutan = $_POST['area4'];//membuat area nama
    if (isset($_POST['submit'])) { // untuk mensubmite post area
    }
    ?>
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

	


<?php
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek");//menghubungkan ke database
?>
<center> <h3>GRAFIK KEUNTUNGAN BERDASARKAN Tahun
        <?php 
      
            echo ' URUTAN'. ' '.$urutan.'';
         ?>
        
    </h3></center>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>
	<form action="" method="post">
        <label>Pilih Chart</label>
		<div class="input-field col s12" > 
			<select class="browser-default" name="area3">
				<?php $options3 = array('pie', 'bar', 'line'); //pilihan grafiknya
				foreach ($options3 as $area3) { //untuk perulangan
					$selected = @$_POST['area3'] == $area3 ? ' selected3="selected3"' : '';//menampilkan pilihan yang sudah dipilih 
					echo '<option value="' . $area3 . '"' . $selected3 . '>' . $area3 . '</option>';
				}?>
			</select>
		</div>
		<label>Pilih Urutan</label>
		<div class="input-field col s12" > 
			<select class="browser-default" name="area4">
				<?php $options4 = array('ASC', 'DESC'); //pilihan grafiknya
				foreach ($options4 as $area4) { //untuk perulangan
					$selected = @$_POST['area4'] == $area4 ? ' selected4="selected4"' : '';//menampilkan pilihan yang sudah dipilih 
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
				<th>No</th><!--untuk menampilkan judul atribut No pada tabel-->
				<th>Nama Obat</th><!--untuk menampilkan judul Nama obat atribut pada tabel-->
				<th>Kode Obat</th><!--untuk menampilkan judul atribut Kode obat pada tabel-->
				<th>Harga Beli</th><!--untuk menampilkan judul atribut Harga beli pada tabel-->
				<th>Harga Jual</th><!--untuk menampilkan judul atribut Harga jual pada tabel-->
				<th>Keuntungan</th><!--untuk menampilkan judul atribut keuntungan pada tabel-->
				<th>Bulan</th><!--untuk menampilkan judul atribut bulan pada tabel-->
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"SELECT obat.nama_obat as nama, pasok.kode_obat as kode, pasok.harga_beli as harga_beli ,penjualan_detail.harga as harga_jual, penjualan_detail.harga-pasok.harga_beli as keuntungan, MONTH(tgl_penjualan) as tanggal_jual FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat GROUP BY pasok.kode_obat ORDER BY keuntungan $urutan");//untuk menampilkan data keterangan pada tabel dibawah grafik 
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama'];//untuk memanggil atribut nama pada tabel?></td>
					<td><?php echo $d['kode'];//untuk memanggil atribut kode pada tabel?></td>
					<td><?php echo $d['harga_beli'];//untuk memanggil atribut harga beli pada tabel?></td>
					<td><?php echo $d['harga_jual'];//untuk memanggil atribut harga jual pada tabel?></td>
					<td><?php echo $d['keuntungan'];//untuk memanggil atribut keuntungan pada tabel?></td>
					<td><?php echo $d['tanggal_jual'];//untuk memanggil atribut tanggal jual pada tabel?></td>				
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');//untuk memanggil grafik
		var myChart = new Chart(ctx, {
			type: '<?php echo $pilihan ?>',//memanggil menu pilihan pada grafik
			data: {
				labels: [<?php 
					$tanggal_jual= mysqli_query($koneksi, "SELECT YEAR(tgl_penjualan) as tanggal_jual FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat GROUP BY pasok.kode_obat");//untuk menampilkan tanggal penjualan
				while ($b = mysqli_fetch_array($tanggal_jual)) { echo '"' . $b['tanggal_jual'] . '",';} ?>
					],
				datasets: [{
					label: '',
					data: [<?php $keuntungan = mysqli_query($koneksi, "SELECT penjualan_detail.harga-pasok.harga_beli as keuntungan FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat GROUP BY pasok.kode_obat");//untuk menampilkan jumlah keuntungan
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