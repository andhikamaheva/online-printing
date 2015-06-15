<?php
	include "../handler/connection_handler.php";
	$query="SELECT transaksi_ID FROM db_online_printing.transaksi WHERE transaksi_approve is null and transaksi_close is null";
	$result=mysqli_query($conn,$query);
	$jml=mysqli_num_rows($result);
	mysqli_close($conn);
	if($jml>0){
?>
<li class="hidden-xs">
	<a href="#data_masuk" class="ajax-link">
		<i class="fa fa-sign-in"></i>
		<span class="badge"><?php echo $jml;?></span>
	</a>
</li>
<?php
	}
	
	include "../handler/connection_handler.php";
	$query="SELECT transaksi_ID FROM db_online_printing.transaksi WHERE transaksi_approve is null and transaksi_close is null and transaksi_payment is not null";
	$result=mysqli_query($conn,$query);
	$jml=mysqli_num_rows($result);
	mysqli_close($conn);
	if($jml>0){
?>
<li class="hidden-xs">
	<a class="ajax-link" href="#data_masuk">
		<i class="fa fa-money"></i>
		<span class="badge"><?php echo $jml;?></span>
	</a>
</li>
<?php
	}
?>
