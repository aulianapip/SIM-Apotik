<?php 
	//di index.php
	function tampil_berdasarkan_tanggal(){
	$q1="SELECT * from pelanggan where tgl_daftar between '$tgl_awal' and '$tgl_akhir'";
		$SQL=mysqli_query($connect,$q1);
		return $SQL;
	}
	//diindex.php
	function tampil(){
		//yang order by
		return
	}

	//di formedit.php
	function edit(){
		//$edit
		$SQL=mysqli_query($connect,$edit);
		return
	}

	//edit.php 
	function update(){

		return 
	}
	//hapus.php
	function hapus(){
		
		
	include 'conect.php'; //untuk menyambungkan ke database yang sudah dibuat dengan nama folder conect.php
	$ID = $_GET['ID']; //untuk mendapatkan id pada database yang sudah ada di dalamnya
	$QuerySql = "DELETE FROM pelanggan WHERE ID='$ID' "; //sintaks penghapusan data secara langsung dengan tombol delete
	$SQL = mysqli_query($connect,$QuerySql);//untul menjalankan sintaks diatas agar sinkron dengan database
	header("location:index.php?pesan=Hapus");//ketika data sudah terhapus, maka tampilan akan merefresh ke dalam tampilan awal yaitu index
		
		return 
	}
	//deleteselect.php
	function hapus_ceklis(){

		include 'conect.php'; //untuk menyambungkan ke database yang sudah dibuat dengan nama folder conect.php
	$ID = $_POST['pilih']; //untuk memanggil saat multiple delete dipilih dengan opsi, mana saja data yang akan di delete
	$jumlah_dipilih = count($ID); //dan ketika opsi telah di panggil, maka akan di proses dengan perulangan sesuai dengan opsi yang kita pilih

	for($x=0; $x<$jumlah_dipilih; $x++){

	mysqli_query($connect,"DELETE FROM pelanggan WHERE ID ='$ID[$x]'"); //disini, kodingan akan memproses dalam mendelete data yang telah kita pilih untuk didelete
 
}
 
header("location:selectdelete.php"); // setelah berhasil di delete, maka akan kembali atau refresh ke folder awal untul mendelete data.

		return ;
	}

	function input(){

		return 
	}

	function riwayat_satu(){//Adelia fitriawati z 1700018281
	include "connect.php" //untuk menyambungkan ke database yang sudah dibuat dengan nama folder 
	$q1="SELECT penjualan.tgl_penjualan AS waktu,penjualan.tipe as tipe,penjualan.id as id,pelanggan.Nama as nama,penjualan.no_transaksi as no_transaksi,penjualan_detail.kd_barang as kode_obat,penjualan_detail.jumlah as jumlah_beli, penjualan_detail.sub_total as total_beli from penjualan,pelanggan,penjualan_detail where penjualan.id=pelanggan.ID and penjualan.tipe=pelanggan.tipe and penjualan.tipe=penjualan_detail.tipe and penjualan.id=penjualan_detail.id and penjualan.no_transaksi=penjualan_detail.no_transaksi and penjualan.tgl_penjualan between '$tgl_awal' and '$tgl_akhir'"; //query function untuk melihat daftar pembelian member.
  	$SQL=mysqli_query($connect,$q1); //query ini berfungsi untuk memanggil fungsi conect untuk memberikan akses ke database dan inisialisasi dari querysql
		return
	}

	function riwayat_dua(){
		$SQL = mysqli_query($connect, "SELECT penjualan.tgl_penjualan AS waktu,penjualan.tipe as tipe,penjualan.id as id,pelanggan.Nama as nama, penjualan.no_transaksi as no_transaksi,penjualan_detail.kd_barang as kode_obat,penjualan_detail.jumlah as jumlah_beli, penjualan_detail.sub_total as total_beli from penjualan,pelanggan,penjualan_detail where penjualan.id=pelanggan.ID and penjualan.tipe=pelanggan.tipe and penjualan.tipe=penjualan_detail.tipe and penjualan.id=penjualan_detail.id and penjualan.no_transaksi=penjualan_detail.no_transaksi;"); //query function untuk melihat daftar pembelian member.
		return
	} //sampe line yang di sini

 ?>