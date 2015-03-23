
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" /> -->
</head>
<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">R1 Store Admin</a> 
			</div>
		</nav>   
    <!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li>
						<a href="index.php"><i class="fa fa-home fa-lg"></i>Home</a>
					</li>
					<li>
						<a href="master.php?t=user"><i class="fa fa-user fa-lg"></i>Master User</a>
					</li>
					<li>
						<a href="master.php?t=category"><i class="fa fa-tags fa-lg"></i>Master Kategori</a>
					</li>
					<li>
						<a href="master.php?t=product"><i class="fa fa-file fa-lg"></i>Master Barang</a>
					</li>
					<li>
						<a href="about.php"><i class="fa fa-question fa-lg"></i>About</a>
					</li>
					<li>
						<a href="logout.php" style="background-color:rgb(128,0,0)"><i class="fa fa-power-off fa-lg"></i>Logout</a>
					</li>
				</ul>
			</div>
		</nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
			<div id="page-inner" >
				
			</div>
		</div>
		<!-- /. PAGE WRAPPER  -->
		</div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
    <!--<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>-->
      <!-- CUSTOM SCRIPTS -->
    <!--<script src="assets/js/custom.js"></script>-->
    
   
</body>
</html>';

