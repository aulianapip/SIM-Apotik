<?php 
include('conect.php');
function eksekusi($SQL,$connect){
    return $SQL1=mysqli_query($connect,$SQL);
  }

	//di index.php
	public function tampil_berdasarkan_tanggal($tgl_awal, $tgl_akhir,$connect){
		
	$q1="SELECT * from pelanggan where tgl_daftar between '$tgl_awal' and '$tgl_akhir'";
	return $q1;
	}
	//diindex.php
	public function tampil($connect){//Aditya Aziz Saputra 1700018264

		$a="SELECT * FROM pelanggan ORDER BY Nama DESC";
		 //-->menjalankan/memanggil data pelanggan dengan nama 
		return $a;
	}

	//di formedit.php
	public function tampiledit($ID,$connect){ //rizka arnanda 1700018248
		//$edit
	
		$edit="SELECT ID,Nama,Jk,NoHP,Email,Alamat FROM pelanggan where ID='$ID'";//perintah untuk menampilkan data
		
		return $SQL = mysqli_query($connect,$edit);
	}

	//edit.php 
	public function update($ID,$Nama,$jeniskelamin,$NoHP,$Email,$Alamat,$connect){ //Tesya Pratiwi 1700018246
		
		$q1 = "UPDATE pelanggan SET Nama='$Nama',Jk='$jeniskelamin', NoHP='$NoHP', Email='$Email', Alamat='$Alamat' WHERE ID ='$ID'";
		//query update berguna untuk mengedit atau mengupudate ke dalam data pelanggan.
		
		 //variable eksekusi query
		return $SQL = mysqli_query($connect,$q1);
	}
	//hapus.php
	public function hapus($ID,$connect){ //Herni sartika M 1700018285

	$QuerySql = "DELETE FROM pelanggan WHERE ID='$ID' "; //sintaks penghapusan data secara langsung dengan tombol delete
	
	//untul menjalankan sintaks diatas agar sinkron dengan database
		return $SQL = mysqli_query($connect,$QuerySql);
	}
	//deleteselect.php
	public function hapus_ceklis($ID,$connect){//Herni sartika M 1700018285

	//disini, kodingan akan memproses dalam mendelete data yang telah kita pilih untuk didelete
	return $SQL=mysqli_query($connect,"DELETE FROM pelanggan WHERE ID ='$ID[$x]'");  
	}

	//input.php carto ardiyanto 1700018283
	public function input($ID,$Nama,$jeniskelamin,$NoHP,$Email,$Alamat,$connect){
		$QuerySql = "INSERT INTO pelanggan VALUES(now(),'m',null,'$Nama','$Jk','$NoHP','$Email', '$Alamat')";
		//query Insert into berguna untuk memasukan nilai ke dalam data pelanggan. ID pelanggan yang auto increment. dan inisialisasi now() untuk date dan null adalah kosong maksudnya, date disini akan otomatis di isi langsung
		return $SQL = mysqli_query($connect,$QuerySql); //eksekusi query
	}

	public function riwayat_satu($tgl_awal,$tgl_akhir,$connect){//Adelia fitriawati z 1700018281
	
	$q1="SELECT penjualan.tgl_penjualan AS waktu,penjualan.id as id,pelanggan.Nama as nama,penjualan.no_transaksi as no_transaksi,penjualan_detail.kode_obat as kode_obat,penjualan_detail.jumlah as jumlah_beli, penjualan_detail.sub_total as total_beli from penjualan,pelanggan,penjualan_detail where penjualan.id=pelanggan.ID and penjualan.id=penjualan_detail.id and penjualan.no_transaksi=penjualan_detail.no_transaksi and penjualan.tgl_penjualan between '$tgl_awal' and '$tgl_akhir'"; //query function untuk melihat daftar pembelian member.
  	//query ini berfungsi untuk memanggil fungsi conect untuk memberikan akses ke database dan inisialisasi dari querysql
		return $q1; // untuk mengembalikan hasil query di atas
	}

	public function riwayat_dua($connect){//Adelia fitriawati z 1700018281
		 //query function untuk melihat daftar pembelian member.
		$x="SELECT penjualan.tgl_penjualan AS waktu,penjualan.id as id,pelanggan.Nama as nama, penjualan.no_transaksi as no_transaksi,penjualan_detail.kode_obat as kode_obat,penjualan_detail.jumlah as jumlah_beli, penjualan_detail.sub_total as total_beli from penjualan,pelanggan,penjualan_detail where penjualan.id=pelanggan.ID and penjualan.id=penjualan_detail.id and penjualan.no_transaksi=penjualan_detail.no_transaksi";
		return  $x; // untuk mengembalikan hasil query di atas 
	} //sampe line yang di sini

 ?>