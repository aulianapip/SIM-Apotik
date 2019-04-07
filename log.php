<?php 
	if(isset($_POST['kirim'])){
	include 'db.php';
  	$user = $_POST['user'];
  	$password = $_POST['password'];
  	$QuerySql = "SELECT `user`,'password' from login";
  	$SQL = mysqli_query($connect, $QuerySql);
  	foreach ($SQL as $value) {
  		if($user == "$value[user]"){
  			if ($password == "$value[password]") {
  				echo "berhasil";
  				header("Location: dataobat.php");

  			}else{
  			header("location: login.html");		 
  			echo "gagal";
  			}
  		}else{

  			echo "$value[password]";

  		}
  	}
	}
 ?>