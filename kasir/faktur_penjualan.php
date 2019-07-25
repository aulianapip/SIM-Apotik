<?php

//Fitur POS, fitur untuk menjalankan fungsi kasir dan operasional penjualan apotik 

// Nama  : Harun Setiaji
// NIM   : 1700018271
// Kelas : E

//fungis untuk pengeluaran nota 

if(session_status()!==2)session_start();//>=php 5.4

if(!isset($_SESSION['SES_LOGIN'])){
  header('location:../home');
 }

 //library untuk koneksi ke database
require_once "../library/inc.connection.php";
require_once "../library/inc.library.php";

$user_id=$_SESSION['SES_LOGIN'];
opendb();

if(isset($_GET['no_faktur'])){
  
  
  // untuk mengambil data dari hasil inputan
  $noFaktur=trim($_GET['no_faktur']); 
  $cash = trim($_GET['cash']);
  
  //cari data di Toko  
  $qri = "SELECT * FROM nama_toko";
  $hsl = querydb($qri); 
  $rek = arraydb($hsl);
    $namaToko = $rek['nm_toko'];
    $almtToko = $rek['almt_toko'];
    $tlpToko  = $rek['tlp_toko'];
    $faxToko  = $rek['fax_toko'];

  //mencari data penjualan dari tabel penjualan_tp
  $qri2 = "SELECT a.*,b.nm_barang FROM penjualan_tmp a LEFT JOIN nama_obat b ON b.kd_barang=a.kd_barang WHERE a.no_faktur='$noFaktur'";
  $hsl2 = querydb($qri2); 
    
    
  //echo "No Faktur : ".$noFaktur;  
    
    
    
}

// Berikut ini adalah tampilan dari nota kasir apotik
?> 
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nota</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css">
  body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 8pt;
    color: #000;
    text-transform: uppercase;}
  </style>
</head>

<body onload="print();window.close();return false">

<table border="0" align="center">
  <tr>
    <td colspan="4" align="center"><?php echo $namaToko."<br>".$almtToko."<br>Telp.: ".$tlpToko."&nbsp;Fax :&nbsp;".$faxToko; ?>&nbsp;</td>           //output data
  </tr>
</table>
<table border="0" align="center">
  <tr>
    <td colspan="4">----------------------------------------------------------------------------------------------------</td>
  </tr>
    <!-- <td colspan="4" align="center">RECEIPT <?php echo $noFaktur." ".date('d-m-Y'); ?></td> -->
  
    
  <tr>
    <td><?php echo date('d-m-Y'); ?></td>
    <td><?php echo $noFaktur; ?></td>
    
  </tr>
  <tr>
    <td colspan="4">----------------------------------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td height="17"></td>
    <td>JML</td>
    <td>HRG</td>
    <td>SUB TTL</td>
  </tr>
  
//Nama  : Nurul Ika Praptiwi
//Nim   : 1700018254
//Kealas : E
  
  
  //method untuk memasukan data hasil harga sub total penjualan kedalam variabel
 <?php
 $kembali=0; $total_item=0; $total_penjualan=0;
  while($rek2=arraydb($hsl2)){
    $nm_barang=$rek2['nm_barang'];
    $jml=$rek2['jumlah'];
    $hrg=$rek2['harga'];
    $sub_total=$rek2['sub_total'];
    $total_penjualan=$sub_total+$total_penjualan;
    $total_item=$jml+$total_item;
 ?> 
  <tr>
    <td><?php echo $nm_barang; ?>&nbsp;</td>
    <td><?php echo $jml; ?>&nbsp;</td>
    <td><?php echo number_format($hrg,0,",","."); ?>&nbsp;</td>
    <td><?php echo number_format($sub_total,0,",","."); ?></td>
  </tr>                                                                 
                                                                                                                       // Rumus dari hasil kembali                                                                                        
 <?php } $kembali=$cash-$total_penjualan; if($kembali<=0){$kembali=0;} ?>                                            
 <tr>
    <td colspan="4">----------------------------------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td>TOTAL</td>
    <td><?php echo $total_item; ?>&nbsp;ITEM</td>
    <td>&nbsp;</td>
    <td><?php echo number_format($total_penjualan,0,",","."); ?></td>                                                //menampilkan total biaya yang
  </tr>
  <tr>
    <td colspan="4">----------------------------------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>TUNAI</td>
    <td><?php echo number_format($cash,0,",","."); ?></td>                                                          //menampilkan uang yang di bayarkan
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>KEMBALI</td>
    <td><?php echo number_format($kembali,0,",","."); ?></td>                                                       //kembali ke menu
  </tr>

  <tr>
    <td colspan="4" align="center"><p>&nbsp;</p>
    <p>TERIMA KASIH ATAS KUNJUNGAN ANDA</p></td>
  </tr>
</table>
</body>
</html>
