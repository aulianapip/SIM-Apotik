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

  	  <a class="navbar-item" href="tambahretur.php">
       Tambah Retur
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
      <th scope="col">Stok Obat</th>
      
      <th scope="col">Obat Rusak</th>
      
      <th scope="col">Catatan</th>
      
      <th scope="col">Tanggal</th>
      <th class="col"> UPDATE</th>
    </tr>
  </thead>
		<?php
			include "koneksi.php";

			$query = mysqli_query($koneksi,"SELECT kode_retur,pasok.jumlah_pasok as jumlah,retur.kode_obat,rusak,catatan,retur.tanggal FROM retur INNER JOIN pasok WHERE retur.kode_obat=pasok.kode_obat");

			foreach ($query as $data) {
				
					echo "<tr bgcolor=green>
						<td>$data[kode_retur]</td>
						<td>$data[kode_obat]</td>
						<td>$data[jumlah]</td>
						<td>$data[rusak]</td>
            <td>$data[catatan]</td>
						<td>$data[tanggal]</td>
						<td><a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href=updateopname.php?kode_opname=$data[kode_retur]>Ubah
                          </a><center></i></td>
				      </tr>";
				
			}
		?>
</table>
</body>
<td></td>
</html>