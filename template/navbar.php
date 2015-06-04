<!-- Navigation -->
<?php
if(isset($_GET['logout'])){
	$action = $_GET['logout'];
		if($action=='true'){
	session_start();
	unset ($_SESSION['admin']);
	session_destroy();
	header('location: /');
}
}?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
<<<<<<< HEAD
			<button type="button" style="background:#337ab7;color:white;" class="navbar-toggle" onclick="cartModal()">
				<span class="glyphicon glyphicon-shopping-cart"></span>
			</button>
			<a href="index.php">
				<img src="img/logo-200.png" class="nav-logo">
			</a>
=======
			<img src="img/logo-200.png" class="nav-logo">
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
			<a class="navbar-brand" href="index.php">LUG Printing</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php 
				session_start();
				if(isset($_SESSION['admin'])){
				echo '<li>
					<a href="index.php">Services</a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li>
				<li>
<<<<<<< HEAD
					<a href="index.php?f=about">About</a>
=======
					<a href="halaman/about.php">About</a>
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
				</li>
				';
				}
				else {
				echo '<li>
					<a href="index.php">Services</a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li>
				<li>
					<a href="#" onclick="loginModal()">Login</a>
				</li>
				<li>
<<<<<<< HEAD
					<a onclick="registerModal()" href="#">Register</a>
				</li>
				<li>
					<a href="index.php?f=about">About</a>
=======
					<a href="#">Register</a>
				</li>
				<li>
					<a href="halaman/about.php">About</a>
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
				</li>';
				}
				?>				
			</ul>
			
			<ul class="nav navbar-nav navbar-right" style="padding:auto;">
<<<<<<< HEAD
			<li style="background:#337ab7;" class="hidden-xs"><a style="color:white;" href="#" onclick="cartModal()">	<span class="glyphicon glyphicon-shopping-cart"></span> Keranjang (0)</a></li>
				
=======
				<button class="btn btn-danger" onclick="cartModal()">
					<span class="glyphicon glyphicon-shopping-cart"> Keranjang (0)</span>
				</button>
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
				<?php
				session_start();
				if(isset($_SESSION['admin'])){
				echo '
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user">&nbsp;'.$_SESSION['admin']['admin_name'].'</span><span class="caret"></span></a>
					  <ul class="dropdown-menu" role="menu">
					    <li><a href="#">Layanan</a></li>
<<<<<<< HEAD
=======
					    <li><a href="#">Tagihan</a></li>
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
					    <li><a href="#">Konfirmasi Pembayaran</a></li>
					    <li><a href="#">Pengaturan</a></li>
					    <li class="divider"></li>
					    <li><a href="index.php?logout=true">Keluar</a></li>
					  </ul>
					</li>
<<<<<<< HEAD
				';				
				}
				 ?>
				
=======
				';
				}
				 ?>
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>

<<<<<<< HEAD
<div class="modal fade" id="globalModal" tabindex="-1" role="dialog" aria-labelledby="globalModalLabel" aria-hidden="true">
=======
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<<<<<<< HEAD
        <h4 class="modal-title" id="globalModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="globalModalContent">
=======
        <h4 class="modal-title" id="loginModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="loginModalContent">
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2

        ...
      </div>
      <div class="modal-footer">
<<<<<<< HEAD
        <button id="globalModalCancel" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button id="globalModalConfirm" type="button" class="btn btn-primary">Login</button>
=======
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button id="loginModalConfirm" type="button" class="btn btn-primary">Login</button>
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
      </div>
    </div>
  </div>
</div>
<<<<<<< HEAD
=======



<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="cartModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="cartModalContent">

        ...
      </div>
      <div class="modal-footer">
        <button id="cartModalConfirm" type="button" class="btn btn-primary">Checkout</button>
      </div>
    </div>
  </div>
</div>
>>>>>>> c0ce0f8dbccce1bdc7b6999a5974f12864a796a2
