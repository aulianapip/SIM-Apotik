<?php
// Nama  : Meliya Kurniasari
// NIM   : 1700018244
// Kelas : E

/*1. Fitur Analitik 
    Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik. untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat. hasil analisa tersebut juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.*/
$koneksi = mysqli_connect("localhost", "root", "", "sim-apotek"); //Memanggil database yang telah kita buat
error_reporting(0); //untuk menghilangkan notif error pada program
    $tahun = $_POST['area2'];
    $pilihan = $_POST['area3'];
    $urutan = $_POST['area4'];//membuat area nama
    if (isset($_POST['submit'])) { // untuk mensubmite post area
    }
    ?>

<!DOCTYPE html>
<html>

<head>
	<title>GRAFIK KEUNTUNGAN PENJUALAN BERDASARKAN BULAN</title><!-- untuk membuat judul grafik -->
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

   <center> <h3>GRAFIK KEUNTUNGAN BERDASARKAN BULAN
        <?php 
            echo ' PADA TAHUN'. ' '.$tahun.'';
            echo ' URUTAN'. ' '.$urutan.'';
         ?>
        
    </h3></center>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>
	<form action="" method="post">
       <label>Pilih Tahun</label>
       <div class="input-field col s12" >
            <select class="browser-default" name="area2"">
                <?php
                $tahun_jual = mysqli_query($koneksi, "SELECT YEAR(tgl_penjualan) as bulan_jual FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat GROUP BY pasok.kode_obat");
                 $options2 = mysqli_fetch_array($tahun_jual); // menampilkan nama pada opsi area 
                foreach ($options2 as $area2) { // opsi pada form area
                    $selected2 = @$_POST['area2'] == $area2 ? ' selected2="selected2"' : ''; // fungsi memeilih opsi area
                    echo '<option value="' . $area2 . '"' . $selected2 . '>' . $area2 . '</option>'; // untuk membuat tabel dari nama nama pada opsi
                }?>
            </select>
        </div>
        <label>Pilih Chart</label>
		<div class="input-field col s12" > 
			<select class="browser-default" name="area3">
				<?php $options3 = array('pie', 'bar', 'line'); //pilihan grafiknya
				foreach ($options3 as $area3) { //untuk perulangan
					$selected = @$_POST['area3'] == $area3 ? ' selected3="selected3"' : '';				//menampilkan pilihan yang sudah dipilih 
					echo '<option value="' . $area3 . '"' . $selected3 . '>' . $area3 . '</option>';
				}?>
			</select>
		</div>
		<label>Pilih Urutan</label>
		<div class="input-field col s12" > 
			<select class="browser-default" name="area4">
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
				<th>No</th><!--untuk menampilkan judul atribut No yang ada pada tabel-->
				<th>Nama Obat</th><!--untuk menampilkan judul atribut Nama obat yang ada pada tabel-->
				<th>Kode Obat</th><!--untuk menampilkan judul atribut kode obat yang ada pada tabel-->
				<th>Harga Beli</th><!--untuk menampilkan judul atribut harga beli yang ada pada tabel-->
				<th>Harga Jual</th><!--untuk menampilkan judul atribut haga jual yang ada pada tabel-->
				<th>Keuntungan</th><!--untuk menampilkan judul atribut keuntungan yang ada pada tabel-->
				<th>Bulan</th><!--untuk menampilkan judul atribut bulan yang ada pada tabel-->
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"SELECT obat.nama_obat as nama, pasok.kode_obat as kode, pasok.harga_beli as harga_beli ,penjualan_detail.harga as harga_jual, penjualan_detail.harga-pasok.harga_beli as keuntungan, MONTH(tgl_penjualan) as tanggal_jual FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat and YEAR(tgl_penjualan)='$tahun' GROUP BY pasok.kode_obat ORDER BY keuntungan $urutan");//untuk menampilkan tabel data keuntungan berdasarkan bulan yang ada dibawah grafik
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama'];//untuk memanggil nama yang ada pada tabel ?></td>
					<td><?php echo $d['kode'];//untuk memanggil kode yang adda pada tabel ?></td>
					<td><?php echo $d['harga_beli'];//untuk memanggil harga beli yang ada pada tabel ?></td>
					<td><?php echo $d['harga_jual'];//untuk memanggil harga jual yang ada pada tabel ?></td>
					<td><?php echo $d['keuntungan'];//untuk memanggil keuntungan yang ada pada tabel ?></td>
					<td><?php echo $d['tanggal_jual'];//untuk memanggil tanggal jual yang ada pada tabel  ?></td>				
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');//untuk memanggil fungsi grafik
		var myChart = new Chart(ctx, {
			type: '<?php echo $pilihan ?>',//untuk memilih tipe grafik
			data: {
				labels: [<?php 
					$tanggal_jual= mysqli_query($koneksi, "SELECT MONTH(tgl_penjualan) as tanggal_jual FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat and YEAR(tgl_penjualan)='$tahun' GROUP BY pasok.kode_obat ORDER BY penjualan_detail.harga-pasok.harga_beli $urutan");//untuk menampilkan bulan jual jika grafik dipilih
				while ($b = mysqli_fetch_array($tanggal_jual)) { echo '"' . $b['tanggal_jual'] . '",';} ?>
					],
				datasets: [{
					label: '',
					data: [<?php $keuntungan = mysqli_query($koneksi, "SELECT penjualan_detail.harga-pasok.harga_beli as keuntungan FROM obat, penjualan_detail, pasok, penjualan WHERE obat.kode_obat=pasok.kode_obat and obat.kode_obat=penjualan_detail.kode_obat and YEAR(tgl_penjualan)='$tahun' GROUP BY pasok.kode_obat ORDER BY keuntungan $urutan");//untuk menampilkan data keuntungan berdasarkan bulan jika grafik dipilih
while ($p = mysqli_fetch_array($keuntungan)) { echo '"' . $p['keuntungan'] . '",';}?>],
                            backgroundColor: [//untuk memberi warna pada grafik
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