<?php
function executeScalar($sql,$def=0){
	include 'connection_handler.php';
	$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	if (mysqli_num_rows($rs)) {$r = mysqli_fetch_row($rs);mysqli_free_result($rs);return $r[0];}
	return $def;
}
include "handler/connection_handler.php";
session_start();
if (isset($_SESSION['member'])) {
	?>
	<!DOCTYPE html>
	<html lang="en">
	<?php
include "template/header.php";
	include "admin/handler/connection_handler.php";
	?>
	<body>
		<div id="navbar">
			<?php
	include "template/navbar.php";
	
	$sql="	SELECT transaksi_ID, transaksi_open, transaksi_approve, transaksi_close 
			FROM transaksi 
			where member_member_username='".$_SESSION['member']['member_username']."'";
	$result = mysqli_query($mysqli, $sql);
	
	
	?>
		</div>
		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-md-9">

					<div class="row">
						<h3 class="konten-filter-title">Layanan</h3>
						<hr></hr>
						<div class="col-md-12">
							<table class="table table-striped">
			<thead>
				<th>Invoice No.</th>
				<th>Due Date</th>
				<th>Total</th>
				<th>Status</th>
				<th>Details</th>
			</thead>
			<tbody>
			
			<?php
				while($row = mysqli_fetch_assoc($result)) {
					$total = executeScalar("select sum(quantity * price) from transaksi_det 
					where transaksi_ID='".$row["transaksi_ID"]."'
					group by transaksi_ID");
					$status='';
					if($row["transaksi_approve"]==null and $row["transaksi_close"]==null){
						$status='pending';
					}elseif($row["transaksi_approve"]==null and $row["transaksi_close"]<>null){
						$status='<font color="red">cancel</font>';
					}elseif($row["transaksi_approve"]<>null and $row["transaksi_close"]==null){
						$status='<font color="blue">process</font>';
					}else{
						$status='<font color="green">finish</font>';
					}
					echo'
					<tr>
						<td>'.$row["transaksi_ID"].'</td>
						<td>'.$row["transaksi_open"].'</td>
						<td> Rp '.number_format($total,0,"",".").'</td>
						<td>'.$status.'</td>
						<td><a href="#" onclick="detiltransaksi('.$row["transaksi_ID"].')">detail transaksi</a></td>
					</tr>';
				}
			?>
			
			</tbody>
			</table>
						</div>
					</div>

				</div>
				<?php include "template/sidebar.php";?>
			</div>
		</div>
		<!-- /.container -->
		<div class="container">
			<hr>
			<!-- Footer -->
			<footer style="padding-top:5px">
				<div class="row">
					<div class="col-lg-12">
						<p style="text-align:center">Copyright &copy; project PPWEB R1</p>
					</div>
				</div>
			</footer>
		</div>
		<!-- /.container -->
		<!-- jQuery -->

		<script src="js/master.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

	</body>
	</html>



	
	<?php
	mysqli_close($conn);
	mysqli_close($mysqli);
} else {
	//$return_url = base64_decode($current_url);
	//echo $return_url;
	mysqli_close($conn);
	mysqli_close($mysqli);
	header('Location: ' . base64_decode($_SESSION["url"]));
}
?>

