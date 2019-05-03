<?php	
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek");
?>
<!DOCTYPE html>
<html>
<!--1. Fitur Analitik 
	Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik. untuk menganalisa dibuatlah berbagai macam grafik untuk 
	membantu merepresentasi hasil analisa yang telah dibuat. hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan 
	dimasa yang akan datang.
-->
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
	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>

	<center>
		<h2>GRAFIK STOCK DARI KESELURUHAN SUPPLIER</br>TAHUN 2019</h2>
	</center>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>


	<table border="1">
		<thead>
			<tr>
				<th>Pemasok</th>
				<th>Nama Obat</th>
				<th>Jumlah Pasok</th>
				<th>Harga Beli</th>
				<th>Tanggal Pasok</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			// query untuk menampilkan data dari tabel supplier dan obat, 
			// tabel obat menampilkan kolom nama obat, dan menampilkan tabel supplier
			// diurutkan berdasarkan tanggal dan bulan pasok di tahun 2019
			$data = mysqli_query($koneksi,"SELECT * FROM supplier, obat WHERE supplier.kode_obat=obat.kode_obat 
			 		AND YEAR(tanggal_pasok) = 2019");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<!--untuk menampilkan isi tabel-->
					<td><?php echo $d['nama_pemasok']; ?></td>
					<td><?php echo $d['nama_obat']; ?></td>
					<td><?php echo $d['jumlah_pasok']; ?></td>
					<td><?php echo $d['harga_beli']; ?></td>
					<td><?php echo $d['tanggal_pasok']; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>

	<script>
		//menampilkan grafik 2D
		var ctx = document.getElementById("myChart").getContext('2d');  
		var myChart = new Chart(ctx, { 
			type: 'bar',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: '',
					data: [
					
						<?php $simpan = array(); //data bulan disimpan dalam bentuk array
								for ($i=1; $i<12; $i++){ //membuat perulangan untuk bulan 1 sampai 12
									//query untuk mengambil data total pasok keseluruhan supplier hanya pada bulan tertentu 
								$query = "SELECT sum(jumlah_pasok) as jumlah_pasok FROM supplier WHERE MONTH(tanggal_pasok)=$i AND YEAR(tanggal_pasok) = 2019";
								$result = mysqli_query($koneksi, $query); //memanggil data dari variabel $koneksi dan $query
								$data = mysqli_fetch_array($result); //mengurutkan dari tanggal paling awal
								$simpan[$i] = $data['jumlah_pasok']; //mengurutkan bulan dari bulan ke - 1 sampai 12
								echo $simpan[$i].",";}?> //menampilkan hasil dari variabel $simpan
					],

					backgroundColor: [
					'rgba(255, 99, 132, 0.2)', //warna grafik untuk bulan Januari
					'rgba(54, 162, 235, 0.2)', //warna grafik untuk bulan Februari
					'rgba(255, 206, 86, 0.2)', //warna grafik untuk bulan Maret
					'rgba(75, 192, 192, 0.2)', //warna grafik untuk bulan April
                    'rgba(55, 172, 168, 0.2)', //warna grafik untuk bulan Mei
					'rgba(9, 112, 84, 0.2)', //warna grafik untuk bulan Juni
					'rgba(255, 222, 0, 0.2)', //warna grafik untuk bulan Juli
					'rgba(255, 222, 0, 0.2)', //warna grafik untuk bulan Agustus
					'rgba(255, 99, 132, 0.2)', //warna grafik untuk bulan September
					'rgba(54, 162, 235, 0.2)', //warna grafik untuk bulan Oktober
					'rgba(255, 206, 86, 0.2)', //warna grafik untuk bulan November
					'rgba(75, 192, 192, 0.2)' //warna grafik untuk bulan Desember
					
					],
					borderColor: [
					'rgba(255, 99, 132, 1)', //warna grafik untuk bulan Januari
					'rgba(54, 162, 235, 1)', //warna grafik untuk bulan Februari
					'rgba(255, 206, 86, 1)', //warna grafik untuk bulan Maret
					'rgba(75, 192, 192, 1)', //warna grafik untuk bulan April
                    'rgba(55, 172, 168, 1)', //warna grafik untuk bulan Mei
					'rgba(9, 112, 84, 1)', //warna grafik untuk bulan Juni
					'rgba(255, 222, 0, 1)', //warna grafik untuk bulan Juli
					'rgba(255, 222, 0, 1)', //warna grafik untuk bulan Agustus
					'rgba(255, 99, 132, 1)', //warna grafik untuk bulan September
					'rgba(54, 162, 235, 1)', //warna grafik untuk bulan Oktober
					'rgba(255, 206, 86, 1)', //warna grafik untuk bulan November
					'rgba(75, 192, 192, 1)' //warna grafik untuk bulan Desember
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