<?php
class database{
	private $host = "localhost";
	private $user =	"root";
	private $pass = "andhika";
	private $database = "db_online_printing"

public function connectDB(){
	mysqli_connect($this->host, $this->user, $this->pass) or die ("Database Server Error!");
	mysqli_select_db($this->database) or die ("Database Tidak Ada!");
}
}

?>

