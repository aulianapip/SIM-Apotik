<!--1.  Pada kelompok gudang, kami telah membuat beberapa kelas yang mempunyai fungsi sebagai berikut:
• Fungsi Sorting Nama Obat A-Z : fitur ini berfungsi mengurutkan nama obat sesuai alpabet dari awalan huruf A sampai awalan huruf Z.
• Fungsi Sorting Jenis Obat Kapsul : fitur ini berfungsi mensorting obat yang berjenis kapsul untuk di tampilkan.
• Fungsi Menampilkan seluruh data obat
• Fungsi Tanggal pasok obat
• Function Update Data Obat : Fitur ini berfungsi mengupdate perubahan yang telah kita tambah, Kurang, dan mengedit sesuai database
• Function Stok Obat Menipis : Fitur ini berfungsi menandai tabel obat yang stoknya telah menipis
• Function Pencarian  Data Tidak Ditemukan : fitur ini berfungsi  jika kita mencari obat atau supplier yang tidak ada didatabase
• Function Sorting Tanggal Supplier : fitur ini berfungsi mensorting obat dengan tanggal pemasok supplier yang telah memasok obat dari tanggal terdahulu
• Function Tambah Obat : fitur ini berfungsi untuk menambah data obat baru ke dalam tabel Obat
• Function Tambah Supllier : fitur ini berfungsi untuk menambah data supllier baru ke tabel Supllier
• Function Cari Obat : fitur ini berfungsi buat mencari data obat yang ada di tabel obat
• Fuction Cari Supplier : fitur ini berfungsi mncari data supplier yang ada di tabel supplier
• Function Sorting Nama Supplier A-Z : fitur ini berfungsi untuk mengurutkan nama supplier dari A-Z
• Function data suplier : fitur ini berfungsi untuk menampilkan data suplier sesuai database
-->
<?php
  include 'db.php';
  $cari = $_POST['cari'];
  $QuerySql = "SELECT `nama_obat`,`harga_obat`,`kode_obat`,`dosis_obat`,`nama_jenis`,`tanggal_kadaluarsa`,`bulan_kadaluarsa`,`tahun_kadaluarsa`,`Stok_Obat` FROM `obat`, `jenis_obat` WHERE nama_obat LIKE '%$cari%' AND jenis_obat.kode_jenis=obat.kode_jenis";
  //query untuk menampilkan data obat yang dicari ditabel obat, dimana jika kita ketik A di kolom pencarian maka akan muncul data obat yang ada huruf A nya, tentu data obat yang ada di database yang muncul
  //Mohamad rifky fajri 1700018239  

  $SQL = mysqli_query($connect, $QuerySql);
      if(mysqli_num_rows($SQL)>0){
?>
<!--Mohamad rifky fajri membuat file ini-->
<!DOCTYPE html>
<html>
<head>
	<title>Hasil Pencarian Data Obat</title>
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
       <img src="logut.png"></img> <!--mohamad rifky fajri memperbaikin tampilan logout-->
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
          
        </div>
      </div>
      <a class="navbar-item" href="inputobat.php">
       Tambah Obat
      </a>
      <a class="navbar-item" href="inputsupiler.php">
       Tambah Supplier
      </a>
        </div>
      </div>
</div>
        </form>
  </a>
  </div>
</div>
    </div>

    
  </div>
</nav>
<table class="table is-fullwidth" >
  <thead>
    <tr>
      <th scope="col">Nama Obat</th>
      <th scope="col">Harga Obat</th>
      <th scope="col">Kode Obat</th>
      <th scope="col">Dosis Obat</th>
      <th scope="col">Kode Jenis</th>
      <th scope="col">Tanngal Kadaluarsa</th>
      <th scope="col">Bulan Kadaluarsa</th>
      <th scope="col">Tahun Kadaluarsa</th>
      <th scope="col">Stok Obat</th>
      <th scope="col">Edit Data</th>
      <th scope="col">Hapus Data</th>
    </tr>
  </thead>
		<?php
			foreach ($SQL as $key) {
				echo "<tr>
						<td>$key[nama_obat]</td>
						<td>$key[harga_obat]</td>
						<td>$key[kode_obat]</td>
						<td>$key[dosis_obat]</td>
						<td>$key[nama_jenis]</td>
						<td>$key[tanggal_kadaluarsa]</td>
						<td>$key[bulan_kadaluarsa]</td>
						<td>$key[tahun_kadaluarsa]</td>
						<td>$key[Stok_Obat]</td>
            <td><a href='editobat.php?kode_obat=$key[kode_obat]'>Edit</a></td>
            <td><a href='hapusobat.php?kode_obat=$key[kode_obat]'>Hapus</a></td>
				</tr>";
			}
		?>
</table>
</body>
</html

<?php }

else{
  header ("location: tidakterdapat.php");

}

?>
