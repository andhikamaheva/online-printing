<?php
	class connect{
		function __construct(){
		require_once('config.php');
		$conn = mysqli_connect(host, user, password);
		mysqli_select_db(database, $conn);
		if(!conn){
			die ("Koneksi database gagal!");
		}
		return $conn;
		}

		public function Close(){
			mysql_close();
		}
	}
?>
