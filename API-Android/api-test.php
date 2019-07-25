<?php

// Kelas api-test.php digunakan sebagai kelas yang menghubungkan dengan scan barcode android

// Nama  : Muhammad Ramon Saputra
// NIM   : 1700018245
// Kelas : E


// library untuk koneksi ke database nya

require_once "../library/inc.connection.php";
require_once "../library/inc.library.php";

opendb();

//api test


//end-api-test
	$barcode=trim($_POST['barcode']);
	// $noFaktur=trim($_POST['noFaktur']);
	$user_id=trim($_POST['userid']);
	
	$errMsg="";

	$getf = "SELECT no_faktur FROM penjualan_tmp";
	$hslf = querydb($getf);
	$rowf = numrows($hslf);

	while($rek = arraydb($hslf)){
		$noFaktur = $rek['no_faktur'];
	}
//method untuk mendapatkan kode obat dari barcode scan android
	$getcode = "SELECT kode_obat FROM barcode WHERE kode_barcode='$barcode'";
	$hslcode = querydb($getcode);
	$rowcode = numrows($hslcode);

	while ($rekcode = arraydb($hslcode)) {
		$kodeobt = $rekcode['kode_obat'];
		
		
	}
//mencari item barang
	
	// $kdBarang=trim($_POST['kdBarang']);
	// // $noFaktur=trim($_POST['noFaktur']);
	// $user_id=trim($_POST['userid']);
	
	$errMsg="";

//kode sql untuk memunculkan nama obat berdasar kode barang


	$qri = "SELECT * FROM obat WHERE kode_obat='$kodeobt'";
	$hsl = querydb($qri);
	$row = numrows($hsl);
	if($row>=1){
		while($rek = arraydb($hsl)){
			//cari data harga beli rata-rata untuk barang tsb. 
			$qri2 = "SELECT * FROM stock_barang WHERE kd_barang='$barcode'";
			$hsl2 = querydb($qri2);
			$rek2 = arraydb($hsl2);
				$hrgAvg = $rek2['hrg_beli_rata2'];
			
			$subTtl = $rek['harga'] * 1;
			$id = buatKode("penjualan_tmp","");
			$qri3 = "INSERT INTO penjualan_tmp (id,no_faktur,kode_obat,jumlah,harga,sub_total,hrg_pokok,user) VALUES ('$id','$noFaktur','$rek[kode_obat]','1','$rek[harga]','$subTtl','$hrgAvg','$user_id')";
			$hsl3 = querydb($qri3);	
		
		}
	}else{
	
		$errMsg  = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
		$errMsg .= " Kode Barang : <b>$kodeobt</b> Tidak Ada dalam database !!!"; 
		$errMsg .= "</div>";
	}


?>
