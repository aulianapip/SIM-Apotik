<?php
$username = "root";
$database = "kasawal";
$password = "";
$server = "localhost";

$connect = mysqli_connect($server, $username, $password, $database) or die("Koneksi bermasalah");
