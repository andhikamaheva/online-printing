<?php
include "connection.php";

$user_name=$_POST["user_name"];
$user_password=$_POST["user_password"];

$query="SELECT * from admin where admin_username = '".$user_name."' and admin_pass = '".$user_password."'";
$login=mysql_query($query);
$ketemu=mysql_num_rows($login);
if($ketemu==1){
	//echo "login berhasil!";
	session_start();
	$_SESSION["user_name"]=$user_name;
	header("location: index.php");
}
else {
	echo "login gagal!";
//	header("location: login.php");
}
?>
	
