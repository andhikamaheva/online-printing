<?php
    require_once ('controllers/admin.php');
    require_once  ('controllers/connect.php');

    $db = new database();
    $db->connectMySQL();

session_destroy();
session_start();
if(isset($_SESSION['username'])){
	header('location: index.php');
}

if(isset($_POST["submit"])){
        $admin = admin::loginAdmin();
        if($admin == false){
        	header('location: index.php');
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>.:: Login Administrator ::.</title>
		<meta name="description" content="description">
		<meta name="author" content="Evgeniya">
		<meta name="keyword" content="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">

		<link href="css/style.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		<img src="img/logo-200.png" class="img-login"/>
			<div class="box">
				<div class="box-content">
					<div class="text-center">
						<h3 class="page-header">.:: Login Administrator ::.</h3>
					</div>
					<form class="form-group" method="POST" action="">
					<label for="username">Username</label>
					<input id="username" name="username" type="text" placeholder="Username" required />
					<br/>
					<label for="password">password</label>
					<input id="password" name="password" type="password" placeholder="Password" required />
					<br/>
					<input type="submit" name="submit" value="submit"/>
					<p><?php admin::getError(); ?></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
