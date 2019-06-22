<?php
$username = "root";
$database = "sim-apotik";
$password = "";
$server = "localhost";

$connect = mysqli_connect($server, $username, $password, $database) or die("Koneksi bermasalah");
