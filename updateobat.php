<!--UAS PRPL ARINDRA WAHYU CANDRA YANG BUAT function update data obat yang berfungsi untuk mengupdate database dari perubahan web  -->


<?php
// UAS PRPL Function Update Obat : untuk mengupdate, menambahkan dan mengedit obat di database agar bisa diubah sesuai dengan update sesuai data yang akan di ubah atau ditambhkan --> Arindra Wahyu Candra 1700018279
// UAS PRPL : Mengupdate Database dari web disini
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
  
