<?php
require_once ('controllers/admin.php');

session_start();
if(!isset($_SESSION['username'])){
	header('location: login.php');
}

if (isset($_GET['do'])){
	if ($_GET['do'] == 'logout'){
		$admin = admin::logOut();
	}
}



?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>DevOOPS</title>
		<meta name="description" content="description">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/font-righteous.css" rel="stylesheet" type="text/css">
		<link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
		<link href="plugins/select2/select2.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="index.php">Online Printing</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<a href="#" class="show-sidebar">
						  <i class="fa fa-bars"></i>
						</a>
						<div id="search">
							<input type="text" placeholder="search"/>
							<i class="fa fa-search"></i>
						</div>
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="hidden-xs">
								<a href="index.php" class="modal-link">
									<i class="fa fa-bell"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="hidden-xs">
								<a class="ajax-link" href="ajax/calendar.php">
									<i class="fa fa-calendar"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="hidden-xs">
								<a href="ajax/page_messages.php" class="ajax-link">
									<i class="fa fa-envelope"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="img/avatar.jpg" class="img-rounded" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<span><?=$_SESSION['name'];?></span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">
											<i class="fa fa-user"></i>
											<span>Profile</span>
										</a>
									</li>
									<li>
										<a href="ajax/page_messages.php" class="ajax-link">
											<i class="fa fa-envelope"></i>
											<span>Messages</span>
										</a>
									</li>
									<li>
										<a href="ajax/gallery_simple.php" class="ajax-link">
											<i class="fa fa-picture-o"></i>
											<span>Albums</span>
										</a>
									</li>
									<li>
										<a href="ajax/calendar.php" class="ajax-link">
											<i class="fa fa-tasks"></i>
											<span>Tasks</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-cog"></i>
											<span>Settings</span>
										</a>
									</li>
									<li>
										<a href="?do=logout">
											<i class="fa fa-power-off"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a href="ajax/dashboard.php" class="active ajax-link">
						<i class="fa fa-dashboard"></i>
						<span class="hidden-xs">Dashboard</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-bar-chart-o"></i>
						<span class="hidden-xs">Charts</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="ajax/charts_xcharts.php">xCharts</a></li>
						<li><a class="ajax-link" href="ajax/charts_flot.php">Flot Charts</a></li>
						<li><a class="ajax-link" href="ajax/charts_google.php">Google Charts</a></li>
						<li><a class="ajax-link" href="ajax/charts_morris.php">Morris Charts</a></li>
						<li><a class="ajax-link" href="ajax/charts_coindesk.php">CoinDesk realtime</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-table"></i>
						 <span class="hidden-xs">Tables</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="ajax/tables_simple.php">Simple Tables</a></li>
						<li><a class="ajax-link" href="ajax/tables_datatables.php">Data Tables</a></li>
						<li><a class="ajax-link" href="ajax/tables_beauty.php">Beauty Tables</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-pencil-square-o"></i>
						 <span class="hidden-xs">Forms</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="ajax/forms_elements.php">Elements</a></li>
						<li><a class="ajax-link" href="ajax/forms_layouts.php">Layouts</a></li>
						<li><a class="ajax-link" href="ajax/forms_file_uploader.php">File Uploader</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-desktop"></i>
						 <span class="hidden-xs">UI Elements</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="ajax/ui_grid.php">Grid</a></li>
						<li><a class="ajax-link" href="ajax/ui_buttons.php">Buttons</a></li>
						<li><a class="ajax-link" href="ajax/ui_progressbars.php">Progress Bars</a></li>
						<li><a class="ajax-link" href="ajax/ui_jquery-ui.php">Jquery UI</a></li>
						<li><a class="ajax-link" href="ajax/ui_icons.php">Icons</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						 <span class="hidden-xs">Pages</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="ajax/page_login.php">Login</a></li>
						<li><a href="ajax/page_register.php">Register</a></li>
						<li><a id="locked-screen" class="submenu" href="ajax/page_locked.php">Locked Screen</a></li>
						<li><a class="ajax-link" href="ajax/page_contacts.php">Contacts</a></li>
						<li><a class="ajax-link" href="ajax/page_feed.php">Feed</a></li>
						<li><a class="ajax-link add-full" href="ajax/page_messages.php">Messages</a></li>
						<li><a class="ajax-link" href="ajax/page_pricing.php">Pricing</a></li>
						<li><a class="ajax-link" href="ajax/page_invoice.php">Invoice</a></li>
						<li><a class="ajax-link" href="ajax/page_search.php">Search Results</a></li>
						<li><a class="ajax-link" href="ajax/page_404.php">Error 404</a></li>
						<li><a href="ajax/page_500.php">Error 500</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-map-marker"></i>
						<span class="hidden-xs">Maps</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="ajax/maps.php">OpenStreetMap</a></li>
						<li><a class="ajax-link" href="ajax/map_fullscreen.php">Fullscreen map</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-picture-o"></i>
						 <span class="hidden-xs">Gallery</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="ajax/gallery_simple.php">Simple Gallery</a></li>
						<li><a class="ajax-link" href="ajax/gallery_flickr.php">Flickr Gallery</a></li>
					</ul>
				</li>
				<li>
					 <a class="ajax-link" href="ajax/typography.php">
						 <i class="fa fa-font"></i>
						 <span class="hidden-xs">Typography</span>
					</a>
				</li>
				 <li>
					<a class="ajax-link" href="ajax/calendar.php">
						 <i class="fa fa-calendar"></i>
						 <span class="hidden-xs">Calendar</span>
					</a>
				 </li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-picture-o"></i>
						 <span class="hidden-xs">Multilevel menu</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">First level menu</a></li>
						<li><a href="#">First level menu</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-plus-square"></i>
								<span class="hidden-xs">Second level menu group</span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Second level menu</a></li>
								<li><a href="#">Second level menu</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle">
										<i class="fa fa-plus-square"></i>
										<span class="hidden-xs">Three level menu group</span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">Three level menu</a></li>
										<li><a href="#">Three level menu</a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle">
												<i class="fa fa-plus-square"></i>
												<span class="hidden-xs">Four level menu group</span>
											</a>
											<ul class="dropdown-menu">
												<li><a href="#">Four level menu</a></li>
												<li><a href="#">Four level menu</a></li>
												<li class="dropdown">
													<a href="#" class="dropdown-toggle">
														<i class="fa fa-plus-square"></i>
														<span class="hidden-xs">Five level menu group</span>
													</a>
													<ul class="dropdown-menu">
														<li><a href="#">Five level menu</a></li>
														<li><a href="#">Five level menu</a></li>
														<li class="dropdown">
															<a href="#" class="dropdown-toggle">
																<i class="fa fa-plus-square"></i>
																<span class="hidden-xs">Six level menu group</span>
															</a>
															<ul class="dropdown-menu">
																<li><a href="#">Six level menu</a></li>
																<li><a href="#">Six level menu</a></li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</li>
										<li><a href="#">Three level menu</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div class="preloader">
				<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
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
