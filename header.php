<!DOCTYPE html>
<html>
<head>
	<title></title>
	</style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

<!-- Mengatur Layout Dengan CSS -->
<!-- untuk bagian UI dikerjakan Aditiya Aziz saputra 17000182233 dan Alfian Noor 1700018233 -->


<!-- ini merupakan fungsi dan query membuat bagian Navbar -->
body {    
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: pink;
  padding: 20px 10px;
}

.header a {   <!-- fungsi untuk bagian header tampilan-->
  float: left;
  color: black; <!-- untuk bagian  warna : hitam-->
  text-align: center; <!-- untuk perataan texs : tengah -->
  padding: 12px;    
  text-decoration: none; <!-- untuk teks-dekorasi : tidak ada-->
  font-size: 18px;  <!-- untuk ukuran huruf-->
  line-height: 25px;  <!-- garis tinggi-->
  border-radius: 4px; <!-- batas-rasius-->
}

.header a.logo { <!-- fungsi untuk bagian header logo -->
  font-size: 25px;  <!-- untuk ukuran-huruf -->
  font-weight: bold; <!-- untuk berat huruf :; tebal-->
}

.header a:hover { <!-- untuk efek tombol di dalam header  -->
  background-color: #ddd; <--! warna bagian back ground -->
  color: black;
}


.header a.active [type=submit]:hover {
  background-color: pink; <!-- fungsi untuk pengaturan warna back ground -->
}

.header-right { <!-- fungsi mengatur header bagian kanan-->
  float: right;
}

@media screen and (max-width: 500px) {  <!-- Max-width digunakan untuk membatasi sebuah halaman apakah halaman tersebut memiliki lebar tertentu sesuai yang sudah diatur sebelumnya -->
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  


}
</style>
</head>
<body>
<!-- kepala -->
<div class="header">
  <a href="index.php" class="logo">CRM APOTEK</a>
  <div class="header-right">
  </div>
</div>

</body>
</html>