<!--ARINDRA WAHYU CANDRA -->
<?php

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
		}
?>
  