<?php
include "connection_handler.php"; 

if(isset($_GET['t'])){
	if($_GET['t']=='imgByr'){
		$transaksi_ID=$_POST["transaksi_ID"];

		$query="SELECT transaksi_payment FROM transaksi WHERE md5(transaksi_ID)='".$transaksi_ID."'";
		$result=mysqli_query($conn,$query);
		$data=mysqli_fetch_array($result);
		$return='<a href="data:image/png;base64,'.base64_encode($data[0]).'" target="_blank"><img src="data:image/png;base64,'.base64_encode($data[0]).'" class="img-thumbnail" /></a>';
	}
	
	mysqli_close($conn);
	echo $return;
}
?>
