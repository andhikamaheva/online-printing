<?php
    require_once ('admin.php');
    require_once  ('connect.php');

    $db = new database();
    $db->connectMySQL();

    if(isset($_GET['do'])){
    	if($_GET['do'] == 'Login'){
        $admin = admin::loginAdmin();
        if($admin){
        	echo "login berhasil";
        }
        else{
        	echo "login gagal";
        }
    }
?>


<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Login Form Admin</title>
	</head>
	<section>
	<form  method="POST" action="<?php $_SERVER['PHP_SELF'] ?>?do=Login">
	<label for="username">Username</label>
	<input id="usernamex" name="username"/>
	<label for="password">Password</label>
	<input id="password" name="password" />
	<input type="submit" name="submit" value="Login"/>
	</form>
	</section>
</html>
