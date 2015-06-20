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
				<div class="col-md-9">
					<div class="row" id="kontenBox" konten_filter="<?php echo $_GET['f']; ?>">
					</div>
				</div>
				<div class="col-md-3">
					<?php
					include "sidebar.php";
					?>
				</div>
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
		<script>
			$(document).ready(function(){
				var konten_filter=$('#kontenBox').attr('konten_filter');
				if(konten_filter==null || konten_filter==""){
					$('#kontenBox').html('<h4 class="konten-filter-title">All Services</h4>'+loadingText);
					$('#kontenBox').load('template/All_services.php');
				}else{
					if(konten_filter!='about' && konten_filter!='contact'){
						$('#kontenBox').html('	<h4 class="konten-filter-title">'+konten_filter+'</h4>'+loadingText);
					}
					$('#kontenBox').load('template/konten_filter.php?f='+encodeURIComponent(konten_filter));
				}
			});
		</script>
	</body>
</html>
<?php
mysqli_close($conn);
?>
