<?php
session_start();
include "connection_handler.php";
if (isset($_SESSION['transaksi'])) {
	if (isset($_SESSION['member'])) {
		echo "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Hello! <strong> " . $_SESSION['member']['member_name'] . "</strong> There is your order details</div>";
	} else {
		echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Attention!</strong> You are not logged in. Please login first or register if you haven't account</div>";
	}
	?>

<hr></hr>
<form method="post" id="checkout" action="handler/final_CO.php" enctype="multipart/form-data">
				<table class="table table-striped">
					<thead>
						<th>Service ID</th>
						<th>Name</th>
						<th>Size</th>
						<th>Price</th>
						<th>Jumlah</th>
						<th>File</th>
					</thead>
					<tbody>
						<?php
$x=1;
foreach ($_SESSION["transaksi"] as $cart) {
		echo '<tr>';
		echo '<td><center>' . $cart['service_id'] . '</center></td>';
		echo '<td width="20%">' . $cart['service_name'] . '</td>';
		echo '<td>' . $cart['service_size'] . ' (mm)</td>';
		echo '<td>Rp ' .number_format($cart["service_price"], 0, "", ".").'</td>';
		echo '<td><center>' .$cart["service_qty"].'</center></td>';
		echo '<td><input type="file" name="file'.$x.'" required/></td>';
		echo '</tr>';
		$total += $cart['service_price']*$cart["service_qty"];
		$cart++;
		$x++;
	}
	?>

	</tbody>
				</table><hr></hr>
				<center><h4><strong>Total :  <?php echo 'Rp. ' . number_format($total, 0, "", ".") . ''?></strong></h4>
				<?php
if (isset($_SESSION['member'])) {
		echo '<button class="btn btn-primary" type="submit" style="margin-bottom:15px;">';
		echo 'Konfirmasi';
		echo '</button>';
	}
	?>
</center>


			</form>

	<?php
} else {
	?>
<center><h3>Tidak Ada Transaksi</h3></center>
<?php }
?>
