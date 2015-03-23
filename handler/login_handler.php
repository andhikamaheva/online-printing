<?php
include "connection_handler.php";

$user_name=$_POST["user_name"];
$user_password=$_POST["user_password"];

$query="SELECT user_name FROM user 
				WHERE user_name='".$user_name."' 
				AND user_password='".$user_password."'";
$login=mysql_query($query);
$ketemu=mysql_num_rows($login);
if($ketemu==1){
	session_start();
	$_SESSION['user_name']=$user_name;
}
	header('location: ../');
?>
