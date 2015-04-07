<!DOCTYPE html>
<html lang="id">
	<?php
		include "head.php";
		if(!isset($title)){
			setTitle("Admin Area");
		}
	?>
	<body>
		<!--Start Header-->
		<?php
			include "topbar.php";
		?>
		<!--End Header-->
		<!--Start Container-->
		<div id="main" class="container-fluid">
			<div class="row">
				<!--Start Sidebar-->
				<?php
					include "sidebar.php";
				?>
				<!--End Sidebar-->
				<!--Start Content-->
				<div id="content" class="col-xs-12 col-sm-10">
					<div class="preloader">
						<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
					</div>
					<div class="row">
						<div id="breadcrumb" class="col-xs-12">
							<ol class="breadcrumb">
								<li><a href="./">Beranda</a></li>
								<li><a href="#">Dasbor</a></li>
							</ol>
						</div>
					</div>
					<div id="ajax-content"></div>
				</div>
				<!--End Content-->
			</div>
		</div>
		<!--End Container-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!--<script src="http://code.jquery.com/jquery.js"></script>-->
		<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
		<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="plugins/bootstrap/bootstrap.min.js"></script>
		<script src="plugins/justified-gallery/jquery.justifiedgallery.min.js"></script>
		<script src="plugins/tinymce/tinymce.min.js"></script>
		<script src="plugins/tinymce/jquery.tinymce.min.js"></script>
		<!-- All functions for this theme + document.ready processing -->
		<script src="js/devoops.js"></script>
	</body>
</html>
