<!-- JAWABAN UTS PRPL
NAMA 	: Zulfikar Ulya Zen
NIM 	: 1700018230
Kelas 	: E
-->

<!--1. Fitur Analitik 
Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik. 
untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat. 
hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.
-->

<?php
$connect = mysqli_connect("localhost", "root", "", "sim-apotek"); //untuk mengkoneksikan database sim-apotek.
$nama_pemasok = mysqli_query($connect, "SELECT nama_pemasok FROM supplier,pasok WHERE supplier.kode_supplier=pasok.kode_supplier order by kode_pasok asc"); //mengambil data nama pemasok dari tabel supplier
$jumlah_pasok= mysqli_query($connect, "SELECT jumlah_pasok FROM supplier,pasok WHERE supplier.kode_supplier=pasok.kode_supplier order by kode_pasok asc");  //mengambil data jumlah dari tabel supplier
?>
<html>
    <head>
        <title>GRAFIK SUPPLIER</title>
        <script type="text/javascript" src="Chart.js/Chart.js"></script>  <!-- memanggil file javascript untuk membuat grafik. -->
<link rel="stylesheet" href="materialize.min.css">  <!-- mengambil file css untuk mempercantik. -->
 
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
      <li><a href="GRAFIK SUPPLIER TOTAL JUMLAH PASOK BERDASARKAN NAMA PASOK.php">Pilih Berdasarkan Nama</a></li>
        <li><a href="index.php">Back</a></li>
      </ul>
    </div>
  </nav>
        <center>
        <h2>GRAFIK DATA PEMASOKAN</h2>
    <table border="1"> <!-- membuat tabel untuk data yang dipanggil. -->
        <thead>
            <tr> <!-- membuat baris untuk tabel data yang dipanggil. -->
                <th>No</th> 
                <th>Nama Pemasok</th>
                <th>Kode Obat</th>
                <th>Jumlah Pasok</th>
                <th>Kode_pasok</th>
                <th>harga Beli</th>
                <th>Tanggal Pasok</th>
                <th>Tanggal Kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $data = mysqli_query($connect,"SELECT * FROM supplier,pasok WHERE supplier.kode_supplier=pasok.kode_supplier"); //Memanggil seluruh data yang ada dalam supplier
            while($d=mysqli_fetch_array($data)){ //mengambil data dari array database
                ?>
                <tr> <!-- menjadikan data yang dipanggil kedalam kolom -->
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama_pemasok']; ?></td>
                    <td><?php echo $d['kode_obat']; ?></td>
                    <td><?php echo $d['jumlah_pasok']; ?></td>
                    <td><?php echo $d['kode_pasok']; ?></td>
                    <td><?php echo $d['harga_beli']; ?></td>
                    <td><?php echo $d['tanggal_pasok']; ?></td>
                    <td><?php echo $d['tanggal_kadaluarsa']; ?></td>
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
                type: 'bar', //tipe grafik nya adalah bar
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($nama_pemasok)) { echo '"' . $b['nama_pemasok'] . '",';}?>], //nama pemasok menjadi grafik untuk sumbu x
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php while ($p = mysqli_fetch_array($jumlah_pasok)) { echo '"' . $p['jumlah_pasok'] . '",';}?>], //jumlah pemasok menjadi grafik untuk sumu y
                            backgroundColor: [ //warna untuk membuat background di grafik
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
                            borderColor: [ //warna untuk membuat border di grafik
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