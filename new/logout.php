<?php
	session_start();
	session_destroy();
	unset($_SESSION['user_name']); 
	session_regenerate_id();
	header("Location: login.php");
	exit();
?>