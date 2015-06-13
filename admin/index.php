<?php
	session_start();
	if(isset($_COOKIE['admin'])){
		$array=json_decode(stripslashes($_COOKIE['admin']),true);
		$_SESSION['admin']=$array;
	}
	
	if(isset($_SESSION['admin'])){
		include "template/index_admin.php";
	}else{
		include "page/login_admin.php";
	}
?>
