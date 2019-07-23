<?php

# Konek ke Web Server
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "sim-apotek-analitik";

//192.168.43.114
function opendb(){
		global $myHost, $myUser, $myPass, $myDbs, $koneksi_db;
		$koneksi_db = mysqli_connect($myHost,$myUser,$myPass,$myDbs); 
		
		//mysql_select_db($mysql_database, $koneksi_db);
		return $koneksi_db;
	}
	

function querydb($sql){
		global $koneksi_db;
		$result=mysqli_query($koneksi_db,$sql);
		return $result;
}		

//Fungsi Fetch_Row
function rowdb($sql){
		$rowdb=mysqli_fetch_row($sql);
		return $rowdb;
	}
//Fungsi Fetch_Array
	function arraydb($sql){
		$arraydb=mysqli_fetch_array($sql);
		return $arraydb;
	}

//Fungsi Nums_Row
	function numrows($sql){
		$numrows=mysqli_num_rows($sql);
		return $numrows;
	}
	
//Fungsi Close Database
	function closedb(){
		global $koneksi_db;
		mysqli_close($koneksi_db);
	}

		
function freedb($hsl){

	$free = mysqli_free_result($hsl);
	
}

/*** Koneksi dg OOP ***/
$mysqli = new mysqli($myHost,$myUser,$myPass,$myDbs);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", $mysqli->connect_error());
    exit();
}

	
?>