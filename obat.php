<?php
$connect = mysqli_connect("localhost", "root", "", "sim-apotek");
error_reporting(0); //untuk menghilangkan notif error pada program
    $bulan = $_POST['area']; 
    $tahun = $_POST['area2'];
    $pilihan = $_POST['area3'];
    $urutan = $_POST['area4'];//membuat area nama
    if (isset($_POST['submit'])) { // untuk mensubmite post area
    }
$nama_obat = mysqli_query($connect, "SELECT obat.nama_obat FROM obat,pasok WHERE obat.kode_obat=pasok.kode_obat ORDER BY obat.kode_obat='$urutan'");
$Stock_Obat = mysqli_query($connect, "SELECT pasok.jumlah_pasok FROM obat,pasok WHERE obat.kode_obat=pasok.kode_obat ORDER BY obat.kode_obat='$urutan'");
?>
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
  
<center>
    <h3>GRAFIK KEUNTUNGAN BERDASARKAN TANGGAL
        <?php 
            echo ' URUTAN'. ' '.$urutan.'';
         ?>
        
    </h3></center>
    
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Harga Obat</th>
                <th>Kode Obat</th>
                <th>Jenis</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Bulan Kadaluarsa</th>
                <th>Tahun Kadaluarsa</th>
                <th>Stok Obat</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $data = mysqli_query($connect,"SELECT obat.nama_obat, obat.harga, obat.kode_obat, obat.jenis, DAY(tanggal_kadaluarsa) as tgl_kadaluarsa, MONTH(tanggal_kadaluarsa) as bulan_kadaluarsa, YEAR(tanggal_kadaluarsa) as tahun_kadaluarsa, pasok.jumlah_pasok from obat,pasok WHERE obat.kode_obat=pasok.kode_obat GROUP BY obat.nama_obat");
            while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama_obat']; ?></td>
                    <td><?php echo $d['harga']; ?></td>
                    <td><?php echo $d['kode_obat']; ?></td>
                    <td><?php echo $d['jenis']; ?></td>
                    <td><?php echo $d['tgl_kadaluarsa']; ?></td>
                    <td><?php echo $d['bulan_kadaluarsa']; ?></td>
                    <td><?php echo $d['tahun_kadaluarsa']; ?></td>
                    <td><?php echo $d['jumlah_pasok']; ?></td>
                    </tr>
                <?php 
            }
            ?>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: '<?php echo $pilihan ?>',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($nama_obat)) { echo '"' . $b['nama_obat'] . '",';}?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php while ($p = mysqli_fetch_array($Stock_Obat)) { echo '"' . $p['jumlah_pasok'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                 'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
         <form action="" method="post">
        <label>Pilih Chart</label>
        <div class="input-field col s12" > 
            <select class="browser-default" name="area3">
                <?php $options3 = array('pie', 'bar', 'line'); //pilihan grafiknya
                foreach ($options3 as $area3) { //untuk perulangan
                    $selected = @$_POST['area3'] == $area3 ? ' selected3="selected3"' : '';             //menampilkan pilihan yang sudah dipilih 
                    echo '<option value="' . $area3 . '"' . $selected3 . '>' . $area3 . '</option>';
                }?>
            </select>
        </div>
        <label>Pilih Urutan</label>
        <div class="input-field col s12" > 
            <select class="browser-default" name="area4">
                <?php $options4 = array('ASC', 'DESC'); //pilihan grafiknya
                foreach ($options4 as $area4) { //untuk perulangan
                    $selected = @$_POST['area4'] == $area4 ? ' selected4="selected4"' : '';             //menampilkan pilihan yang sudah dipilih 
                    echo '<option value="' . $area4 . '"' . $selected4 . '>' . $area4 . '</option>';
                }?>
            </select>
        </div>
        <div class="row">
            <input class="waves-effect waves-light btn-small" type="submit" name="submit" value="oke"/>
        </div>
    </form>
        
    </body>
</html>