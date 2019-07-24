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

		return 
	}
	//deleteselect.php
	function hapus_ceklis(){

		return
	}

	function input(){

		return 
	}

	function riwayat_satu(){

		return
	}

	function riwayat_dua(){
		
	}
 ?>