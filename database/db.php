<?php
$username = "root";
$database = "SIM-Apotik";
$password = "";
$server = "localhost";

$connect = mysqli_connect($server, $username, $password, $database) or die("Koneksi bermasalah");
