<!-- febrisuseno.1600018078 -->
<!--no1. Stock Opname adalah kegiatan perhitungan secara fisik atas persediaan barang di gudang 
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
      

       
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Status
        </a>

        <div class="navbar-dropdown">
          
          <a class="navbar-item" href="rusak.php">
            Rusak
          </a>
          <a class="navbar-item" href="hilang.php">
            Hilang
          </a>
          <a class="navbar-item" href="dipinjam.php">
            Dipinjam
          </a>
          <a class="navbar-item" href="terjual.php">
            Digudang
          </a>
          <a class="navbar-item" href="digudang.php">
            Terjual
          </a>
    
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          FILTER
        </a>

        <div class="navbar-dropdown">
          
          <a class="navbar-item" href="ascending.php">
            Tanggal ++
          </a>
          <a class="navbar-item" href="descending.php">
            Tanggal --
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
      <th scope="col"><a href="sorting_kodeobat.php">Kode Obat</th> //kode obat data gudang
      <th scope="col">Kode Barcode</th> //kode barcode 
      <th scope="col">Status</th> //cek status 
      <th scope="col">Catatan</th> //catatan kehilang atau kerusakan
      <th scope="col">Tanggal</th> //tanggal 
      <th scope="col">ACTION</th> //action 
    </tr>
  </thead>
		<?php
			include "db.php";

      $query = mysqli_query($connect,"SELECT barcode.kode_obat AS kode_obat,opname.kode_barcode AS kode_barcode,opname.status AS status,catatan,tanggal from opname INNER JOIN barcode where opname.kode_barcode = barcode.kode_barcode ORDER BY nomor_pasok ASC");
			foreach ($query as $data) { //printah query menampikan data opname bedasarkan tanggal
				echo "<tr>
                <td>$data[kode_obat]</td>
                <td>$data[kode_barcode]</td>
                <td>$data[status]</td>
                <td>$data[catatan]</td>
                <td>$data[tanggal]</td>
                <td><a href='edit_opname.php?kode_barcode=$data[kode_barcode]'>EDIT</a> | <a href=\"delete_opname.php?kode_barcode=$data[kode_barcode]\" OnClick=\"return confirm('blah blah');\"> HAPUS </a> 
            </td>
              </tr>";
			}
		?>
</table>
</body>
</html>