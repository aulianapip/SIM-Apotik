<html>
    <head>
    <!--UI DESIGNER
    	Nama : Baharuddin Izha Al Sya'na
        Nim  : 1700018257
        ---------------->
        <title></title>
        <script type="text/javascript" src="Chart.js/Chart.js"></script>
<link rel="stylesheet" href="materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
    <!--Membuat Navbar --------------------------------------->
<nav class="nav-extended">
    <div class="nav-wrapper">
<a href="#" class="brand-logo center">ANALITIK</a></nav>
</div>

<!--Membuat Pilihan Data Yang Mau di Analisis ---------------->
	<!--Supplier -------------------------------------------->
<div class="row">
    <div class="col s12 ">
      <div class="card ">
        <div class="card-content black-text">
          <center><i class="medium material-icons">archive</i><span class="card-title"><b>Supply</b></span>
        </div>
        <div class="card-action">
          <center>
        <a href="supply.php" class="waves-effect waves-light btn-small">Grafik Data Supplier</a>
	  	<a href="GRAFIK_SUPPLIER_FAOBAT_JUMLAH_PASOK_BERDASARKAN_TAHUN.php" class="waves-effect waves-light btn-small">GRAFIK JUMLAH PASOK BERDASARKAN WAKTU</a>
        <a href="GRAFIK_TOTAL_PASOK_SELURUH_SUPPLIER_2019.php" class="waves-effect waves-light btn-small">GRAFIK STOCK DARI KESELURUHAN SUPPLIER
TAHUN 2019</a>
        <a href="GRAFIK_TOTAL_PASOK_SELURUH_SUPPLIER_2018.php" class="waves-effect waves-light btn-small">GRAFIK STOCK DARI KESELURUHAN SUPPLIER
TAHUN 2018</a>
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
          		<a href="obat.php" class="waves-effect waves-light btn-small">Grafik Data Obat</a>
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
          		<a href="grafikPelangganJK.php" class="waves-effect waves-light btn-small">Grafik Data Pelanggan Berdasar Jenis Kelamin</a>
			<a href="grafikPelangganKota.php" class="waves-effect waves-light btn-small">Grafik Data Pelanggan Berdasar Kota</a>
        </div>
      </div>
    </div>
  </div>
</center>
</body>
</html>