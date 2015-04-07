<?php
include "connection_handler.php";

$admin_username=$_POST["admin_username"];
$admin_password=md5($_POST["admin_password"]);

$query="SELECT admin_username, admin_name FROM admin 
				WHERE admin_username='".$admin_username."' 
				AND admin_pass='".$admin_password."' AND admin_active=true";
$result=mysqli_query($conn,$query);
$ketemu=mysqli_num_rows($result);
if($ketemu==1){
	$data=mysqli_fetch_array($result);
	mysqli_close($conn);
	session_start();
	$_SESSION['admin']=$data;
	header('location: ../');
}else{
	header('location: ../?f');
}
?>
