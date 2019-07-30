<!-- Thobie Zatoni 1700018236 !-->

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
      <th scope="col">Kode Obat</th><!-- Nama atribut pada tabel !-->
      <th scope="col">Kode Barcode</th><!-- Nama atribut pada tabel !-->
      <th scope="col">Status</th><!-- Nama atribut pada tabel !-->
      <th scope="col">Catatan</th><!-- Nama atribut pada tabel !-->
      <th scope="col">Tanggal</th><!-- Nama atribut pada tabel !-->
      <th scope="col">ACTION</th><!-- Nama atribut pada tabel !-->
    </tr>
  </thead>
    <?php
      include "db.php";//Menghubungkan ke file yang bersambung dengan database

      $query = mysqli_query($connect,"SELECT barcode.kode_obat AS kode_obat,opname.kode_barcode AS kode_barcode,opname.status AS status,catatan,tanggal from opname INNER JOIN barcode where opname.kode_barcode = barcode.kode_barcode AND opname.status = 'DIGUDANG' ");// queri untuk menampilkan data opname berdasarkan status digudang
      foreach ($query as $data) {
        echo "<tr>
                <td>$data[kode_obat]</td>
                <td>$data[kode_barcode]</td>
                <td>$data[status]</td>
                <td>$data[catatan]</td>
                <td>$data[tanggal]</td>
                <td><a href='edit_opname.php?kode_barcode=$data[kode_barcode]'>EDIT</a> | <a href='delete_opname.php?kode_barcode=$data[kode_barcode]' onclick=”return confirm(‘Yakin Hapus?’)”>DELETE</a>
            </td>
              </tr>";
      }
    ?>
</table>
</body>
</html>