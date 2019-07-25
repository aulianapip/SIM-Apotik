<!--ARINDRA WAHYU CANDRA YANG BUAT -->
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
• Function sorting obat mahal : fitur ini berfungsi untuk mengurutkan harga obat dari yang termahal
-->

<?php
// Function Update Obat : untuk mengupdate, menambahkan dan mengedit obat di database agar bisa diubah sesuai dengan update sesuai data yang akan di ubah atau ditambhkan --> Arindra Wahyu Candra 1700018279
    include 'db.php';
    $nama_obat=$_POST['nama_obat'];
    $harga_obat=$_POST['harga_obat'];
    $kode_obat=$_POST['kode_obat'];
    $dosis_obat=$_POST['dosis_obat'];
    $kode_jenis=$_POST['kode_jenis'];
    $tanggal_kadaluarsa=$_POST['tanggal_kadaluarsa'];
    $bulan_kadaluarsa=$_POST['bulan_kadaluarsa'];
    $tahun_kadaluarsa=$_POST['tahun_kadaluarsa'];
    $Stok_Obat=$_POST['Stok_Obat'];
	$QuerySql = " UPDATE obat SET nama_obat='$nama_obat', harga_obat='$harga_obat', kode_obat='$kode_obat', dosis_obat='$dosis_obat', kode_jenis='$kode_jenis', tanggal_kadaluarsa='$tanggal_kadaluarsa' , bulan_kadaluarsa='$bulan_kadaluarsa', tahun_kadaluarsa='$tahun_kadaluarsa', Stok_Obat='$Stok_Obat' WHERE kode_obat='$kode_obat'";

if (mysqli_query($connect, $QuerySql)) {
      		echo "<script><alert>Berhasil</alert></script>";
      		header("location: dataobat.php");
		} else {
      		echo "Error: " . $QuerySql . "<br>" . mysqli_error($connect);
		}?>
  
