<?php 

 include "koneksi/koneksi.php";
    $kode_opname =$_GET['kode_opname'];
    $QuerySql = "SELECT * FROM opname WHERE kode_opname='$kode_opname'";
    $tampil = mysqli_query($konek, $QuerySql);
    $row        = mysqli_fetch_array($tampil);
    $kode_obat=$row['kode_obat'];
    $QuerySql1 = "SELECT * FROM obat where kode_obat='$kode_obat'";
    $tampil1 = mysqli_query($konek, $QuerySql1);
    $row1        = mysqli_fetch_array($tampil1);;
    $stok_obat=$row1['Stok_Obat'];
    $selisih=$row['obat_kurang'];
    $stok_jum =$stok_obat-$selisih;
    //update tabel obat
    $update1 = "UPDATE `obat` SET Stok_Obat='$stok_jum' WHERE kode_obat='$kode_obat'";
    mysqli_query($konek, $update1);
    //update tabel opname
    $update = "UPDATE `opname` SET status_obat='SUKSES',obat_kurang='0' WHERE kode_opname='$kode_opname'";
    mysqli_query($konek, $update);
    header("location: cek_opname.php");
 ?>