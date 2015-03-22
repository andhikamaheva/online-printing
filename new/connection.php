<?php
$server = "localhost"; 
$username = "4dm1n";
$password = "ppw3b_142";
$database = "db_online_printing";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

?>
