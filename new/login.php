<html>
	<head>
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
	</head>
	<body>
		<h1>No Access!</h1>
		<h2>Please Login First</h2>
		<form class="thumbnail" method="POST" action="login_handler.php">
			<div class="col-md-3">Nama</div> 
			<input class="col-md-9" type="text" name="user_name" /><br/>
			<div class="col-md-3">Password</div> 
			<input class="col-md-9" type="password" name="user_password" /><br/>
			<input type="submit" value="Masuk!" class="btn btn-primary"/>
		</form>
	</body>
</html>