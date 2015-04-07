<?php
include "connection_handler.php";

$admin_name=$_POST["admin_username"];
$admin_password=md5($_POST["admin_password"]);
echo "1";
$query="SELECT admin_username, admin_name FROM admin 
				WHERE admin_username='".$admin_name."' 
				AND admin_pass='".$admin_password."'";
echo "2";
$login=mysql_query($query);
$ketemu=mysql_num_rows($login);
if($ketemu==1){
	$data=mysql_fetch_array($login);
	session_start();
	$_SESSION['admin']=$data;
}
	header('location: ../');
?>
