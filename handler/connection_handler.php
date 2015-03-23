<?php
$server = "repo.stikom.edu"; 
$username = "ppweb_r1_kel1";
$password = "p455w0rd";
$database = "db_online_printing";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

?>
