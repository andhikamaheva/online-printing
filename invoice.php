<?php

include "handler/connection_handler.php";
session_start();
if (isset($_SESSION['admin'])) {
	?>
	<!DOCTYPE html>
	<html lang="en">
	<?php include "template/header.php";
	?>
	<body>
		<div id="navbar">
			<?php include "template/navbar.php";
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
									<th>Name</th>
									<th>Due Date</th>
									<th>Status</th>
									<th>Details</th>
								</thead>
								<tbody>

									<?php
$results = $mysqli->query("SELECT * from admin");
	while ($obj = $results->fetch_object()) {
		echo "<tr>";
		echo "<td>";
		echo $obj->admin_username;
		echo "</td>";
		echo "</tr>";
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
} else {

	header('Location: ' . base64_decode($_SESSION["url"]));
}
?>

