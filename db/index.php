<?php
    include_once('admin.php');
    
    if(isset($_POST["loginz"])){
    $login = admin::loginAdmin();
echo $login;
    }

?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Login Form Admin</title>
	</head>
	<section>
	<form  method="POST" action="">
	<label for="username">Username</label>
	<input id="usernamex" name="username"/>
	<label for="password">Password</label>
	<input id="passwordx" name="password" />
	<p><?php echo $messages ?></p>
	<input type="submit" name="loginx" value="Login"/>
	</form>
	</section>
</html>
