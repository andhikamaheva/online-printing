<?php
session_start();
include "connection_handler.php";
if (isset($_SESSION['transaksi'])) {
	if (isset($_SESSION['member'])) {
		echo "<div class='col-sm-12 col-md-12'><div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Hello! <strong> " . $_SESSION['member']['member_name'] . "</strong> There is your order details</div></div>";
	} else {
		echo "<div class='col-sm-12 col-md-12'><div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Attention!</strong> You are not logged in. Please login first or register if you haven't account</div></div>";
	}
	?>


<form method="post" id="checkout"action="checkout.php">
				<table class="table table-striped">
					<thead>
						<th>Service ID</th>
						<th>Name</th>
						<th>Size</th>
						<th>Price</th>
						<th>Delete</th>
					</thead>
					<tbody>
						<?php
foreach ($_SESSION["transaksi"] as $cart) {
		echo '<tr>';
		echo '<td>' . $cart['service_id'] . '</td>';
		echo '<td>' . $cart['service_name'] . '</td>';
		echo '<td>' . $cart['service_size'] . '</td>';
		echo '<td>' . $cart['service_price'] . '</td>';
		echo '<td><a href="#" onclick=deleteTableCart("' . md5($cart['service_id']) . '","' . md5($cart['service_size']) . '")><i class="fa fa-trash-o" ></i></a></td>';
		echo '</tr>';
		$total += $cart['service_price'];
		$cart++;
	}
	?>

	</tbody>
				</table>
				<h4>Total :  <?php echo 'Rp. ' . number_format($total, 0, "", ".") . ''?></h4>
				<?php
if (isset($_SESSION['member'])) {
		echo '<button class="btn btn-primary pull-right" type="submit">';
		echo 'Konfirmasi';
		echo '</button>';
	}
	?>



			</form>

	<?php
} else {
	?>
<center><h3>Tidak Ada Transaksi</h3></center>
<?php }
?>