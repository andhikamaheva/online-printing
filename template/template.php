<!DOCTYPE html>
<html lang="en">
	<?php
include "header.php";
include "admin/handler/connection_handler.php";
?>
	<body>
		<div id="navbar">
		<?php
include "navbar.php";
?>
		</div>
		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<?php
include "konten.php";
include "sidebar.php";
?>
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
