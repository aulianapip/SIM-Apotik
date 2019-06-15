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
      <th scope="col">Kode Retur</th>
      <th scope="col">Kode Obat</th>
      <th scope="col">Jumlah Obat</th>
      <th scope="col">Obat Rusak</th>
      <th class="col"> UPDATE</th>
      
    </tr>
  </thead>
		<?php
			include "koneksi.php";

			$query = mysqli_query($koneksi,"SELECT kode_retur,pasok.jumlah_pasok as jumlah,retur.kode_obat,rusak,retur.tanggal FROM retur INNER JOIN pasok WHERE retur.kode_obat=pasok.kode_obat");

			foreach ($query as $data) {
				
				echo "<tr>
						<td>$data[kode_retur]</td>
						<td>$data[kode_obat]</td>
						<td>$data[rusak]</td>
						<td>$data[tanggal]</td>
						<td><a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href=updateretur.php?kode_opname=$data[kode_retur]>Ubah
                          </a><center></i></td>
				      </tr>";
				
			}
		?>
</table>
</body>
<td></td>
</html>