<?php
	session_start();
	if(isset($_SESSION['user_name'])){
		include "template/template.php";
	}else{
		include "page/page_login.php";
	}
?>
