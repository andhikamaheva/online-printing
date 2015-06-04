<?php
	session_start();
	if(isset($_SESSION['admin'])){
		include "template/index_admin.php";
	}else{
		include "page/login_admin.php";
	}
?>
