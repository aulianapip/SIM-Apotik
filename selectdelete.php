<!DOCTYPE html>
<?php
	include "library/import.php";

?>
<html>
<head>
	<title>Hapus Banyak Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.btn-primary.active, .btn-primary:active, .open>.dropdown-toggle.btn-primary {
    color: black;
    background-color: pink;
    background-image: none;
    border-color: #ddd;
}
.header {
  overflow: hidden;
  background-color: pink;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active [type=submit]:hover {
  background-color: pink;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>

<body>

	<div class="header">
  <a href="#default" class="logo">CRM APOTEK</a>
  <div class="header-right">
    <a class="active" href="index.php">Home</a>
    <a href="inputdata.php">Input Data</a>
</div>
<br><br><br><br>
	<form action="deleteselect.php" method="post">		
		<table border="1" class="table">
			<tr>
			<td>Tanggal Terdaftar</td>
			<td>ID</td>
			<td>Nama</td>
			<td>Jk</td>
			<td>NoHp</td>
			<td>Email</td>
			<td>Alamat</td>
			<td colspan="2">OPSI</td>
			</tr>
			<?php 
			include "conect.php";
			$QuerySql = "SELECT * FROM pelanggan";
			$Data = mysqli_query($connect, $QuerySql);
		
			while($d = mysqli_fetch_array($Data)){
			?>
			<tr>
				<td><?php echo $d['tgl_daftar']; ?></td>
				<td><?php echo $d['ID']; ?></td>	
				<td><?php echo $d['Nama']; ?></td>
				<td><?php echo $d['Jk']; ?></td>	
				<td><?php echo $d['NoHp']; ?></td>	
				<td><?php echo $d['Email']; ?></td>
				<td><?php echo $d['Alamat']; ?></td>				
				<td><input type="checkbox" name="pilih[]" value="<?php echo $d['ID']; ?>"></td>		
			</tr>
			<?php } ?>
		</table>
		<input type="submit" name="hapus" value="Hapus">
		<a href="index.php"><input type="image" width="20%" src="refresh.png" name="Refresh" class="button"></a>
		
	</form>
 
</body>
</html>