<!-- 1. Fitur CRM atau disebut pelanggan. fitur ini digunakan untuk menginputkan data member yang akan digunakan di bagian kasir. jika pelanggan tersebut adalah member maka akan di kenakan diskon. -->
<!DOCTYPE html>
<html>
<head>  <script type="text/javascript">
        	$(document).ready(function(){
        		$("tgl_awal").datepicker({
        			altFormat:"dd MM yy",  //format tanggal-bulat-tahun
        			changeMonth : true,
        			changeYear : true
        		});
        		$("#tgl_awal").change(function() {
        			$("#tgl_awal").datepicker("option","dateFormat","yy-mm-dd");
        		});
        	});
        </script>
        <script type="text/javascript">
        	$(document).ready(function(){
        		$("tgl_akhir").datepicker({
        			altFormat:"dd MM yy", 
        			changeMonth : true,
        			changeYear : true
        		});
        		$("#tgl_awal").change(function() {
        			$("#tgl_akhir").datepicker("option","dateFormat","yy-mm-dd");
        		});
        	});
        	//line 4-26 dibuat rizka arnanda menggunakan script bootstrap datepicker
        </script>



<!-- untuk bagian UI dikerjakan Aditiya Aziz saputra 17000182233 dan Alfian Noor 1700018233 -->


<!-- Mengatur Layout Dengan CSS -->
<link rel="stylesheet" type="text/css" href="style.css">  <--! untuk link css -->
<style type="text/css">
body{
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; <!-- untuk jenis huruf -->
  border-collapse: collapse;
  width: 100%;
}

 td,  th {
  border: 1px solid #ddd;
  padding: 8px;
  width:100%;
  height:100%;
  text-align: left;
}

 tr:nth-child(even){background-color: #f2f2f2;}   
<!-- Salah satu cara untuk meningkatkan keterbacaan tabel besar adalah dengan mewarnai baris bergantian -->

 tr:hover {background-color: #ddd;}
 <!--menambahkannya ke baris tabel menggunakan aturan stylesheet -->

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;   <!-- fungsi untuk membuat perataan teks bagian kiri-->
  background-color: #4CAF50; <!-- untuk pewarnaan backg round: --!>
  color: white;
}
}
</style>
</head>

<?php  
	include 'conect.php';   //untuk menghubungkan ke database (dibuat oleh tesya pratiwi 1700018246)
	include ('header.php');  //pemanggilan untuk bagian header dengan nama file header.php

	if (isset($_POST['Cari'])) {  //sintaks yang berfungsi untuk sebagai inisial yang akan menyimpan nilai atau value

	if(isset($_GET['pesan'])){
		$pesan=$_GET['pesan'];
		if($pesan=="Hapus"){
			echo "<center>
				Berhasil dihapus !
			</center>";
		}
		else if($pesan=="Edit"){
			echo "
			<center>
			Berhasil diupdate !
			</center>
			";

		}
	}
		include 'fungsi_indotgl.php';
		$tgl_awal= $_POST['tgl_awal'];  //sintaks yang berfungsi untuk sebagai inisial yang akan menyimpan nilai atau value
		$tgl_akhir= $_POST['tgl_akhir'];  //sintaks yang berfungsi untuk sebagai inisial yang akan menyimpan nilai atau value


	$q1="SELECT * from pelanggan where tgl_daftar between '$tgl_awal' and '$tgl_akhir'";
	$SQL=mysqli_query($connect,$q1);  //query ini berfungsi untuk memanggil fungsi conect untuk memberikan akses ke database dan inisialisasi dari querysql

	
	}
	else if(isset($_POST['Refresh'])){
		echo "<meta http-equiv='refresh' content='1 url=pelanggan.php'>";
	}
	else{

	if(isset($_GET['pesan'])){
		$pesan=$_GET['pesan'];
		if($pesan=="Hapus"){
			echo "<center>
				Berhasil dihapus !
			</center>";
		}
		else if($pesan=="Edit"){
			echo "
			<center>
			Berhasil diupdate !
			</center>
			";

		}
	}

	$QuerySql = "SELECT * FROM pelanggan";
	// perintah untuk menampilkan semua data pelanggan
	$SQL = mysqli_query($connect,$QuerySql);//query ini berfungsi untuk memanggil fungsi conect untuk memberikan akses ke database dan inisialisasi dari querysql
	//line 30-83 dibuat carto
	}
	?>

<body>
<h3>TABEL PENCARIAN TANGGAL</h3><!-- untuk memberikan judul dengan nama input data pelanggan -->
<table border="1" class="table" >
	<!-- perintah membuat tabel -->
	<thead class="thead-dark">
		<tr align="center"><!-- perintah untuk membuat baris -->
			<td>Tangggal Daftar</td><!-- sintaks untuk membuat kolom tanggal daftar-->
			<td>ID</td><!-- sintaks untuk membuat kolom ID-->
			<td>Nama</td><!-- sintaks untuk membuat kolom nama-->
			<td>Jenis Kelamin</td><!-- sintaks untuk membuat kolom jenis kelamin-->
			<td>No Hp</td><!-- sintaks untuk membuat kolom no hp-->
			<td>Email</td><!-- sintaks untuk membuat kolom email-->
			<td>Alamat</td><!-- sintaks untuk membuat kolom alamat-->
			<td colspan="2">OPSI</td><!-- sintaks untuk membuat kolom opsi-->
		</tr>
	</thead>
	<!-- line 122-137 dibuat oleh tesya pratiwi 1700018246 -->
	<?php 
	foreach($SQL as $Data) {// sintaks untuk perulangan menampilkan semua isi data pelanggan
		echo "
		<tr>
		<td >$Data[tgl_daftar]</td>
		<td >$Data[ID]</td>
		<td >$Data[Nama]</td>
		<td >$Data[Jk]</td>
		<td >$Data[NoHp]</td>
		<td >$Data[Email]</td>
		<td >$Data[Alamat]</td>
		<td ><a href='formedit.php?ID=$Data[ID]'>Edit</a>
		<td ><a href='hapus.php?ID=$Data[ID]'>Hapus</a>
		";
	}
	// line 142-153 dibuat oleh tesya pratiwi 1700018246


	?>

	


	</tr>

</table>

<br>
<br>
<form method="post" action="pelanggan.php">
	<div><label for="tgl_awal">Dari Tanggal</label>
		<input type="date" id="tgl_awal" name="tgl_awal">&nbsp;
		<label for="tgl_akhir">Sampai Tanggal</label>
		<input type="date" id="tgl_akhir" name="tgl_akhir">
	</div>
	<!-- line 138-142 dibuat rizka -->
	<button>
	<input type="submit" name="Cari" value="Cari" class="button"> <!--dibuat  carto -->
	</button>
	<button>
	<input type="submit" name="Refresh" value="Refresh"class="button"><!-- dibuat carto -->
</button>
</form>


</body>
</html>