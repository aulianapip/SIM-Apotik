<!--1. Fitur Analitik 
	Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik.
	untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat.
	hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.
-->
<?php
$connect = mysqli_connect("localhost", "root", "", "sim-apotek");#pemanggilan Database
$tanggal_pasok = mysqli_query($connect, "SELECT *, SUM(jumlah_pasok), MONTH(tanggal_pasok) as bulan_pasok  from supplier WHERE YEAR(tanggal_pasok)=2018 AND nama_pemasok='Faobat' GROUP BY MONTH(tanggal_pasok) ORDER BY `supplier`.`tanggal_pasok` ASC"); 
#Menampilkan Jumlah Dari Atribut Jumlah_Pasok ,Menampilkan Nama-Nama Bulan Dari Atribut Tangal_pasok berdasarkan supplier,Pada Tahun 2018 dari atribut tanggal_pasok dan nama pemasok "Faobat" dari atribut nama_pemasok
$jumlah_pasok = mysqli_query($connect, "SELECT SUM(jumlah_pasok) FROM supplier WHERE nama_pemasok='Faobat' GROUP BY MONTH(tanggal_pasok) ORDER BY `supplier`.`tanggal_pasok` ASC");
#Menampilkan Jumlah dari atribut jumlah_pasok berdasarkan supplier berdasarkan nama_pemasok adalah "faobat" pengelompokan berdasarkan bulan dari atribut tanggal_pasok


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="Chart.js/Chart.js"></script>
    <link rel="stylesheet" href="materialize.min.css"> 	
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
        <li><a href="index.php">Menu</a></li>
        <li><a href="GRAFIK_SUPPLIER_FAOBAT_JUMLAH_PASOK_BERDASARKAN_TAHUN.php">Back</a></li>
      </ul>
    </div>
  </nav>
  
    <div class="nav">
      <div class="col s12">
        <a href="index.php" class="black-text">Index</a> >
        <a href="GRAFIK_SUPPLIER_FAOBAT_JUMLAH_PASOK_BERDASARKAN_TAHUN.php" class="black-text">GRAFIK SUPPLIER FAOBAT JUMLAH PASOK BERDASARKAN TAHUN</a> >
        <a href="GRAFIK_SUPPLIER_FAOBAT_JUMLAH_PASOK_PADA_TAHUN_2018.php" class="black-text">GRAFIK SUPPLIER FAOBAT JUMLAH PASOK PADA TAHUN 2018</a>
      </div>
    </div>
  

    <center>
        <h2>GRAFIK SUPPLIER FAOBAT JUMLAH PASOK PADA TAHUN 2018<h2/>
    </center>

    <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>

    <br/>
    <br/>

    <table border="1">
        <thead>
            <tr>
                <th>no</th>
                <th>Nama Pemasok</th>
				<th>Bulan Pasok</th>
                <th>Jumlah Pasok</th>
				
        </thead>
        <tbody>
            <?php
            $no = 1;
            $data = mysqli_query($connect,"SELECT *, SUM(jumlah_pasok), MONTH(tanggal_pasok) as bulan_pasok from supplier WHERE YEAR(tanggal_pasok)=2018 AND nama_pemasok='Faobat' GROUP BY MONTH(tanggal_pasok) ORDER BY `supplier`.`tanggal_pasok` ASC");
			#Menampilkan Jumlah Dari Atribut Jumlah_Pasok ,Menampilkan Nama-Nama Bulan Dari Atribut Tangal_pasok berdasarkan supplier,Pada Tahun 2018 dari atribut tanggal_pasok dan nama pemasok "Faobat" dari atribut nama_pemasok
            while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; #untuk membuat dan mengurutkan nomer secara otomatis?></td>
                    <td><?php echo $d['nama_pemasok']; #menampilan isi dari atribut nama pemasok?></td>
					<td><?php echo $d['bulan_pasok']; #menampilan isi dari atribut bulan pemasok?></td>
                    <td><?php echo $d['SUM(jumlah_pasok)']; #menampilan isi dari atribut jumlah pemasok?></td>
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
                    labels: [<?php while ($b = mysqli_fetch_array($tanggal_pasok)) { echo '"' . $b['bulan_pasok'] . '",';} #menampilkan nama label pada chart bar berdasarkan atribut bulan_pasok ?>],
                    datasets: [{
                            label: 'Jumlah',
                            data: [<?php while ($p = mysqli_fetch_array($jumlah_pasok)) { echo '"' . $p['SUM(jumlah_pasok)'] . '",';} #menampilkan grafik jumlah berdasarkan atribut jumlah_pasok pada chart bar ?>],
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
</body>
</html>