//Nama	: Nurul Ika Praptiwi
//Nim	: 1700018254
//Kelas	: E

//Kelas ini digunakan sebagai bagian dari proses penjualan

<?php
error_reporting(0);
if(session_status()!==2)session_start();//>=php 5.4
if(!isset($_SESSION['SES_LOGIN'])){
	header('location:../home');
 }
require_once "../library/inc.connection.php";
require_once "../library/inc.library.php";
$user_id=$_SESSION['SES_LOGIN'];
opendb();

#mencari item barang
if(isset($_POST['cariBarang'])){
	
	$kdBarang=trim($_POST['kdBarang']);
	$noFaktur=trim($_POST['noFaktur']);
	
	$errMsg="";
//method untuk mencari kode obat berdasar kode yang di inputkan 
	$qri = "SELECT * FROM obat WHERE kode_obat='$kdBarang' ";
	$hsl = querydb($qri);
	$row = numrows($hsl);
	if($row>=1){
		while($rek = arraydb($hsl)){
			//cari data harga beli rata-rata untuk barang tsb. 
			$qri2 = "SELECT * FROM stock_barang WHERE kd_barang='$kdBarang'";
			$hsl2 = querydb($qri2);
			$rek2 = arraydb($hsl2);
				$hrgAvg = $rek2['hrg_beli_rata2'];
			//method untuk menghitung sub total 
			$subTtl = $rek['harga'] * 1;
			$id = buatKode("penjualan_tmp","");
			$qri3 = "INSERT INTO penjualan_tmp (id,no_faktur,kode_barcode,kode_obat,jumlah,harga,sub_total,hrg_pokok,user) VALUES ('$id','$noFaktur','$rek[kode_barcode]','$rek[kode_obat]','1','$rek[harga]','$subTtl','$hrgAvg','$user_id')";
			$hsl3 = querydb($qri3);	
		
		}
	}else{
	
		$errMsg  = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
		$errMsg .= " Kode Barang : <b>$kdBarang</b> Tidak Ada dalam database !!!"; 
		$errMsg .= "</div>";
	}
	
	//convert data menjadi json format
	$data = array('msg1'=>$errMsg);
	echo json_encode($data);
}

#menghapus item barang yg dijual
//data:{hapusJual:'',kodeRow:id},
if(isset($_POST['hapusJual'])){
	
	$id = trim($_POST['kodeRow']);
	
	$qri = "DELETE FROM penjualan_tmp WHERE id='$id'";
	$hsl = querydb($qri);
	if($hsl){
		$errMsg="";	
	}else{	
	
		$errMsg="";
	}
	//convert data menjadi json format
	$data = array('msg1'=>$errMsg,'msg2'=>'');
	echo json_encode($data);
}	

