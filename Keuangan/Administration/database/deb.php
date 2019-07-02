<?php
$username = "root";
$database = "sim-apotek-keuangan";
$password = "";
$server = "localhost";

$connect = mysqli_connect($server, $username, $password, $database) or die("Koneksi bermasalah");
