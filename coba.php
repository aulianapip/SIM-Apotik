<html>
<head>
	<title>Php Nasi Goreng gilacoding.com</title>
</head>
<body>
<h1>Belajar PHP (IF/ELSE)</h1>
<form method="post">
Uang kita = <input type="text" name="uang" required><br>
Harga nasi goreng = <input type="text" name="harga" required><br>
<?php
$uang=@$_POST["uang"]; // untuk mendapatkan nilai dari text field dengan name="uang" 
$harga=@$_POST["harga"]; // sama seperti diatas tapi "harga"
if (($uang && $harga) == "") { // Jika uang DAN harga SAMA DENGAN kosong maka tampil dibawah ini.
	echo "<br/> Silahkan isi uang dan harga";
} elseif ($uang < $harga) { // Jika uang kurang dari harga.
	$kurang = $harga - $uang; 
	echo " <br/>Uang anda kurang <b>Rp.$kurang</b>!";
} else { 
	$lebih = $uang - $harga; 
	echo " <br/>Uang anda lebihan <b>Rp.$lebih</b>";
}
?>
<br><input type="submit" value="Proses">
</form>
</body>
</html>