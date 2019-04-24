<?php

//==================================
// Nama : Azhaarudzdzikri Alfirdaus
// NIM  : 1700018238
// Kelas: E
//==================================
 
 //-----------------------------------
 // Pengantar Rekayasa Perangkat Lunak
 //-----------------------------------
 
 /* Fungsi Pemilihan Nama Suplier Untuk Grafik Suplier berdasarkan nama Suplier */

 /*1. Fitur Analitik 
    Fitur untuk menganalisa data dari seluruh fitur yang ada di sistem Informasi Apotik. untuk menganalisa dibuatlah berbagai macam grafik untuk membantu merepresentasi hasil analisa yang telah dibuat. hasil analisa tersebut juga dapat juga dapat membantu kita untuk mengambil keputusan dimasa yang akan datang.
*/


$connect = mysqli_connect("localhost", "root", "", "sim-apotek"); //Memanggil database yang telah kita buat
error_reporting(0); //untuk menghilangkan notif error pada program
    $nama = $_POST['area']; //membuat area nama
    if (isset($_POST['submit'])) { // untuk mensubmite post area
    }?>
<!DOCTYPE html>
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
        <li><a href="index.php">Menu</a></li>
        <li><a href="supply.php">Back</a></li>
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
    <h1>GRAFIK SUPPLIER TOTAL JUMLAH PASOK BERDASARKAN NAMA PASOK
        <?php 
            echo ' '.$nama.'';
         ?>
        
    </h1></center>
    <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>

    <br/>
    <br/>

<form action="" method="post">
<label>PILIH DAHULU NAMA PASOK</label><br>
        <label>Pilih Nama</label>
       <div class="input-field col s12" >
            <select class="browser-default" name="area">
                <?php $options = array('-','Terobat', 'Hexobat', 'Naobat', 'Faobat','Riobat', 'Farmasi Indones'); // menampilkan nama pada opsi area 
                foreach ($options as $area) { // opsi pada form area
                    $selected = @$_POST['area'] == $area ? ' selected="selected"' : ''; // fungsi memeilih opsi area
                    echo '<option value="' . $area . '"' . $selected . '>' . $area . '</option>'; // untuk membuat tabel dari nama nama pada opsi
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
                <th>no</th>
                <th>Nama Pemasok</th>
                <th>Kode Obat</th>
                <th>Jumlah Pasok</th>
                <th>Nomer Telepon Supplier</th>
                <th>Kode Pasok</th>
                <th>Harga Beli</th>
                <th>Tanggal Pasok</th>
        </thead>
        <tbody>
            <?php
            $no = 1; //fungsi deklarasi memberi urut nomor
            $data = mysqli_query($connect,"SELECT * from supplier WHERE nama_pemasok='$nama' ORDER BY `supplier`.`tanggal_pasok` ASC"); // query untuk menampilkan data suplier berdasarkan nama_pasok dan tanggal_pasok
            while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; //untuk membuat dan mengurutkan nomer secara otomatis ?></td> 
                    <td><?php echo $d['nama_pemasok']; //menampilan isi dari atribut nama_pemasok ?></td>
                    <td><?php echo $d['kode_obat']; //menampilan isi dari atribut kode_obat ?></td>
                    <td><?php echo $d['jumlah_pasok']; //menampilan isi dari atribut jumlah_pasok ?></td>
                    <td><?php echo $d['nomer_telepon_supp']; //menampilan isi dari atribut nomer_telepon_supp ?></td>
                    <td><?php echo $d['kode_pasok']; //menampilan isi dari atribut kode_pasok ?></td>
                    <td><?php echo $d['harga_beli']; //menampilan isi dari atribut harga_beli ?></td>
                    <td><?php echo $d['tanggal_pasok']; //menampilan isi dari atribut tanggal_pasok ?></td>
                </tr>
                <?php 
            }
            ?>
        </tbody>
    </table>

   

    <?php
    $tanggal_pasok = mysqli_query($connect, "SELECT tanggal_pasok FROM supplier WHERE nama_pemasok='$nama' ORDER BY `supplier`.`tanggal_pasok` ASC"); // query untuk grafik tanggal pasok berdasarkan nama_pasok
    $jumlah_pasok = mysqli_query($connect, "SELECT jumlah_pasok FROM supplier WHERE nama_pemasok='$nama' ORDER BY `supplier`.`tanggal_pasok` ASC"); // query untuk grafik jumlah pasok berdasarkan nama_pasok
    ?>


?>

 <script>
            var ctx = document.getElementById("myChart"); //untuk memanggil chart
            var myChart = new Chart(ctx, {
                type: 'bar',  // untuk membuat chart bar (grafik batang)
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($tanggal_pasok)) { echo '"' . $b['tanggal_pasok'] . '",';}?>], // fungsi menampilkan nama label pada chart bar berdasarkan atribut tanggal_pasok
                    datasets: [{
                            label: 'HIDE', // fungsi untuk menghide batang pada chart bar
                            data: [<?php while ($p = mysqli_fetch_array($jumlah_pasok)) { echo '"' . $p['jumlah_pasok'] . '",';}?>], // fungsi menampilkan jumlah pada chart bar berdasarkan atribut jumlah_pasok
                            backgroundColor: [ // fungsi untuk memberi warna rgb pada setiap batang chart bar
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
                            borderColor: [ // fungsi untuk memberi warna rgb pada border setiap batang chart bar
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
                            borderWidth: 1 // untuk mengukur ketebalan pada border
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