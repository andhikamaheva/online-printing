<!-- Navigation -->
<?php
if (isset($_GET['logout'])) {
	$action = $_GET['logout'];
	if ($action == 'true') {
		session_start();
		unset($_SESSION['member']);
		session_destroy();
	}
}
session_start();
$current_url = base64_encode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$_SESSION["url"] = $current_url;
?>

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
			<button type="button" style="background:#337ab7;color:white;" class="navbar-toggle" onclick="cartModal()">
				<span class="glyphicon glyphicon-shopping-cart"></span>
			</button>
			<a href="index.php">
				<img src="img/logo-200.png" class="nav-logo">
			</a>
			<a class="navbar-brand" href="index.php">LUG Printing</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php
session_start();
if (isset($_SESSION['member'])) {
	echo '<li>
					<a href="index.php">Services</a>
				</li>
				<li>
					<a href="index.php?f=contact">Contact</a>
				</li>
				<li>
					<a href="index.php?f=about">About</a>
				</li>
				';
} else {
	echo '<li>
				<a href="index.php">Services</a>
			</li>
			<li>
				<a href="index.php?f=contact">Contact</a>
			</li>
			<li>
				<a href="#" onclick="loadLoginModal()">Login</a>
			</li>
			<li>
				<a onclick="loadRegisterModal()" href="#">Register</a>
			</li>
			<li>
				<a href="index.php?f=about">About</a>
			</li>';
}
?>
	</ul>

	<ul class="nav navbar-nav navbar-right" style="padding:auto;">
		<li style="background:#337ab7;" class="hidden-xs"><a style="color:white;" href="#" onclick="cartModal()">	<span class="glyphicon glyphicon-shopping-cart"></span> Keranjang (<?php session_start();
$i = 0;foreach ($_SESSION['transaksi'] as $cart) {
	$i++;
}
echo $i;
?>)</a></li>

		<?php
session_start();
if (isset($_SESSION['member'])) {
	echo '
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>&nbsp;' . trim($_SESSION['member']['member_name']) . '<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="invoice.php">Layanan</a></li>
					<li><a href="#" onclick="orderConfirmModal()">Konfirmasi Pembayaran</a></li>
					<li><a href="#" onclick=settingModal()>Pengaturan</a></li>
					<li class="divider"></li>
					<li><a href="index.php?logout=true">Keluar</a></li>
				</ul>
			</li>
			';
}
?>

	</ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>

<div class="modal fade" id="globalModal" tabindex="-1" role="dialog" aria-labelledby="globalModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="globalModalLabel">Modal title</h4>
			</div>
			<div class="modal-body" id="globalModalContent">

				...
			</div>
			<div class="modal-footer">
				<button id="globalModalCancel" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button id="globalModalConfirm" type="button" class="btn btn-primary">Login</button>
			</div>
		</div>
	</div>
</div>

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
				<button id="cartModalCancel" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button id="cartModalConfirm" type="button" class="btn btn-primary">Login</button>
			</div>
		</div>
	</div>
</div>
