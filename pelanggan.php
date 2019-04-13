
<!DOCTYPE html>
<html>
<head>  <script type="text/javascript">
        	$(document).ready(function(){
        		$("tgl_awal").datepicker({
        			altFormat:"dd MM yy",
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
        	//line 4-26 dibuat rizka
        </script>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
body{
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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

 tr:hover {background-color: #ddd;}

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
}
</style>
</head>

<?php  
	include 'conect.php';
	include ('header.php');

	if (isset($_POST['Cari'])) {

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
		$tgl_awal= $_POST['tgl_awal'];
		$tgl_akhir= $_POST['tgl_akhir'];


	$q1="SELECT * from pelanggan where tgl_daftar between '$tgl_awal' and '$tgl_akhir'";
	$SQL=mysqli_query($connect,$q1);
	
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

	$SQL = mysqli_query($connect,$QuerySql);
	//line 30-83 dibuat carto
	}
	?>

<body>
<h3>TABEL PENCARIAN TANGGAL</h3>
<table border="1" class="table" >
	<thead class="thead-dark">
		<tr align="center"><td>Tangggal Daftar</td>
			<td>ID</td>
			<td>Nama</td>
			<td>Jenis Kelamin</td>
			<td>No Hp</td>
			<td>Email</td>
			<td>Alamat</td>
			<td colspan="2">OPSI</td>
		</tr>
	</thead>

	<?php 
	foreach($SQL as $Data) {
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