#simpan data penjualan
if(isset($_POST['simpanJual'])){
	
	$noFaktur = trim($_POST['noFaktur']);
	$noMember = trim($_POST['noMember']);
	$tgl = date("Y-m-d");
	$errMsg="";
	
	//cari data di tabel penjualan_tmp
	$c=1;$ttlJual=0;
	$qri = "SELECT * FROM penjualan_tmp WHERE no_faktur='$noFaktur' AND user='$user_id'";
	$hsl = querydb($qri);
	$row = numrows($hsl);
	if($row>=1){
		$noTrans = getNoTrans()+1;
		// set autocommit to off //
			$mysqli->autocommit(FALSE);
		// Insert data dari tabel pembelian_tmp /
			while($rek=arraydb($hsl)){
				
				$subTtl = $rek['sub_total'];
						
				if($c==1){
					$qri2 = "INSERT INTO penjualan_detail (no_transaksi,kode_obat,kode_barcode,jumlah,harga,sub_total,hrg_pokok) 
					VALUES ('$noTrans', '$rek[kode_obat]','$rek[kode_barcode]','$rek[jumlah]','$rek[harga]','$subTtl','$rek[hrg_pokok]');";
				}elseif($c<$row){
					$qri2 .= "INSERT INTO penjualan_detail (no_transaksi,kode_obat,kode_barcode,jumlah,harga,sub_total,hrg_pokok) 
					VALUES ('$noTrans', '$rek[kode_obat]','$rek[kode_barcode]','$rek[jumlah]','$rek[harga]','$subTtl','$rek[hrg_pokok]');";
				}else{
					$qri2 .= "INSERT INTO penjualan_detail (no_transaksi,kode_obat,kode_barcode,jumlah,harga,sub_total,hrg_pokok) 
					VALUES ('$noTrans', '$rek[kode_obat]','$rek[kode_barcode]','$rek[jumlah]','$rek[harga]','$subTtl','$rek[hrg_pokok]')";
				}	
				$c++;	
				$ttlJual = $ttlJual + $subTtl;
			}
		
			// execute multi query /
				if($mysqli->multi_query($qri2)){
					do
					{
						$result = $mysqli->store_result();
					}
					while ($mysqli->next_result());
				
				}else{$errors[] = $mysqli->error;}
				
				//insert data ke tabel penjualan. 
					//$id=buatKode("penjualan","");
					
					$qri3="INSERT INTO penjualan (no_transaksi,no_faktur,tgl_penjualan,total_penjualan,user,id_pelanggan) 
						VALUES('$noTrans','$noFaktur',now(),'$ttlJual','$user_id','$noMember')";
					$res3=$mysqli->query($qri3);
					if(!$res3){$errors[] = $mysqli->error;}
					
					//hapus data di tabel penjualan_tmp
					$qri4="DELETE FROM penjualan_tmp WHERE user='$user_id'";
					$res4=$mysqli->query($qri4);
					if(!$res4){$errors[] = $mysqli->error;}
				
				if(count($errors) == 0) {
					$mysqli->commit();
					updateNoTrans($noTrans);
					updateStockBarang($noTrans,2);
							
					$errMsg  = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">";
					$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
					$errMsg .= "SUKSESS !!! Data telah Disimpan."; 
					$errMsg .= "</div>";
				
				} else {
					$mysqli->rollback();
					$errMsg  = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
					$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
					$errMsg .= "GAGAL !!! Data Tidak Bisa Disimpan."; 
					$errMsg .= "</div>";
				}

				// close connection //
				$mysqli->close();

	}else{

		$pesanError[] = "Data Item Barang Tidak Ada, Silahkan Isi Terlebih Dahulu !";	
		$errMsg  = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				$errMsg .= "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		$errMsg .= "</div>"; 
	}	
	
			
		//convert data menjadi json format
		$data = array('msg1'=>$errMsg);
		echo json_encode($data);	
	
}	
//data:{setoranKasir:'',tglAwal:tglAwal,blnAwal:blnAwal,thnAwal:thnAwal,tglAkhir:tglAkhir,blnAkhir:blnAkhir,thnAkhir:thnAkhir,user:user},

//Nama	: Harun Setiaji 
//Nim	: 1700018271
//Kelas	: E

//method ini digunakan sebagai pengambil data dari setoran kasir 

if(isset($_POST['setoranKasir'])){

	// dan disini digunakan untuk menginput tanggal awal dan akhir dari data yang ingin di akses
	$tglAwal = trim($_POST['tglAwal']);
	$blnAwal = trim($_POST['blnAwal']);
	$thnAwal = trim($_POST['thnAkhir']);
	$tglAkhir = trim($_POST['tglAkhir']);
	$blnAkhir = trim($_POST['blnAkhir']);
	$thnAkhir = trim($_POST['thnAkhir']);
	$userId   = trim($_POST['user']);
	
	$tgl1 = tglsql($thnAwal,$blnAwal,$tglAwal);
	$tgl2 = tglsql($thnAkhir,$blnAkhir,$tglAkhir);
	
	$tbl = "<table class=\"table table-bordered table-condensed\">";
	$tbl .= "<tr>";
	$tbl .= "<th>No</th>";
	$tbl .= "<th>No. Faktur</th>";
	$tbl .= "<th>Tanggal</th>";
	$tbl .= "<th>Nilai Penjualan</th>";
	$tbl .= "</tr>";
	
	//cari data setoran
	$c=1;$ttlSales=0;
	$qri ="SELECT a.* FROM penjualan a WHERE tgl_penjualan BETWEEN '$tgl1' AND '$tgl2' AND user='$userId' ";
	$res = $mysqli->query($qri);
	while($rek=$res->fetch_assoc()){
		
		$tbl .= "<tr>";
		$tbl .="<td align='center'>".$c."</td>";
		$tbl .= "<td align='center'>".$rek['no_faktur']."</td>";
		$tbl .= "<td align='center'>".IndonesiaTgl($rek['tgl_penjualan'])."</td>";
		$tbl .= "<td align='center'>".number_format($rek['total_penjualan'],0,",",".")."</td>";
		$tbl .= "</tr>";	
		$c++;
		$ttlSales = $ttlSales + $rek['total_penjualan'];
	}	
	$tbl .= "<tr>";
	$tbl .= "<td colspan=\"3\" align='center'><b>Total</b></td>";
	$tbl .= "<td align='center'><b>".number_format($ttlSales,0,",",".")."</b></td>";
	$tbl .= "</tr>";
	$tbl .= "</table>";
	
		//convert data menjadi json format
		$data = array('msg1'=>$tbl,'msg2'=>'');
		echo json_encode($data);
}	
?>
