<?php
session_start();
include "connection_handler.php";

if(isset($_GET['t'])){
	if($_GET['t']=='admin'){
		$admin_session=md5($_SESSION['admin']['admin_username']);
		$admin_username=$_POST["admin_username"];
		$admin_password=md5($_POST["admin_pass"]);
		$admin_name=$_POST["admin_name"];
		$admin_email=$_POST["admin_email"];

		$query="UPDATE admin SET admin_name='".$admin_name."', admin_email='".$admin_email."'"; 
		if($admin_password!=""){
			$query=$query.", admin_pass='".$admin_password."'";
		}
		$query=$query." WHERE md5(admin_username)='".$admin_username."'";
		
		if($admin_session==$admin_username){
			$_SESSION['admin']['admin_name']=$admin_name;
		}
	}
	elseif($_GET['t']=='service'){
		$service_id=$_POST["service_id"];
		$service_name=$_POST["service_name"];

		$query="UPDATE service_det SET service_name='".$service_name."'"; 
		$query=$query." WHERE md5(service_id)='".$service_id."'";
	}
	$result=mysqli_query($conn,$query);
	$error=mysqli_error($conn);
	mysqli_close($conn);
	echo $error;
}
?>
