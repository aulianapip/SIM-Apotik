<?php
//Yosalfa Bima Reynaldi
//1700018229
//UAS PRPL
//1. Fitur analitik adalah fitur untuk menganalisa data dari seluruh fitur yang ada di sistem informasi apotik. Untuk menganilisa dibuatlah berbagai macam grafik untuk membantu mepresntasikan hasil analisa yang telah dibuat. Hasil analisa tersebut juga dapat memebantu kita mengambil keputusan dimasa akan datang.
$connect = mysqli_connect("localhost", "root", "", "sim-apotek");
error_reporting(0); //untuk menghilangkan notif error pada program
    $bulan = $_POST['area']; //untuk variabel bulan
    $tahun = $_POST['area2'];//untuk variabel tahun
    $pilihan = $_POST['area3'];//membuat pilihan
    $urutan = $_POST['area4'];//membuat area nama
    if (isset($_POST['submit'])) { // untuk mensubmite post area
    }

$hari_penjualan = mysqli_query($connect, "SELECT DAY(tgl_penjualan) as hari_penjualan FROM penjualan WHERE MONTH(tgl_penjualan)='$bulan' and YEAR(tgl_penjualan)='$tahun' GROUP BY DAY(tgl_penjualan) ORDER BY SUM(total_penjualan) $urutan");//menampilkan data penjualan 
$jumlah_penjualanHari = mysqli_query($connect, "SELECT SUM(total_penjualan) as jumlah_penjualanHari FROM penjualan WHERE MONTH(tgl_penjualan)='$bulan' and YEAR(tgl_penjualan)='$tahun' GROUP BY DAY(tgl_penjualan) ORDER BY SUM(total_penjualan) $urutan");//query untuk menampilkan tanggal jual
?>
<html>
    <head>
        
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
        <li><a href="index.php">Back</a></li><!--mengembalikan tampilan ke semula -->
      </ul>
    </div>
  </nav>
  
    <center>
    <h4>GRAFIK PENJUALAN BERDASARKAN TANGGAL
        <?php 
            echo 'PADA BULAN'. ' '.$bulan.'';//mengeluarkan sebuah outputkan pada bulan
            echo ' PADA TAHUN'. ' '.$tahun.'';//menegluarkan sebuah outputan pada tahun
            echo ' URUTAN'. ' '.$urutan.'';//mengeluarkan sebuah outputan pada urutan
         ?>
        
    </h4></center>
    <table border="1">
        <thead>
            <tr>
                <th>tanggal</th>
                <th>jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $data = mysqli_query($connect,"SELECT DAY(tgl_penjualan) as tanggal, SUM(total_penjualan) as jumlah FROM penjualan WHERE MONTH(tgl_penjualan)='$bulan' and YEAR(tgl_penjualan)='$tahun' GROUP BY DAY(tgl_penjualan) ORDER BY SUM(total_penjualan) $urutan");//query untuk menghitung total penjualan dari hari ke hari
            while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $d['tanggal']; ?></td>
                    <td><?php echo $d['jumlah']; ?></td>
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
                type: '<?php echo $pilihan ?>',//untuk memeilih sebuah pilihan chart
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($hari_penjualan)) { echo '"' . $b['hari_penjualan'] . '",';}?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php while ($p = mysqli_fetch_array($jumlah_penjualanHari)) { echo '"' . $p['jumlah_penjualanHari'] . '",';}?>],
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
    <label>Pilih Bulan</label>
       <div class="input-field col s12" >
            <select class="browser-default" name="area"">
                <?php
                $bulan_penjualan = mysqli_query($connect, "SELECT MONTH(tgl_penjualan) as bulan_penjualan FROM penjualan WHERE tgl_penjualan GROUP BY DAY(tgl_penjualan) ");
                 $options = mysqli_fetch_array($bulan_penjualan); // menampilkan nama pada opsi area 
                foreach ($options as $area) { // opsi pada form area
                    $selected = @$_POST['area'] == $area ? ' selected="selected"' : ''; // fungsi memeilih opsi area
                    echo '<option value="' . $area . '"' . $selected . '>' . $area . '</option>'; // untuk membuat tabel dari nama nama pada opsi
                }?>
            </select>
        </div>
       <label>Pilih Tahun</label>
       <div class="input-field col s12" >
            <select class="browser-default" name="area2"">
                <?php
                $tahun_penjualan = mysqli_query($connect, "SELECT YEAR(tgl_penjualan) as tahun_penjualan FROM penjualan WHERE tgl_penjualan GROUP BY DAY(tgl_penjualan) ");
                 $options2 = mysqli_fetch_array($tahun_penjualan); // menampilkan nama pada opsi area 
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
