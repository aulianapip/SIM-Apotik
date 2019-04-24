<?php 
// Nama : Meliya Kurniasari
// NIM  : 1700018244
// Kelas: E

// Fungsi grafik obat kadaluarsa berdasarkan bulan ditahun 2019

/*1. Fitur Analitik 
    Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik. untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat. hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.
*/

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

		<h1><center>Grafik Obat Berdasarkan Bulan Kadaluarsa Tahun 2019</center></h1>
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
			$no = 1;//fungsi deklarasi memberi urut nomor
			$data = mysqli_query($connect,"select * from obat where tahun_kadaluarsa='2019'");//query untuk menampilkan obat berdasarkan tahun kadaluarsa
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama_obat'];//menampilkan isi dari atribut nama_obat ?></td>
					<td><?php echo $d['tanggal_kadaluarsa'];//menampilkan isi dari atribut tanggal_kadaluarsa ?></td>
					<td><?php echo $d['bulan_kadaluarsa'];//menampilkan isi dari atribut bulan_kadauarsa ?></td>
					<td><?php echo $d['tahun_kadaluarsa']; //menampilkan isi dari atribut tahun_kadauarsa ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');//untuk memanggil chart
		var myChart = new Chart(ctx, {
			type: 'bar',//untuk membuat grafik berbentuk batang
			data: {
				labels: ["Januari", "Februari", "Maret","April", "Mei", "Juni","Juli", "Agustus", "September","Oktober", "November", "Desember"],//untuk menampilkan grafik di sumbu x yaitu bulan kadaluarsa
				datasets: [{
					//untuk menampilkan grafik di sumbu y yaitu jumlah obat kadaluarsa berdasarkan bulan ditahun 2019
					label: '',
					data: [
					//query untuk menampilkan jumlah obat kadaluarsa bulan januari 2019
					<?php 
					$jumlah_1= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='Januari' and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_1);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan februari 2019
					<?php  
					$jumlah_2= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='Februari'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_2);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan maret 2019
					<?php 
					$jumlah_3= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='Maret'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_3);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan april 2019
					<?php 
					$jumlah_4= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='April'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_4);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan mei 2019
					<?php 
					$jumlah_5= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='Mei'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_5);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan juni 2019
					<?php 
					$jumlah_6= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='Juni'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_6);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan juli 2019
					<?php 
					$jumlah_7= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='Juli'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_7);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan agutus 2019
					<?php 
					$jumlah_8= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='Agustus'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_8);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan september 2019
					<?php 
					$jumlah_9= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='September'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_9);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan oktober 2019
					<?php 
					$jumlah_10= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='Oktober'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_10);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan november 2019
					<?php 
					$jumlah_11= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='November'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_11);
					?>,
					//query untuk menampilkan jumlah obat kadaluarsa bulan desember 2019
					<?php 
					$jumlah_12= mysqli_query($connect, "SELECT * from obat where  bulan_kadaluarsa='Desember'  and tahun_kadaluarsa='2019'");
					echo mysqli_num_rows($jumlah_12);
					?>
					
					],
					backgroundColor: [//untuk memberi warna pada setiap grafik batang 
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
					borderColor: [//untuk memberi warna pada border setiap grafik batang 
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
					borderWidth: 1// untuk mengukur ketebalan pada border
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