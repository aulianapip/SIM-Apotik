<!--1. Fitur Analitik 
	Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik.
	untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat.
	hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.
-->
<?php
$connect = mysqli_connect("localhost", "root", "", "sim-apotek");//Memanggil database yang telah kita buat
$tanggal_pasok = mysqli_query($connect, "SELECT *, SUM(jumlah_pasok), YEAR(tanggal_pasok) as tahun_pasok  from supplier WHERE nama_pemasok='Faobat' GROUP BY YEAR(tanggal_pasok) ORDER BY `supplier`.`tanggal_pasok` ASC");
//Query untuk menampilkan dan menjumlahkan pasok barang  dari sebuah pt.faobat bedasarkan Tahun ke tahun secara update
$jumlah_pasok = mysqli_query($connect, "SELECT SUM(jumlah_pasok) FROM supplier WHERE nama_pemasok='Faobat' GROUP BY YEAR(tanggal_pasok) ORDER BY `supplier`.`tanggal_pasok` ASC");
//Query untuk menampilkan dan menjumlakan jumlah pasok dengan pt.faobat bedasarkan tahun ke tahunnya secara Update

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="Chart.js/Chart.js"></script>
    <link rel="stylesheet" href="materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <style type="text/css">
    body{
        font-family: roboto;
    }

    table{
        margin: 0px auto;
    }
    </style>
<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">&nbsp;ANALITIK</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right">
        <li><a href="index.php">Back</a></li>
      </ul>
    </div>
  </nav>
  
    <div class="nav">
      <div class="col s12">
        <a href="index.php" class="black-text">Index</a> >
        <a href="GRAFIK_SUPPLIER_FAOBAT_JUMLAH_PASOK_BERDASARKAN_TAHUN.php" class="black-text">GRAFIK SUPPLIER FAOBAT JUMLAH PASOK BERDASARKAN TAHUN</a>
      </div>
    </div>
  

    <center>
        <h2>GRAFIK SUPPLIER FAOBAT JUMLAH PASOK BERDASARKAN TAHUN<h2/>
    </center>



    <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>

    <br/>
    <br/>
<center><a href="GRAFIK_SUPPLIER_FAOBAT_JUMLAH_PASOK_PADA_TAHUN_2018.php" class="waves-effect waves-light btn-small">2018</a></center>
    <table border="1">
        <thead>
            <tr>
                <th>no</th>
                <th>Nama Pemasok</th>
				<th>Tahun Pasok</th>
                <th>Jumlah Pasok</th>
				
        </thead>
        <tbody>
            <?php
            $no = 1;
            $data = mysqli_query($connect,"SELECT *, SUM(jumlah_pasok), YEAR(tanggal_pasok) as tahun_pasok from supplier WHERE nama_pemasok='Faobat' GROUP BY YEAR(tanggal_pasok) ORDER BY `supplier`.`tanggal_pasok` ASC");
            //Query untuk menampilkan dan menjumlahkan pasok barang  dari sebuah pt.faobat bedasarkan Tahun ke tahun secara update
			while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++;//untuk mengurutkan dari angka terkecil ke terbesar ?></td>
                    <td><?php echo $d['nama_pemasok'];//untuk menampilkan nama pemasok ?></td>
					<td><?php echo $d['tahun_pasok'];//untuk menampilkan tahun pasok ?></td>
                    <td><?php echo $d['SUM(jumlah_pasok)'];//untuk menampilkan dan menghitung jumlah pasok ?></td>
                </tr>
                <?php 
            }
            ?>
        </tbody>
    </table>

 <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($tanggal_pasok)) { echo '"' . $b['tahun_pasok'] . '",';}?>],//untuk menampilkkan grafik di sumbu x tahun pasok
                    datasets: [{
                            label: 'Jumlah',
                            data: [<?php while ($p = mysqli_fetch_array($jumlah_pasok)) { echo '"' . $p['SUM(jumlah_pasok)'] . '",';}?>],//untuk menampilkan grafik di sumbu y jumlah pasok dari tahun ke tahun
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
                                'rgba(255, 159, 64, 0.2)'
                            ],//menampilkan warna di sebuah chart yang telah kita buat.
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
        
</body>
</html>