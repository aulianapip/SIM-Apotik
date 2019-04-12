<?php
$username = "root";
$database = "cf";
$password = "";
$server = "localhost";

$c = mysqli_connect($server, $username, $password, $database) or die("Koneksi bermasalah");
