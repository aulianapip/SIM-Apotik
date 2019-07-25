//DIMAS RESTU MAULANA
//E
//1700018247
//UAS PRPL
<?php 
	if(isset($_POST['kirim'])){ //tombol kirim
	include 'db.php';
  	$user = $_POST['user'];
  	$password = $_POST['password'];
  	$QuerySql = "SELECT `user`,'password' from login"; //membuat password dari login
  	$SQL = mysqli_query($connect, $QuerySql);
  	foreach ($SQL as $value) {
  		if($user == "$value[user]"){ //username user
  			if ($password == "$value[password]") { //password adalah password
  				echo "berhasil";
  				header("Location: dataobat.php");

  			}else{
  			header("location: login.html");		 
  			echo "gagal"; //jika gagal akan mengulang login kembali
  			}
  		}else{

  			echo "$value[password]";

  		}
  	}
	}
 ?>
