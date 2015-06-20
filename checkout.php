<?php

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
	?>
		</div>
		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-md-9">

					<div class="row">
						<h4 class="konten-filter-title">Checkout</h4>
						<div class="col-sm-12 col-lg-12 col-md-12">

							<div id="checkoutList" class="col-sm-12 col-lg-12 col-md-12 thumbnail panel-primary">
								<?php

									include "handler/table_checkout.php";

								?>
							</div>
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
} else {
	//$return_url = base64_decode($current_url);
	//echo $return_url;
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
	?>
		</div>
		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-md-9">

					<div class="row">
						<h3 class="konten-filter-title">Checkout</h3>
						<hr></hr>
						<div class="col-md-12">

<div id="checkoutList">
								<?php

	include "handler/table_checkout.php";

	?>
							</div>
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
mysqli_close($conn);}
?>

