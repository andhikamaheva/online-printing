<?php
	session_start();
	unset ($_SESSION['admin']);
	unset ($_COOKIE['admin']);
	setcookie('admin', null, -1,'/');
	session_destroy();
	header('location: ../');
?>
