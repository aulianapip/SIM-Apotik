<html>
    <head>
    <!--UI DESIGNER
    	Nama : Baharuddin Izha Al Sya'na
        Nim  : 1700018257
        ---------------->

        <title></title>
        <script type="text/javascript" src="materialize.js"></script>
	<script type="text/javascript" src="Chart.js/Chart.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<link rel="stylesheet" href="materialize.min.css">
	<link rel="stylesheet" href="bootstrap.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
    <!--Membuat Navbar --------------------------------------->
<nav class="nav-extended">
    <div class="nav-wrapper">
<a href="#" class="brand-logo center">ANALITIK</a>
</div>
</nav>
</div>

<!--Membuat Pilihan Data Yang Mau di Analisis ---------------->
	<!--Supplier -------------------------------------------->
<div class="row">
    <div class="col s12 ">
      <div class="card ">
        <div class="card-content black-text">
          <center><i class="medium material-icons">assessment</i><span class="card-title"><b>Penjualan</b></span>
        </div>
        <div class="card-action">
          <center>
        <a href="GrafikDataPenjualan.php" class="waves-effect waves-light btn-small">Grafik Penjualan</a>
        <br></br>
        <a href="GrafikJumlahBeliBerdasarkanHari.php" class="waves-effect waves-light btn-small">Grafik Penjualan Harian</a>
	<a href="GrafikJumlahBeliBerdasarkanBulan.php" class="waves-effect waves-light btn-small">Grafik Penjualan Bulanan</a>
	<a href="GrafikJumlahBeliBerdasarkanTahun.php" class="waves-effect waves-light btn-small">Grafik Penjualan Tahunan</a>
  <br></br>
          <a href="grafikKeuntungan.php" class="waves-effect waves-light btn-small">Grafik Keuntungan</a>
        <br></br>
          <a href="GrafikKeuntunganberdasarkanTanggal.php" class="waves-effect waves-light btn-small">Grafik Keuntungan Harian</a>
  <a href="GrafikKeuntunganberdasarkanbulan.php" class="waves-effect waves-light btn-small">Grafik Keuntungan Bulanan</a>
  <a href="GrafikKeuntunganberdasarkanTahun.php" class="waves-effect waves-light btn-small">Grafik Keuntungan Tahunan</a>
  </center>
        </div>
      </div>
    </div>
  </div>
</center>

<div class="row">
    <div class="col s12 ">
      <div class="card ">
        <div class="card-content black-text">
          <center><i class="medium material-icons">archive</i><span class="card-title"><b>Supply</b></span>
        </div>
        <div class="card-action">
          <center>
        <a href="supply.php" class="waves-effect waves-light btn-small">Grafik Data Supplier</a>
        <br></br>
        <a href="GrafikJumlahBeliBerdasarkanHarisupply.php" class="waves-effect waves-light btn-small">Grafik Supplier Harian</a>
        <a href="GrafikJumlahBeliBerdasarkanBulansupply.php" class="waves-effect waves-light btn-small">Grafik Supplier Bulanan</a>
        <a href="GrafikJumlahBeliBerdasarkanTahunsupply.php" class="waves-effect waves-light btn-small">Grafik Supplier Tahunan</a>
	</center>
        </div>
      </div>
    </div>
  </div>
</center>

	<!--Obat ---------------------------------------------->
<div class="row">
    <div class="col s12 ">
      <div class="card ">
        <div class="card-content black-text">
          <center><i class="medium material-icons">enhanced_encryption</i><span class="card-title"><b>Obat</b></span>
        </div>
        <div class="card-action">
          <center>
                    <a href="#" class="waves-effect waves-light btn-small">Grafik Obat</a>
        <br></br>
          		<a href="obat.php" class="waves-effect waves-light btn-small">Grafik Data Obat Berdasar Jumlah Pasok</a>
          		<a href="TABEL OBAT BERDASARKAN TAHUN KADALUARSA.php" class="waves-effect waves-light btn-small">Grafik Kadaluarsa</a>
        </div>
      </div>
    </div>
  </div>
</center>

	<!--Pelanggan ----------------------------------------->
<div class="row">
    <div class="col s12 ">
      <div class="card ">
        <div class="card-content black-text">
          <center><i class="medium material-icons">face</i><span class="card-title"><b>Pelanggan</b></span>
        </div>
        <div class="card-action">
          <center>
                                <a href="#" class="waves-effect waves-light btn-small">Grafik Pelanggan</a>
        <br></br>
          		<a href="grafikPelangganJK.php" class="waves-effect waves-light btn-small">Grafik Data Pelanggan Berdasar Jenis Kelamin</a>
			<a href="grafikPelangganKota.php" class="waves-effect waves-light btn-small">Grafik Data Pelanggan Berdasar Kota</a>
			<a href="grafikPelangganBeli.php" class="waves-effect waves-light btn-small">Grafik Data Pelanggan Berdasar Jumlah Beli</a>
	<br></br>
			<a href="grafikPelangganJumlahTransaksi.php" class="waves-effect waves-light btn-small">Grafik Data Pelanggan Berdasar Jumlah Transaksi</a>
			<a href="grafikPelangganJumlahBeliObat.php" class="waves-effect waves-light btn-small">Grafik Data Pelanggan Berdasar Jumlah Beli Obat</a>
        </div>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col s12 ">
      <div class="card ">
        <div class="card-content black-text">
          <center><i class="medium material-icons">check_box</i><span class="card-title"><b>Opname</b></span>
        </div>
        <div class="card-action">
          <center>
                                            <a href="#" class="waves-effect waves-light btn-small">Grafik Opname</a>
        <br></br>
          		<a href="grafikOpname.php" class="waves-effect waves-light btn-small">Grafik Data Opname Berdasar Status</a>
        </div>
      </div>
    </div>
  </div>
</center>
</body>
</html>