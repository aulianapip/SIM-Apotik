<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	if (isset($_POST['kirim'])) {
	include "koneksi/koneksi.php";	 
	
	$query ="SELECT * FROM opname WHERE kode_opname in (SELECT max(kode_opname) from opname )";
	$cek = mysqli_query($konek, $query);
	$tampil=mysqli_fetch_array($cek);
	$kode_opname_b=$tampil['kode_opname']+1;

	$kode_obat = $_POST['kode_obat'];
	$status_obat = $_POST['status_obat'];
	$obat_kurang = $_POST['obat_kurang'];
	$catatan = $_POST['catatan'];
	$query1 ="INSERT INTO opname(kode_opname, kode_obat, status_obat, obat_kurang, catatan, tanggal) VALUES('$kode_opname_b', '$kode_obat','$status_obat','$obat_kurang','$catatan',curdate())";
	mysqli_query($konek, $query1);
	header("location: http://localhost/opname/cek_opname.php");
	}
	 ?>
	 <form class="from-horizontal" action="tambah_opname.php" method="POST" role="form" >
<div class="form-group">
  <label for="usr">KODE OBAT</label>
  <input type="text" class="form-control" name="kode_obat">
</div>
<br>
<div class="form-group">
  <label for="pwd">SELISIH OBAT</label>
  <input type="text" class="form-control" name="obat_kurang">
</div>
<br> 
 <div class="form-group">
  <label for="sel1">STATUS OBAT</label>
  <select class="form-control" name="status_obat">
    <option>RUSAK</option>
    <option>HILANG</option>
    <option>DIPINJAM</option>
  </select>
</div>
<br>
 <div class="form-group">
  <label for="comment">CATATAN</label>
  <textarea class="form-control" rows="5" name="catatan"></textarea>
</div> 
<br>
    <div class="form-group">
          <button id="kirim" name="kirim" value="kirim" class="btn btn-default btn-block">Tambah</button>
</div>
	 </form>
</body>
</html>