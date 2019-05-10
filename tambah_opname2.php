<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tambah Opname</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
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
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form action="tambah_opname.php" method="POST" role="form" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-32">
						     Tambah Stock Opname
					</span>

					<span class="txt1 p-b-11">
						ID
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Tidak Boleh Kosong">
						<select class="form-control" name="kode_obat">
						    <option>B001</option>
						    <option>B002</option>
						    <option>B003</option>
						    <option>B004</option>
						    <option>B005</option>
						    <option>B006</option>
						    <option>B007</option>
						    <option>B008</option>
						    <option>B009</option>
						    <option>B010</option>
						    <option>B011</option>
						    <option>B012</option>
						    <option>B013</option>
						    <option>B014</option>
						    <option>B015</option>
						    <option>B016</option>
						    <option>B017</option>
						    <option>B018</option>
						    <option>B019</option>
						    <option>B020</option>
						    <option>B021</option>
						    <option>B022</option>
						    <option>B023</option>
						    <option>B024</option>
						    <option>B025</option>
						  </select>
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Selisih Obat
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Tidak Boleh Kosong">
						
						</span>
						<input type="text" name="obat_kurang">
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Status Obat
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Tidak Boleh Kosong">
						
						</span>
						<select class="form-control" name="status_obat">
					    <option>RUSAK</option>
					    <option>HILANG</option>
					    <option>DIPINJAM</option>
					  </select>
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Catatan
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Tidak Boleh Kosong">
						
						</span>
						<textarea class="form-control" rows="5" name="catatan"></textarea>
						<span class="focus-input100"></span>
					</div>



					<div class="container-login100-form-btn">
						<div >
          			<button id="kirim" name="kirim" value="kirim" class="btn btn-default btn-block">Tambah</button>
					</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>