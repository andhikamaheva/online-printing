<!DOCTYPE html>
<html lang="en">
	<?php
		include "header.php";
		include "connection_handler.php";
	?>
	<body>
		<?php
		include "navbar.php";
		?>
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
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<p>Copyright &copy; project PPWEB R1x\</p>
					</div>
				</div>
			</footer>
		</div>
		<!-- /.container -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
