<!-- AIRLA ISMAIL APRI RAHMAT 1700018261-->
<!--uas no 1. Stock Opname adalah kegiatan perhitungan secara fisik atas persediaan barang di gudang 
secara fisik atas persedian barang di gudang yang akan dijual.Pada fitur yang kami buat
kami menginputkan status kondisi barang yang berada ditoko, status antara lain adalah digudang rusak, hilang ,di pinjam , dan terjual. jika terjadi kesalahan input status maka dapat diubah dengan fitur edit, dan bila barang telah kembali atau di ganti atau telah di konfirmasi oleh pihak gudang dan kasir maka data opname dapat di hapus dengan fitur delete  -->
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Obat</title>
	<link rel="stylesheet" href="bulma.min.css">
</head>
<body>
<nav class="navbar is-success" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
   

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="login.html">
    <img src="logut.png"></img>
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
           Daftar Tabel
        </a>

        <div class="navbar-dropdown">
          
          <a class="navbar-item" href="dataobat.php">
             Obat
          </a>
          <a class="navbar-item" href="datasupiler.php">
             Supplier
          </a>
          <a class="navbar-item" href="dataopname.php">
             Opname
          </a>
    
        </div>
      </div>

  	  <a class="navbar-item" href="tambah_opname.php">
        Tambah Opname
      </a>
  </div>
</div>
    </div>

    
  </div>



</nav>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col">Kode Barcode</th>
      <th scope="col">Kode Kode Obat</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Catatan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
		<?php
			include "db.php";

      $query = mysqli_query($connect,"SELECT barcode.kode_obat AS kode_obat,opname.kode_barcode AS kode_barcode,opname.status AS status,catatan,tanggal from opname INNER JOIN barcode where opname.kode_barcode = barcode.kode_barcode order by nomor_pasok ASC"); //Menampilkan data opname berdasarkan asc, atas kebawah astu sebaliknya. Ini mengambl database  dari barcode dan opname  yang di tampilkan ( kode obat, kode barcot, status, catatan dan tanggal )
			foreach ($query as $data) {
				echo "<tr>
                <td>$data[kode_barcode]</td>
                <td>$data[kode_obat]</td>
                <td>$data[status]</td>
                <td>$data[tanggal]</td>
                <td>$data[catatan]</td>
                
			}
		?>
</table>
</body>
</html>