<?php
	session_start();
	include '../connection_handler.php';
	function executeScalar($sql,$def=0){
		include '../connection_handler.php';
		$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		if (mysqli_num_rows($rs)) {$r = mysqli_fetch_row($rs);mysqli_free_result($rs);return $r[0];}
		return $def;
	}
	
	$member=$_SESSION['member']['member_username'];
	$sql="INSERT INTO transaksi(transaksi_ID, transaksi_open, member_member_username)
			VALUES(null,now(),'".$member."')";
	$result = mysqli_query($conn, $sql);
	if (!$result){
		echo "Error!!!!".mysqli_error($conn);
	}else{
		$tid =executeScalar("select max(transaksi_ID) from transaksi where member_member_username='".$member."'");
		$x=1;
		foreach ($_SESSION["transaksi"] as $cart) {
			
			$tmp_image	= $_FILES['file'.$x]['tmp_name'];
			$product_image_content	= mysqli_real_escape_string($conn,file_get_contents($tmp_image)) or die("Error: cannot read file");
			
			$id = $cart['service_id'];
			$size = $cart['service_size'];
			$price = executeScalar("select service_price from service where service_ID='".$id."' and service_size='".$size."'");
			$qty = $cart["service_qty"];
			
			$query="insert into transaksi_det(transaksi_det_ID, transaksi_ID, service_ID, size, file_print, quantity, price)
			values(null, '".$tid."', '".$id."', '".$size."', '".$product_image_content."', '".$qty."', '".$price."' )";
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			$cart++;
			$x++;
		}
	}
	unset($_SESSION['transaksi']);
	mysqli_close($conn);	
	header("location:../index.php");
//header("location:../checkout.php");
?>
