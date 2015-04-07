<?php
include "connection_handler.php";

if(isset($_GET['t'])){
	if($_GET['t']=='admin'){
		$admin_username=$_POST["admin_username"];
		
		if($_GET['a']=='false' || $_GET['a']=='true'){
			$active=$_GET['a'];
			$query="UPDATE admin SET admin_active=".$active." WHERE md5(admin_username)='".$admin_username."'";
		}
	}
	
	if($_GET['t']=='member'){
		$member_username=$_POST["member_username"];
		
		if($_GET['a']=='false' || $_GET['a']=='true'){
			$active=$_GET['a'];
			$query="UPDATE member SET member_active=".$active." WHERE md5(member_username)='".$member_username."'";
		}
	}
	
	if($_GET['t']=='service'){
		$service_id=$_POST["service_id"];
		
		if($_GET['a']=='false' || $_GET['a']=='true'){
			$active=$_GET['a'];
			$query="UPDATE service_det SET service_det_active=".$active." WHERE md5(service_id)='".$service_id."'";
		}
		if($_GET['t']=='serviceDet'){
		$service_id=$_POST["service_id"];
		
		if($_GET['a']=='false' || $_GET['a']=='true'){
			$active=$_GET['a'];
			$query="UPDATE service_det SET service_det_active=".$active." WHERE md5(service_id)='".$service_id."'";
		}
	}
	$result=mysqli_query($conn,$query);
	$error=mysqli_error($conn);
	mysqli_close($conn);
	echo $error;
}
?>
