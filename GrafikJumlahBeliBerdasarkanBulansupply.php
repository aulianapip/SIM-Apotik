<?php
$connect = mysqli_connect("localhost", "root", "", "sim-apotek");
error_reporting(0); //untuk menghilangkan notif error pada program
    $tahun = $_POST['area2'];
    $pilihan = $_POST['area3'];
    $urutan = $_POST['area4'];//membuat area nama
    if (isset($_POST['submit'])) { // untuk mensubmite post area
    }

$bulan = mysqli_query($connect, "SELECT Month(tanggal_pasok) as bulan FROM pasok, supplier WHERE supplier.kode_supplier=pasok.kode_supplier and YEAR(tanggal_pasok)='$tahun' GROUP BY Month(tanggal_pasok) ORDER BY jumlah_pasok $urutan");
$jumlah = mysqli_query($connect, "SELECT jumlah_pasok as jumlah FROM pasok, supplier WHERE supplier.kode_supplier=pasok.kode_supplier and YEAR(tanggal_pasok)='$tahun' GROUP BY Month(tanggal_pasok) ORDER BY jumlah_pasok $urutan"); 

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
    <h3>GRAFIK SUPPLY BERDASARKAN BULAN
        <?php 
            echo ' PADA TAHUN'. ' '.$tahun.'';
            echo ' URUTAN'. ' '.$urutan.'';
         ?>
        
    </h3></center>
    
    
    <table border="1">
        <thead>
            <tr>
                <th>Nama Pemasok</th>
                <th>Kode Supplier</th>
                <th>Bulan</th>
                <th>jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $data = mysqli_query($connect,"SELECT supplier.nama_pemasok, supplier.kode_supplier,MONTH(tanggal_pasok) as bulan, jumlah_pasok as jumlah FROM pasok, supplier WHERE supplier.kode_supplier=pasok.kode_supplier and YEAR(tanggal_pasok)='$tahun' ORDER BY jumlah $urutan");
            while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $d['nama_pemasok']; ?></td>
                    <td><?php echo $d['kode_supplier']; ?></td>
                    <td><?php echo $d['bulan']; ?></td>
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
                type: '<?php echo $pilihan ?>',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['bulan'] . '",';}?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php while ($p = mysqli_fetch_array($jumlah)) { echo '"' . $p['jumlah'] . '",';}?>],
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
       <label>Pilih Tahun</label>
       <div class="input-field col s12" >
            <select class="browser-default" name="area2"">
                <?php
                $tahun_pasok = mysqli_query($connect, "SELECT YEAR(tanggal_pasok) as tahun_pasok FROM pasok, supplier WHERE supplier.kode_supplier=pasok.kode_supplier ");
                 $options2 = mysqli_fetch_array($tahun_pasok); // menampilkan nama pada opsi area 
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