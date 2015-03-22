<?php
		session_start();
		session_destroy();
		unset($_SESSION['login']);
		unset($_SESSION['username']);
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		session_regenerate_id();
		header('location: login.php');
		exit();
?>