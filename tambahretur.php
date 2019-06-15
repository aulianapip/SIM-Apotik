<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include "koneksi.php";
		$query = mysqli_query($koneksi,"SELECT * FROM obat");
		if (isset($_POST['kirim'])) {

			$kode_retur = $_POST['kode_retur'];
			$kode_obat = $_POST['kode_obat'];
			$rusak = $_POST['rusak'];
			$catatan = $_POST['catatan'];

			$query = mysqli_query($koneksi,"INSERT INTO retur(kode_retur, kode_obat, rusak, catatan, tanggal) VALUES('$kode_retur', '$kode_obat','$rusak','$catatan',curdate())");
			header("location: dataretur.php");
		}
	 ?>
	 <form class="from-horizontal" action="tambahretur.php" method="POST" role="form" >
 <div class="form-group">
  <label for="pwd">Kode Retur</label>
  <input type="text" class="form-control" name="kode_retur">
 </div>
 <div class="form-group">
  <label for="sel1">Kode Obat</label>
  <select class="form-control" name="kode_obat">
    <?php 
    	foreach ($query as $data) {
    		echo "<option value=$data[kode_obat]>$data[kode_obat]</option>";
    	}
     ?>
  </select>
</div>
<br>
<div class="form-group">
  <label for="pwd">RUSAK</label>
  <input type="text" class="form-control" name="rusak">
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