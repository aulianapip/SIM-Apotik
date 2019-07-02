<?php
  session_start();
if (!isset($_SESSION["login"])) {
      header("location: http://localhost/apotik-keuangan/home.php");
      exit;
    }
      

    include 'db.php';
    $cari="SELECT max(kode_obat) as terbesar from obat";
    $cari2=mysqli_query($connect,$cari);
    $cari_terbesar=mysqli_fetch_array($cari2);
    $besar=substr($cari_terbesar['terbesar'], 1,3);

    $tambah=$besar+1;
    if($tambah<10){
      $id="B00".$tambah;
    }else if($tambah>10){
      $id="B0".$tambah;
    }else if($tambah>100){
      $id="B".$tambah;
    }

if (isset($_POST['kirim'])) {
    $kode_obat=$_POST['kode_obat'];
    $nama_obat=$_POST['nama_obat'];
    $kode_jenis=$_POST['kode_jenis'];
    $stok_obat=$_POST['stok_obat'];
    $harga_obat=$_POST['harga_obat'];
    $dosis_obat=$_POST['dosis_obat'];
    $tanggal_input=$_POST['tanggal_input'];
    $QuerySql = "INSERT INTO gaji_pegawai SET kode_obat='$kode_obat',nama_obat='$nama_obat',kode_jenis='$kode_jenis',stok_obat='$stok_obat',harga_obat='$harga_obat',dosis_obat='$dosis_obat',tanggal_input='$tanggal_input'";
      $SQL = mysqli_query($connect, $QuerySql);

    header("refresh:0");
  
}
 ?>