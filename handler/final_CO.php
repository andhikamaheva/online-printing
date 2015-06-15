<?php
	session_start();
	include '../connection_handler.php';
	function executeScalar($sql,$def=0){
		$rs = mysqli_query($sql) or die(mysqli_error().$sql);
		if (mysqli_num_rows($rs)) {$r = mysqli_fetch_row($rs);mysqli_free_result($rs);return $r[0];}
		return $def;
	}
	
	$member=$_SESSION['member']['member_username'];
	$sql="INSERT INTO transaksi(transaksi_ID, transaksi_open, member_member_username)
			VALUES(null,now(),'".$member."')";
	$result = mysqli_query($conn, $sql);
	if (!$result){
		echo"Error!!!!".mysqli_error();	
	}else{
		$sql="select max(transaksi_ID) from transaksi";
		$tid = mysqli_query($conn, $sql);
		$x=1;
		foreach ($_SESSION["transaksi"] as $cart) {
			
			$file	= $_FILES['"file'.$x.'"']['tmp_name'];
			$product_image_size	= $_FILES['"file'.$x.'"']['size'];
			$fp = fopen($product_image_tmp_name, 'r');
			$product_image_content	= fread($fp, $product_image_size) or die("Error: cannot read file");
			$product_image_content	= mysqli_real_escape_string($product_image_content) or die("Error: cannot read file");
			fclose($fp);
			
			$id = $cart['service_id'];
			$size = $cart['service_size'];
			$price = executeScalar("select service_price from service where service_ID='".$id."' and service_size='".$size."'");
			$qty = $cart["service_qty"];
			
			$query="insert into transaksi_det(transaksi_det_ID, transaksi_ID, service_ID, size, file_print, quantity, price)
			values(null, '".$tid."', '".$id."', '".$size."', '".$product_image_content."', '".$quantity."', '".$price."' )";
			if (!$result){
				echo"Error! ".mysqli_error();	
			}
			$cart++;
			$x++;
		}
	}
		
//header("location:../index.php");
//header("location:../checkout.php");
?>