<?php
	session_start();
	if(isset($_SESSION['admin'])){
		include "template/template.php";
	}else{
		include "page/page_login.php";
	}
?>
