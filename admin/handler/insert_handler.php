<?php
include "connection_handler.php"; 

if(isset($_GET['t'])){
	if($_GET['t']=='admin'){
		$admin_username=$_POST["admin_username"];
		$admin_password=md5($admin_username."123");
		$admin_name=$_POST["admin_name"];
		$admin_email=$_POST["admin_email"];

		$query="INSERT INTO admin VALUES ('".$admin_username."', '".$admin_password."', '".$admin_name."', '".$admin_email."', true)";
	}
	
	if($_GET['t']=='service'){
		$service_name=$_POST["service_name"];

		$query="INSERT INTO service_det VALUES (null, '".$service_name."', true)";
	}

	 if($_GET['t']=='servicedet'){
		$service_panjang=$_POST["service_panjang"];
		$service_lebar=$_POST["service_lebar"];
		$service_price=$_POST["service_price"];
		$service_layanan=$_POST["service_layanan"];
		$query="INSERT INTO service VALUES ( ".$service_layanan.", '".$service_panjang." x ".$service_lebar."', '".$service_price."')";
	}

	$result=mysqli_query($conn,$query);
	$error=mysqli_error($conn);
	mysqli_close($conn);
	echo $error;
}
?>
